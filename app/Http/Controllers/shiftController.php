<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shift;


class shiftController extends Controller
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
        $shifts = shift::where('is_delete', 0)->latest()->paginate();
        return view('shift.list', compact('shifts'))->with('i', (request()->input('page', 1) - 1) * 10);
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
        return view('shift.form');
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
            'shift_name' => 'required',
            'from_time' => 'required',
            'to_time' => 'required',
            'is_active' => 'required',
            'description' => 'required'
        ]);


        $shiftData = shift::where('shift_name',$request->shift_name)->where('is_delete',0)->where('from_time',$request->from_time)->where('to_time',$request->to_time)->first();

        // return $screenData;
        if($shiftData == ''){
        $shift = new shift;

        $shift->shift_name = $request->shift_name;
        $shift->from_time = $request->from_time;
        $shift->to_time = $request->to_time;
        $shift->is_active = $request->is_active;
        $shift->description = $request->description;

        $shift->unique_id = unique_id($prefix);

        $shift->save();
        // Alert::Success('Congrats', 'You\'ve Successfully Registered');

        // SweetAlert::message('User Type Created Successfully!');
        // ->with('Success', 'User Type Created Successfully.')
        return redirect()->route('shift.index')->with('success', 'Shift Created Successfully.');
    }else{
        return redirect()->route('shift.create')
        ->with('error', 'Already exit shift_name  or from time or to time');
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
        $shift = shift::find($id);
        return view('shift.update', compact('shift'));
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
            'shift_name' => 'required',
            'from_time'  => 'required',
            'to_time' => 'required',
            // 'description' => 'required',
            'is_active' => 'required'
        ]);
        $shiftData = shift::where('shift_name',$request->shift_name)->orwhere('from_time',$request->from_time)->orwhere('to_time',$request->to_time)->first();

        // return $screenData;
        if($shiftData){
            
            if($shiftData->id == $id){
                shift::where('id', $id)->update([
                'shift_name' => $request->screen_name,
                'from_time' => $request->order_no,
                'to_time' => $request->is_active,
                'description' =>$request->description,
                'is_active' =>$request->is_active,
            ]);

        return redirect()->route('shift.index')
            ->with('success', 'Shift updated successfully');
        }else{
            shift::where('id', $id)->update([
                'shift_name' => $request->screen_name,
                'from_time' => $request->order_no,
                'to_time' => $request->is_active,
                'description' =>$request->description,
                'is_active' =>$request->is_active,
            ]);
        }
        // else{
        //     return redirect()->route('shift.edit',$id)
        //     ->with('error', 'Already exit shift_name  or from time or to time');
        // }
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return $id;
        $shift =  shift::find($id);

        $shift->is_delete = 1;
        // $screensection->delete();

        $shift->update();


        return redirect()->route('shift.index')
            ->with('success', 'Shift Deleted successfully');
    }
}
