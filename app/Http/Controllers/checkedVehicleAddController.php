<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\checked_vehicle;
// use App\Models\e_waybill;
use App\Models\vehicle_detail;
use Carbon\Carbon;
use DB;


class checkedVehicleAddController extends Controller
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
            return redirect('login');
            
        }
        // dd($request->from_date);
        $start = Carbon::parse($request->from_date);
        $end = Carbon::parse($request->to_date);

        // $vehicle_data = vehicle_detail::where('entry_date','<=',$end->format('m-d-y'))->first();
        // dd($start);
        $checked_vehicle = DB::table('checked_vechicle')
            ->Join('checked_vehicle_det', 'checked_vechicle.vechicle_no', 'checked_vehicle_det.vehno') 
            ->Join('division_creation', 'checked_vechicle.division_num', 'division_creation.unique_id')
            ->select('checked_vechicle.*', 'checked_vehicle_det.*', 'division_creation.division_name')
            ->groupBy('vechicle_no')
            ->whereDate('booking_entry_date', '<=', $end)
            ->whereDate('booking_entry_date', '>=', $start)
            ->where('checked_vechicle.is_delete', 0)
            ->get();
        // dd($checked_vehicle);
        //    return view('forms.checked_vehicle.list', compact('checked_vehicle'));
        $jsonResponse = json_encode(["checked_vehicle" => $checked_vehicle]);
        // dd($jsonResponse);
        echo $jsonResponse;


        // $req = e_waybill::where('veh_number', $request->veh_number)->get();
        //   $vehicle_no = $vehicle_data->vehicle_no;
        //      $veh_place = $vehicle_data->veh_place;
        //      $veh_owner = $vehicle_data->veh_owner;
        // $rand = rand(00000,99999);
        //      $number = "PO"."CHN1".date('ym').$rand;
        // $data = array("vehicle_no"=>$vehicle_no, "veh_place"=>$veh_place, "veh_owner"=>$veh_owner, "num"=>$number);
        // $jsonResponse=json_encode(["eway_data" => $req, "veh_data" => $data]);
        // echo $jsonResponse;
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
        // dd("hii");
        $prefix = "";
        $request->validate([
            'vehicle_num' => 'required',
            'poi_no' => 'required',
            'book_now' => 'required',
            // 'description' => 'required'
        ]);

        $checked_vehicle = new checked_vehicle;

        $checked_vehicle->vechicle_no = $request->vehicle_num;
        $checked_vehicle->poi_no = $request->poi_no;
        $checked_vehicle->need_offence_bookin_sts = $request->book_sts;
        $checked_vehicle->book_now = $request->book_now;
        $checked_vehicle->description = $request->offence_remark;
        $checked_vehicle->booking_entry_date = $request->entry_date;

        $checked_vehicle->unique_id = unique_id($prefix);

        $checked_vehicle->save();
        // Alert::Success('Congrats', 'You\'ve Successfully Registered');

        // SweetAlert::message('User Type Created Successfully!');
        // ->with('Success', 'User Type Created Successfully.')
        return redirect()->route('forms.checked_vehicle.list')->with('success', 'Checked Vehicle Created Successfully.');
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
