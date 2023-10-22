<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\officerregistration;
use App\Models\designation;
use App\Models\offenceOfficerList;
use App\Models\penalitytax;
use DB;

class PenalityTaxListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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

        $id_value = explode(',', $id);

        penalitytax::where('id', $id_value[0])->update([
            'is_delete' => 1,

        ]);
          return redirect()->route('offence_vehicle.edit',  $id_value[1]);

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
