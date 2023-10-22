<?php

namespace App\Http\Controllers;

use App\Models\rovingsquad;
use DB;
use Illuminate\Http\Request; 

class rovingsquadController extends Controller
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
        $user_type = session()->get('usertype_id');
        $user_division_id = session()->get('division_id');
        if($user_type == '62c80e7c2536911885' || $user_type == '62c80e8cac02318910' || $user_type == '63b4fd095bf7675259' ){
            $rovingsquads = DB::table('roving_squad')
            ->Join('division_creation', 'roving_squad.roving_division_name', 'division_creation.unique_id')
            ->select('roving_squad.*','division_creation.division_name')
            ->where('roving_squad.is_delete', 0)
            ->latest()->paginate();

            return view('rovingsquad.list', compact('rovingsquads'))->with('i', (request()->input('page', 1) - 1) * 10);
        }
        else if($user_type == '62b55fe64789d40213'){
            $rovingsquads = DB::table('roving_squad')
            ->Join('division_creation', 'roving_squad.roving_division_name', 'division_creation.unique_id')
            ->select('roving_squad.*','division_creation.division_name')
            ->where('roving_squad.is_delete', 0)
            ->where('division_creation.unique_id', $user_division_id)
            ->latest()->paginate();

            return view('rovingsquad.list', compact('rovingsquads'))->with('i', (request()->input('page', 1) - 1) * 10);

        }

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rovingsquad.addform');
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
            'roving_division_name' => 'required',
            'area_name' => 'required',
            'roving_squad_number' => 'required',
            'description' => 'required',
            'is_active' => 'required'
        ]);

        $rovingsquad_data = rovingsquad::where('area_name',$request->area_name)->where('is_delete',0)->first();

        if($rovingsquad_data == '')
        {
        $rovingsquad = new rovingsquad;
        $rovingsquad->roving_division_name = $request->roving_division_name;
        $rovingsquad->area_name = $request->area_name;
        $rovingsquad->roving_squad_number = $request->roving_squad_number;
        $rovingsquad->description = $request->description;
        $rovingsquad->is_active = $request->is_active;
        $rovingsquad->unique_id = unique_id($prefix);
        $rovingsquad->save();
        return redirect()->route('rovingsquad_creation.index')->with('success', 'Roving Squad Created Successfully.');

    }
    else
    {
        return redirect()->route('rovingsquad_creation.create')
        ->with('error', 'Area name already exits ');
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
        dd('hello');
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
        $rovingsquad = rovingsquad::findOrfail($id);
        return view('rovingsquad.editform', compact('rovingsquad'));

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
            'roving_division_name' => 'required',
            'area_name' => 'required',
            'roving_squad_number' => 'required',
            'description' => 'required',
            'is_active' => 'required'

        ]);

        $rovingsquad_data = rovingsquad::where('area_name',$request->area_name)->first();

        if($rovingsquad_data){

            if($rovingsquad_data->id == $id){
                rovingsquad::where('id', $id)->update([

        'roving_division_name' => $request->get('roving_division_name'),
        'area_name' => $request->get('area_name'),
        'roving_squad_number' => $request->get('roving_squad_number'),
        'description' => $request->get('description'),
        'is_active' => $request->get('is_active'),
    ]);
        // $roving->save();
        return redirect()->route('rovingsquad_creation.index')
            ->with('success', 'Roving Squad updated successfully');
    }
    else
    {
        return redirect()->route('rovingsquad_creation.edit',$id)
        ->with('error', 'Area name already exits ');
    }
}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $rovingsquad =  rovingsquad::find($id);

        $rovingsquad->is_delete = 1;
        // $screensection->delete();

        $rovingsquad->update();

        return redirect()->route('rovingsquad_creation.index')
            ->with('success', 'Roving Squad Deleted successfully');


    }
}
