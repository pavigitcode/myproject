<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\officerregistration;
use DB;

class officerRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('unique_id') == '') {
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');
        }
        $user_type = session()->get('usertype_id');
        $user_division_id = session()->get('division_id');

        if ($user_type == '62c80e7c2536911885' || $user_type == '62c80e8cac02318910' || $user_type == '63b4fd095bf7675259') {
            $officeregistration = DB::table('officer_registration')
                ->Join('division_creation', 'officer_registration.off_division_name', 'division_creation.unique_id')
                ->Join('designation_creation', 'officer_registration.off_designation_name', 'designation_creation.unique_id')
                // ->Join('roving_squad', 'officer_registration.roving_squad_unique_id', 'roving_squad.unique_id')
                ->select('officer_registration.*', 'division_creation.division_name', 'designation_creation.designation_name')
                ->where('officer_registration.is_delete', 0)
                ->latest()->paginate();
            return view('officeregistration.list', compact('officeregistration'))->with('i', (request()->input('page', 1) - 1) * 10);
        } else if ($user_type == '62b55fe64789d40213') {
            $officeregistration = DB::table('officer_registration')
                ->Join('division_creation', 'officer_registration.off_division_name', 'division_creation.unique_id')
                ->Join('designation_creation', 'officer_registration.off_designation_name', 'designation_creation.unique_id')
                // ->Join('roving_squad', 'officer_registration.roving_squad_unique_id', 'roving_squad.unique_id')
                ->select('officer_registration.*', 'division_creation.division_name', 'designation_creation.designation_name')
                ->where('officer_registration.is_delete', 0)
                ->where('division_creation.unique_id', $user_division_id)
                ->latest()->paginate();

                // 'roving_squad.roving_squad_number'
            return view('officeregistration.list', compact('officeregistration'))->with('i', (request()->input('page', 1) - 1) * 10);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session('unique_id') == '') {
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');
        }
        return view('officeregistration.form');
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
            'officer_name' => 'required',
            'gpf_cps_no' => 'required',
            'off_division_name' => 'required',
            'off_designation_name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'is_active' => 'required'
        ]);
        $officeregistrationData = officerregistration::where('mobile_no', $request->mobile_no)->where('email', $request->email)->first();
        // return $officeregistrationData;
        if($officeregistrationData== '') {
            //model name
            $officeregistrations = new officerregistration;

            $officeregistrations->officer_name = $request->officer_name;
            $officeregistrations->gpf_cps_no = $request->gpf_cps_no;
            $officeregistrations->off_division_name = $request->off_division_name;
            $officeregistrations->off_designation_name = $request->off_designation_name;
            // $officeregistrations->roving_squad_unique_id = $request->roving_squad_unique_id;
            $officeregistrations->mobile_no = $request->mobile_no;
            $officeregistrations->email = $request->email;
            $officeregistrations->password = $request->password;
            $officeregistrations->confirm_password = $request->confirm_password;
            $officeregistrations->is_active = $request->is_active;
            $officeregistrations->unique_id = unique_id($prefix);

            $officeregistrations->save();

            return redirect()->route('officeregistration.index')->with('success', 'Officer Registration Created Successfully.');
        } else {
            return redirect()->route('officeregistration.create')->with('error', 'Already exit Mobile no or Email');
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
        if (session('unique_id') == '') {
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');
        }
        $officeregistration = officerregistration::find($id);
        return view('officeregistration.editform', compact('officeregistration'));
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
            'officer_name' => 'required',
            'gpf_cps_no' => 'required',
            'off_division_name' => 'required',
            'off_designation_name' => 'required',
            'mobile_no' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'is_active' => 'required'
        ]);
        $officeregistrationData = officerregistration::where('mobile_no', $request->mobile_no)->where('is_delete', 0)->orwhere('email', $request->email)->first();
        // return $screenData;
        if($officeregistrationData){
            // return $officeregistrationData;
            if($officeregistrationData->id == $id){
            officerregistration::where('id', $id)->update([
                'officer_name' => $request->get('officer_name'),
                'gpf_cps_no' => $request->get('gpf_cps_no'),
                'off_division_name' => $request->get('off_division_name'),
                'off_designation_name' => $request->get('off_designation_name'),
                // 'roving_squad_unique_id' => $request->get('roving_squad_unique_id'),
                'mobile_no' => $request->get('mobile_no'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'confirm_password' => $request->get('confirm_password'),
                'is_active' => $request->get('is_active'),

            ]);


            // $officerregistration =  officerregistration::find($id);

            // $officerregistration->officer_name = $request->get('officer_name');
            // $officerregistration->gpf_cps_no = $request->get('gpf_cps_no');
            // $officerregistration->off_division_name = $request->get('off_division_name');
            // $officerregistration->off_designation_name = $request->get('off_designation_name');
            // $officerregistration->roving_squad_unique_id = $request->get('roving_squad_unique_id');
            // $officerregistration->mobile_no = $request->get('mobile_no');
            // $officerregistration->email = $request->get('email');
            // $officerregistration->is_active = $request->get('is_active');


            // $officerregistration->update();
            // alert()->success('success','Lorem ipsum dolor sit amet.')->position('center');

            return redirect()->route('officeregistration.index')
                ->with('success', 'Office Registration updated successfully');
        } else {
            return redirect()->route('officeregistration.edit',$id)
                ->with('error', 'Already exit Mobile no or Email');
        }
    }
    else if(!$officeregistrationData){
        officerregistration::where('id', $id)->update([
            'officer_name' => $request->get('officer_name'),
            'gpf_cps_no' => $request->get('gpf_cps_no'),
            'off_division_name' => $request->get('off_division_name'),
            'off_designation_name' => $request->get('off_designation_name'),
            // 'roving_squad_unique_id' => $request->get('roving_squad_unique_id'),
            'mobile_no' => $request->get('mobile_no'),
            'email' => $request->get('email'),
            'is_active' => $request->get('is_active'),

            ]);
                return redirect()->route('officeregistration.index')
                ->with('success', 'Office Registration updated successfully');
            
    } else{
        return redirect()->route('officeregistration.edit',$id)
        ->with('error', 'Already exit ,Mobile no or Email');
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
        $officerregistration =  officerregistration::find($id);

        $officerregistration->is_delete = 1;
        // $screensection->delete();
        $officerregistration->update();

        return redirect()->route('officeregistration.index')
            ->with('success', 'Office Registration Deleted successfully');
    }
}
