<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use DB;

class natureOfOffenseController extends Controller
{
    public function index(Request $request)
    {
        if(session('unique_id') ==''){
            \Auth::logout();
            session()->flush();
            return redirect('login')->with('error', 'Session Expired!. Please Login again.');
            
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
                
                $nature_of_offence = DB::table('view_nature_of_offence')
                ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start]])
                ->get();
                // dd($nature_of_offence);
                $jsonResponse = json_encode(["nature_of_offence" => $nature_of_offence]);
                // dd($jsonResponse);
                echo $jsonResponse;
                
                // $where
        
                break;
            case $end && $start && $request->nature_of_the_offense && $request->offense_section && $request->intelligence_division && $request->roving_squad_no:
                $nature_of_offence = DB::table('view_nature_of_offence')
                ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['nature_of_the_offense', '=', $request->nature_of_the_offense],['offense_section_unique', '=', $request->offense_section],['intelligence_division', '=', $request->intelligence_division],['roving_squad_no', '=', $request->roving_squad_no]])
                ->get();
                $jsonResponse = json_encode(["nature_of_offence" => $nature_of_offence]);
                // dd($jsonResponse);
                echo $jsonResponse;
                
                // $where
        
                break;
                case $end && $start && $request->nature_of_the_offense && $request->offense_section && $request->intelligence_division:
                    $nature_of_offence = DB::table('view_nature_of_offence')
                    ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['nature_of_the_offense', '=', $request->nature_of_the_offense],['offense_section_unique', '=', $request->offense_section],['intelligence_division', '=', $request->intelligence_division]])
                    ->get();
                    $jsonResponse = json_encode(["nature_of_offence" => $nature_of_offence]);
                    // dd($jsonResponse);
                    echo $jsonResponse;
                    
                    // $where
            
                    break;
                    case $end && $start && $request->nature_of_the_offense && $request->offense_section:
                        $nature_of_offence = DB::table('view_nature_of_offence')
                        ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['nature_of_the_offense', '=', $request->nature_of_the_offense],['offense_section_unique', '=', $request->offense_section]])
                        
                        ->get();
                        $jsonResponse = json_encode(["nature_of_offence" => $nature_of_offence]);
                        // dd($jsonResponse);
                        echo $jsonResponse;
                        
                        // $where
                
                        break;
                        case $end && $start && $request->roving_squad_no && $request->intelligence_division:
                            $nature_of_offence = DB::table('view_nature_of_offence')
                            ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['intelligence_division', '=', $request->intelligence_division],['roving_squad_no', '=', $request->roving_squad_no]])
                            
                            ->get();
                            $jsonResponse = json_encode(["nature_of_offence" => $nature_of_offence]);
                            // dd($jsonResponse);
                            echo $jsonResponse;
                            
                            // $where
                    
                            break;
                case $end && $start && $request->nature_of_the_offense:
                    
                    $nature_of_offence = DB::table('view_nature_of_offence')
                    ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['nature_of_the_offense', '=', $request->nature_of_the_offense]])
                    
                    ->get();
                    $jsonResponse = json_encode(["nature_of_offence" => $nature_of_offence]);
                    // dd($jsonResponse);
                    echo $jsonResponse;
                    
                    // $where
            
                    break;
                    
                    case $end && $start &&  $request->offense_section:
                        $nature_of_offence = DB::table('view_nature_of_offence')
                        ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],['nature_of_the_offense', '=', $request->nature_of_the_offense]])
                        // ->where('nature_of_the_offense', '=', $request->nature_of_the_offense)
                        ->get();
                        $jsonResponse = json_encode(["nature_of_offence" => $nature_of_offence]);
                        // dd($jsonResponse);
                        echo $jsonResponse;
                        
                        // $where
                
                        break;
                        case $end && $start &&  $request->roving_squad_no:
                            $nature_of_offence = DB::table('view_nature_of_offence')
                            ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start]])
                            ->where('roving_squad_no', '=', $request->roving_squad_no)
                            ->get();
                            $jsonResponse = json_encode(["nature_of_offence" => $nature_of_offence]);
                            // dd($jsonResponse);
                            echo $jsonResponse;
                            
                            // $where
                    
                            break;
                            case $end && $start && $request->intelligence_division :
                                $nature_of_offence = DB::table('view_nature_of_offence')
                                ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start]])
                                
                                ->where('intelligence_division', '=', $request->intelligence_division)
                                
                                ->get();
                                $jsonResponse = json_encode(["nature_of_offence" => $nature_of_offence]);
                                // dd($jsonResponse);
                                echo $jsonResponse;
                                
                                // $where
                        
                                break;
                default:
        
                break;
        

    }
    // $nature_of_offence = DB::table('view_nature_of_offence')
    //             ->where([['duty_date', '<=', $end], ['duty_date', '>=', $start],$where])
    //             // ->where('nature_of_the_offense', '=', $request->nature_of_the_offense)
    //             // ->where('offense_section_unique', '=', $request->offense_section)
    //             // ->where('intelligence_division', '=', $request->intelligence_division)
    //             // ->where('roving_squad_no', '=', $request->roving_squad_no)
    //             ->get();
}
}
?>