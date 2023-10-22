<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\checked_vehicle;
use App\Models\division;
use App\Models\offenceVehicle;
use DB;

class dashboardOffenceViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input_date = $request->month;
        $user_type_name = $request->user_type_name;
        $division_name = $request->division_name;
        // dd($division_name);s
        $split_value = explode('-', $input_date);
        if ($user_type_name == '62c80e7c2536911885' || $user_type_name == '62c80e8cac02318910' || $user_type_name == '63b4fd095bf7675259'  ||$user_type_name == '646329c163c3d77002') {
            // $month_wise_data = checked_vehicle::where('is_delete', '=', 0)
            // ->whereMonth('booking_entry_date', $split_value[1])
            // ->whereYear('booking_entry_date', $split_value[0])->get();
            
            $checked_passed_count = DB::table('offence_vechicle_booking')
            
            ->Join('division_creation', 'offence_vechicle_booking.intelligence_division', 'division_creation.unique_id')
            ->select('offence_vechicle_booking.*', 'division_creation.division_name')
           
            ->where(['offence_vechicle_booking.is_delete' => 0, 'offence_vechicle_booking.need_offence_booking_sts' => 1])
            
            ->whereYear('offence_vechicle_booking.duty_date', $input_date)
            ->distinct()
            ->orderBy('id', 'DESC')
            ->get();
            
            

            $checked_total = $checked_passed_count->count();
            // $offence_total = $offence_vehicle->count();
            // $passed_count = $checked_passed_count->count();
            $total = $checked_passed_count;
            // $offence_total = $offence_vehicle;
            // $passed_count = $checked_passed_count;
            $jsonResponse = json_encode(["count" => $checked_total,"checked_vehicle" => $total]);

            echo $jsonResponse;

        } else {
            $month_wise_data1 = DB::table('offence_vechicle_booking')
            
            ->Join('division_creation', 'offence_vechicle_booking.intelligence_division', 'division_creation.unique_id')
            ->select('offence_vechicle_booking.*', 'division_creation.division_name')
           
            ->where(['offence_vechicle_booking.intelligence_division' => $division_name, 'offence_vechicle_booking.is_delete' => 0,'offence_vechicle_booking.need_offence_booking_sts' => 1])
            
            ->whereYear('offence_vechicle_booking.duty_date', $input_date)
            ->distinct()
            ->orderBy('id', 'DESC')
            ->get();
            // $month_wise_data1 = checked_vehicle::where(['division_num' => $division_name, 'is_delete' => 0])
            // // ->whereMonth('booking_entry_date', $split_value[1])
            // // ->whereYear('booking_entry_date', $split_value[0])->get();
            // ->whereYear('booking_entry_date', $input_date)->get();
            // $checked_passed_count1 = offenceVehicle::where(['intelligence_division' => $division_name, 'need_offence_booking_sts' => 0])
            // // ->whereMonth('duty_date', $split_value[1])
            // // ->whereYear('duty_date', $split_value[0])->get();
            // ->whereYear('duty_date', $input_date)->get();
            // $offence_vehicle1 = offenceVehicle::where(['intelligence_division' => $division_name, 'need_offence_booking_sts' => 1, 'is_delete' => 0])
            // // ->whereMonth('duty_date', $split_value[1])
            // // ->whereYear('duty_date', $split_value[0])->get();
            // ->whereYear('duty_date', $input_date)->get();


            $total1 = $month_wise_data1;
            // dd($total1);
            $checked_total1 = $month_wise_data1->count();
            // $offence_total1 = $offence_vehicle1->count();
            // $passed_count1 = $checked_passed_count1->count();


            
            $jsonResponse = json_encode(["count" => $checked_total1,"checked_vehicle" => $total1]);

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
