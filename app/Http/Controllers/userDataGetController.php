<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usercreation;
use App\Models\usertype;
use Carbon\Carbon;
use App\Models\VerificationCode;
use App\Models\division;
use App\Models\logs;
use App\Models\officerregistration;

class userDataGetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date = Carbon::now('Asia/Kolkata');
        $ldate = $date->format('Y-m-d');

        $user_data = usercreation::where('user_name', $request->user_name)->where('is_delete', 0)->first();

        $field_user = officerregistration::where('roving_squad_unique_id', $request->user_name)->where('is_delete', 0)->where('from_date','<=', $ldate)->where('to_date','>=', $ldate)->first();

        // dd($field_user);

        if($user_data){
            $data = array("user_data" => $user_data);

            $jsonResponse = json_encode($data);
            echo $jsonResponse;
        }else if($field_user){
            $data = array("user_data" => $field_user);

            $jsonResponse = json_encode($data);
            echo $jsonResponse;
        }else{
            $data = array("user_data" => '2');

            $jsonResponse = json_encode($data);
            echo $jsonResponse;

        }


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
