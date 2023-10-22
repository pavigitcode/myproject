<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hsn;


class hsnController extends Controller
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
        $hsn = hsn::where('is_delete', 0)->get();
        return view('hsn.list', compact('hsn'))->with('i', (request()->input('page', 1) - 1) * 10);
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
        return view('hsn.form');
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
            'hsn_name' => 'required',
            'hsn_code' => 'required',
            'is_active' => 'required'
            // 'description' => 'required'
        ]);
        $hsnData = hsn::where('hsn_code',$request->hsn_code)->where('is_delete',0)->first();
        // return $screenData;
       if($hsnData == ''){
           $hsn = new hsn;
           $hsn->hsn_name = $request->hsn_name;
           $hsn->hsn_code = $request->hsn_code;
           $hsn->is_active = $request->is_active;
           $hsn->description = $request->description;
           $hsn->unique_id = unique_id($prefix);
           $hsn->save();
           // Alert::Success('Congrats', 'You\'ve Successfully Registered');

           // SweetAlert::message('User Type Created Successfully!');
           // ->with('Success', 'User Type Created Successfully.')
          return redirect()->route('hsn.index')->with('success', 'HSN Code Created Successfully.');
        }else{
        return redirect()->route('hsn.create')
        ->with('error', 'Already exit hsn code');
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
        $hsn = hsn::find($id);
        return view('hsn.update', compact('hsn'));
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
            'hsn_name' => 'required',
            'hsn_code'  => 'required',
            // 'description' => 'required',
            'is_active' => 'required'
        ]);
        $hsnData = hsn::where('hsn_code',$request->hsn_code)->first();
        // return $screenData;
    if($hsnData){
            // return $hsnData;
        if($hsnData->id == $id){
            hsn::where('id', $id)->update([
                'hsn_name' => $request->get('hsn_name'),
                'hsn_code' => $request->get('hsn_code'),
                'is_active' => $request->get('is_active'),
                'description' =>$request->get('description'),

            ]);
            return redirect()->route('hsn.index')
            ->with('success', 'HSN Code updated successfully');
        }else{
            return redirect()->route('hsn.edit',$id)
            ->with('error', 'Already exit hsn code');
        }
    }else if(!$hsnData){
        hsn::where('id', $id)->update([
            'hsn_name' => $request->get('hsn_name'),
            'hsn_code' => $request->get('hsn_code'),
            'is_active' => $request->get('is_active'),
            'description' =>$request->get('description'),
            ]);
        return redirect()->route('hsn.index')
         ->with('success', 'HSN Code updated successfully');
            
    } else{
        return redirect()->route('hsn.edit',$id)
        ->with('error', 'Already exit hsn code');
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
        $hsn =  hsn::find($id);

        $hsn->is_delete = 1;
        // $screensection->delete();

        $hsn->update();

        return redirect()->route('hsn.index')
            ->with('success', 'HSN Code Deleted successfully');
    }
}
