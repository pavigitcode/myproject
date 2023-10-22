<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\officerregistration;
use App\Models\offenceSection;
use App\Models\offenceOfficerList;
use App\Models\consignordetails;
use App\Models\offenceVehicle;

use DB;

class offenceNamesGetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $offence_names = offenceSection::where('offence_section', $request->offence_section)->get();

        $data = array("offence_names" => $offence_names);
        // dd($offence_names);
        $jsonResponse = json_encode($data);
        echo $jsonResponse;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        // $offence_section_1 = offenceSection::where('unique_id',$id)->get();
        // $offence_sections = offenceSection::all();
        // $offence_name = offenceVehicle::where('nature_of_the_offense',$offence_section_1[0]['nature_of_the_offense'])->get();

      
        // return view('edit',['offenceSection'=>$offence_section_1],['offence_section'=>$offence_sections],['offenceVehicle'=>$offence_name]);
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
