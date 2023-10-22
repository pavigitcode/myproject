<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\checked_vehicle;
use App\Models\offenceVehicle;
use App\Models\division;
use Carbon\Carbon;
use DB;

class checkedVehicleDatastoreController extends Controller
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
        $prefix = "";
        $request->validate([
            'vehicle_num' => 'required',
            'poi_no' => 'required',
            // 'book_now' => 'required',

        ]);
        if ($request->book_now == '') {
            $request->book_sts = 0;
        } else {
            $request->book_sts = 1;
        }
        // dd($book_sts);

        if ($request->vehicle == '') {
            $vech_data = $request->book_now;
        } else {
            $vech_data = $request->vehicle;
        }
        // dd($request->division_no);
        $date = Carbon::now('Asia/Kolkata');
        $dates = $date->format('Y-m-d');

        $vehicle_detail = checked_vehicle::where('vechicle_no', $request->vehicle_num)->where('booking_entry_date', $dates)->orderBy('id', 'DESC')->first();

        $offence_detail = offenceVehicle::where('offense_booked_vehicle_number', $request->vehicle_num)->where('duty_date', $dates)->orderBy('id', 'DESC')->first();

        dd($vehicle_detail);
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
    public function show(...$args)
    {
        dd('jiii');
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
