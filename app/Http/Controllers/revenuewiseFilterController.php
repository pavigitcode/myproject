<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class revenuewiseFilterController extends Controller
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
            return redirect('logn')->with('error', 'Session Expired!. Please Login again.');
            
        }

        $start = $request->from_date;
        $end = $request->to_date;

        $nature_of_the_offense = $request->nature_of_the_offense;
        $offense_section = $request->offense_section;
        $intelligence_division = $request->intelligence_division;
        $roving_squad_no = $request->roving_squad_no;

        if($start){
            $action =  $start;
        }

        if($nature_of_the_offense){
            $action = $nature_of_the_offense;
            
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
                
                $revenue_reports = DB::table('view_revenuwise')
                ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start]])
                ->get();
                // dd($revenue_reports);
                $jsonResponse = json_encode(["revenue_reports" => $revenue_reports]);
                // dd($jsonResponse);
                echo $jsonResponse;
                
                // $where
        
                break;
            case $end && $start && $request->nature_of_the_offense && $request->offense_section && $request->intelligence_division && $request->roving_squad_no:
                $revenue_reports = DB::table('view_revenuwise')
                ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['nature_of_the_offense', '=', $request->nature_of_the_offense],['offense_section_unique', '=', $request->offense_section],['intelligence_division', '=', $request->intelligence_division],['roving_squad_no', '=', $request->roving_squad_no]])
                ->get();
                $jsonResponse = json_encode(["revenue_reports" => $revenue_reports]);
                // dd($jsonResponse);
                echo $jsonResponse;
                
                // $where
        
                break;
                case $end && $start && $request->nature_of_the_offense && $request->offense_section && $request->intelligence_division:
                    $revenue_reports = DB::table('view_revenuwise')
                    ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['nature_of_the_offense', '=', $request->nature_of_the_offense],['offense_section_unique', '=', $request->offense_section],['intelligence_division', '=', $request->intelligence_division]])
                    ->get();
                    $jsonResponse = json_encode(["revenue_reports" => $revenue_reports]);
                    // dd($jsonResponse);
                    echo $jsonResponse;
                    
                    // $where
            
                    break;
                    case $end && $start && $request->nature_of_the_offense && $request->offense_section:
                        $revenue_reports = DB::table('view_revenuwise')
                        ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['nature_of_the_offense', '=', $request->nature_of_the_offense],['offense_section_unique', '=', $request->offense_section]])
                        
                        ->get();
                        $jsonResponse = json_encode(["revenue_reports" => $revenue_reports]);
                        // dd($jsonResponse);
                        echo $jsonResponse;
                        
                        // $where
                
                        break;
                        case $end && $start && $request->roving_squad_no && $request->intelligence_division:
                            $revenue_reports = DB::table('view_revenuwise')
                            ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['intelligence_division', '=', $request->intelligence_division],['roving_squad_no', '=', $request->roving_squad_no]])
                            
                            ->get();
                            $jsonResponse = json_encode(["revenue_reports" => $revenue_reports]);
                            // dd($jsonResponse);
                            echo $jsonResponse;
                            
                            // $where
                    
                            break;
                case $end && $start && $request->nature_of_the_offense:
                    
                    $revenue_reports = DB::table('view_revenuwise')
                    ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['nature_of_the_offense', '=', $request->nature_of_the_offense]])
                    
                    ->get();
                    $jsonResponse = json_encode(["revenue_reports" => $revenue_reports]);
                    // dd($jsonResponse);
                    echo $jsonResponse;
                    
                    // $where
            
                    break;
                    
                    case $end && $start &&  $request->offense_section:
                        $revenue_reports = DB::table('view_revenuwise')
                        ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['nature_of_the_offense', '=', $request->nature_of_the_offense]])
                        // ->where('nature_of_the_offense', '=', $request->nature_of_the_offense)
                        ->get();
                        $jsonResponse = json_encode(["revenue_reports" => $revenue_reports]);
                        // dd($jsonResponse);
                        echo $jsonResponse;
                        
                        // $where
                
                        break;
                        case $end && $start &&  $request->roving_squad_no:
                            $revenue_reports = DB::table('view_revenuwise')
                            ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start]])
                            ->where('roving_squad_no', '=', $request->roving_squad_no)
                            ->get();
                            $jsonResponse = json_encode(["revenue_reports" => $revenue_reports]);
                            // dd($jsonResponse);
                            echo $jsonResponse;
                            
                            // $where
                    
                            break;
                            case $end && $start && $request->intelligence_division :
                                $revenue_reports = DB::table('view_revenuwise')
                                ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start]])
                                
                                ->where('intelligence_division', '=', $request->intelligence_division)
                                
                                ->get();
                                $jsonResponse = json_encode(["revenue_reports" => $revenue_reports]);
                                // dd($jsonResponse);
                                echo $jsonResponse;
                                
                                // $where
                        
                                break;
                default:
        
                break;
        

    }
    // $revenue_reports = DB::table('view_revenuwise')
    //             ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],$where])
    //             // ->where('nature_of_the_offense', '=', $request->nature_of_the_offense)
    //             // ->where('offense_section_unique', '=', $request->offense_section)
    //             // ->where('intelligence_division', '=', $request->intelligence_division)
    //             // ->where('roving_squad_no', '=', $request->roving_squad_no)
    //             ->get();
  
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
