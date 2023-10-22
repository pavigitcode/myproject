<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usercreation;
use Illuminate\Support\Facades\Storage;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // session_start();
        if(session('unique_id') ==''){
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');
            
        }
        $user_type = session('usertype_id');
        $user_division_id = session('division_id');
        // $user_div_name = ;
// session('division_id');
        // dd(session()->get('division_id'));

        if($user_type == '62c80e7c2536911885' || $user_type == '62c80e8cac02318910' || $user_type == '63b4fd095bf7675259' ){
            $screenvalues = DB::table('user_creation')
            ->Join('user_type', 'user_creation.user_type', 'user_type.unique_id')
            ->Join('division_creation', 'user_creation.div_name', 'division_creation.unique_id')
            ->Join('designation_creation', 'user_creation.design_name','designation_creation.unique_id')
            ->select('user_creation.*','user_type.user_type','division_creation.division_name','designation_creation.designation_name')
            ->where('user_creation.is_delete',0)
            ->get();
             // $rovingsquads = rovingsquad::where('is_delete', 0)->latest()->paginate();
            //  dd($screenvalues);
             return view('usercreation.user_creation_list', compact('screenvalues'))->with('i', (request()->input('page', 1) - 1) * 10);
        }
        else if($user_type == '62b55fe64789d40213'){
            // dd('hi prabu');
            $screenvalues = DB::table('user_creation')
            ->Join('user_type', 'user_creation.user_type', 'user_type.unique_id')
            ->Join('division_creation', 'user_creation.div_name', 'division_creation.unique_id')
            ->Join('designation_creation', 'user_creation.design_name','designation_creation.unique_id')
            ->select('user_creation.*','user_type.user_type','division_creation.division_name','designation_creation.designation_name')
            ->where('user_creation.is_delete','=',0)
            ->where('division_creation.unique_id','=',$user_division_id)
            ->get();
             // $rovingsquads = rovingsquad::where('is_delete', 0)->latest()->paginate();
             return view('usercreation.user_creation_list', compact('screenvalues'))->with('i', (request()->input('page', 1) - 1) * 10);
        }
        else{
            // dd('hi prabu');
            $screenvalues = DB::table('user_creation')
            ->Join('user_type', 'user_creation.user_type', 'user_type.unique_id')
            ->Join('division_creation', 'user_creation.div_name', 'division_creation.unique_id')
            ->Join('designation_creation', 'user_creation.design_name','designation_creation.unique_id')
            ->select('user_creation.*','user_type.user_type','division_creation.division_name','designation_creation.designation_name')
            ->where('user_creation.is_delete','=',0)
            ->where('division_creation.unique_id','=',$user_division_id)
            ->get();
             // $rovingsquads = rovingsquad::where('is_delete', 0)->latest()->paginate();
             return view('usercreation.user_creation_list', compact('screenvalues'))->with('i', (request()->input('page', 1) - 1) * 10);
        }

         //folder name.file name
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
        return view('usercreation.user_creation_form');
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
            'staff_name' => 'required',
            'staff_id' => 'required',
            'mobile_no' => 'required',
            'email_id' => 'required',
            'design_name' => 'required',
             'div_name' => 'required',
            'user_type' => 'required',
            'user_name' => 'required',
            // 'password' => 'required',
            'confirm_password' => 'required',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            // 'confirm_password' => 'min:6',

            'is_active' => 'required'
        ]);

        $usercreationData = usercreation::where('mobile_no',$request->mobile_no)->where('is_delete',0)->orwhere('email_id',$request->email_id)->first();
        // return $screenData;
        if($usercreationData == ''){
        $section = new usercreation;
        $section->staff_name = $request->staff_name;
        $section->staff_id = $request->staff_id;
        $section->design_name = $request->design_name;
        $section->div_name = $request->div_name;
        $section->mobile_no = $request->mobile_no;
        $section->email_id = $request->email_id;

        if ($file = $request->file('file')) {
            $destinationPath = 'uploads/';
            $profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $profileImage);
            $input['file'] = $profileImage;
            $section->image_upload = $profileImage;
        }
        $section->user_type = $request->user_type;
        $section->user_name = $request->user_name;
        $section->password = $request->password;
        $section->confirm_password = $request->confirm_password;
        $section->new_user = 1;
        $section->is_active = $request->is_active;
        $section->unique_id = unique_id($prefix);


        $section->save();
        return redirect()->route('usercreation.index')->with('success', 'User Created Successfully.');
    }
        else{
            return redirect()->route('usercreation.create')
            ->with('error', 'Already exit mobile no or email id');
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
        $usercreation = usercreation::findOrfail($id);
        return view('usercreation.user_creationedit', compact('usercreation'));

    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'staff_name' => 'required',
            'staff_id' => 'required',
            'mobile_no' => 'required',
            'email_id' => 'required',
            // 'file' => 'required',
            'user_type' => 'required',
            'user_name' => 'required',
            // 'password' => 'required',
            'confirm_password' => 'required',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            // 'confirm_password' => 'min:6',
            'is_active' => 'required'

        ]);

        $usercreation = usercreation::where('email_id',$request->email_id)->orWhere('mobile_no',$request->mobile_no)->first();
        if ($file = $request->file('file')) {
            $file = $request->file('file');
             $destinationPath = 'uploads/';
            $name = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $name);
            $usercreation->image_upload = $name;

         }
        
        if($usercreation){
           
            // return $designation_data;
            if($usercreation->id == $id){
               
                //  usercreation::where('id', $id)->update([
                // 'staff_name' => $request->get('staff_name'),
                // 'staff_id' => $request->get('staff_id'),
                // 'design_name' => $request->get('design_name'),
                // 'div_name' => $request->get('div_name'),
                // 'mobile_no' => $request->get('mobile_no'),
                // 'email_id' => $request->get('email_id'),
                // 'user_type' => $request->get('user_type'),
                // 'user_name' => $request->get('user_name'),
                // 'password' => $request->get('password'),
                // 'confirm_password' => $request->get('confirm_password'),
                // 'is_active' => $request->get('is_active'),
                // // 'image_upload' => $request->get('file'),

                // ]);
        
               
        $usercreation->staff_name = $request->get('staff_name');
        $usercreation->staff_id = $request->get('staff_id');
        $usercreation->design_name = $request->get('design_name');
        $usercreation->div_name = $request->get('div_name');
        $usercreation->mobile_no = $request->get('mobile_no');
        $usercreation->email_id = $request->get('email_id');
        $usercreation->user_type = $request->get('user_type');
        $usercreation->user_name = $request->get('user_name');
        $usercreation->password = $request->get('password');
        $usercreation->confirm_password = $request->get('confirm_password');
        $usercreation->is_active = $request->get('is_active');

        $usercreation->save();

            return redirect()->route('usercreation.index')
                ->with('success', 'User updated successfully');
            }else{
                return redirect()->route('usercreation.edit',$id)
                ->with('error', 'Already exit User EMail or Phone no');
            }
        }else if(!$usercreation){
            usercreation::where('id', $id)->update([
                'staff_name' => $request->get('staff_name'),
                'staff_id' => $request->get('staff_id'),
                'design_name' => $request->get('design_name'),
                'div_name' => $request->get('div_name'),
                'mobile_no' => $request->get('mobile_no'),
                'email_id' => $request->get('email_id'),
                'user_type' => $request->get('user_type'),
                'user_name' => $request->get('user_name'),
                'password' => $request->get('password'),
                'confirm_password' => $request->get('confirm_password'),
                'is_active' => $request->get('is_active'),
                // 'image_upload' => $request->get('file'),

                ]);
                
                    return redirect()->route('usercreation.index')
                        ->with('success', 'User updated successfully');
                
        } else{
            return redirect()->route('usercreation.edit',$id)
            ->with('error', 'Already exit User EMail or Phone no');
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
        $usercreation = usercreation::find($id);

        $usercreation->is_delete = 1;
        // $screensection->delete();

        $usercreation->update();
        // $usercreation->delete();

        return redirect()->route('usercreation.index')
            ->with('success', 'User Deleted successfully');
        //user_creation_list
    }
}
