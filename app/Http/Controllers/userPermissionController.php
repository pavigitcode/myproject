<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usertypepermission;
use DB;

class userPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     if(session('unique_id') ==''){
    //         \Auth::logout();
    //         session()->flush();
    //         return redirect('otp');

    //     }
    //     $main_screen_id         = $request->main_screen;
    //     $user_type = $request->user_type;
    //     $department_name = $request->department_name;

    //     $screen_unique_id_count = DB::table('user_screen_permission')->where([['main_screen_unique_id', $main_screen_id],['department_name', $department_name],['user_type', $user_type]])->select('screen_unique_id')->groupBy('screen_unique_id')->get();

    //     $action_unique = DB::table('user_screen_permission')->where([['main_screen_unique_id', $main_screen_id],['department_name', $department_name],['user_type', $user_type]])->select('action_unique_id')->get();

    //     // dd($screen_unique_id_count);

    //     // dd($screen_unique_id_count);
    //     // dd($screen_unique_id_count[0]->screen_unique_id);
    //     // $user_info = DB::table('usermetas')
    //     //          ->select('browser', DB::raw('count(*) as total'))
    //     //          ->groupBy('browser')->groupBy('screen_unique_id')
    //     //          ->get();

    //     $action_unique_ids = DB::table('user_screen_permission')->where('main_screen_unique_id', $main_screen_id)->select('action_unique_id')->get();

    //     $action_unique_id_count = DB::table('user_screen_permission')->where('main_screen_unique_id', $main_screen_id)->select('action_unique_id')->count();
    //     // $add = $screen_unique_id_count.','.$action_unique_id_count;
    //     //   dd($action_unique_ids);

    //     // dd($action_unique);

    //     $demo1 = user_permission_ui_update($action_unique,$main_screen_id,$user_type,$department_name,$screen_unique_id_count,$action_unique_id_count,$action_unique_id_count,$action_unique_ids);
    //     return \Response::json($demo1);
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index(Request $request)
    {
        if(session('unique_id') ==''){
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');

        }
        $main_screen_id         = $request->main_screen;
        $user_type = $request->user_type;
        $department_name = $request->department_name;

        $screen_unique_id_count = DB::table('user_screen_permission')->where([['main_screen_unique_id', $main_screen_id],['department_name', $department_name],['user_type', $user_type]])->select('screen_unique_id')->groupBy('screen_unique_id')->get();

        $action_unique = DB::table('user_screen_permission')->where([['main_screen_unique_id', $main_screen_id],['department_name', $department_name],['user_type', $user_type]])->select('action_unique_id')->get();

        // dd($screen_unique_id_count);

        // dd($screen_unique_id_count);
        // dd($screen_unique_id_count[0]->screen_unique_id);
        // $user_info = DB::table('usermetas')
        //          ->select('browser', DB::raw('count(*) as total'))
        //          ->groupBy('browser')->groupBy('screen_unique_id')
        //          ->get();
        $screen_unique_ids = DB::table('user_screen_permission')->where([['main_screen_unique_id', $main_screen_id],['department_name', $department_name],['user_type', $user_type]])->select('screen_unique_id')->select('screen_unique_id')->get();

        $action_unique_ids = DB::table('user_screen_permission')->where('main_screen_unique_id', $main_screen_id)->select('action_unique_id')->get();

        $action_unique_id_count = DB::table('user_screen_permission')->where('main_screen_unique_id', $main_screen_id)->select('action_unique_id')->count();
        // $add = $screen_unique_id_count.','.$action_unique_id_count;
        //   dd($action_unique_ids);

        // dd($action_unique);

        $demo1 = user_permission_ui_update($action_unique,$main_screen_id,$user_type,$department_name,$screen_unique_id_count,$action_unique_id_count,$action_unique_id_count,$action_unique_ids,$screen_unique_ids);
        return \Response::json($demo1);
    }
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
    public function update(Request $request)
    {
        $user_type = $request->user_type;
        $department = $request->department;
        // $main_screen_id = $request->main_screen;
        // dd($department);
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
