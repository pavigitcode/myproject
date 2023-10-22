<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\offenceVehicle;
use App\Models\division;
use DB;

class offenceVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('unique_id') ==''){
            \Auth::logout();
            session()->flush();
            return redirect('otp')->with('error', 'Session Expired!. Please Login again.');

        }
        $user_type = session('usertype_id');
        $user_division_id = session('division_id');
        // $user_id = session('unique_id');
        // dd($user_type);


        if ($user_type == '62c80e7c2536911885' || $user_type == '62c80e8cac02318910' || $user_type == '63b4fd095bf7675259') {
            $offence_veh  = DB::table('offence_vechicle_booking')
                // ->Join('checked_vehicle_det', 'offence_vechicle_booking.offense_booked_vehicle_number', 'checked_vehicle_det.vehno')
                // // ->Join('offence_section', 'offence_vechicle_booking.offense_section_unique', 'ffence_section.unique_id')
                // ->Join('division_creation', 'offence_vechicle_booking.intelligence_division', 'division_creation.unique_id')
                // ->select('offence_vechicle_booking.*', 'checked_vehicle_det.frplace', 'division_creation.division_name')
                // ->Join('checked_vehicle_det', 'offence_vechicle_booking.offense_booked_vehicle_number', 'checked_vehicle_det.vehno')
                // ->Join('offence_section', 'offence_vechicle_booking.offense_section_unique', 'ffence_section.unique_id')
                ->Join('division_creation', 'offence_vechicle_booking.intelligence_division', 'division_creation.unique_id')
                ->select('offence_vechicle_booking.*', 'division_creation.division_name')
                ->where(['offence_vechicle_booking.is_delete' => 0, 'offence_vechicle_booking.need_offence_booking_sts' => 1])
                ->groupBy('offence_vechicle_booking.offense_booked_vehicle_number')
                ->distinct()
                ->orderBy('id', 'DESC')
                ->get();
            // dd($checked_vehicle);
            return view('forms.offence_vehicle.list', compact('offence_veh'))->with('i', (request()->input('page', 1) - 1) * 10);

        } else if ($user_type == '62b55fe64789d40213' || $user_type == '5f97fc3257f2525529') {
            $offence_veh  = DB::table('offence_vechicle_booking')
                // ->Join('checked_vehicle_det', 'offence_vechicle_booking.offense_booked_vehicle_number', 'checked_vehicle_det.vehno')
                // ->Join('offence_section', 'offence_vechicle_booking.offense_section_unique', 'ffence_section.unique_id')
                ->Join('division_creation', 'offence_vechicle_booking.intelligence_division', 'division_creation.unique_id')
                ->select('offence_vechicle_booking.*', 'division_creation.division_name')
                ->where(['offence_vechicle_booking.is_delete' => 0, 'offence_vechicle_booking.need_offence_booking_sts' => 1])
                ->where('division_creation.unique_id', $user_division_id)
                ->groupBy('offence_vechicle_booking.offense_booked_vehicle_number')
                ->distinct()
                ->orderBy('id', 'DESC')
                ->get();
            // dd($checked_vehicle);
            return view('forms.offence_vehicle.list', compact('offence_veh'))->with('i', (request()->input('page', 1) - 1) * 10);


        } else if ($user_type == '62c80e9f0914e68331' ) {
            $offence_veh  = DB::table('offence_vechicle_booking')
                ->Join('checked_vehicle_det', 'offence_vechicle_booking.offense_booked_vehicle_number', 'checked_vehicle_det.vehno')
                // ->Join('offence_section', 'offence_vechicle_booking.offense_section_unique', 'ffence_section.unique_id')
                ->Join('division_creation', 'offence_vechicle_booking.intelligence_division', 'division_creation.unique_id')
                ->select('offence_vechicle_booking.*', 'checked_vehicle_det.frplace', 'division_creation.division_name')
            ->where(['offence_vechicle_booking.is_delete' => 0, 'offence_vechicle_booking.need_offence_booking_sts' => 1])
                ->where('division_creation.unique_id', $user_division_id)
                // ->where('offence_vechicle_booking.officer_user_id', $user_id)
                ->groupBy('offence_vechicle_booking.offense_booked_vehicle_number')
                ->distinct()
                ->orderBy('id', 'DESC')
                ->get();
            // dd($checked_vehicle);
            return view('forms.offence_vehicle.list', compact('offence_veh'))->with('i', (request()->input('page', 1) - 1) * 10);

        }else{
            $offence_veh  = DB::table('offence_vechicle_booking')
                ->Join('checked_vehicle_det', 'offence_vechicle_booking.offense_booked_vehicle_number', 'checked_vehicle_det.vehno')
                // ->Join('offence_section', 'offence_vechicle_booking.offense_section_unique', 'ffence_section.unique_id')
                ->Join('division_creation', 'offence_vechicle_booking.intelligence_division', 'division_creation.unique_id')
                ->select('offence_vechicle_booking.*', 'checked_vehicle_det.frplace', 'division_creation.division_name')
                ->where(['offence_vechicle_booking.is_delete' => 0, 'offence_vechicle_booking.need_offence_booking_sts' => 1])
                ->groupBy('offence_vechicle_booking.offense_booked_vehicle_number')
                ->distinct()
                ->orderBy('id', 'DESC')
                ->get();
            // dd($checked_vehicle);
            return view('forms.offence_vehicle.list', compact('offence_veh'))->with('i', (request()->input('page', 1) - 1) * 10);
        }

    }

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
        $prefix = "OFCHN1";
        // session_start();
        // $value = Session::get('user');
        // dd($value);
        $rand_num = random_int(100000000, 999999999);
        $poi_number = $prefix . $rand_num;

        // dd($poi_number);
        return view('forms.offence_vehicle.add', compact('poi_number'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prefix = "";
        $request->validate([
            // 'intelligence_division' => 'required',
            // 'roving_squad_no' => 'required',
            // 'duty_date' => 'required',
            // 'shift' => 'required',
            // 'offense_booked_vehicle_number' => 'required',
            // 'place_of_interception' => 'required',
            // 'offense_booking_time' => 'required',
            // 'nature_of_the_offense' => 'required',
            // 'offense_section' => 'required',
            // 'count_of_commodity_involved' => 'required',
            // 'description' => 'required',
            // 'orders_passed' => 'required',
            // 'penality_details' => 'required',
            // 'reason' => 'required',
            'poi_number' => 'required'

        ]);

        offenceVehicle::where('poi_no', $request->poi_number)->update([
            'intelligence_division' => $request->intelligence_division,
            'roving_squad_no' => $request->roving_squad_no,
            'duty_date' => $request->duty_date,
            'shift' => $request->shift,
            'offense_booked_vehicle_number' => $request->offense_booked_vehicle_number,
            'place_of_interception' => $request->place_of_interception,
            'offense_booking_time' => $request->offense_booking_time,
            'nature_of_the_offense' => $request->nature_of_the_offense,
            'offense_section_unique' => $request->offense_section,
            'offence_no' => $request->offence_no,
            // 'nature_of_the_offense' => $request->nature_of_the_offense,

            'count_of_commodity_involved' => $request->count_of_commodity_involved,
            'description' => $request->description,
            'orders_passed' => $request->orders_passed,
            'penality_details' => $request->penality_details,
            'reason' => $request->reason,

            'offence_register_number' => $request->offence_register_number,
            'nature_of_sub_offense' => $request->nature_of_sub_offense,
            'goods_value' => $request->goods_value,

        ]);

        return route('offence_vehicle.index');
        // return redirect()->route('offence_vehicle.index')->with('success', 'Offence Vehicle Created Successfully.');
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
        if(session('unique_id') ==''){
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');

        }
        session_start();
        $div_name = session('division_id');


        $offence_vehicle = offenceVehicle::find($id);
        // $offence_vehicle = DB::table('offence_vechicle_booking')
        // // ::find($id)
        // ->Join('offence_section', 'offence_vechicle_booking.nature_of_the_offense', 'offence_section.unique_id')
        // ->select('offence_vechicle_booking.*', 'offence_section.*')
        // ->where('offence_vechicle_booking.id','=',$id)
                
        
        // ->get();

        // dd($offence_vehicle);
        if ($offence_vehicle->offence_no) {
            $offence_number = $offence_vehicle->offence_no;
        } 
        else {
            $prefix = "OFN";

            // $rand_num = random_int(100000000, 999999999);
            // $offence_number = $prefix . $rand_num;

            $division = division::where('unique_id', $div_name)->first();


            $division_name = $division->division_short_name;
            $rand = rand(00000, 99999);

            $offence_number = $prefix . $division_name . date('ym') . $rand;
        }


        // $number = "PO" . $division_name . date('ym') . $rand;

        // $offence_number = ['off_no'=>$offence_number];
        // dd( $offence_vehicle );

        return view('forms.offence_vehicle.edit', with(compact('offence_vehicle', 'offence_number')));
        // return view('forms.offence_vehicle.edit', compact('offence_vehicle'));
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
        // dd($id);
        $offenceVehicle =  offenceVehicle::find($id);

        $offenceVehicle->is_delete = 1;
        // $screensection->delete();

        $offenceVehicle->update();
        // dd($checked_vehicle);
        return redirect()->route('offence_vehicle.index')
            ->with('success', 'Checked Vehicle Deleted successfully');
    }
    // }
}
