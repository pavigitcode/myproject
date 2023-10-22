<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\designation;
use DB;
 
class designationController extends Controller
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
        $user_type = session()->get('usertype_id');
        $user_division_id = session()->get('division_id');

        if ($user_type == '62c80e7c2536911885' || $user_type == '62c80e8cac02318910' || $user_type == '63b4fd095bf7675259' || $user_type == '62b55fe64789d40213') {
            $designation_creations = designation::where('is_delete', 0)->latest()->paginate();
            return view('designation.list', compact('designation_creations'))->with('i', (request()->input('page', 1) - 1) * 10);
        }

        // else if($user_type == '62b55fe64789d40213'){
        //     $divison_creations = division::where('is_delete', 0)->where('unique_id',$user_division_id)->latest()->paginate();
        //     return view('division.list', compact('divison_creations'))->with('i', (request()->input('page', 1) - 1) * 10);
        // }

        // $designation_creations = designation::where('is_delete', 0)->latest()->paginate();
        // return view('designation.list', compact('designation_creations'))->with('i', (request()->input('page', 1) - 1) * 10);
       
    }
    // public function Prnpriview()
    // {
    //     // if ($user_type == '62c80e7c2536911885' || $user_type == '62c80e8cac02318910' || $user_type == '63b4fd095bf7675259' || $user_type == '62b55fe64789d40213') {
    //         $designation_creations = designation::where('is_delete', 0)->latest()->paginate();
    //         return view('designation.list', compact('designation_creations'))->with('i', (request()->input('page', 1) - 1) * 10);
    //     // }
    // }



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
        return view('designation.addform');
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
            'designation_name' => 'required',
            'description' => 'required',
            'is_active' => 'required'
        ]);
        $designation_data = designation::where('designation_name',$request->designation_name)->where('is_delete',0)->first();

        if($designation_data == '')
        {
        $designation = new designation;
        $designation->designation_name = $request->designation_name;
        $designation->description = $request->description;
        $designation->is_active = $request->is_active;
        $designation->unique_id = unique_id($prefix);
        $designation->save();
        return redirect()->route('designation_creation.index')->with('success', 'Designation  Created Successfully.');
    }
    else
    {
        return redirect()->route('designation_creation.create')
        ->with('error', 'Already exit Designation Name');
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
        $designation = designation::findOrfail($id);
        return view('designation.editform', compact('designation'));
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
            'designation_name' => 'required',
            'description' => 'required',
            'is_active' => 'required'

        ]);
        $designation_data = designation::where('designation_name',$request->designation_name)->first();
        
        if($designation_data){
            // return $designation_data;
            if($designation_data->id == $id){
                designation::where('id', $id)->update([
                // $designation =  designation::find($id);
                'designation_name' => $request->get('designation_name'),
                'description'=> $request->get('description'),
                'is_active'=> $request->get('is_active'),
                ]);
                    return redirect()->route('designation_creation.index')
                        ->with('success', 'Designation updated successfully');
                }
                else{
                    return redirect()->route('designation_creation.edit',$id)
                    ->with('error', 'Already exit designation name');
                }
        }else if(!$designation_data){
            designation::where('id', $id)->update([
                // $designation =  designation::find($id);
                'designation_name' => $request->get('designation_name'),
                'description'=> $request->get('description'),
                'is_active'=> $request->get('is_active'),
                ]);
                    return redirect()->route('designation_creation.index')
                        ->with('success', 'Designation updated successfully');
                
        } else{
            return redirect()->route('designation_creation.edit',$id)
            ->with('error', 'Already exit designation name');
        }

}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $designation =  designation::find($id);

        $designation->is_delete = 1;
        // $screensection->delete();

        $designation->save();

        return redirect()->route('designation_creation.index')
            ->with('success', 'Designation Deleted successfully');
    }
}
