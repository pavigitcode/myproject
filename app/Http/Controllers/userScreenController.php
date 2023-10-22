<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userscreen;
use DB;

class userScreenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('unique_id') ==''){
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');
        }
        $user_type = session('usertype_id');
        $user_division_id = session('division_id');
        if ($user_type == '62c80e7c2536911885' || $user_type == '62c80e8cac02318910' || $user_type == '63b4fd095bf7675259') {

            $user_screens = DB::table('user_screen')
                ->Join('user_screen_main', 'user_screen.main_screen_unique_id', 'user_screen_main.unique_id')
                ->select('user_screen.*', 'user_screen_main.screen_main_name')
                ->latest()->paginate();

            return view('userscreen.user_screen_list', compact('user_screens'))->with('i', (request()->input('page', 1) - 1) * 10);
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
        return view('userscreen.user_screen_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->user_actions);
        $prefix = "";
        $request->validate([
            'main_screen_unique_id' => 'required',
            'user_screen_name' => 'required',
            'order_no' => 'required',
            'icon_name' => 'required',
            'dashboard_setting_menu' => 'required',
            'folder_name' => 'required',
            'user_actions' => 'required',
            'is_active' => 'required',
            // 'description' => 'required',
            'department_id' => 'required'
        ]);

        $userscreenData = userscreen::where('user_screen_name',$request->user_screen_name)->where('is_delete',0)->orwhere('order_no',$request->order_no)->first();


        // return $screenData;
        if($userscreenData == ''){

        // $screen_action = implode(",", $request->user_actions);
        $screen_action = collect($request->user_actions)->implode(",");
        $userscreen = new userscreen;
        $userscreen->main_screen_unique_id = $request->main_screen_unique_id;
        $userscreen->user_screen_name = $request->user_screen_name;
        $userscreen->order_no = $request->order_no;
        $userscreen->icon_name = $request->icon_name;
        $userscreen->dashboard_setting_menu = $request->dashboard_setting_menu;
        $userscreen->folder_name = $request->folder_name;
        $userscreen->is_active = $request->is_active;
        $userscreen->description = $request->description;
        $userscreen->department_id = $request->department_id;
        $userscreen->unique_id = unique_id($prefix);
        $userscreen->actions = $screen_action;

       $userscreen->save();
        return redirect()->route('userscreen.index')->with('success', 'Screen Section Created Successfully.');
    }else{
        return redirect()->route('userscreen.create')
        ->with('error', 'Already exit order no or user screen name');
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
        $userscreen = userscreen::findOrfail($id);
        return view('userscreen.user_screen_edit', compact('userscreen'));
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
        $request->validate([
            'main_screen_unique_id' => 'required',
            'user_screen_name' => 'required',
            'order_no' => 'required',
            'icon_name' => 'required',
            'dashboard_setting_menu' => 'required',
            'folder_name' => 'required',
            // 'screen_section_unique_id' => 'required',
            'is_active' => 'required',
            // 'description' => 'required',
            'department_id' => 'required'

        ]);
        
        $userscreenData = userscreen::where('user_screen_name',$request->user_screen_name)->orwhere('order_no',$request->order_no)->first();
        // return $screenData;
     if($userscreenData){
            if($userscreenData->id == $id){
        $arr = $request->adopted1 . ',' . $request->adopted2 . ',' . $request->adopted3 . ',' . $request->adopted4 . ',' . $request->adopted5 . ',' . $request->adopted6;
        // $screen_action = collect($arr)->implode(",");
        userscreen::where('id', $id)->update([
            'main_screen_unique_id' => $request->get('main_screen_unique_id'),
            'user_screen_name' => $request->get('user_screen_name'),
            'order_no' => $request->get('order_no'),
            'icon_name' =>$request->get('icon_name'),
            'dashboard_setting_menu' => $request->get('dashboard_setting_menu'),
            'folder_name' => $request->get('folder_name'),
            'is_active' => $request->get('is_active'),
            'description' =>$request->get('description'),
            'department_id' => $request->get('department_id'),
            'actions' =>$arr,

        ]);
        return redirect()->route('userscreen.index')
        ->with('success', ' User Screen updated successfully');
     }else{
        return redirect()->route('userscreen.edit',$id)
        ->with('error', 'Already exit order no or user screen name');
      }
    }
        // $screen_action = collect($arr)->implode(",");
        // dd($screen_action);
        // $userscreen =  userscreen::find($id);
        // $userscreen->main_screen_unique_id = $request->get('main_screen_unique_id');
        // $userscreen->user_screen_name = $request->get('user_screen_name');
        // $userscreen->order_no = $request->get('order_no');
        // $userscreen->icon_name = $request->get('icon_name');
        // $userscreen->dashboard_setting_menu = $request->get('dashboard_setting_menu');
        // $userscreen->folder_name = $request->get('folder_name');
        // //  $userscreen->screen_section_unique_id = $request->get('screen_section_unique_id');
        // $userscreen->is_active = $request->get('is_active');
        // $userscreen->description = $request->get('description');
        // $userscreen->department_id = $request->get('department_id');
        // $userscreen->actions = $arr;

        // $userscreen->save();
        // return redirect()->route('userscreen.index')
        //     ->with('success', 'User Screen updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(userscreen $userscreen)
    {
        $userscreen->delete();

        return redirect()->route('userscreen.index')
            ->with('success', 'User Screen Deleted successfully');
        //user_creation_list
    }
}
