<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\screensection;
use DB;


class screenSectionLinkController extends Controller
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
        // // $data = DB::table('screen_sections')->join('user_screen_main', 'screen_sections.main_screen_unique_id', '=', 'user_screen_main.unique_id') ->select('screen_sections.*', 'user_screen_main.screen_main_name')->get();

        // $usersDetails = DB::table('users')
        // ->join('contacts', 'users.id', '=', 'contacts.user_id')// joining the contacts table , where user_id and contact_user_id are same
        // ->select('users.*', 'contacts.phone')
        // ->get();
        // $data = DB::table(DB::raw("({$overAll->toSql()}) AS p"))
        //     ->mergeBindings($overAll)
        //     ->select('name', 'address')
        //     ->paginate(10);

        // dd($data);
        $user_type = session()->get('usertype_id');
        $user_division_id = session()->get('division_id');
        if ($user_type == '62c80e7c2536911885' || $user_type == '62c80e8cac02318910' || $user_type == '63b4fd095bf7675259') {

            $screenvalues = screensection::where('is_delete', 0)->latest()->paginate();
            return view('screen_section.screen_section_list', compact('screenvalues'))->with('i', (request()->input('page', 1) - 1) * 10);
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
        return view('screen_section.screen_section_form');
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
        $perfix1 = "screen";
        $request->validate([
            'screen_name' => 'required',
            'order_no' => 'required',
            'is_active' => 'required',
            // 'description' => 'required'
        ]);

        $screenData = screensection::where('screen_main_name',$request->screen_name)->where('is_delete',0)->orwhere('order_no',$request->order_no)->first();


        // return $screenData;
        if($screenData == ''){

        $section = new screensection;

        $section->screen_main_name = $request->screen_name;
        $section->order_no = $request->order_no;
        // $section->main_screen_unique_id = $request->main_screen_unique_id;
        $section->icon_name = $request->icon;
        $section->is_active = $request->is_active;
        $section->description = $request->description;
        $section->unique_id = unique_id($prefix);
        $section->screen_type_unique_id = unique_id($perfix1);
        $section->save();

        return redirect()->route('screensectionadd.index')->with('success', 'Screen Section Created Successfully.');
        }else{
            return redirect()->route('screensectionadd.create')
            ->with('error', 'Already exit order no or screen name');
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
        $screensection = screensection::findOrfail($id);
        return view('screen_section.screensectionedit', compact('screensection'));
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
            'screen_name' => 'required',
            'order_no' => 'required',
            'is_active' => 'required',
            // 'description' => 'required'

        ]);

        $screenData = screensection::where('screen_main_name',$request->screen_name)->orwhere('order_no',$request->order_no)->first();

        if($screenData){

            if($screenData->id == $id){
                screensection::where('id', $id)->update([
                    'screen_main_name' => $request->get('screen_name'),
                    'order_no' => $request->get('order_no'),
                    'is_active' => $request->get('is_active'),
                    'description' =>$request->get('description'),
    
                ]);
                return redirect()->route('screensectionadd.index')
                ->with('success', 'Screen section updated successfully');
            }else{
                return redirect()->route('screensectionadd.edit',$id)
                ->with('error', 'Already exit order no or screen name');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $screensection =  screensection::find($id);
        $screensection->is_delete = 1;
        // $screensection->delete();

        $screensection->update();
        return redirect()->route('screensectionadd.index')
            ->with('success', 'Screen Section Deleted successfully');
    }
}
