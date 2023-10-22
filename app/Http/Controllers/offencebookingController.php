<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\offenceVehicle;
use App\Models\division;
use DB;

class offencebookingController extends Controller
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
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');
            
        }
        $offence_veh  = DB::table('offence_vechicle_booking')
        ->Join('checked_vehicle_det', 'offence_vechicle_booking.offense_booked_vehicle_number', 'checked_vehicle_det.vehno')
        ->select('offence_vechicle_booking.*','checked_vehicle_det.*')
        ->where('offence_vechicle_booking.is_delete', 0)
        ->get();

        // dd($offence_veh);die();
        // ->latest()->paginate();
        // dd($offence_veh);
        // ->Join('vehicle_details', 'checked_vechicle.vechicle_no', 'vehicle_details.vehicle_no')
        // ->select('checked_vechicle.*','vehicle_details.*')
        // ->Join('e_way_bill_details', 'checked_vechicle.vechicle_no', 'e_way_bill_details.veh_number')
        // ->select('checked_vechicle.*','vehicle_details.*','e_way_bill_details.*')
        
        // dd($checked_vehicle);
        // $rovingsquads = rovingsquad::where('is_delete', 0)->latest()->paginate()->paginate();
        // dd($checked_vehicle);
        return view('forms.offence_vehicle.list', compact('offence_veh'))->with('i', (request()->input('page', 1) - 1) * 10);
     

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
        // dd('hi');
        $prefix = "";
        $request->validate([
            'intelligence_division' => 'required',
            'roving_squad_no' => 'required',
            'duty_date' => 'required',
            'shift' => 'required',
            'offense_booked_vehicle_number' => 'required',
            'place_of_interception' => 'required',
            'offense_booking_time' => 'required',
            'nature_of_the_offense' => 'required',
            'offense_section' => 'required',
            // 'count_of_commodity_involved' => 'required',
            'description' => 'required',
            'orders_passed' => 'required',
            'penality_details' => 'required',
            'reason' => 'required',
            'poi_number' => 'required'
            
        ]);

        $offencevehicle = new offenceVehicle;

        $offencevehicle->intelligence_division	 = $request->intelligence_division;
        $offencevehicle->roving_squad_no = $request->roving_squad_no;
        $offencevehicle->duty_date = $request->duty_date;
        $offencevehicle->shift = $request->shift;
        $offencevehicle->offense_booked_vehicle_number = $request->offense_booked_vehicle_number;
        $offencevehicle->place_of_interception = $request->place_of_interception;
        $offencevehicle->offense_booking_time = $request->offense_booking_time;
        $offencevehicle->nature_of_the_offense = $request->nature_of_the_offense;
        $offencevehicle->offense_section_unique = $request->offense_section;
        $offencevehicle->count_of_commodity_involved = $request->count_of_commodity_involved;
        $offencevehicle->description = $request->description;
        $offencevehicle->orders_passed = $request->orders_passed;
        $offencevehicle->penality_details = $request->penality_details;
        $offencevehicle->reason = $request->reason;
        $offencevehicle->poi_no = $request->poi_number;
        $offencevehicle->unique_id = unique_id($prefix);

        $offencevehicle->save();

        return route('offence_vehicle.index');
        
        // view('forms.offence_vehicle.list');return route('offence_vehicle.index')->    

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
        // dd("hii");
        // dd($request->offence_no);
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
            // 'count_of_commodity_involved' => $request->count_of_commodity_involved,
            'description' => $request->description,
            'orders_passed' => $request->orders_passed,
            'penality_details' => $request->penality_details,
            'reason' => $request->reason,

        ]);


        // $offencevehicle = new offenceVehicle;

        // $offencevehicle->intelligence_division	 = $request->intelligence_division;
        // $offencevehicle->roving_squad_no = $request->roving_squad_no;
        // $offencevehicle->duty_date = $request->duty_date;
        // $offencevehicle->shift = $request->shift;
        // $offencevehicle->offense_booked_vehicle_number = $request->offense_booked_vehicle_number;
        // $offencevehicle->place_of_interception = $request->place_of_interception;
        // $offencevehicle->offense_booking_time = $request->offense_booking_time;
        // $offencevehicle->nature_of_the_offense = $request->nature_of_the_offense;
        // $offencevehicle->offense_section = $request->offense_section;
        // $offencevehicle->count_of_commodity_involved = $request->count_of_commodity_involved;
        // $offencevehicle->description = $request->description;
        // $offencevehicle->orders_passed = $request->orders_passed;
        // $offencevehicle->penality_details = $request->penality_details;
        // $offencevehicle->reason = $request->reason;
        // $offencevehicle->poi_no = $request->poi_number;
        // $offencevehicle->unique_id = unique_id($prefix);

        // $offencevehicle->save();

        return route('offence_vehicle.index');
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
