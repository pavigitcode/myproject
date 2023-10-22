<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\consignordetails;


class offenceConsignorListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
        $id_value = explode(',', $id);

        consignordetails::where('id', $id_value[0])->update([
            'is_delete' => 1,

        ]);
          return redirect()->route('offence_vehicle.edit',  $id_value[1]);
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
