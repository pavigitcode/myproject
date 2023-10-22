<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\officerregistration;
use App\Models\designation;
use App\Models\offenceOfficerList;
use App\Models\consignordetails;
use DB;

class officerdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (session('unique_id') == '') {
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');
        }
        // dd($request->officer_id);
        $officerregistration = officerregistration::where('unique_id', $request->officer_id)->first();
        // return view('hsn.list', compact('officerregistration'));

        $designation_value = designation::where('unique_id', $officerregistration->off_designation_name)->first();
        $data = array("mobile_no" => $officerregistration->mobile_no, "gpf_no" => $officerregistration->gpf_cps_no, "designation_name" => $designation_value->designation_name);

        $jsonResponse = json_encode($data);
        echo $jsonResponse;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $prefix = "";
        $request->validate([
            'name_of_officer' => 'required',
            'designation' => 'required',
            'gpf_cps_number' => 'required',
            'mobile_no' => 'required',
            'poi_number' => 'required',
            // 'shift' => 'required'
            // 'office_no' => 'required',
            // 'office_no' => 'required',
            // 'office_no' => 'required'
        ]);

        $offenceOfficerList = new offenceOfficerList;
        $offenceOfficerList->officer_name = $request->name_of_officer;
        $offenceOfficerList->designation = $request->designation;
        $offenceOfficerList->GPF_CPS_number = $request->gpf_cps_number;
        $offenceOfficerList->mobile_no = $request->mobile_no;
        $offenceOfficerList->poi_number = $request->poi_number;
        $offenceOfficerList->unique_id = unique_id($prefix);
        $offenceOfficerList->save();


        $officer_list = DB::table('offence_booking_officer_list')
            ->Join('officer_registration', 'offence_booking_officer_list.officer_name','=', 'officer_registration.unique_id')
            ->select('offence_booking_officer_list.*', 'officer_registration.officer_name')
            ->where('offence_booking_officer_list.poi_number', $request->poi_number)
            ->where('offence_booking_officer_list.is_delete', 0)
            ->distinct()
            ->get();

        $jsonResponse = json_encode(['officer_list' => $officer_list]);
        echo $jsonResponse;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
