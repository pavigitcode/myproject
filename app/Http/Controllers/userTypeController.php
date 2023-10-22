<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usertype;
use DB;
use RealRashid\SweetAlert\Facades\Alert;



class userTypeController extends Controller
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

            $usertypes = usertype::where('is_delete', 0)->orderBy('id','ASC')->latest()->paginate();
            return view('usertype.list', compact('usertypes'))->with('i', (request()->input('page', 1) - 1) * 10);
        }else{
            $usertypes = usertype::where('is_delete', 0)->orderBy('id','ASC')->latest()->paginate();
            return view('usertype.list', compact('usertypes'))->with('i', (request()->input('page', 1) - 1) * 10);
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
        return view('usertype.addform');
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
            'is_active' => 'required',
        ]);

        $usertype = new usertype;

        $usertype->user_type = $request->user_type;
        $usertype->under_user_type     = '';
        $usertype->is_active = $request->is_active;
        $usertype->unique_id = unique_id($prefix);

        $usertype->save();
        // Alert::Success('Congrats', 'You\'ve Successfully Registered');

        // SweetAlert::message('User Type Created Successfully!');
        // ->with('Success', 'User Type Created Successfully.')
        return redirect()->route('usertype.index')->with('success', 'User Type Created Successfully.');
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
        $usertype = usertype::find($id);
        return view('usertype.editform', compact('usertype'));
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
            'user_type' => 'required',
            'is_active' => 'required'
        ]);

        $usertype =  usertype::find($id);

        $usertype->user_type = $request->get('user_type');
        $usertype->is_active = $request->get('is_active');

        $usertype->update();
        // alert()->success('success','Lorem ipsum dolor sit amet.')->position('center');

        return redirect()->route('usertype.index')
            ->with('success', 'User Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $usertype =  usertype::find($id);

        $usertype->is_delete = 1;
        // $screensection->delete();

        $usertype->update();


        return redirect()->route('usertype.index')
            ->with('success', 'User Type Deleted successfully');
    }
}
