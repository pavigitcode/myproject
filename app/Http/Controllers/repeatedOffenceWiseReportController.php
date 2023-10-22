<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\offenceVehicle;
use App\Models\offenceSection;
use App\Models\penalitytax;
use Carbon\Carbon;
use DB;

class repeatedOffenceWiseReportController extends Controller
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
        if($request->from_date == ''){
            $start = date('Y-m-d');
           
        }else{
            $start = $request->from_date;
           
        }
        if($request->to_date == ''){
           
            $end = date('Y-m-d');
        }else{
            
            $end = $request->to_date;
        }
        
        

        // dd($start);
        // $offence_veh = DB::table('offence_vechicle_booking')
        //     ->Join('offence_section', 'offence_vechicle_booking.offense_section_unique', 'offence_section.unique_id')
        //     ->Join('division_creation', 'offence_vechicle_booking.intelligence_division', 'division_creation.unique_id')
        //     ->Join('roving_squad', 'offence_vechicle_booking.roving_squad_no', 'roving_squad.unique_id')
        //     ->select('offence_vechicle_booking.*', 'offence_section.offence_section', 'division_creation.division_name','roving_squad.roving_squad_number')
        //     // ->whereBetween('duty_date', [$start, $end])
        //     ->where('offence_vechicle_booking.is_delete', 0)
        //     ->whereBetween('duty_date', [$start, $end])
        //     ->get();
            
        //     return view('reports.nature_of_offence', compact('offence_veh'))->with('i', (request()->input('page', 1) - 1) * 10);
        $todayDate=date('Y-m-d');

        $offence_vehicle = DB::table('view_repeated_offence_report')
        ->when($request->from_date != null,function ($q) use ($request){
            return $q->whereDate('duty_date', '>=', $request->from_date);
        },function ($q) use ($todayDate){
            return $q->whereDate('duty_date', $todayDate);
        })
        ->when($request->to_date != null,function ($q) use ($request){
            return $q->whereDate('duty_date', '<=', $request->to_date);
        },
        function ($q) use ($todayDate){
            return $q->whereDate('duty_date', $todayDate);
        })
        ->when($request->nature_of_the_offense != null,function ($q) use ($request){
            return $q->where('nature_of_the_offense',$request->nature_of_the_offense);
        })
        ->when($request->offense_section != null,function ($q) use ($request){
            return $q->where('offense_section_unique',$request->offense_section);
        })
        ->when($request->intelligence_division != null,function ($q) use ($request){
            return $q->where('intelligence_division',$request->intelligence_division);
        })
        ->when($request->roving_squad_no != null,function ($q) use ($request){
            return $q->where('roving_squad_no',$request->roving_squad_no);
        })
        ->groupBy('offense_booked_vehicle_number')
       ->paginate();

    //    dd($offence_vehicle);
        // return view('reports.repeated_offence_wise_report');
       return view('reports.repeated_offence_wise_report',compact('offence_vehicle'))->with('i', (request()->input('page', 1) - 1) * 10);
    //    return $offence_veh;

            // $offence_veh = DB::table('view_nature_of_offence')
            // ->whereBetween('duty_date', [$start, $end])
            // ->groupBy('offense_booked_vehicle_number')
            // ->get();
            
            // return view('reports.nature_of_offence', compact('offence_veh'))->with('i', (request()->input('page', 1) - 1) * 10);
            // ->latest()->paginate();
        // dd($offence_veh);
        // ->whereDate('duty_date', '>=', $start)
        // ->whereDate('duty_date', '<=', $end)
        // if(request()->ajax()) {

        //     if(!empty($request->from_date)) {

        //         $data = DB::table('offence_vechicle_booking')
        //             ->whereBetween('created_at', array($request->from_date, $request->to_date))
        //             ->get();

        //     } else {

        //         $data = DB::table('offence_vechicle_booking')
        //             ->get();

        //     }
        //     return datatables()->of($data)->make(true);
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
