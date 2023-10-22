<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class commodityWiseReportFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(session('unique_id') ==''){
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');
            
        }
        
        $start = $request->from_date;
        $end = $request->to_date;
        
        $hsn_code = $request->hsn_code;
        $offense_section = $request->offense_section;
        $intelligence_division = $request->intelligence_division;
        $roving_squad_no = $request->roving_squad_no;
        
        if($start){
            $action =  $start;
        }
        
        if($hsn_code){
            $action = $hsn_code;
            
        }if($offense_section){
            $action = $offense_section;
        }
        if($intelligence_division){
            $action = $intelligence_division;
        }
        if($roving_squad_no){
            $action = $roving_squad_no;
        }
        // else{
        //     $action = '';
        // }
        // dd($action);
        // switch($action)
        switch ($action) {
           
            case $start:
                
                $commodity_filter = DB::table('view_commodity')
                ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start]])
                ->get();
                // dd($commodity_filter);
                $jsonResponse = json_encode(["commodity_filter" => $commodity_filter]);
                // dd($jsonResponse);
                echo $jsonResponse;
                
                // $where
        
                break;
            case $end && $start && $request->hsn_code && $request->offense_section && $request->intelligence_division && $request->roving_squad_no:
                $commodity_filter = DB::table('view_commodity')
                ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['hsn_code_unique', '=', $request->hsn_code],['offense_section_unique', '=', $request->offense_section],['intelligence_division', '=', $request->intelligence_division],['roving_squad_no', '=', $request->roving_squad_no]])
                ->get();
                $jsonResponse = json_encode(["commodity_filter" => $commodity_filter]);
                // dd($jsonResponse);
                echo $jsonResponse;
                
                // $where
        
                break;
                case $end && $start && $request->hsn_code && $request->offense_section && $request->intelligence_division:
                    $commodity_filter = DB::table('view_commodity')
                    ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['hsn_code_unique', '=', $request->hsn_code],['offense_section_unique', '=', $request->offense_section],['intelligence_division', '=', $request->intelligence_division]])
                    ->get();
                    $jsonResponse = json_encode(["commodity_filter" => $commodity_filter]);
                    // dd($jsonResponse);
                    echo $jsonResponse;
                    
                    // $where
            
                    break;
                    
                    
                    case $end && $start && $request->hsn_code && $request->offense_section:
                        $commodity_filter = DB::table('view_commodity')
                        ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['hsn_code_unique', '=', $request->hsn_code],['offense_section_unique', '=', $request->offense_section]])
                        
                        ->get();
                        $jsonResponse = json_encode(["commodity_filter" => $commodity_filter]);
                        // dd($jsonResponse);
                        echo $jsonResponse;
                        
                        // $where
                
                        break;
                        case $end && $start && $request->intelligence_division &&  $request->roving_squad_no :
                            $commodity_filter = DB::table('view_commodity')
                            ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['intelligence_division', '=', $request->intelligence_division],['roving_squad_no', '=', $request->roving_squad_no]])
                            
                            ->get();
                            $jsonResponse = json_encode(["commodity_filter" => $commodity_filter]);
                            // dd($jsonResponse);
                            echo $jsonResponse;
                            
                            // $where
                    
                            break;
                            case $end && $start && $request->offense_section :
                                $commodity_filter = DB::table('view_commodity')
                                ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['offense_section_unique', '=', $request->offense_section]])
                                ->get();
                                $jsonResponse = json_encode(["commodity_filter" => $commodity_filter]);
                                // dd($jsonResponse);
                                echo $jsonResponse;
                                
                                // $where
                        
                                break;
                case $end && $start && $request->hsn_code:
                    
        $commodity_filter = DB::table('view_commodity')
        ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['hsn_code_unique', '=', $request->hsn_code]])
                    
                    ->get();
                    $jsonResponse = json_encode(["commodity_filter" => $commodity_filter]);
                    // dd($jsonResponse);
                    echo $jsonResponse;
                    
                    // $where
            
                    break;
                    
                    case $end && $start &&  $request->offense_section:
                        $commodity_filter = DB::table('view_commodity')
                        ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['hsn_code_unique', '=', $request->hsn_code]])
                        // ->where('hsn_code_unique', '=', $request->hsn_code)
                        ->get();
                        $jsonResponse = json_encode(["commodity_filter" => $commodity_filter]);
                        // dd($jsonResponse);
                        echo $jsonResponse;
                        
                        // $where
                
                        break;
                        case $end && $start &&  $request->roving_squad_no:
                            $commodity_filter = DB::table('view_commodity')
                            ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start]])
                            ->where('roving_squad_no', '=', $request->roving_squad_no)
                            ->get();
                            $jsonResponse = json_encode(["commodity_filter" => $commodity_filter]);
                            // dd($jsonResponse);
                            echo $jsonResponse;
                            
                            // $where
                    
                            break;
                            case $end && $start && $request->intelligence_division :
                                $commodity_filter = DB::table('view_commodity')
                                ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start]])
                                
                                ->where('intelligence_division', '=', $request->intelligence_division)
                                
                                ->get();
                                $jsonResponse = json_encode(["commodity_filter" => $commodity_filter]);
                                // dd($jsonResponse);
                                echo $jsonResponse;
                                
                                // $where
                        
                                break;
                default:
        
                break;
        
        
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
