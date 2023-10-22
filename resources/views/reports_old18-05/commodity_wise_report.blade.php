<html>

<script src="{{asset('public/asset/onlinecdn/jquery.min.js')}}"></script>
<!-- Datatable JS -->
<script src="{{asset('public/asset/onlinecdn/jquery.dataTables.min.js')}}"></script>
<!-- <script src=" {{ asset('public/asset/onlinecdn/dataTables.buttons.min.js')}} "></script> -->
<script src="{{asset('public/asset/onlinecdn/jszip.min.js')}}"></script>
<script src="{{asset('public/asset/onlinecdn/pdfmake.min.js')}}"></script>
<script src="{{asset('public/asset/onlinecdn/vfs_fonts.js')}}"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">

<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">


@extends('menu/header')
@extends('menu/menu')

<style>
     .table{
                font-size: 0.813rem !important;

            }
    .table_body {
        font-family: "Nunito", sans-serif;
        font-size: 0.950rem;
        font-weight: 400;
    }

    .dt-buttons {
        width: 100%;
        margin-bottom: 10px;
    }

    .print {
        border: 1px solid;
        height: 33px;
        border-radius: 4px;
        background: white;
    }
</style>
@php
$is_btn_disable = '';
$unique_id = '';
$off_division_name_options = division_creations();
$roving_squad_number_options = roving_squad();
$name_of_officer_options = officer_registration();
$nature_of_the_offense_options=offence_section_name();

$nature_of_the_offense_section=offence_section();
$hsn_options = hsn_code();

$consignor_division = division_creation();
@endphp

<?php
    session_start();

    $div_name = session('div_name');
    $user_type = session('user_type');


    ?>
<div class="main-content-wrap d-flex flex-column" style="margin-top:60px;">
    <!-- ============ Body content start ============= -->
    <div class="main-content">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb">
                    <h1 class="mr-2">Commodity Wise Report</h1>
                    <ul>
                        <li><a href="#">Reports</a></li>
                        <li>Commodity Wise Report</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <!-- <div class="add_btn text-right">
                  <a href="checked-vehicle-form.php"> <button class="btn btn-info m-1" type="button"> <i class="i-Add"></i> Add New</button></a>
                </div>-->
            </div>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="card text-left">
            <div class="card-body">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-2 form-group mb-3">
                            <label for="from_date">From Date</label>
                            <input class="form-control" type="Date" id="from_date" name="from_date" value="{{ Request::get('from_date')?? date('Y-m-d')}}">
                        </div>
                        <div class="col-md-2 form-group mb-3">
                            <label for="to_date">To Date</label>
                            <input class="form-control" type="Date" id="to_date" name="to_date" value="{{ Request::get('to_date')?? date('Y-m-d')}}">
                        </div>
                        <!-- <div class="col-md-2 form-group mb-3">
                        <label for="firstName1">Offence wise Report</label>
                        <select class="form-control" id="nature_of_the_offense" name="nature_of_the_offense">
                        <option value="">Select Offence wise</option>
                            @foreach($nature_of_the_offense_options as $nature_of_the_offense)
                            <option value="{{ $nature_of_the_offense->unique_id }}">
                                {{ $nature_of_the_offense->offence_name }}
                            </option>
                            @endforeach
                        </select>
                    </div> -->

                        <div class="col-md-2 form-group mb-3">
                            <label for="firstName1">Division Wise </label>
                            <select class="form-control" id="intelligence_division" name="intelligence_division">

                            <?php
                                                if($user_type == 'Master Admin'){

                                                    ?>
                                                    @foreach($off_division_name_options as $intelligence_division)
                                                <option @if($intelligence_division->unique_id == $intelligence_division->unique_id) @endif value="{{ $intelligence_division->unique_id }}">
                                                    {{ $intelligence_division->division_name }}
                                                </option>
                                                @endforeach
                                                <option value="" selected>All</option>
                                    
                                                <?php
                                                }else if($user_type == 'Super Admin'){
                                                    ?>
                                                    @foreach($off_division_name_options as $intelligence_division)
                                                <option @if($intelligence_division->unique_id == $intelligence_division->unique_id) @endif value="{{ $intelligence_division->unique_id }}">
                                                    {{ $intelligence_division->division_name }}
                                                </option>
                                                @endforeach
                                                <option value="" selected>All</option>

                                                <?php
                                                }else if($user_type == 'Admin'){
                                                    ?>
                                                    @foreach($off_division_name_options as $intelligence_division)
                                                <option @if($intelligence_division->unique_id == $intelligence_division->unique_id) @endif value="{{ $intelligence_division->unique_id }}">
                                                    {{ $intelligence_division->division_name }}
                                                </option>
                                                @endforeach
                                                <option value="" selected>All</option>

                                                <?php
                                                }else if($user_type != 'Admin' || $user_type != 'Super Admin' || $user_type != 'Master Admin')
                                                    ?>
                                                    <option value="" selected>{{$div_name}}</option>
                                                

                                <!-- <option value="">Select Division Wise</option> -->
                                <!-- @foreach ($off_division_name_options as $intelligence_division)
                                <option @if($intelligence_division->unique_id == $intelligence_division->unique_id) @endif value="{{ $intelligence_division->unique_id }}">
                                    {{ $intelligence_division->division_name }}
                                </option>
                                @endforeach
                                <option value="" selected>All</option> -->

                            </select>
                        </div>
                        <div class="col-md-2 form-group mb-3">
                            <label for="firstName1">Roving Squad</label>
                            <select class="form-control" id="roving_squad_no" name="roving_squad_no">
                                <!-- <option value="">Select Roving Squad No</option> -->
                                @foreach ($roving_squad_number_options as $roving_squad_no)
                                <option @if($roving_squad_no->unique_id == $roving_squad_no->unique_id) @endif value="{{ $roving_squad_no->unique_id }}">
                                    {{ $roving_squad_no->roving_squad_number }}
                                </option>
                                @endforeach
                                <option value="" selected>All</option>

                            </select>
                        </div>
                        <div class="col-md-2 form-group mb-3">
                            <label for="firstName1">Commodity / HSN Code </label>
                            <select class="form-control" id="hsn_code" name="hsn_code">
                                <!-- <option value="">All</option> -->
                                @foreach ($hsn_options as $hsn_code)

                                <option @if($hsn_code->unique_id == $hsn_code->unique_id) @endif value="{{ $hsn_code->unique_id }}">
                                    {{ $hsn_code->hsn_code }}
                                    <!-- {{ Request::get('hsn_code') == $hsn_code->unique_id ? 'selected':'' }} -->
                                    <!-- {{ Request::get('hsn_code')== 'hsn_code' ? 'selected':''}} -->
                                </option>
                                @endforeach
                                <option value="" selected>All</option>

                            </select>
                        </div>
                        <!-- <div class="col-md-2 form-group mb-3"> -->
                        <!-- <label for="firstName1">Section Wise </label>
                        <select class="form-control" id="offense_section" name="offense_section">
                            <option value="">Select Section Wise</option>
                            @foreach ($nature_of_the_offense_options as $offense_section)
                                <option @if($offense_section->unique_id == $offense_section->unique_id) @endif value="{{ $offense_section->unique_id }}" >
                                    {{ $offense_section->offence_section }}
                                    {{ Request::get('offense_section')== ($offense_section->offence_section) ? 'selected':''}} -->
                        <!-- </option> -->
                        <!-- @endforeach -->
                        <!-- </select> -->
                        <!-- </div> -->


                        <div class="col-md-12   mb-3 ">
                            <!-- <button class="btn btn-primary" type="button" style="float: right;"
                            onclick="nature_filter_data()">Submit</button> -->
                            <button type="submit" class="btn btn-primary" style="float: right;">GO</button>
                        </div>
                    </div>
                </form>


                <!-- <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 float-end">
                        <div class="buttons-export">
                            <span class="badge badge-warning"><i class="fa fa-print"></i></span>
                            <span class="badge badge-info"><i class="fa fa-file-pdf-o"></i></span>
                            <span class="badge badge-success"><i class="i-File-Excel"></i></span>
                        </div>
                    </div>
                </div> -->
                <div class="table-responsive">

                    <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                        <thead>
                            <tr>
                                <th>S.NO.</th>
                                <th>Date</th>
                                <th>Offence/POI No</th>
                                <th>Vehicle No </th>
                                <th>Name of the Offence</th>
                                <th>Offence Section </th>
                                <th>Commodity / HSN Code</th>
                                <th>Division</th>
                                <th>Rowing Squad No.</th>
                                <th>Taxes</th>
                                <th class="text-right">Penalty Value</th>
                                <th>Collected Status</th>
                            </tr>
                        </thead>
                        <tbody class="table_body">

                            @foreach ($commodity_data as $commodity)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $commodity->duty_date }}</td>
                                <td>{{ $commodity->poi_no }}</td>
                                <td>{{ $commodity->offense_booked_vehicle_number }}</td>
                                <td>{{ $commodity->offence_name }}</td>
                                <td>{{ $commodity->offence_section }}</td>
                                <td>{{ $commodity->hsn_code }}</td>
                                <td>{{ $commodity->division_name }}</td>
                                <td>{{ $commodity->roving_squad_number }}</td>

                                <?php
                                if ($commodity->tax_type == 'inter') {
                                    $commodity->tax_type = 'Inter Tax';
                                } elseif ($commodity->tax_type == 'intra') {
                                    $commodity->tax_type = 'Intra Tax';
                                }
                                ?>
                                <td>{{ $commodity->tax_type }}</td>
                                <td>{{ $commodity->tax }}</td>
                                <td>{{ $commodity->penality_details }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <button onclick="printData()" class="print" id="print">Print</button>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of main-content -->
</div>
</div>
@extends('menu/footer')
<link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js')}} ">

<script type="text/javascript">
    // function nature_filter_data() {
    //     // alert("hii");
    //     $.ajax({
    //         type: 'get',
    //         url: '{{ route('commodity_filter.index') }}',
    //         data: {
    //             'from_date': $('#from_date').val(),
    //             'to_date': $('#to_date').val(),
    //             'hsn_code': $('#hsn_code').val(),
    //             'offense_section': $('#offense_section').val(),
    //             // 'nature_of_the_offense': $('#nature_of_the_offense').val(),
    //             'intelligence_division': $('#intelligence_division').val(),
    //             'roving_squad_no': $('#roving_squad_no').val(),

    //         },

    //         success: function(data) {
    //             // alert(data);
    //             // $('tbody').empty();
    //             // $('tbody').append(data);
    //             $('#table_body').hide();
    //             $('#tbody').hide();

    //             if (data && data.length > 0) {
    //                 data = $.parseJSON(data);
    //                 //   $('table#tab1 tbody').append(data);


    //                 var tr = '';
    //                 // var i = 0;
    //                 $.each(data.commodity_filter, function(i, item) {
    //                     var k = i + 1;
    //                     if(data.commodity_filter ==''){
    //                     }else if(data.commodity_filter !=''){
    //                         tr += '<tr><td width="5%">' + k + '</td><td width="15%">' + item.duty_date +
    //                         '</td><td width="25%">' + item.poi_no + '</td><td width="20%">' + item
    //                         .offense_booked_vehicle_number + '</td><td width="15%">' + item
    //                         .offence_name + '</td><td width="20%">' + item.offence_section +
    //                         '</td><td width="15%">' + item.hsn_code + '</td><td>' + item.division_name + '</td><td>' + item.roving_squad_number +
    //                         '</td><td>' + item.tax_type + '</td><td>' + item.tax_amount +
    //                         '</td><td>' + item.penality_details + '</td></tr>';
    //                     }

    //                 });

    //                 $('#zero_configuration_table tbody').html(tr);

    //             }
    //         }
    //     });
    // }



    $(document).ready(function() {
        var empDataTable = $('#zero_configuration_table').DataTable({
            dom: 'Blfrtip',
            buttons: [{
                    extend: 'excel',
                    exportOptions: {
                        columns: 'th:not(:last-child)'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10] // Column index which needs to export
                        // columns: 'th:not(:last-child)'
                    }
                },
                //    {
                //       extend: 'print',
                //       exportOptions: {
                //         columns: 'th:not(:last-child)'
                //         // columns: [ 0, 1, 2, 3, 4, 5 , 6,7,8,9]
                //      }
                //    },
            ]
        });
    });
</script>
{{-- ==================================print option======================================================== --}}
<script>
    function printData() {
        var divToPrint = document.getElementById("zero_configuration_table");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        var css = `table, td, th {
      border: 1px solid black;
      text-align:justify;
   }
th {
    background-color: #7a7878;
    text-align:center
}
@media print {
   table td:last-child {display:none}
   table th:last-child {display:none}
}`;

        var div = $("<div />", {
            html: '&shy;<style>' + css + '</style>'
        }).appendTo(newWin.document.body);
        newWin.print();
        newWin.close();
    }

    $('#print').on('click', function() {
        printData();
    })
</script>

</html>
