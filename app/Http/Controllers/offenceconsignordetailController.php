<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\officerregistration;
use App\Models\designation;
use App\Models\offenceOfficerList;
use App\Models\consignordetails;
use DB;

class offenceconsignordetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $prefix = "";
        $request->validate([
            'consignor_reg' => 'required',
            // 'temporary_id_of_consignor' => 'required',
            // 'name_of_the_consignor' => 'required',
            // 'consignor_division' => 'required',
            // 'consignor_circle_details' => 'required',
            // 'poi_number' => 'required',
            'consignee_registered' => 'required',
            // 'temporary_id_of_consignee' => 'required',
            // 'office_no' => 'required',
            // 'office_no' => 'required'
        ]);

        $consignordetail = new consignordetails;

        $consignordetail->consignor_registered = $request->consignor_reg;
        $consignordetail->temporary_id_of_consignor = $request->temporary_id_of_consignor;

        $consignordetail->name_of_the_consignor = $request->name_of_the_consignor;

        $consignordetail->consignor_division = $request->consignor_division;
        $consignordetail->consignor_other_div = $request->consignor_other_div;
        $consignordetail->consignor_circle_details = $request->consignor_circle_details;
        $consignordetail->poi_number = $request->poi_number;
        $consignordetail->consignee_registered = $request->consignee_registered;
        $consignordetail->temporary_id_of_consignee = $request->temporary_id_of_consignee;
        $consignordetail->name_of_consignee = $request->name_of_consignee;
        $consignordetail->consignee_div = $request->consignee_div;
        $consignordetail->consignee_other_div = $request->consignee_other_div;
        $consignordetail->consignee_cir_data = $request->consignee_cir_data;
        $consignordetail->unique_id = unique_id($prefix);
        $consignordetail->save();

        // Alert::Success('Congrats', 'You\'ve Successfully Registered');

        // SweetAlert::message('User Type Created Successfully!');
        // ->with('Success', 'User Type Created Successfully.')

        $consignor_list = DB::table('offence_vehicle_consignor_detail')
            // ->Join('division_creation', 'offence_vehicle_consignor_detail.consignor_division', 'division_creation.unique_id')
            // ->Join('consignor_creation', 'offence_vehicle_consignor_detail.consignor_circle_details', 'consignor_creation.unique_id'),'consignor_creation.consignee_circle'
            ->select('offence_vehicle_consignor_detail.*')
            ->where('offence_vehicle_consignor_detail.poi_number', $request->poi_number)
            ->where('offence_vehicle_consignor_detail.is_delete', 0)
            ->distinct()
            ->get();

        // dd($consignor_list);

        // $data = array("mobile_no"=>$officerregistration->mobile_no, "gpf_no"=>$officerregistration->gpf_cps_no, "designation_name"=>$designation_value->designation_name);

        $jsonResponse = json_encode(['consignor_list' => $consignor_list]);
        echo $jsonResponse;
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
