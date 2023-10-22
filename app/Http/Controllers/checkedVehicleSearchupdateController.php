<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\e_waybill;
use App\Models\vehicle_detail;
use App\Models\division;
use DB;
use App\Models\checked_vehicle;

class checkedVehicleSearchupdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     $vehicle_data = vehicle_detail::where('vehicle_no', $request->veh_number)->first();


    //     $req = e_waybill::where('veh_number', $request->veh_number)->get();
    //     $poi_numbers = checked_vehicle::where('vechicle_no', $request->veh_number)->first();

    //       $vehicle_no = $vehicle_data->vehicle_no;
    //          $veh_place = $vehicle_data->veh_place;
    //          $veh_owner = $vehicle_data->veh_owner;

    //     $poi_number = $poi_numbers->poi_no;

    //     $data = array("vehicle_no"=>$vehicle_no, "veh_place"=>$veh_place, "veh_owner"=>$veh_owner);
    //     $jsonResponse=json_encode(["eway_data" => $req, "veh_data" => $data, "num"=>$poi_number]);
    //     echo $jsonResponse;
    // }

    public function index(Request $request)
    {
        // dd("hi");
        if(session('unique_id') ==''){
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');
            
        }
        $vehicle_data = DB::table('checked_vehicle_det')
        ->Join('checked_vechicle', 'checked_vehicle_det.vehno', 'checked_vechicle.vechicle_no')
        ->select('checked_vechicle.booking_entry_date','checked_vechicle.need_offence_booking_sts', 'checked_vehicle_det.*')
        // ->groupBy('checked_vehicle_det.vehno')
        ->where('checked_vehicle_det.vehno', $request->veh_number)
        // ->where()
        ->distinct()
        ->orderBy('id','DESC')
        ->get();

        // ->Join('division_creation', 'checked_vechicle.division_num', 'division_creation.unique_id')

        // $vehicle_data = DB::table('part_b_e_will')
        //     ->Join('part_a(i)_e-waybill', 'part_b_e_will.ewb_no', 'part_a(i)_e-waybill.ewb_no')
        //     // ->Join('division_creation', 'part_b_e_will.division_num', 'division_creation.unique_id')
        //     ->select('part_b_e_will.*', 'part_a(i)_e-waybill.*')
        //     // ->Join('e_way_bill_details', 'checked_vechicle.vechicle_no', 'e_way_bill_details.veh_number')
        //     // ->select('checked_vechicle.*','vehicle_details.*','e_way_bill_details.*')

        //     ->where('part_b_e_will.vehno', $request->veh_number)
        //     // ->where('division_creation.unique_id', $request->division)
        //     // ->where('part_b_e_will.is_delete', 0)
        //     ->get();
        // $vehicle_data = vehicle_detail::where('vehno', '=', $request->veh_number)->get();



            // dd($vehicle_data);
        // $division = division::where('unique_id', $request->division)->first();

        $checked_veh = checked_vehicle::where('vechicle_no', $request->veh_number)->first();

        // dd($checked_veh);
        // dd($request->division);
 // if ($vehicle_data == '') {
        //     $data = '';
        // } else {
            // $eway_data = array();


                // dd($data);
            // foreach ($vehicle_data as $value) {
                // $data =explode(',',$vehicle_data->ewb_no);
                // $eway_data = e_waybill::where('ewb_no', '=', $data)->get();



            //             $product= array();

            //             foreach ($vehicle_data as $datas){
            //  // ->where('unit', '>=', $unit['quantity'])
            // //  dd($datas->ewb_no);
            //                 $product = e_waybill::where('ewb_no', '=', $datas->ewb_no)->first();
            //                     // dd($product,'ji');

            //             }

            //             dd($product,'ji');

            // $vehicle_no = $vehicle_data->vehno;
            // $veh_place = $vehicle_data->frplace;
            // // $veh_owner = $vehicle_data->veh_owner;
            // $division_name = $division->division_short_name;
            // dd($division_name);
            // $rand = rand(00000, 99999);
            // $number = "PO" . $division_name . date('ym') . $rand;
            // "poi_num" => $data,
            // $req = e_waybill::where('veh_number', $request->veh_number)->get();
            // "vehicle_no" => $vehicle_no, "veh_place" => $veh_place,

            // $data = array("num" => $number);
            $jsonResponse = json_encode([ 'veh_data' => $vehicle_data, 'cheched_veh' => $checked_veh]);
        // }
        // "eway_data" => $req,
        // $jsonResponse = json_encode(["poi_num" => $data, 'veh_data' => $vehicle_data, 'Eway_data' => $eway_data]);
    // }
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
