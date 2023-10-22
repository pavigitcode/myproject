<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class commodityWiseReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if(session('unique_id') ==''){
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');

        }
        // $start = $request->from_date;
        // $end = $request->to_date;

        // if($start == ''){
        //     $start = date('Y-m-d');

        // }else{
        //     $start = $request->from_date;

        // }
        // if( $end == ''){

        //     $end = date('Y-m-d');
        // }else{

        //     $end = $request->to_date;
        // }
        // $offence_veh  = DB::table('offence_vechicle_booking')
        // ->Join('offence_booking_officer_list', 'offence_vechicle_booking.offense_booked_vehicle_number', 'offence_booking_officer_list.vehicle_no')
        // ->select('offence_vechicle_booking.*','vehicle_details.*')
        // ->where('offence_vechicle_booking.is_delete', 0)
        // ->latest()->paginate();
        // dd($offence_veh);
        // ->Join('vehicle_details', 'checked_vechicle.vechicle_no', 'vehicle_details.vehicle_no')
        // ->select('checked_vechicle.*','vehicle_details.*')
        // ->Join('e_way_bill_details', 'checked_vechicle.vechicle_no', 'e_way_bill_details.veh_number')
        // ->select('checked_vechicle.*','vehicle_details.*','e_way_bill_details.*')

        // dd($checked_vehicle);
        // $rovingsquads = rovingsquad::where('is_delete', 0)->latest()->paginate()->paginate();
        // dd($checked_vehicle);

        // $commodity_data  = DB::table('offence_vechicle_booking')
        // ->Join('penality_tax_list', 'offence_vechicle_booking.poi_no', 'penality_tax_list.poi_number')
        // ->Join('offence_section', [['offence_vechicle_booking.offense_section_unique', 'offence_section.unique_id'],['offence_vechicle_booking.nature_of_the_offense', 'offence_section.unique_id']])
        // ->Join('division_creation', 'offence_vechicle_booking.intelligence_division', 'division_creation.unique_id')
        // ->select('offence_vechicle_booking.*','penality_tax_list.*','offence_section.offence_name','offence_section.offence_section','division_creation.division_name',DB::raw('SUM(penality_tax_list.tax_amount) as tax_amount'))
        // ->where('offence_vechicle_booking.is_delete', 0)
        // ->whereBetween('duty_date', [$start, $end])
        // ->get();
        //  if($start == ''){
        //     $start = date('Y-m-d');

        // }else{
        //     $start = $request->from_date;

        // }
        // if( $end == ''){

        //     $end = date('Y-m-d');
        // }else{

        //     $end = $request->to_date;
        // // }
        $todayDate=date('Y-m-d');
        $start = $request->from_date;
        $end = $request->to_date;
        $hsncode = $request->hsn_code;
        $offensesection = $request->offense_section;
        $intelligencedivision = $request->intelligence_division;
        $rovingsquadno = $request->roving_squad_no;

        $commodity_data = DB::table('view_commodity')->when($request->from_date!=null,function ($q) use ($request){
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
        ->when($request->hsn_code!=null,function ($q) use ($request){
            return $q->where('hsn_code',$request->hsn_code);
        })
        ->when($request->offense_section!=null,function ($q) use ($request){
            return $q->where('offence_section',$request->offense_section);
        })
        ->when($request->intelligence_division!=null,function ($q) use ($request){
            return $q->where('intelligence_division',$request->intelligence_division);
        })
        ->when($request->roving_squad_no!=null,function ($q) use ($request){
            return $q->where('roving_squad_no',$request->roving_squad_no);
        })
       ->paginate();
// dd($commodity_data);
        return view('reports.commodity_wise_report', compact('commodity_data'))->with('i', (request()->input('page', 1) - 1) * 10);
        // return view('reports.commodity_wise_report', compact('commodity_data'));
    }
        // // dd($commodity_data);
        // return view('reports.nature_of_offence', compact('$commodity_data'))->with('i', (request()->input('page', 1) - 1) * 10);


        // $jsonResponse=json_encode([ "commodity_filter" => $commodity_data]);
        // // dd($jsonResponse);
        // echo $jsonResponse;

        // dd($commodity_data);'hsn_creation.hsn_code'
        // ->Join('hsn_creation', 'penality_tax_list.hsn_code_unique','=','hsn_creation.unique_id')

        // ->Join('penality_tax_list', 'penality_tax_list.hsn_code_unique', 'hsn_creation.unique_id')




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
