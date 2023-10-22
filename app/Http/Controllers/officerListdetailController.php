<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\officerregistration;
use App\Models\designation;
use App\Models\offenceOfficerList;
use App\Models\consignordetails;
use DB;


class officerListdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $officer_list = DB::table('offence_booking_officer_list')
        ->Join('officer_registration', 'offence_booking_officer_list.officer_name', 'officer_registration.unique_id')
        ->select('offence_booking_officer_list.*', 'officer_registration.officer_name')
        ->where('offence_booking_officer_list.poi_number', $request->poi_number)
        ->where('offence_booking_officer_list.is_delete',0)
        ->distinct()
        ->get();

    $jsonResponse = json_encode(['officer_list' => $officer_list]);
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

        $id_value = explode(',', $id);

        offenceOfficerList::where('id', $id_value[0])->update([
            'is_delete' => 1,

        ]);
          return redirect()->route('offence_vehicle.edit',  $id_value[1]);


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
    public function destroy(Request $request,$id)
    {

        offenceOfficerList::where('id', $request->id)->update([
            'is_delete' => 1,

        ]);


        // return redirect()->route('division_creation.index')
        //     ->with('success', 'Division Deleted successfully');

    }
}
