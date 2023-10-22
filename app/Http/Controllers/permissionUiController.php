<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\screensection;
use Illuminate\Support\Facades\Storage;
use DB;
// use App\Helpers\userscreen;
use App\Models\userscreen;
use Symfony\Component\HttpFoundation\Response;


class permissionUiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        $demo = user_permission_ui($main_screen_id, $user_type, $department_name);
        // $val = user_permission_ui();


        //   $permission = userscreen::where([['main_screen_unique_id', $main_screen_id],['is_delete',0]])->get(['unique_id','user_screen_name']);
        //   $actions = DB::table('user_screen_actions')->where('is_delete',0)->get(['unique_id','action_name']);

        //   $demo['data'] = $permission;
        // $action['value'] = $actions;
        //   return response()->json($myArray);
        // return responce()->json($demo);
        // dd($screen_unique_id);
        // $screen_unique_id = $screen_unique_id;
        // dd($screen_unique_id);
        return \Response::json($demo);
        // dd(array('permission' => $demo, 'actions' => $actions));
        // return view('usertypepermission.add', array('data' => $demo, 'value' => $actions));
        // return view('results', array( 'demo' => $demo ));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        // $all_permissions = userScreenAction::all();
        // $permission_groups = user::getpermissionGroups();
        // return view('usertypepermission.add', compact('perm_ui'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $main_screen_id         = $request->main_screen;
        $user_type = $request->user_type;
        $department_name = $request->department_name;
        
        $demo = user_permission_ui($main_screen_id, $user_type, $department_name);
        // $val = user_permission_ui();


        //   $permission = userscreen::where([['main_screen_unique_id', $main_screen_id],['is_delete',0]])->get(['unique_id','user_screen_name']);
        //   $actions = DB::table('user_screen_actions')->where('is_delete',0)->get(['unique_id','action_name']);

        //   $demo['data'] = $permission;
        // $action['value'] = $actions;
        //   return response()->json($myArray);
        // return responce()->json($demo);
        // dd($screen_unique_id);
        // $screen_unique_id = $screen_unique_id;
        // dd($screen_unique_id);
        return \Response::json($demo);
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
