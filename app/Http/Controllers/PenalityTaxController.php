<?php

namespace App\Http\Controllers;
use App\Models\penalitytax;
use DB;
use Illuminate\Http\Request;

class PenalityTaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $prefix = "";
        $request->validate([
            // 'cgst_penalty' => 'required',
            'hsn_code' => 'required',
            'poi_number' => 'required',
            'tax_type' => 'required'
        ]);

        if($request->intra_amount){
            $amount_value = $request->intra_amount;
        }else if($request->inter_amount){
            $amount_value = $request->inter_amount;
        }
                            //model name
        $penaltyList = new penalitytax;
        $penaltyList->tax_type = $request->tax_type;
        $penaltyList->hsn_code_unique = $request->hsn_code;
        $penaltyList->tax_amount = $amount_value;
        $penaltyList->cgst_penalty = $request->cgst_penalty;
        $penaltyList->sgst_penalty = $request->sgst_penalty;
        $penaltyList->igst_penalty = $request->igst_penalty;
        $penaltyList->poi_number = $request->poi_number;
        $penaltyList->unique_id = unique_id($prefix);
        $penaltyList->save();
        // Alert::Success('Congrats', 'You\'ve Successfully Registered');

        // SweetAlert::message('User Type Created Successfully!');
        // ->with('Success', 'User Type Created Successfully.')

        $tax_list = DB::table('penality_tax_list')
            ->Join('hsn_creation', 'penality_tax_list.hsn_code_unique', 'hsn_creation.unique_id')
            ->select('penality_tax_list.*','hsn_creation.hsn_code')
            ->where('penality_tax_list.poi_number', $request->poi_number)
            ->where('penality_tax_list.is_delete', 0)
            ->distinct()
            ->get();

        $tax_total_amount = $tax_list->sum('tax_amount');

        // dd($tax_total_amount);

        $cgst_total_amount = $tax_list->sum('cgst_penalty');

        $sgst_total_amount = $tax_list->sum('sgst_penalty');

        $igst_total_amount = $tax_list->sum('igst_penalty');

        $jsonResponse = json_encode(['tax_list' => $tax_list, 'tax_amount'=>$tax_total_amount, 'cgst_total_amount'=>$cgst_total_amount, 'sgst_total_amount'=>$sgst_total_amount, 'igst_total_amount'=>$igst_total_amount]);

        echo $jsonResponse;
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
