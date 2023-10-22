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
        if(session('unique_id') ==''){
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');

        }
        $user_type = session('usertype_id');
        $user_division_id = session()->get('division_id');
        if ($user_type == '62c80e7c2536911885' || $user_type == '62c80e8cac02318910' || $user_type == '63b4fd095bf7675259') {

            $usertypepermission = DB::table('user_screen_permission')
                ->select('user_screen_permission.*', 'user_type.user_type', 'division_creation.division_name', 'user_screen_main.screen_main_name')
                ->join('user_type', 'user_screen_permission.user_type', 'user_type.unique_id')
                ->join('division_creation', 'user_screen_permission.department_name', 'division_creation.unique_id')
                ->join('user_screen_main', 'user_screen_permission.main_screen_unique_id', 'user_screen_main.unique_id')
                ->groupBy('user_screen_permission.user_type', 'user_screen_permission.department_name')
                ->get();


            return view('usertypepermission.list', compact('usertypepermission'))->with('i', (request()->input('page', 1) - 1) * 10);
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

        // dd($request->checkboxvalue);

        if ($request->checkall == '') {
            $dataofexplode = $request->checkboxvalue;
            for ($i = 0; $i < count($dataofexplode); $i++) {
                // dd($i);
                $demoData = explode('-', $dataofexplode[$i]);
                // dd($demoData[0]);
                usertypepermission::create([
                    "user_type" => $request->user_type,
                    "department_name" => $request->department_name,
                    "main_screen_unique_id" => $request->main_screen,
                    "screen_unique_id" => $demoData[0],
                    "check_all" => 0,
                    "action_unique_id" => $demoData[1],
                    "unique_id" => unique_id($prefix),
                ]);
            }
        } else if ($request->checkall != '') {
            $dataofexplode = $request->checkboxvalue;
            for ($i = 0; $i < count($dataofexplode); $i++) {
                // dd($i);
                $demoDataOf = explode('-', $dataofexplode[$i]);
                // dd($demoDataOf[0]);
                usertypepermission::create([
                    "user_type" => $request->user_type,
                    "department_name" => $request->department_name,
                    "main_screen_unique_id" => $request->main_screen,
                    "screen_unique_id" => $demoDataOf[0],
                    "check_all" => 1,
                    "action_unique_id" => $demoDataOf[1],
                    "unique_id" => unique_id($prefix),
                ]);
            }
            // usertypepermission::create([
            //     "user_type" => $request->user_type,
            //     "department_name" => $request->department_name,
            //     "main_screen_unique_id" => $request->main_screen,
            //     "screen_unique_id" => $request->checkall,
            //     "action_unique_id" => $value,
            //     "unique_id" => unique_id($prefix),
            // ]);
        }

        return redirect()->route('usertypepermission.index')->with('success', 'User Type Permission Created Successfully.');


        // foreach($teamEmployees as $key => $teamArray){
        //     {{$key->team_name}}
        //          foreach($teamArray as $team_Array)
        //              {{$teamArray['get_employees'][0]['first_name']}}
        //          endforeach
        //  }
        // endforeach


        // $arr = $request->checkboxvalue;
        // dd($request->checkboxvalue);

        //     foreach ($request->checkboxvalue as $arr) {
        //         $values = explode(",",$arr);
        //         dd($request->checkboxvalue[0],$request->checkboxvalue[1]);
        //         // foreach($values[1] as $demo){

        //         // }




        //     // dd($arr[0]);

        //         // while($values){
        //         //    echo $val = $values;

        //         // }

        //     if($request->checkboxvalue != ''){
        //             $checkboxvalue = $request->checkall;
        //     }else{
        //          $checkboxvalue = $values[1];
        //     }

        //     }
        //     if($request->checkall != ''){
        //         $all = $request->checkall;
        // }else{
        //      $all = $values[0];
        // }

        // foreach ($request->checkboxvalue as $value) {
        //     usertypepermission::create([
        //         "user_type" => $request->user_type,
        //         "department_name" => $request->department_name,
        //         "main_screen_unique_id" => $request->main_screen,
        //         "screen_unique_id" => $request->checkall,
        //         "action_unique_id" => $value,
        //         "unique_id" => unique_id($prefix),
        //     ]);
        // }

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
    // public function update(Request $request, $id)
    // {
    //     $prefix = "";
    //     $request->validate([
    //         'user_type' => 'required',
    //         'department_name' => 'required',
    //         'main_screen' => 'required',
    //         // 'section_unique_id' => 'required',
    //         // 'screen_unique_id' => 'required',
    //         // 'action_unique_id' => 'required',
    //     ]);

    //     // $usertype =  usertypepermission::find($id);
    //     // dd($request->checkall);

    //     foreach ($request->checkboxvalue as $value) {
    //         usertypepermission::find($id)->update([
    //             "user_type" => $request->user_type,
    //             "department_name" => $request->department_name,
    //             "main_screen_unique_id" => $request->main_screen,
    //             "screen_unique_id" => $request->checkall,
    //             "action_unique_id" => $value,
    //             "unique_id" => unique_id($prefix),
    //         ]);
    //     }

    //     return redirect()->route('usertypepermission.index')->with('success', 'User Type Permission Created Successfully.');
    // }
    public function update(Request $request, $main_screen_unique_id)
    {
        $prefix = "";
        $request->validate([
            'user_type' => 'required',
            'department_name' => 'required',
            'main_screen' => 'required',

        ]);


        $department_name = $request->department_name;
        $user_type = $request->user_type;
        $main_screen = $request->main_screen;


        if($request->screen_id !=''){

        $check = usertypepermission::where([['user_type','=',$request->user_type],['department_name','=',$request->department_name],['screen_unique_id','=',$request->screen_id]])->delete();

                }

                            if ($request->checkall != '') {
                                print_r("hello");
                              $dataofexplode = $request->checkboxvalue;
                              for ($i = 0; $i < count($dataofexplode); $i++) {

                                  $demoDataOf = explode('-', $dataofexplode[$i]);

                                  usertypepermission::create([
                                      "user_type" => $request->user_type,
                                      "department_name" => $request->department_name,
                                      "main_screen_unique_id" => $request->main_screen,
                                      "screen_unique_id" => $demoDataOf[0],
                                      "check_all" => 1,
                                      "action_unique_id" => $demoDataOf[1],
                                      "unique_id" => unique_id($prefix),
                                  ]);
                              }

                    }
        return redirect()->route('usertypepermission.index')->with('success', 'User Type Permission Created Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        // print_r($request);
       
        // $usertype =  usertypepermission::find($id);

        // $usertype->is_delete = 1;
        // // $screensection->delete();

        // $usertype->update();


        // return redirect()->route('usertype.index')
        //     ->with('success', 'User Type Deleted successfully');
    }
}
