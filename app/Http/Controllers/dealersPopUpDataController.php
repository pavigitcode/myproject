<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\offenceVehicle;
use App\Models\offenceSection;
use App\Models\penalitytax;
use Carbon\Carbon;
use DB;

class dealersPopUpDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     if(session('unique_id') ==''){
    //         \Auth::logout();
    //         session()->flush();
    //         return redirect('login')->with('error', 'Session Expired!. Please Login again.');
            
    //     }
    //     if($request->from_date == ''){
    //         $start = date('Y-m-d');
           
    //     }else{
    //         $start = $request->from_date;
           
    //     }
    //     if($request->to_date == ''){
           
    //         $end = date('Y-m-d');
    //     }else{
            
    //         $end = $request->to_date;
    //     }
        
        

    //     // dd($start);
    //     // $offence_veh = DB::table('offence_vechicle_booking')
    //     //     ->Join('offence_section', 'offence_vechicle_booking.offense_section_unique', 'offence_section.unique_id')
    //     //     ->Join('division_creation', 'offence_vechicle_booking.intelligence_division', 'division_creation.unique_id')
    //     //     ->Join('roving_squad', 'offence_vechicle_booking.roving_squad_no', 'roving_squad.unique_id')
    //     //     ->select('offence_vechicle_booking.*', 'offence_section.offence_section', 'division_creation.division_name','roving_squad.roving_squad_number')
    //     //     // ->whereBetween('duty_date', [$start, $end])
    //     //     ->where('offence_vechicle_booking.is_delete', 0)
    //     //     ->whereBetween('duty_date', [$start, $end])
    //     //     ->get();
            
    //     //     return view('reports.nature_of_offence', compact('offence_veh'))->with('i', (request()->input('page', 1) - 1) * 10);
    //     $todayDate=date('Y-m-d');

    //     $offence_vehicle1 = DB::table('view_dealers_division_report')
        
    //         ->where('offense_booked_vehicle_number',$request->veh_no)
    //         ->groupBy('offense_booked_vehicle_number')
    //         ->groupBy('duty_date')
    //         // ->count();
    //     //    ->paginate();
    //         ->get();
            
    
    //     //    dd($offence_vehicle);
    
    //     //    return view('reports.dealers_division_wise_report',compact('offence_vehicle1'))->with('i', (request()->input('page', 1) - 1) * 10);
    //         $jsonResponse = json_encode(["demos" =>$offence_vehicle1]);
    //         echo $jsonResponse;
        
    //     //  COUNT(`a`.`poi_no`) AS `cnt`
    //     // ->when($request->offense_section != null,function ($q) use ($request){
    //     //     return $q->where('offense_section_unique',$request->offense_section);
    //     // })
    //     // ->when($request->intelligence_division != null,function ($q) use ($request){
    //     //     return $q->where('intelligence_division',$request->intelligence_division);
    //     // })
    //     // ->when($request->roving_squad_no != null,function ($q) use ($request){
    //     //     return $q->where('roving_squad_no',$request->roving_squad_no);
    //     // })
    //     // ->groupBy('offense_booked_vehicle_number')
    //     // ->count();
       

    // //    dd($offence_vehicle);

      
    // }
    public function index(){
        $data['employees'] = DB::table('view_dealers_division_report')::select('*')->get();
        return view('index',$data);
     }
  
     public function getEmployeeDetails($empid = 0){
  
        $employee = DB::table('view_dealers_division_report')::find($empid);
  
        $html = "";
        if(!empty($employee)){
           $html = "<tr>
           
                <td width='30%'><b>Vehicle No:</b></td>
                <td width='70%'> ".$employee->offense_booked_vehicle_number."</td>
             </tr>
             <tr>
                <td width='30%'><b>User GSTIN:</b></td>
                <td width='70%'> ".$employee->fr_gstin."</td>
             </tr>
             <tr>
                <td width='30%'><b>Dealer Name:</b></td>
                <td width='70%'> ".$employee->fr_name."</td>
             </tr>
             <tr>
                <td width='30%'><b>From Place:</b></td>
                <td width='70%'> ".$employee->fr_plac."</td>
             </tr>
             <tr>
                <td width='30%'><b>Penality Value:</b></td>
                <td width='70%'> ".$employee->tax_amount."</td>
             </tr>";
        }
        $response['html'] = $html;
  
        return response()->json($response);
     }
  
//   }

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
