<?php

namespace App\Http\Controllers;
use App\Models\division;
use App\Models\offenceVehicle;
use App\Models\checked_vehicle;
use App\Models\e_waybill;
use App\Models\vehicle_detail;
// use App\Models\e_waybill;
use Illuminate\Http\Request;
use DB;

class dasboardviewController extends Controller
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
        // dd("hii");
         //====================================== view more=====================================
         $count_data = $request->count_data;
         $user_type_name = $request->user_type_name;
         //  dd($count_data);
         $division_name = $request->division_name;
         if($user_type_name == '62c80e7c2536911885' || $user_type_name == '62c80e8cac02318910' || $user_type_name == '63b4fd095bf7675259' ||$user_type_name == '646329c163c3d77002' ){
            $checked_vehicle = checked_vehicle::where('is_delete','=',0)->get();
            $vechicle_no = $checked_vehicle->vechicle_no;
            $vehicle_details = vehicle_detail::where(['is_delete'=>0,'vehicle_no'=> $vechicle_no])->get();
            $e_way_bill_details = e_waybill::where(['is_delete'=>0,'veh_number'=> $checked_vehicle->vechicle_no])->get();
            // ->Join('vehicle_details', 'checked_vechicle.vechicle_no', 'vehicle_details.vehicle_no')
            // ->Join('e_way_bill_details', 'checked_vechicle.vechicle_no', 'e_way_bill_details.veh_number')
            // ->select('checked_vechicle.*', 'vehicle_details.*','e_way_bill_details.*')
            // ->Join('e_way_bill_details', 'checked_vechicle.vechicle_no', 'e_way_bill_details.veh_number') 

            dd($checked_vehicle);
            // $v = $checked_vehicle;
            // dd($checked_vehicle);
            // $req = e_waybill::where('veh_number', $v)->get();

        //  $checked_vehicle = checked_vehicle::where('is_delete','=',0)->get();

         // $checked_vehicle = checked_vehicle::where(['division_num'=>$count_data,'need_offence_booking_sts'=>0])->get();
         $checkedcount = $checked_vehicle->count();

        } else {
            // $checked_vehicle = DB::table('checked_vechicle')
            // ->Join('vehicle_details', 'checked_vechicle.vechicle_no', 'vehicle_details.vehicle_no')
            // // ->Join('e_waybill', 'checked_vechicle.vechicle_no', 'e_waybill.veh_number') 
            // ->where(['division_num'=>$division_name,'is_delete'=>0])

            // ->get();
            $checked_vehicle = checked_vehicle::where(['division_num'=>$division_name,'is_delete'=>0])->get();
            $vehicle_details = vehicle_detail::where(['division_num'=>$division_name,'is_delete'=>0,'vehicle_no'=> $checked_vehicle->vechicle_no])->get();
            $e_way_bill_details = e_waybill::where(['division_num'=>$division_name,'is_delete'=>0,'veh_number'=> $checked_vehicle->vechicle_no])->get();

            // $checked_vehicle = checked_vehicle::where(['division_num'=>$division_name,'is_delete'=>0])->get();
            // dd($total);
            $checkedcount = $checked_vehicle->count();
            
        }
            //
         //  dd($checkedcount);
           //=============================== view more end========
        $jsonResponse = json_encode(["checked_count" =>  $checkedcount,"checked_data"=>$checked_vehicle,'vehicle_details'=>$vehicle_details,'e_way_bill_details'=>$e_way_bill_details]);
        // }
        // else{
        //     $jsonResponse = json_encode(['']);
        // }
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
