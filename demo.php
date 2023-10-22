<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usertypepermission;
use DB;


class userTypePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $usertypepermission = DB::table('user_screen_permission')
        //     ->Join('user_type', 'user_screen_permission.user_type', 'user_type.unique_id')
        //     ->Join('division_creation', 'user_screen_permission.department_name', 'division_creation.unique_id')
        //     ->Join('user_screen_main', 'user_screen_permission.main_screen_unique_id', 'user_screen_main.unique_id')
        //     // ->groupBy('user_screen_permission.user_type','user_screen_permission.department_name')
        //     ->select('user_screen_permission.*', 'user_type.user_type', 'division_creation.division_name', 'user_screen_main.screen_main_name')
        //     ->where('user_screen_permission.is_delete', '=', 0)
        //     ->latest()->paginate();

        $usertypepermission = DB::table('user_screen_permission')
           ->select('user_screen_permission.*', 'user_type.user_type', 'division_creation.division_name', 'user_screen_main.screen_main_name')
           ->join('user_type', 'user_screen_permission.user_type', 'user_type.unique_id')
           ->join('division_creation', 'user_screen_permission.department_name', 'division_creation.unique_id')
           ->join('user_screen_main', 'user_screen_permission.main_screen_unique_id', 'user_screen_main.unique_id')
           ->groupBy('user_screen_permission.user_type','user_screen_permission.department_name')
           ->get();

        // $rovingsquads = rovingsquad::where('is_delete', 0)->latest()->paginate();
        //  ->groupBy('user_screen_permission.user_type','user_screen_permission.department_name')
        return view('usertypepermission.list', compact('usertypepermission'))->with('i', (request()->input('page', 1) - 1) * 10);

        // $screenvalues = usertypepermission::where('is_delete', 0)->latest()->paginate(100);
        // return view('usertypepermission.list', compact('usertypepermission'))->with('i', (request()->input('page', 1) - 1) * 10);

        // return view('usertypepermission.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $actions = DB::table('user_screen_actions')->where('is_delete', 0)->get(['unique_id', 'action_name']);
        return view('usertypepermission.add', compact('actions'));
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
            'user_type' => 'required',
            'department_name' => 'required',
            'main_screen' => 'required',
            // 'section_unique_id' => 'required',
            // 'screen_unique_id' => 'required',
            // 'action_unique_id' => 'required',
        ]);

        
        // $arr = $request->checkboxvalue;
        // dd($request->checkboxvalue);
        foreach ($request->checkboxvalue as $arr) {
            $values = explode(",",$arr);
            


        
        
        // dd($arr[0]);

            // while($values){
            //    echo $val = $values;

            // }
            
        if($request->checkboxvalue != ''){
                $checkboxvalue = $request->checkall;
        }else{
             $checkboxvalue = $values[1];
        }
            
        }
        if($request->checkall != ''){
            $all = $request->checkall;
    }else{
         $all = $values[0];
    }
    dd($values[0],$values[1]);

        foreach ($request->checkboxvalue as $value) {
            usertypepermission::create([
                "user_type" => $request->user_type,
                "department_name" => $request->department_name,
                "main_screen_unique_id" => $request->main_screen,
                "screen_unique_id" => $all,
                "action_unique_id" => $value,
                "unique_id" => unique_id($prefix),
            ]);
        }

        return redirect()->route('usertypepermission.index')->with('success', 'User Type Permission Created Successfully.');
    }


    public function insertMultiple()
    {
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

        $permission = usertypepermission::findOrfail($id);


        return view('usertypepermission.edit', compact('permission'));
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
        $prefix = "";
        $request->validate([
            'user_type' => 'required',
            'department_name' => 'required',
            'main_screen' => 'required',
            // 'section_unique_id' => 'required',
            // 'screen_unique_id' => 'required',
            // 'action_unique_id' => 'required',
        ]);

        // $usertype =  usertypepermission::find($id);
        // dd($request->checkall);

        foreach ($request->checkboxvalue as $value) {
            usertypepermission::find($id)->update([
                "user_type" => $request->user_type,
                "department_name" => $request->department_name,
                "main_screen_unique_id" => $request->main_screen,
                "screen_unique_id" => $request->checkall,
                "action_unique_id" => $value,
                "unique_id" => unique_id($prefix),
            ]);
        }

        return redirect()->route('usertypepermission.index')->with('success', 'User Type Permission Created Successfully.');
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
