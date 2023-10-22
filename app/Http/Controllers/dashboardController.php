<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Http\Request;
use App\Models\checked_vehicle;
use App\Models\division;
use App\Models\offenceVehicle;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //    dd("hii");
        $input_date = $request->month;
        $user_type_name = $request->user_type_name;
        $division_name = $request->division_name;
        // dd($division_name);s
        $split_value = explode('-', $input_date);
        if ($user_type_name == '62c80e7c2536911885' || $user_type_name == '62c80e8cac02318910' || $user_type_name == '63b4fd095bf7675259'  ||$user_type_name == '646329c163c3d77002') {
            $month_wise_data = checked_vehicle::where('is_delete', '=', 0)
            // ->whereMonth('booking_entry_date', $split_value[1])
            // ->whereYear('booking_entry_date', $split_value[0])->get();
            ->whereYear('booking_entry_date', $input_date)->distinct()->get();

            $checked_passed_count = offenceVehicle::where(['is_delete' => 0, 'need_offence_booking_sts' => 0])
            // ->whereMonth('duty_date', $split_value[1])
            // ->whereYear('duty_date', $split_value[0])->get();
            ->whereYear('duty_date', $input_date)->distinct()->get();

            $offence_vehicle = offenceVehicle::where(['is_delete' => 0, 'need_offence_booking_sts' => 1])
            
            // ->whereMonth('duty_date', $split_value[1])
            // ->whereYear('duty_date', $split_value[0])->get();
            ->whereYear('duty_date', $input_date)->distinct()->get();


            $total = $month_wise_data->count();
            $offence_total = $offence_vehicle->count();
            $passed_count = $checked_passed_count->count();
            $jsonResponse = json_encode(["checked_vehicle" => $total, "offenceVehicle" => $offence_total, "passed" => $passed_count]);

            echo $jsonResponse;

        } else {
            $month_wise_data1 = checked_vehicle::where(['division_num' => $division_name, 'is_delete' => 0])
            // ->whereMonth('booking_entry_date', $split_value[1])
            // ->whereYear('booking_entry_date', $split_value[0])->get();
            ->whereYear('booking_entry_date', $input_date)->get();
            $checked_passed_count1 = offenceVehicle::where(['intelligence_division' => $division_name, 'need_offence_booking_sts' => 0])
            // ->whereMonth('duty_date', $split_value[1])
            // ->whereYear('duty_date', $split_value[0])->get();
            ->whereYear('duty_date', $input_date)->get();
            $offence_vehicle1 = offenceVehicle::where(['intelligence_division' => $division_name, 'need_offence_booking_sts' => 1, 'is_delete' => 0])
            // ->whereMonth('duty_date', $split_value[1])
            // ->whereYear('duty_date', $split_value[0])->get();
            ->whereYear('duty_date', $input_date)->get();
            $total1 = $month_wise_data1->count();
            // dd($total1);
            $offence_total1 = $offence_vehicle1->count();
            $passed_count1 = $checked_passed_count1->count();
            $jsonResponse = json_encode(["checked_vehicle" => $total1, "offenceVehicle" => $offence_total1, "passed" => $passed_count1]);

            echo $jsonResponse;

        }
    }
//     public function index(Request $request)
//     {
//     //    dd("hii");
//     $input_date = $request->month;
//     $user_type_name = $request->user_type_name;
//     $division_name = $request->division_name;
//     // dd($division_name);s
//     $split_value = explode('-', $input_date);
// if($user_type_name == '62c80e7c2536911885' || $user_type_name == '62c80e8cac02318910' || $user_type_name == '63b4fd095bf7675259' ){
//   $month_wise_data = checked_vehicle::where('is_delete','=',0)->whereMonth('booking_entry_date',$split_value[1])->whereYear('booking_entry_date',$split_value[0])->get();

//   $checked_passed_count = offenceVehicle::where(['is_delete'=> 0,'need_offence_booking_sts'=>0])->whereMonth('duty_date',$split_value[1])->whereYear('duty_date',$split_value[0])->get();

//   $offence_vehicle = offenceVehicle::where(['is_delete'=> 0,'need_offence_booking_sts'=>1])->whereMonth('duty_date',$split_value[1])->whereYear('duty_date',$split_value[0])->get();


//   $total = $month_wise_data->count();
//   $offence_total = $offence_vehicle->count();
//   $passed_count = $checked_passed_count->count();

// }else{
//   $month_wise_data1 = checked_vehicle::where(['division_num'=>$division_name,'is_delete'=>0])->whereMonth('booking_entry_date',$split_value[1])->whereYear('booking_entry_date',$split_value[0])->get();

//   $offence_vehicle1 = offenceVehicle::where(['intelligence_division'=>$division_name,'need_offence_booking_sts'=>1,'is_delete'=>0])->whereMonth('duty_date',$split_value[1])->whereYear('duty_date',$split_value[0])->get();
//   $checked_passed_count1 = offenceVehicle::where(['intelligence_division'=>$division_name,'need_offence_booking_sts'=>0])->whereMonth('duty_date',$split_value[1])->whereYear('duty_date',$split_value[0])->get();
//   $total = $month_wise_data1->count();
//   $offence_total = $offence_vehicle1->count();
//   $passed_count = $checked_passed_count1->count();

// }


//       $jsonResponse = json_encode(["checked_vehicle" => $total, "offenceVehicle" => $offence_total, "passed" => $passed_count]);

// echo $jsonResponse;
//     //     $division_name = $request->division_name;
//     //     $offence_vehicle = offenceVehicle::where(['intelligence_division'=>$division_name,'is_delete'=>0])->get();
//     //     $offcount = $offence_vehicle->count();
//     //     // dd($offcount);
//     //     $req = division::where('unique_id', $request->division_name)->get();
//     //     $dname = $req->division_name;
//     //     $jsonResponse = json_encode(["offence_count" =>  $offcount, "offenceVehicle" => $dname]);
//     //     // }
//     //     // else{
//     //     //     $jsonResponse = json_encode(['']);
//     //     // }
//     // echo $jsonResponse;
//         // return view('dashboard.dashboard/create');

//     }

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
         return view('dashboard.dashboard');
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
