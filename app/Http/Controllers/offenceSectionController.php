<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\offenceSection;


class offenceSectionController extends Controller
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
        $offence_sections = offenceSection::where('is_delete', 0)->latest()->paginate();
        return view('offence_section.list', compact('offence_sections'))->with('i', (request()->input('page', 1) - 1) * 10);
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

        return view('offence_section.form');
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
            'offence_name' => 'required',
            'offence_sec' => 'required',
            'is_active' => 'required',
            'description' => 'required'
        ]);

        $offenceSection = new offenceSection;

        $offenceSection->offence_name = $request->offence_name;
        $offenceSection->offence_section = $request->offence_sec;
        $offenceSection->is_active = $request->is_active;
        $offenceSection->description = $request->description;

        $offenceSection->unique_id = unique_id($prefix);

        $offenceSection->save();
        // Alert::Success('Congrats', 'You\'ve Successfully Registered');

        // SweetAlert::message('User Type Created Successfully!');
        // ->with('Success', 'User Type Created Successfully.')
        return redirect()->route('offence_section.index')->with('success', 'Offence Section Created Successfully.');
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
        $offence_section = offenceSection::find($id);
        return view('offence_section.update', compact('offence_section'));
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
            'offence_name' => 'required',
            'offence_sec'  => 'required',
            'description' => 'required',
            'is_active' => 'required'
        ]);

        $offenceSection =  offenceSection::find($id);

        $offenceSection->offence_name = $request->get('offence_name');
        $offenceSection->offence_section = $request->get('offence_sec');
        $offenceSection->description = $request->get('description');

        $offenceSection->is_active = $request->get('is_active');

        $offenceSection->update();
        // alert()->success('success','Lorem ipsum dolor sit amet.')->position('center');

        return redirect()->route('offence_section.index')
            ->with('success', 'Offence Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offenceSection =  offenceSection::find($id);

        $offenceSection->is_delete = 1;
        // $screensection->delete();

        $offenceSection->update();


        return redirect()->route('offence_section.index')
            ->with('success', 'Offence Section Deleted successfully');
    }
}
