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

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('index');
        // return view('division.addform');

    }

    /**
     * Show the form for creating a new resource.
     *
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

        $date = Carbon::now('Asia/Kolkata');
        $ldate = $date->format('Y-m-d');


        $user = usercreation::where('user_name', $request->mobile_no)->where('password', $request->password)->where('is_delete', 0)->first();

        $field_user = officerregistration::where('roving_squad_unique_id', $request->mobile_no)->where('password', $request->password)->where('is_delete', 0)->where('from_date','<=', $ldate)->where('to_date','>=', $ldate)->first();

        if ($user) {

            $user_type = usertype::where('unique_id', $user->user_type)->first();
            $division = division::where('unique_id', $user->div_name)->first();
            $user_type_id = $user->user_type;
            $div_name = $user->div_name;

            $permissions = menu_permission($user_type_id, $div_name);
            $permissions_main  = menu_permission_main($user_type_id, $div_name);

            foreach ($permissions_main as $main_permission) {

                $data_array = explode(',', $main_permission->main_screen_unique_id);
            }
            foreach ($permissions as $screens_data) {
                $screens = explode(',', $screens_data->screen_unique_id);
            }


            session(['unique_id' => $user->unique_id, 'staff_name' => $user->staff_name, 'staff_id' => $user->staff_id, 'mobile_no' => $user->mobile_no, 'email_id' => $user->email_id, 'user_type' => $user_type->user_type, 'user_name' => $user->user_name, "div_name" => $division->division_name, 'usertype_id' => $user->user_type, "main_screens" => $data_array, "screens" => $screens, "division_id" => $user->div_name]);

            session_start();
            // dd($user);
            $date = Carbon::now('Asia/Kolkata');
            $dates = $date->format('Y-m-d');
            $time =  $date->format('H:i:s');

            $logs = new logs;

            $logs->mobile_no = $user->mobile_no;
            // $logs->otp = $otpValue;
            $logs->login_date = $dates;
            $logs->login_time = $time;
            $logs->login_portal = "Web";
            $logs->unique_id = unique_id($prefix);
            $logs->save();



                \Auth::user();


                return redirect()->route('dashboard.create')->with('success', 'User Login Successfully');


        }else if($field_user){
            $user_type = usertype::where('unique_id', $field_user->user_type)->first();
            $division = division::where('unique_id', $field_user->off_division_name)->first();

            // dd($field_user->mobile_no);
            $div_name = $field_user->off_division_name;
            $user_type_id = $field_user->user_type;
            // dd($div_name);

            $permissions = menu_permission($user_type_id, $div_name);
            // dd($permissions);
            $permissions_main  = menu_permission_main($user_type_id, $div_name);


            foreach ($permissions_main as $main_permission) {

                $data_array = explode(',', $main_permission->main_screen_unique_id);
                // $main_screens = $main_permission->main_screen_unique_id;
                // dd($data_array);
                // die();
            }
            foreach ($permissions as $screens_data) {
                // dd($screens_data);
                $screens = explode(',', $screens_data->screen_unique_id);
                // $screens = $screens_data->screen_unique_id;
                // dd($screens);
            }
            // $sections                          = $permissions->sections;


            // dd($screens);
            session(['unique_id' => $field_user->unique_id, 'staff_name' => $field_user->officer_name, 'usertype_id' => $field_user->user_type, 'mobile_no' => $field_user->mobile_no, 'email_id' => $field_user->email, 'user_type' => $user_type->user_type, "div_name" => $division->division_name, "main_screens" => $data_array, "screens" => $screens, "division_id" => $field_user->off_division_name]);


            session_start();
            // dd($user);
            $date = Carbon::now('Asia/Kolkata');
            $dates = $date->format('Y-m-d');
            $time =  $date->format('H:i:s');
            // dd(session('division_id'));

            $logs = new logs;

            $logs->mobile_no = $field_user->mobile_no;
            // $logs->otp = $otpValue;
            $logs->login_date = $dates;
            $logs->login_time = $time;
            $logs->login_portal = "Web";
            $logs->unique_id = unique_id($prefix);
            $logs->save();

            \Auth::user();

            // Auth::login($user);


            return redirect()->route('dashboard.create')->with('success', 'User Login Successfully');

        }else{

            return redirect()->route('login.index')->with('error', 'Your login Credential is incorrect');
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


    public function logout(Request $request)
    {
        \Auth::logout();
        session()->flush();
        return redirect()->route('login.index')->with('success', 'Sign Out Successfully!');
        // return redirect('/login');
    }
}
