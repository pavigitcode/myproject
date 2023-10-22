<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usercreation;
use App\Models\usertype;
use Carbon\Carbon;
use App\Models\VerificationCode;
use App\Models\division;
use App\Models\logs;
use App\Http\Controllers\BaseController;


class mobileAuthController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("hii");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        print_r('ji');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = usercreation::where('mobile_no', $request->mobile_no)->where('is_delete',0)->first();
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

        }
        else{
            return $this->sendResponse('error', 'Your Mobile Number is not correct');
            // return redirect()->route('otp.index')->with('error', 'Your Mobile Number is not correct');
        }
        $otp = VerificationCode::where('user_id', $user->unique_id)->orderBy('id', 'DESC')->first();

        return $this->sendResponse('success','Successfully OTP Sended!',['user' => $user,'otp' => $otp]);
        // ->with(['user' => $user,'otp' => $otp])

        // return view('otpverify',['user' => $user,'otp' => $otp])->with('success','Successfully OTP Sended!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(...$args)
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
