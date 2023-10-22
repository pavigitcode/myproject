<?php

namespace App\Http\Controllers;

use App\Models\checked_vehicle;
use App\Models\division;
use App\Models\offenceVehicle;
use Illuminate\Http\Request;
use DB;

class dashboardvehicledataContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(session('unique_id') ==''){
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');

        }
        $input_date = $request->month;
          $user_type_name = $request->user_type_name;
          $division_name = $request->division_name;

    if($user_type_name == '62c80e7c2536911885' || $user_type_name == '62c80e8cac02318910' || $user_type_name == '63b4fd095bf7675259' ||$user_type_name == '646329c163c3d77002' ){




    $checked_vehicle = DB::table('view_need_offence_status_count')
    ->select('view_need_offence_status_count.*',DB::raw('SUM(view_need_offence_status_count.cnt_division) as cnt_division'))
    ->whereYear('duty_date', $input_date)
    ->groupBy('intelligence_division')
   
    ->get();

    $passed_count = DB::table('view_need_offence_status_count')->select(DB::raw('SUM(view_need_offence_status_count.cnt_division) as cnt_division'))
    ->whereYear('duty_date', $input_date)
    ->where('need_offence_booking_sts','=',0)
    ->groupBy('intelligence_division')
    ->get();
   
    $offence_vehicle = DB::table('view_need_offence_status_count')->select(DB::raw('SUM(view_need_offence_status_count.cnt_division) as cnt_division'))
    ->whereYear('duty_date', $input_date)
    ->where('need_offence_booking_sts','=',1)
    ->groupBy('intelligence_division')
    ->get();


    // $collected_offence = DB::table('view_need_offence_status_count')->select(DB::raw('SUM(view_need_offence_status_count.penality_cnt) as cnt_division'))
    // ->whereYear('duty_date', $input_date)
    // ->where(['need_offence_booking_sts' => 1, 'penality_details' => 'Penalty_Collected'])
    // ->groupBy('intelligence_division')
    // ->get();
            
    //     // dd($collected_offence);
    // $adjudication_offences = DB::table('view_need_offence_status_count')->select(DB::raw('SUM(view_need_offence_status_count.penality_cnt) as cnt_division'))
    // ->whereYear('duty_date', $input_date)
    // ->where(['need_offence_booking_sts' => 1, 'penality_details' => 'In_Processing' ])
    // ->groupBy('intelligence_division')
    // ->get();

    // if($adjudication_offences == '[]'){
    //     $adjudication_offence = "[{cnt_division:0}]";
    //     }else{
    //         $adjudication_offence = $adjudication_offences;
    //     }
       
    // $jsonResponse = json_encode(["checked_vehicle" => $checked_vehicle,"passed" => $passed_count,"offenceVehicle" => $offence_vehicle,"collected" =>$collected_offence,"adjudication" =>$adjudication_offences  ]);
    $jsonResponse = json_encode(["checked_vehicle" => $checked_vehicle,"passed" => $passed_count,"offenceVehicle" => $offence_vehicle  ]);
   

    echo $jsonResponse;
    }
    else{

        $checked_vehicle = DB::table('view_need_offence_status_count')->select('view_need_offence_status_count.*',DB::raw('SUM(view_need_offence_status_count.cnt_division) as cnt_division'))
        ->whereYear('duty_date', $input_date)
        ->where(['intelligence_division'=>$division_name,'is_delete'=>0])
        ->groupBy('intelligence_division')->get();


            $passed_count = DB::table('view_need_offence_status_count')
            ->select(DB::raw('SUM(view_need_offence_status_count.cnt_division) as cnt_division'))
            ->whereYear('duty_date', $input_date)
            ->where(['intelligence_division'=>$division_name,'is_delete'=>0,'need_offence_booking_sts'=>0])->get();
            $offence_vehicle = DB::table('view_need_offence_status_count')
            ->select(DB::raw('SUM(view_need_offence_status_count.cnt_division) as cnt_division'))
            ->whereYear('duty_date', $input_date)
            ->where(['intelligence_division'=>$division_name,'is_delete'=>0,'need_offence_booking_sts'=>1])->get();
            // $collected_offence = DB::table('view_need_offence_status_count')->select(DB::raw('SUM(view_need_offence_status_count.cnt_division) as cnt_division'))
            // ->whereYear('duty_date', $input_date)
            // ->where(['intelligence_division'=>$division_name,'is_delete'=>0,'need_offence_booking_sts' => 1, 'penality_details' => 'Penalty_Collected'|| 'penality_details','=', 'Released_without_Penalty' ])
            // ->groupBy('intelligence_division')
            // ->get();
    
            // $adjudication_offence = DB::table('view_need_offence_status_count')->select(DB::raw('SUM(view_need_offence_status_count.cnt_division) as cnt_division'))
            // ->whereYear('duty_date', $input_date)
            // ->where(['intelligence_division'=>$division_name,'is_delete'=>0,'need_offence_booking_sts' => 1, 'penality_details' => 'In_Processing' ])
            // ->groupBy('intelligence_division')
            // ->get();

            // $jsonResponse = json_encode(["checked_vehicle" => $checked_vehicle,"offenceVehicle" => $offence_vehicle, "passed" => $passed_count,"collected" =>$collected_offence,"adjudication" =>$adjudication_offence ]);
            $jsonResponse = json_encode(["checked_vehicle" => $checked_vehicle,"offenceVehicle" => $offence_vehicle, "passed" => $passed_count ]);

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
    public function show()
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
