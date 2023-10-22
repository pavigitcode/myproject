<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\consignorCreation;

class consignorCreationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('unique_id') ==''){
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');
            
        }
        $consignorCreations = consignorCreation::where('is_delete', 0)->latest()->paginate();
        return view('consignor_creation.list', compact('consignorCreations'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session('unique_id') ==''){
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');
            
        }
        return view('consignor_creation.form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prefix = "";
        $request->validate([
            'consignee_code' => 'required',
            'consignee_circle' => 'required',
            'is_active' => 'required',
            'description' => 'required'
        ]);

        $consignorcreation_data = consignorcreation::where('consignee_code',$request->consignee_code)->orwhere('consignee_circle',$request->consignee_circle)->first();    

        
        if($consignorcreation_data == '')
        {

        $consignorCreation = new consignorCreation;

        $consignorCreation->consignee_code = $request->consignee_code;
        $consignorCreation->consignee_circle = $request->consignee_circle;
        $consignorCreation->is_active = $request->is_active;
        $consignorCreation->description = $request->description;

        $consignorCreation->unique_id = unique_id($prefix);

        $consignorCreation->save();
        // Alert::Success('Congrats', 'You\'ve Successfully Registered');

        // SweetAlert::message('User Type Created Successfully!');
        // ->with('Success', 'User Type Created Successfully.')
        return redirect()->route('consignorcreation.index')->with('success', 'Consignor Creation Code Created Successfully.');
    }
    else
    {
        return redirect()->route('consignorcreation.create')
        ->with('error', 'Cosignee code or Cosignee circle already exits');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(session('unique_id') ==''){
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');
            
        }
        $consignorCreation = consignorCreation::find($id);
        return view('consignor_creation.update', compact('consignorCreation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'consignee_code' => 'required',
            'consignee_circle' => 'required',
            'is_active' => 'required',
            // 'description' => 'required'
        ]);

        $consignorcreation_data = consignorcreation::where('consignee_code',$request->consignee_code)
             ->orwhere('consignee_circle',$request->consignee_circle)->first();    

      if($consignorcreation_data){
                // return $designation_data;
        if($consignorcreation_data->id == $id){
    
        // $consignorCreation =  consignorCreation::find($id);
        consignorcreation::where('id', $id)->update([
            // $designation =  designation::find($id)
        'consignee_code' => $request->consignee_code,
        'consignee_circle' => $request->consignee_circle,
        'is_active' => $request->is_active,
        'description' => $request->description,
    ]);

        // $consignorCreation->update();
        // alert()->success('success','Lorem ipsum dolor sit amet.')->position('center');

        return redirect()->route('consignorcreation.index')
            ->with('success', 'Consignor Creation Code updated successfully');
    }
    else
    {
        return redirect()->route('consignorcreation.edit',$id)
        ->with('error', 'Cosignee code or Cosignee circle already exits');
    }
      }

    else if(!$consignorcreation_data){
        consignorcreation::where('id', $id)->update([
            'consignee_code' => $request->consignee_code,
            'consignee_circle' => $request->consignee_circle,
            'is_active' => $request->is_active,
            'description' => $request->description,
            ]);
                return redirect()->route('consignorcreation.index')
                >with('success', 'Consignor Creation Code updated successfully');

            
    } else{
        return redirect()->route('consignorcreation.edit',$id)
        ->with('error', 'Cosignee code or Cosignee circle already exits');
    }

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consignorCreation =  consignorCreation::find($id);

        $consignorCreation->is_delete = 1;
        // $screensection->delete();

        $consignorCreation->update();

        return redirect()->route('consignorcreation.index')
            ->with('success', 'Consignor Creation Code  Deleted successfully');
    }
}
