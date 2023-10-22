<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\rovingsquad;

class rovingsquadlistController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        if($request->intelligence_division == ""){

       
            $roving_names = rovingsquad::where('is_delete', 0)->get();
    
            $data = array("roving_names" => $roving_names);
            $jsonResponse = json_encode($data);
            echo $jsonResponse;
        }else{
            $roving_names = rovingsquad::where('roving_division_name', $request->intelligence_division)->get();
    
            $data = array("roving_names" => $roving_names);
            $jsonResponse = json_encode($data);
            echo $jsonResponse;
    
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $squad_list = rovingsquad::where('is_delete', 0)->get(['unique_id','roving_squad_number']);
        // dd($squad_list);
        return $this->sendResponse($squad_list);
        // dd('hi');

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
