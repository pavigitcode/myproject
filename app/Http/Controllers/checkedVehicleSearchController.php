<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\e_waybill;
use App\Models\vehicle_detail_view;
use App\Models\division;
use App\Models\vehicle_detail;

use DB;
// use stdClass;

class checkedVehicleSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (session('unique_id') == '') {
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');
        }
        $vehicle_datas = $request->veh_number;

        $vehicle_data = vehicle_detail_view::where('vehno', $request->veh_number)->groupBy('ewb_no')->get();



        $ewb_nos = vehicle_detail_view::where('vehno', $request->veh_number)->select('ewb_no')->groupBy('ewb_no')->distinct()->get();


        foreach ($ewb_nos as $value) {
            $ewaydata[] = $value->ewb_no;
        }

        if (sizeof($vehicle_data)) {

            foreach ($vehicle_data as $datas) {


                $vehicle_no = $datas->vehno;
                $place = $datas->frplace;
            }
            $division = division::where('unique_id', $request->division)->first();


            $division_name = $division->division_short_name;

            $rand = rand(00000, 99999);
            $number = "PO" . $division_name . date('ym') . $rand;



            $data = array("num" => $number, "vehicle_no" => $vehicle_no, "veh_place" => $place);

            $jsonResponse = json_encode(["poi_num" => $data, 'veh_data' => $vehicle_data, 'eway_nos' => $ewaydata]);

            echo $jsonResponse;
        } else {
            $division = division::where('unique_id', $request->division)->first();


            $division_name = $division->division_short_name;

            $rand = rand(00000, 99999);
            $number = "PO" . $division_name . date('ym') . $rand;



            $data = array("num" => $number, "vehicle_no" => $vehicle_datas);
            $vehicle_data = vehicle_detail_view::where('vehno', $request->veh_number)->groupBy('ewb_no')->get();



            $ewb_nos = vehicle_detail_view::where('vehno', $request->veh_number)->select('ewb_no')->groupBy('ewb_no')->distinct()->get();
    

            $jsonResponse = json_encode(["poi_num" => $data, 'eway_nos' => $ewb_nos]);
            // $jsonResponse = json_encode(["poi_num" => $data]);

            // $data = '';

            // $jsonResponse = json_encode(['data' => $data]);
            // dd($jsonResponse);
            echo $jsonResponse;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd("hii");
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
        // dd("hii");
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
