<?php

namespace App\Http\Controllers;

use App\Models\checked_vehicle;
use App\Models\division;
use App\Models\offenceVehicle;
use App\Models\penalitytax;
use DB;


use Illuminate\Http\Request;

class dashboardRevenueController extends Controller
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

          if($user_type_name == '62c80e7c2536911885' || $user_type_name == '62c80e8cac02318910' || $user_type_name == '63b4fd095bf7675259'  ||$user_type_name == '646329c163c3d77002'){
            // $view_offence_vehicle_booking = DB::table('view_offence_vehicle_booking')
            // ->select('view_offence_vehicle_booking.*',DB::raw('SUM(view_offence_vehicle_booking.cnt_division) as cnt_division'),DB::raw('SUM(view_penality_taxs.tax_amount) as tax_amount'))
            // ->groupBy('intelligence_division')
            // ->Join('view_penality_taxs', 'view_offence_vehicle_booking.poi_no', 'view_penality_taxs.poi_no')
            // // ->where('view_offence_vehicle_booking.')
            // ->get();


            $view_offence_vehicle_booking = DB::table('view_dashboard_offence_count')
            ->select('view_dashboard_offence_count.*',DB::raw('count(view_dashboard_offence_count.cnt_division) as cnt_division'),DB::raw('SUM(view_dashboard_offence_count.tax_amnt) as tax_amnt'))
            ->whereYear('view_dashboard_offence_count.duty_date', $input_date)
            // ,DB::raw('SUM(view_dashboard_offence_count.tax_amnt) as tax_amnt')
            ->groupBy('intelligence_division')
            // ->Join('view_penality_taxs', 'view_offence_vehicle_booking.poi_no', 'view_penality_taxs.poi_no')
            // ->where('view_offence_vehicle_booking.')
            ->get();

            // dd($view_offence_vehicle_booking);

            $over_amount = DB::table('view_dashboard_offence_count')
            ->select(DB::raw('SUM(view_dashboard_offence_count.tax_amnt) as totamount'))
            ->whereYear('view_dashboard_offence_count.duty_date', $input_date)
            // ->groupBy('intelligence_division')
            ->get();

            // dd($over_amount);



               $jsonResponse = json_encode(["demos" =>$view_offence_vehicle_booking,"over_amount" => $over_amount]);
                 echo $jsonResponse;


        }
        else{

        // $view_offence_vehicle_booking = DB::table('view_offence_vehicle_booking')->groupBy('intelligence_division')->select('view_offence_vehicle_booking.*',DB::raw('SUM(view_offence_vehicle_booking.cnt_division) as cnt_division'),DB::raw('SUM(view_penality_taxs.tax_amount) as tax_amount'))
        // ->Join('view_penality_taxs', 'view_offence_vehicle_booking.poi_no', 'view_penality_taxs.poi_no')
        // ->where('view_offence_vehicle_booking.intelligence_division','=',$division_name)
        // ->get();
        $view_offence_vehicle_booking = DB::table('view_dashboard_offence_count')->groupBy('intelligence_division')->select('view_dashboard_offence_count.*',DB::raw('SUM(view_dashboard_offence_count.cnt_division) as cnt_division'),DB::raw('SUM(view_dashboard_offence_count.tax_amnt) as tax_amnt'))
        ->whereYear('view_dashboard_offence_count.duty_date', $input_date)
        // ,DB::raw('SUM(view_dashboard_offence_count.tax_amnt) as tax_amnt')
        // ->Join('view_penality_taxs', 'view_offence_vehicle_booking.poi_no', 'view_penality_taxs.poi_no')
        ->where('view_dashboard_offence_count.intelligence_division','=',$division_name)
        ->get();
        $over_amount = DB::table('view_dashboard_offence_count')
        ->select(DB::raw('SUM(view_dashboard_offence_count.tax_amnt) as totamount'))
        ->whereYear('view_dashboard_offence_count.duty_date', $input_date)
        ->where('view_dashboard_offence_count.intelligence_division','=',$division_name)
        ->get();
              $jsonResponse = json_encode(["demos" =>$view_offence_vehicle_booking,"over_amount" => $over_amount]);
                echo $jsonResponse;


        }

    // if($user_type_name == '62c80e7c2536911885' || $user_type_name == '62c80e8cac02318910' || $user_type_name == '63b4fd095bf7675259' ){
    //     $view_offence_vehicle_booking = DB::table('view_offence_vehicle_booking')
    //     ->select('view_offence_vehicle_booking.*',DB::raw('SUM(view_offence_vehicle_booking.cnt_division) as cnt_division'),DB::raw('SUM(view_penality_taxs.tax_amount) as tax_amount'))
    //     ->groupBy('intelligence_division')

    //     ->Join('view_penality_taxs', 'view_offence_vehicle_booking.poi_no', 'view_penality_taxs.poi_no')
    //     ->get();





    //        $jsonResponse = json_encode(["demos" =>$view_offence_vehicle_booking]);
    //          echo $jsonResponse;


    // }
    // else{

    // $view_offence_vehicle_booking = DB::table('view_offence_vehicle_booking')->groupBy('intelligence_division')->select('view_offence_vehicle_booking.*',DB::raw('SUM(view_offence_vehicle_booking.cnt_division) as cnt_division'),DB::raw('SUM(view_penality_taxs.tax_amount) as tax_amount'))
    // ->Join('view_penality_taxs', 'view_offence_vehicle_booking.poi_no', 'view_penality_taxs.poi_no')
    // ->where('view_offence_vehicle_booking.intelligence_division','=',$division_name)
    // ->get();

    //       $jsonResponse = json_encode(["demos" =>$view_offence_vehicle_booking]);
    //         echo $jsonResponse;

    // }


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
