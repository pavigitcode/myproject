<?php

namespace App\Http\Controllers;

use App\Models\division;
use Illuminate\Http\Request;

class DivisionController extends Controller
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
        if($user_type == '62c80e7c2536911885' || $user_type == '62c80e8cac02318910' || $user_type == '63b4fd095bf7675259' ){
            $divison_creations = division::where('is_delete', 0)->latest()->paginate();
            return view('division.list', compact('divison_creations'))->with('i', (request()->input('page', 1) - 1) * 10);
        }
        else if($user_type == '62b55fe64789d40213'){
            $divison_creations = division::where('is_delete', 0)->where('unique_id',$user_division_id)->latest()->paginate();
            return view('division.list', compact('divison_creations'))->with('i', (request()->input('page', 1) - 1) * 10);
        }

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
        return view('division.addform');
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
            'division_name' => 'required',
            'division_short_name' => 'required',
            // 'description' => 'required',
            'is_active' => 'required'
        ]);

    $division_data = division::where('division_name',$request->division_name)->where('is_delete',0)->orwhere('division_short_name',$request->division_short_name)->first();

        if($division_data == ''){
            $division = new division;
            $division->division_name = $request->division_name;
            $division->division_short_name = $request->division_short_name;
            $division->description = $request->description;
            $division->is_active = $request->is_active;
            $division->unique_id = unique_id($prefix);
            $division->save();
            return redirect()->route('division_creation.index')->with('success', 'Division Created Successfully.');
    
        }
        else
        {
            return redirect()->route('division_creation.create')
            ->with('error', 'Already exit Division Name or Division Sort name');
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
        $division = division::findOrfail($id);
        return view('division.editform', compact('division'));

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
            'division_name' => 'required',
            'division_short_name' => 'required',
            'is_active' => 'required'
        ]);
        $division_data = division::where('division_name',$request->division_name)->orwhere('division_short_name',$request->division_short_name)->first();
        if($division_data){
            if($division_data->id == $id){
                division::where('id', $id)->update([
                'division_name' => $request->get('division_name'),
                'division_short_name' => $request->get('division_short_name'),
                'description' => $request->get('description'),
                'is_active' =>$request->get('is_active'),
              ]);
                // dd($division_data);
                return redirect()->route('division_creation.index')
              ->with('success', 'Division updated successfully');
            }else{
            return redirect()->route('division_creation.edit',$id)
            ->with('error', 'Already exit Division name');
            }
        } 
        else if(!$division_data){
            division::where('id', $id)->update([
                // $designation =  designation::find($id);
                'division_name' => $request->get('division_name'),
                'division_short_name' => $request->get('division_short_name'),
                'description' => $request->get('description'),
                'is_active' =>$request->get('is_active'),
                ]);
            return redirect()->route('division_creation.index')
            ->with('success', 'Division updated successfully');      
        } else{
            return redirect()->route('division_creation.edit',$id)
            ->with('error', 'Already exit division name');
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
        $division =  division::find($id);

        $division->is_delete = 1;
        // $screensection->delete();

        $division->save();

        return redirect()->route('division_creation.index')
            ->with('success', 'Division Deleted successfully');


    }
}
