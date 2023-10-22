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
        return view('indexold');
        // return view('division.addform');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $prefix = "";
        $request->validate([
            'user_id' => 'required',
            'digit_1' => 'required',
            'digit_2' => 'required',
            'digit_3' => 'required',
            'digit_4' => 'required'

        ]);
        $id = $request->user_id;
        $otpValue = $request->digit_1 . $request->digit_2 . $request->digit_3 . $request->digit_4;

        #Validation Logic
        $verificationCode   = VerificationCode::where('user_id', $id)->where('otp', $otpValue)->first();

        $now = Carbon::now();
        if (!$verificationCode) {
            return redirect()->back()->with('error', 'Your OTP is not correct');
        } elseif ($verificationCode && $now->isAfter($verificationCode->expire_at)) {
            return redirect()->route('otp.index')->with('error', 'Your OTP has been expired');
        }

        $user = usercreation::where('unique_id', $request->user_id)->first();

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
            $logs->otp = $otpValue;
            $logs->login_date = $dates;
            $logs->login_time = $time;
            $logs->login_portal = "Web";
            $logs->unique_id = unique_id($prefix);
            $logs->save();

            if ($user) {
                // Expire The OTP
                $verificationCode->update([
                    'expire_at' => Carbon::now('Asia/Kolkata')
                ]);
                \Auth::user();

                // Auth::login($user);


                return redirect()->route('dashboard.create')->with('success', 'User Login Successfully');
            }
            return redirect()->route('otp.index')->with('not success', 'Your Otp is not correct');
        } else {
            $field_user = officerregistration::where('unique_id', $request->user_id)->first();
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
            $logs->otp = $otpValue;
            $logs->login_date = $dates;
            $logs->login_time = $time;
            $logs->login_portal = "Web";
            $logs->unique_id = unique_id($prefix);
            $logs->save();


            if ($field_user) {
                // Expire The OTP
                $verificationCode->update([
                    'expire_at' => Carbon::now('Asia/Kolkata')
                ]);
                \Auth::user();

                // Auth::login($user);


                return redirect()->route('dashboard.create')->with('success', 'User Login Successfully');
            }
            return redirect()->route('otp.index')->with('not success', 'Your Otp is not correct');
        }


        // session_start();
        // // dd($user);
        // $date = Carbon::now('Asia/Kolkata');
        // $dates = $date->format('Y-m-d');
        // $time =  $date->format('H:i:s');
        // // dd($div_name);
        // $permissions = menu_permission($user_type_id, $div_name);
        // // dd($permissions);
        // $permissions_main  = menu_permission_main($user_type_id, $div_name);

        // foreach ($permissions_main as $main_permission) {

        //     $data_array = explode(',', $main_permission->main_screen_unique_id);
        //     // $main_screens = $main_permission->main_screen_unique_id;
        //     // dd($data_array);
        // }
        // foreach ($permissions as $screens_data) {
        //     // dd($screens_data);
        //     $screens = explode(',', $screens_data->screen_unique_id);
        //     // $screens = $screens_data->screen_unique_id;
        //     // dd($screens);
        // }
        // // $sections                          = $permissions->sections;


        // // dd($screens);
        // session(['unique_id' => $user->unique_id, 'staff_name' => $user->staff_name, 'staff_id' => $user->staff_id, 'mobile_no' => $user->mobile_no, 'email_id' => $user->email_id, 'user_type' => $user_type->user_type, 'user_name' => $user->user_name, "div_name" => $division->division_name, 'usertype_id' => $user->user_type, "main_screens" => $data_array, "screens" => $screens, "division_id" => $user->div_name]);


        // // dd(session('division_id'));

        // $logs = new logs;

        // $logs->mobile_no = $user->mobile_no;
        // $logs->otp = $otpValue;
        // $logs->login_date = $dates;
        // $logs->login_time = $time;
        // $logs->login_portal = "Web";
        // $logs->unique_id = unique_id($prefix);
        // $logs->save();

        // //     // dd($division);
        // // session(['unique_id' => $user->unique_id,'staff_name' => $user->staff_name,'staff_id' => $user->staff_id,'mobile_no' => $user->mobile_no,'email_id' => $user->email_id,'user_type' => $user_type->user_type,'user_name' => $user->user_name]);
        // // dd($division);


        // // dd(session('usertype_id'));

        // if ($user) {
        //     // Expire The OTP
        //     $verificationCode->update([
        //         'expire_at' => Carbon::now('Asia/Kolkata')
        //     ]);
        //     \Auth::user();

        //     // Auth::login($user);


        //     return redirect()->route('dashboard.create')->with('success', 'User Login Successfully');
        // }

        // return redirect()->route('otp.index')->with('not success', 'Your Otp is not correct');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = usercreation::where('mobile_no', $request->mobile_no)->where('is_delete', 0)->first();

        $field_user = officerregistration::where('mobile_no', $request->mobile_no)->where('is_delete', 0)->first();
        # User Does not Have Any Existing OTP
        if ($user) {
            $verificationCode = VerificationCode::where('user_id', $user->unique_id)->latest()->first();

            $now = Carbon::now();

            if ($verificationCode && $now->isBefore($verificationCode->expire_at)) {
                $verificationCode;
            }

            $otpNo = rand(1111, 9999);


            // Create a New OTP
            VerificationCode::create([
                'user_id' => $user->unique_id,
                'otp' => $otpNo,
                'expire_at' => Carbon::now('Asia/Kolkata')->addSeconds(30)
            ]);
            $otp = VerificationCode::where('user_id', $user->unique_id)->orderBy('id', 'DESC')->first();
            return view('otpverify', ['user' => $user, 'otp' => $otp])->with('success', 'Successfully OTP Sended!');
        } else if ($field_user) {
            $verificationCode = VerificationCode::where('user_id', $field_user->unique_id)->latest()->first();

            $now = Carbon::now();

            if ($verificationCode && $now->isBefore($verificationCode->expire_at)) {
                $verificationCode;
            }

            $otpNo = rand(1111, 9999);


            // Create a New OTP
            VerificationCode::create([
                'user_id' => $field_user->unique_id,
                'otp' => $otpNo,
                'expire_at' => Carbon::now('Asia/Kolkata')->addSeconds(30)
            ]);

            $otp = VerificationCode::where('user_id', $field_user->unique_id)->orderBy('id', 'DESC')->first();

            return view('otpverify', ['user' => $field_user, 'otp' => $otp])->with('success', 'Successfully OTP Sended!');
        } else {
            return redirect()->route('otp.index')->with('error', 'Your Mobile Number is not correct');
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
        return redirect()->route('otp.index')->with('success', 'Sign Out Successfully!');
        // return redirect('/login');
    }
}
