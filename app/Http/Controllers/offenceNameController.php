<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\offenceSection;

class offenceNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd("hii");
        // dd($request->nature_of_the_offense);
        $nature_of_the_offense = $request->nature_of_the_offense;
        
        $offence_sections = offenceSection::where('unique_id','=',$request->nature_of_the_offense)->first();
        // return view('offence_section.list', compact('offence_sections'))->with('i', (request()->input('page', 1) - 1) * 10);
        $jsonResponse = json_encode(["offence_sections" => $offence_sections]);
                // dd($jsonResponse);
                echo $jsonResponse;
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
