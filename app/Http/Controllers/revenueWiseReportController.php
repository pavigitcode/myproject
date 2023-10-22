<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class revenueWiseReportController extends Controller
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

        // dd($end);
        // $revenue_wise_reports  = DB::table('offence_vechicle_booking')
        // ->Join('offence_section', 'offence_vechicle_booking.offense_section_unique',  'offence_section.unique_id')
        // ->Join('division_creation', 'offence_vechicle_booking.intelligence_division', 'division_creation.unique_id')
        // ->Join('penality_tax_list', 'offence_vechicle_booking.poi_no', 'penality_tax_list.poi_number')
        // ->Join('roving_squad', 'offence_vechicle_booking.roving_squad_no', 'roving_squad.unique_id')
        // ->select('offence_vechicle_booking.*','offence_section.*','division_creation.division_name','penality_tax_list.*','roving_squad.roving_squad_number',DB::raw('SUM(penality_tax_list.tax_amount) as tax_amount'))       
        // ->where('offence_vechicle_booking.is_delete',0)
        // ->whereBetween('duty_date', [$start, $end])
        // ->get();
        
        // dd($revenue_wise_reports);
        $todayDate=date('Y-m-d');


        $revenue_wise_reports = DB::table('view_revenuwise')
        ->when($request->from_date!=null,function ($q) use ($request){
            return $q->whereDate('duty_date', '>=', $request->from_date);
        },function ($q) use ($todayDate){
            return $q->whereDate('duty_date', $todayDate);
        })
        ->when($request->to_date!=null,function ($q) use ($request){
            return $q->whereDate('duty_date', '<=', $request->to_date);
        },
        function ($q) use ($todayDate){
            return $q->whereDate('duty_date', $todayDate);
        })
        ->when($request->nature_of_the_offense!=null,function ($q) use ($request){
            return $q->where('nature_of_the_offense',$request->nature_of_the_offense);
        })
        ->when($request->offense_section!=null,function ($q) use ($request){
            return $q->where('offense_section_unique',$request->offense_section);
        })
        ->when($request->intelligence_division!=null,function ($q) use ($request){
            return $q->where('intelligence_division',$request->intelligence_division);
        })
        ->when($request->roving_squad_no!=null,function ($q) use ($request){
            return $q->where('roving_squad_no',$request->roving_squad_no);
        })
       ->paginate();

        // $revenue_wise_reports = DB::table('view_revenuwise')
        // // ->select('view_nature_of_offence.*',DB::raw('SUM(view_nature_of_offence.tax_amount) as tax_amount')) 
        // // ->groupby('view_nature_of_offence.intelligence_division')
        //     ->whereBetween('duty_date', [$start, $end])
        //     ->paginate();

        // $sums = $revenue_wise_reports->sum('tax_amount');
        // dd($sums);
        // dd($offence_veh);
        // dd($revenue_wise_reports);
     
        return view('reports.revenue_wise_report',compact('revenue_wise_reports'))->with('i', (request()->input('page', 1) - 1) * 10);
        
        // ,compact(['offence_veh'=>$offence_veh ,"sum" => $sums]))->with('i', (request()->input('page', 1) - 1) * 10);
   
        // return view('reports.revenue_wise_report');
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
