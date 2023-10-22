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

class updatelogincontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_data = usercreation::where('user_name', $request->user_name)->where('is_delete', 0)->count();

        if($user_data != 0){

            usercreation::where('user_name', $request->user_name)->where('is_delete', 0)->update([
                
                'new_user' => 0,
                
                

                ]);
                $data = array("user_data" => $user_data);

                $jsonResponse = json_encode($data);
                echo $jsonResponse;
        }else if($user_data == 0){
            officerregistration::where('roving_squad_unique_id', $request->user_name)->where('is_delete', 0)->update([
                
                'new_user' => 0,
                

                ]);
            $data = array("user_data" => $user_data);

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
