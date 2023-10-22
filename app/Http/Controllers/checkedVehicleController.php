<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\checked_vehicle;
use App\Models\offenceVehicle;
use App\Models\division;
use App\Models\checked_vehicle_det;
use App\Models\vehicle_detail_view;
use Carbon\Carbon;
use DB;

class checkedVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return $request->from_date;

        if(session('unique_id') ==''){
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');
        }

        $user_type = session('usertype_id');
        $user_division_id = session('division_id');
        $user_id = session('unique_id');

        // dd(session('user_type'));
        $todayDate=date('Y-m-d');
        $from_date = $request->from_date;
        $to_data = $request->to_date;


        if($user_type == '62c80e7c2536911885' || $user_type == '62c80e8cac02318910' || $user_type == '63b4fd095bf7675259' ){
            if( $request->from_date && $request->to_date){
                $checked_vehicle = DB::table('checked_vechicle')
                // ->Join('checked_vehicle_det', 'checked_vechicle.vechicle_no', 'checked_vehicle_det.vehno')
                ->Join('division_creation', 'checked_vechicle.division_num', 'division_creation.unique_id')
                // ->select('checked_vechicle.booking_entry_date', 'checked_vechicle.need_offence_booking_sts', 'checked_vehicle_det.*', 'division_creation.division_name')
                ->select('checked_vechicle.*', 'division_creation.division_name')
                ->groupBy('checked_vechicle.vechicle_no')
                ->where('checked_vechicle.is_delete', 0)
                ->whereDate('checked_vechicle.booking_entry_date', '>=', $request->from_date)
                ->whereDate('checked_vechicle.booking_entry_date', '<=', $request->to_date)
                // ->distinct()
                // ->orderBy('id', 'DESC')
                ->get();
            }else if($request->from_date =='' && $request->to_date ==''){
                $checked_vehicle = DB::table('checked_vechicle')
                // ->Join('checked_vehicle_det', 'checked_vechicle.vechicle_no', 'checked_vehicle_det.vehno')
                ->Join('division_creation', 'checked_vechicle.division_num', 'division_creation.unique_id')
                ->select('checked_vechicle.*', 'division_creation.division_name')
                ->groupBy('checked_vechicle.vechicle_no')
                ->where('checked_vechicle.is_delete', 0)
                ->whereDate('checked_vechicle.booking_entry_date', $todayDate)
                // ->distinct()
                // ->orderBy('id', 'DESC')
                ->get();
            }
        return view('forms.checked_vehicle.list', compact('checked_vehicle'))->with('i', (request()->input('page', 1) - 1) * 10);
        }
        else if($user_type == '62b55fe64789d40213' || $user_type == '5f97fc3257f2525529'){
            if( $request->from_date && $request->to_date){
                $checked_vehicle = DB::table('checked_vechicle')
                // ->Join('checked_vehicle_det', 'checked_vechicle.vechicle_no', 'checked_vehicle_det.vehno')
                ->Join('division_creation', 'checked_vechicle.division_num', 'division_creation.unique_id')
                ->select('checked_vechicle.*', 'division_creation.division_name')
                // ->groupBy('checked_vehicle_det.vehno')
                ->groupBy('checked_vechicle.vechicle_no')
                ->where('checked_vechicle.is_delete', 0)
                ->where('division_creation.unique_id', $user_division_id)
                ->whereDate('checked_vechicle.booking_entry_date', '>=', $request->from_date)
                ->whereDate('checked_vechicle.booking_entry_date', '<=', $request->to_date)
                // ->distinct()
                // ->orderBy('id', 'DESC')
                ->get();
            }else if($request->from_date =='' && $request->to_date ==''){
                $checked_vehicle = DB::table('checked_vechicle')
                // ->Join('checked_vehicle_det', 'checked_vechicle.vechicle_no', 'checked_vehicle_det.vehno')
                ->Join('division_creation', 'checked_vechicle.division_num', 'division_creation.unique_id')
                ->select('checked_vechicle.*', 'division_creation.division_name')
                // ->groupBy('checked_vehicle_det.vehno')
                ->groupBy('checked_vechicle.vechicle_no')
                ->where('checked_vechicle.is_delete', 0)
                ->where('division_creation.unique_id', $user_division_id)
                ->whereDate('checked_vechicle.booking_entry_date', $todayDate)
                // ->distinct()
                // ->orderBy('id', 'DESC')
                ->get();
            }

        // dd($checked_vehicle);
        return view('forms.checked_vehicle.list', compact('checked_vehicle'))->with('i', (request()->input('page', 1) - 1) * 10);
        }
        else if($user_type == '62c80e9f0914e68331'){

            if( $request->from_date && $request->to_date){
                $checked_vehicle = DB::table('checked_vechicle')
            // ->Join('checked_vehicle_det', 'checked_vechicle.vechicle_no', 'checked_vehicle_det.vehno')
            ->Join('division_creation', 'checked_vechicle.division_num', 'division_creation.unique_id')
            // ->select('checked_vechicle.*' 'checked_vehicle_det.*', 'division_creation.division_name')
            ->select('checked_vechicle.*', 'division_creation.division_name')
            // ->groupBy('checked_vehicle_det.vehno')
            ->groupBy('checked_vechicle.vechicle_no')
            ->where('checked_vechicle.is_delete', 0)
            ->where('checked_vechicle.officer_user_id', $user_id)
            ->where('division_creation.unique_id', $user_division_id)
            ->whereDate('checked_vechicle.booking_entry_date', '>=', $request->from_date)
            ->whereDate('checked_vechicle.booking_entry_date', '<=', $request->to_date)
            // ->distinct()
            // ->orderBy('id', 'DESC')
            ->get();
            }else if($request->from_date =='' && $request->to_date ==''){
                $checked_vehicle = DB::table('checked_vechicle')
            // ->Join('checked_vehicle_det', 'checked_vechicle.vechicle_no', 'checked_vehicle_det.vehno')
            ->Join('division_creation', 'checked_vechicle.division_num', 'division_creation.unique_id')
            ->select('checked_vechicle.*', 'division_creation.division_name')
            // ->groupBy('checked_vehicle_det.vehno')
            ->groupBy('checked_vechicle.vechicle_no')
            ->where('checked_vechicle.is_delete', 0)
            ->where('checked_vechicle.officer_user_id', $user_id)
            ->where('division_creation.unique_id', $user_division_id)
            ->whereDate('checked_vechicle.booking_entry_date', $todayDate)
            // ->distinct()
            // ->orderBy('id', 'DESC')
            ->get();
            }



            // dd($checked_vehicle);
        // dd($checked_vehicle);
        return view('forms.checked_vehicle.list', compact('checked_vehicle'))->with('i', (request()->input('page', 1) - 1) * 10);
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
        return view('forms.checked_vehicle.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->eway_no);
        $prefix = "";
        $request->validate([
            'vehicle_num' => 'required',
            'poi_no' => 'required',


        ]);

        if ($request->book_now == '') {
            $request->book_sts = 0;
        } else {
            $request->book_sts = 1;
        }

        if ($request->vehicle == '') {
            $vech_data = $request->book_now;
        } else {
            $vech_data = $request->vehicle;
        }

        // dd($request->ewayno);
        if ($request->ewayno == "") {
            $ewayno = 0;
        } else {
            $ewayno = $request->ewayno;
        }

        if ($request->vehicle_place == "undefined") {
            $vehicle_place = '';
        } else {
            $vehicle_place = $request->vehicle_place;
        }

        $date = Carbon::now('Asia/Kolkata');
        $dates = $date->format('Y-m-d');
        $officer_user_id = session('unique_id');

        $vehicle_detail = checked_vehicle::where('vechicle_no', $request->vehicle_num)->orderBy('id', 'DESC')->first();

        //  dd($vehicle_detail);

        if ($vehicle_detail == null) {


            $checked_vehicle = new checked_vehicle;

            $checked_vehicle->vechicle_no = $request->vehicle_num;
            $checked_vehicle->veh_place = $vehicle_place;
            $checked_vehicle->poi_no = $request->poi_no;
            $checked_vehicle->need_offence_booking_sts = $request->book_sts;
            $checked_vehicle->book_now = $vech_data;
            $checked_vehicle->offence_remarks = $request->offence_remark;
            $checked_vehicle->booking_entry_date = $request->entry_date;
            $checked_vehicle->division_num = $request->division_no;
            $checked_vehicle->eway_nos = $ewayno;
            $checked_vehicle->officer_user_id = $officer_user_id;



            $checked_vehicle->unique_id = unique_id($prefix);

            $checked_vehicle->save();

            $offenceVehicle = new offenceVehicle;

            $offenceVehicle->offense_booked_vehicle_number = $request->vehicle_num;
            $offenceVehicle->poi_no = $request->poi_no;
            $offenceVehicle->need_offence_booking_sts = $request->book_sts;
            $offenceVehicle->book_now = $vech_data;
            $offenceVehicle->offence_remarks = $request->offence_remark;
            $offenceVehicle->duty_date = $request->entry_date;
            $offenceVehicle->intelligence_division = $request->division_no;
            $offenceVehicle->eway_nos = $ewayno;
            $offenceVehicle->officer_user_id = $officer_user_id;

            $offenceVehicle->unique_id = unique_id($prefix);

            $offenceVehicle->save();

            // $count = count($ewayno);
            // dd($count);
            

            $arr = [$ewayno];



            
            // dd($arr);
            if($request->ewayno != ""){
            foreach ($arr as $val) {

                $eway_value = explode(",", $val);
            }
            $eway_count = count($eway_value);
            $exp = 0;
           
            
            foreach ($eway_value as $ewb_noo) {
                // dd($ewb_noo);
                $ewb_nos = vehicle_detail_view::where('ewb_no', $ewb_noo)->where('vehno', $request->vehicle_num)->first();

                // $ewb_nos_cnt = count($ewb_nos);
               
                    $checked_vehicle_det = new checked_vehicle_det;

                $checked_vehicle_det->poi_no = $request->poi_no;
                $checked_vehicle_det->ewb_no = $ewb_nos->ewb_no;
                $checked_vehicle_det->transmode = $ewb_nos->transmode;
                $checked_vehicle_det->vehno = $ewb_nos->vehno;
                $checked_vehicle_det->trdocno = $ewb_nos->trdocno;
                $checked_vehicle_det->trdocdt = $ewb_nos->trdocdt;
                $checked_vehicle_det->frplace = $ewb_nos->frplace;
                $checked_vehicle_det->category = $ewb_nos->category;
                $checked_vehicle_det->veh_ver = $ewb_nos->veh_ver;
                $checked_vehicle_det->fin_valid_dt = $ewb_nos->fin_valid_dt;
                $checked_vehicle_det->ewb_dt = $ewb_nos->ewb_dt;
                $checked_vehicle_det->user_typ = $ewb_nos->user_typ;
                $checked_vehicle_det->user_gstin = $ewb_nos->user_gstin;
                $checked_vehicle_det->doc_typ = $ewb_nos->doc_typ;
                $checked_vehicle_det->doc_no = $ewb_nos->doc_no;
                $checked_vehicle_det->doc_dt = $ewb_nos->doc_dt;
                $checked_vehicle_det->fr_gstin = $ewb_nos->fr_gstin;

                $checked_vehicle_det->fr_name = $ewb_nos->fr_name;
                $checked_vehicle_det->fr_plac = $ewb_nos->fr_plac;
                $checked_vehicle_det->fr_pin = $ewb_nos->fr_pin;
                $checked_vehicle_det->fr_stat = $ewb_nos->fr_stat;
                $checked_vehicle_det->to_gstin = $ewb_nos->to_gstin;
                $checked_vehicle_det->to_name = $ewb_nos->to_name;
                $checked_vehicle_det->to_plac = $ewb_nos->to_plac;
                $checked_vehicle_det->to_pin = $ewb_nos->to_pin;
                $checked_vehicle_det->ass_val = $ewb_nos->ass_val;
                $checked_vehicle_det->cgst_val = $ewb_nos->cgst_val;
                $checked_vehicle_det->sgst_val = $ewb_nos->sgst_val;

                $checked_vehicle_det->igst_val = $ewb_nos->igst_val;
                $checked_vehicle_det->cess_val = $ewb_nos->cess_val;
                $checked_vehicle_det->trav_dist = $ewb_nos->trav_dist;
                $checked_vehicle_det->ssup_des = $ewb_nos->ssup_des;
                $checked_vehicle_det->veh_typ = $ewb_nos->veh_typ;
                $checked_vehicle_det->trans_typ = $ewb_nos->trans_typ;
                $checked_vehicle_det->ewb_valid_dt = $ewb_nos->ewb_valid_dt;
                $checked_vehicle_det->unique_id = unique_id($prefix);
                // $checked_vehicle_det->eway_nos = $request->ewayno;

                $checked_vehicle_det->save();
                $exp++;
                //     $checked_vehicle_det = new checked_vehicle_det;

                // $checked_vehicle_det->poi_no = $request->poi_no;
                // $checked_vehicle_det->ewb_no = '';
                // $checked_vehicle_det->transmode = '';
                // $checked_vehicle_det->vehno = '';
                // $checked_vehicle_det->trdocno = '';
                // $checked_vehicle_det->trdocdt = '';
                // $checked_vehicle_det->frplace = '';
                // $checked_vehicle_det->category = '';
                // $checked_vehicle_det->veh_ver = '';
                // $checked_vehicle_det->fin_valid_dt = '';
                // $checked_vehicle_det->ewb_dt = '';
                // $checked_vehicle_det->user_typ = '';
                // $checked_vehicle_det->user_gstin = '';
                // $checked_vehicle_det->doc_typ = $ewb_nos->doc_typ;
                // $checked_vehicle_det->doc_no = $ewb_nos->doc_no;
                // $checked_vehicle_det->doc_dt = $ewb_nos->doc_dt;
                // $checked_vehicle_det->fr_gstin = $ewb_nos->fr_gstin;

                // $checked_vehicle_det->fr_name = $ewb_nos->fr_name;
                // $checked_vehicle_det->fr_plac = $ewb_nos->fr_plac;
                // $checked_vehicle_det->fr_pin = $ewb_nos->fr_pin;
                // $checked_vehicle_det->fr_stat = $ewb_nos->fr_stat;
                // $checked_vehicle_det->to_gstin = $ewb_nos->to_gstin;
                // $checked_vehicle_det->to_name = $ewb_nos->to_name;
                // $checked_vehicle_det->to_plac = $ewb_nos->to_plac;
                // $checked_vehicle_det->to_pin = $ewb_nos->to_pin;
                // $checked_vehicle_det->ass_val = $ewb_nos->ass_val;
                // $checked_vehicle_det->cgst_val = $ewb_nos->cgst_val;
                // $checked_vehicle_det->sgst_val = $ewb_nos->sgst_val;

                // $checked_vehicle_det->igst_val = $ewb_nos->igst_val;
                // $checked_vehicle_det->cess_val = $ewb_nos->cess_val;
                // $checked_vehicle_det->trav_dist = $ewb_nos->trav_dist;
                // $checked_vehicle_det->ssup_des = $ewb_nos->ssup_des;
                // $checked_vehicle_det->veh_typ = $ewb_nos->veh_typ;
                // $checked_vehicle_det->trans_typ = $ewb_nos->trans_typ;
                // $checked_vehicle_det->ewb_valid_dt = $ewb_nos->ewb_valid_dt;
                // $checked_vehicle_det->unique_id = unique_id($prefix);
                // // $checked_vehicle_det->eway_nos = $request->ewayno;

                // $checked_vehicle_det->save();
                // $exp++;
                }
            //     else{
                
            // }
            }


            return redirect()->route('checked_vehicle.index')->with('success', 'Checked Vehicle Created Successfully.');
        } else {
            return redirect()->route('checked_vehicle.index')->with('error', 'vehicle Number Already exists');
        }
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
        $checked_vehicle = checked_vehicle::find($id);
        // ->where('is_delete',0);
        return view('forms.checked_vehicle.edit', compact('checked_vehicle'));
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
        // dd($id);
        $prefix = "";
        // $request->validate([

        //     // 'book_now' => 'required',

        // ]);
        // if($request->get('book_now') ==''){
        //     $request->get('book_sts') = 0;
        // }else{
        //     $request->get('book_sts') = 1;
        // }
        // // dd($book_sts);

        // if($request->get('vehicle') == ''){
        //     $vech_data = $request->get('book_now');
        // }else{
        //     $vech_data = $request->get('vehicle');
        // }
        if ($request->book_now == '') {
            $request->book_sts = 0;
        } else {
            $request->book_sts = 1;
        }
        $officer_user_id = session('unique_id');
        // dd($book_sts);
        $poi_no = $request->get('poi_no');

        if ($request->vehicle == '') {
            $vech_data = $request->book_now;
        } else {
            $vech_data = $request->vehicle;
        }
        // $checked_vehicle = checked_vehicle::find($id);

        // // dd($request->get('book_sts'));
        // $checked_vehicle->need_offence_booking_sts = $request->book_sts;
        // $checked_vehicle->book_now = $vech_data;
        // $checked_vehicle->offence_remarks = $request->get('offence_remark');
        // $checked_vehicle->division_num = $request->division_no;
        // // $checked_vehicle->booking_entry_date = $request->entry_date;

        // // $checked_vehicle->unique_id = unique_id($prefix);

        // $checked_vehicle->update();

        checked_vehicle::where('poi_no', $poi_no)->update([
            'need_offence_booking_sts' => $request->book_sts,
            'book_now' => $vech_data,
            'offence_remarks' => $request->get('offence_remark'),
            'division_num' => $request->division_no,
            'officer_user_id' => $officer_user_id,

        ]);

        offenceVehicle::where('poi_no', $poi_no)->update([
            'need_offence_booking_sts' => $request->book_sts,
            'book_now' => $vech_data,
            'offence_remarks' => $request->get('offence_remark'),
            'intelligence_division' => $request->get('division_no'),
            'officer_user_id' => $officer_user_id,

        ]);

        // $offenceVehicle =  offenceVehicle::find($poi_no);

        // dd($offenceVehicle);
        // // dd($request->poi_no);
        // // $offenceVehicle->offense_booked_vehicle_number = $request->vehicle_num;
        // // $offenceVehicle->poi_number = $request->poi_no;
        // $offenceVehicle->need_offence_booking_sts = $request->book_sts;
        // $offenceVehicle->book_now = $vech_data;
        // $offenceVehicle->offence_remarks = $request->get('offence_remark');

        // $offenceVehicle->update();
        // dd($checked_vehicle);
        // Alert::Success('Congrats', 'You\'ve Successfully Registered');

        // SweetAlert::message('User Type Created Successfully!');
        // ->with('Success', 'User Type Created Successfully.')
        return redirect()->route('checked_vehicle.index')->with('success', 'Checked Vehicle Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {

        // $checked_vehicle =  checked_vehicle::find($id);

        // $checked_vehicle->is_delete = 1;
        // $screensection->delete();
        checked_vehicle::where('poi_no', $id)->update([
            'is_delete' => 1,
        ]);

        // offenceVehicle::where('poi_no', $poi_no)->update([
        //     'need_offence_booking_sts' => $request->book_sts,
        // ]);

        // $checked_vehicle->update();
        // dd($checked_vehicle);
        return redirect()->route('checked_vehicle.index')
            ->with('success', 'Checked Vehicle Deleted successfully');
    }
}
