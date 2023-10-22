
<html>
@extends('menu/header')
@extends('menu/menu')


@section('content')

@if($errors->any())

<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach
    </ul>
</div>

@endif
@php
$is_btn_disable = "";
$unique_id = "";
$off_division_name_options = division_creations();
$roving_squad_number_options = roving_squad();
$name_of_officer_options= officer_registration();
$consignee_circle_options=consignor_creation();

$nature_of_the_offense_options=offence_section_name();

$nature_of_the_offense_section=offence_section();


$consignor_division = division_creation();
@endphp
<script src="{{ asset('public/asset/onlinecdn/jquery.min.js')}}"></script>
 <!-- Datatable JS -->
 <script src="{{ asset('public/asset/onlinecdn/jquery.dataTables.min.js')}}"></script>
 <!-- <script src=" {{ asset('public/asset/onlinecdn/dataTables.buttons.min.js')}} "></script> -->
 <script src="{{ asset('public/asset/onlinecdn/jszip.min.js')}}"></script>
 <script src="{{ asset('public/asset/onlinecdn/pdfmake.min.js')}}"></script>
 <script src="{{ asset('public/asset/onlinecdn/vfs_fonts.js')}}"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .table_body{
        font-family: "Nunito", sans-serif;
    font-size: 0.950rem;
    font-weight: 400;
    }
    .dt-buttons{
   width: 100%;
   margin-bottom: 10px;
}
.print{
    border: 1px solid;
    height: 33px;
    border-radius: 4px;
    background: white;
    WIDTH: 44PX;
}
    </style>

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
                    <h1 class="mr-2">Nature Of Offence wise Report</h1>
                    <ul>
                        <li><a href="#">Reports</a></li>
                        <li>Nature Of Offence wise Report</li>
                    </ul>
                </div>
                </div>
                <div class="col-md-6">

                </div>
                </div>
                <div class="separator-breadcrumb border-top"></div>

                <div class="card text-left">
                            <div class="card-body">

                            <form action="" method="GET">

                                    <div class="row input-daterange">
                                    <div class="col-md-2 form-group mb-3">
                                        <label for="from_date">From Date</label>
                                        <input class="form-control" type="Date" id="from_date" name="from_date" value="{{ Request::get('from_date')?? date('Y-m-d')}}">
                                    </div>
                                    <div class="col-md-2 form-group mb-3">
                                        <label for="to_date">To Date</label>
                                        <input class="form-control" type="Date" id="to_date" name="to_date" value="{{ Request::get('to_date')?? date('Y-m-d')}}">
                                    </div>
                                    <div class="col-md-2 form-group mb-3">
                                            <label for="firstName1">Division wise </label>
                                            <select class="form-control" id="intelligence_division" name="intelligence_division">
                                            <!-- <option value="">All</option> -->
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
                                                
                                               
                                            </select>
                                        </div>
                                        <div class="col-md-2 form-group mb-3">
                                            <label for="firstName1">Roving Squad</label>
                                            <select class="form-control" id="roving_squad_no" name="roving_squad_no">
                                            <!-- <option value="">All</option> -->
                                                @foreach($roving_squad_number_options as $roving_squad_no)
                                                <option @if($roving_squad_no->unique_id == $roving_squad_no->unique_id) @endif value="{{ $roving_squad_no->unique_id }}">
                                                    {{ $roving_squad_no->roving_squad_number }}
                                                </option>
                                                @endforeach
                                                <option value="" selected>All</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 form-group mb-3">
                                            <label for="firstName1">Section Wise </label>
                                            <select class="form-control" id="offense_section" name="offense_section">
                                            <!-- <option value="">Select Section Wise</option> -->
                                                @foreach($nature_of_the_offense_section as $offense_section)
                                                <option @if($offense_section->unique_id == $offense_section->unique_id) @endif value="{{ $offense_section->unique_id }}">
                                                    {{ $offense_section->offence_section }}
                                                </option>
                                                @endforeach
                                                <option value="" selected>All</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 form-group mb-3">
                                            <label for="firstName1">Offence wise </label>
                                            <select class="form-control" id="nature_of_the_offense" name="nature_of_the_offense">
                                                <!-- <option value="">Select Offence Wise</option> -->
                                                @foreach($nature_of_the_offense_options as $nature_of_the_offense)
                                                <option @if($nature_of_the_offense->unique_id == $nature_of_the_offense->unique_id) @endif value="{{ $nature_of_the_offense->unique_id }}">
                                                    {{ $nature_of_the_offense->offence_name }}
                                                </option>
                                                @endforeach
                                                <option value="" selected>All</option>

                                            </select>
                                        </div>




                                        <div class="col-md-12   mb-3 ">
                                            <!-- <button type="button" name="filter" id="filter" class="btn btn-primary" style="float: right;" onclick="nature_filter_data()">Filter</button> -->
                                            <button type="submit" class="btn btn-primary" style="float: right;">GO</button>

                                        </div>
                                    </div>
                                </form>
                                       </div>
                                       <div class="table-responsive">

                                   <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.NO.</th>
                                                <th>Offence Date</th>
                                                <th>Offence No</th>
                                                <th>Vehicle No </th>
                                                <th>Name of the Offence</th>
                                                <th>Offence Section </th>
                                                <th>Division</th>

                                                <th>Rowing Squad No</th>
                                                <th class="text-right">Penality Value</th>
                                            </tr>

                                        </thead>
                                        <!-- <tbody>
                                        </tbody> -->
                                        <tbody >
                                        @foreach ($offence_vehicle as $offence_veh)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $offence_veh->duty_date }}</td>
                                            <td>{{ $offence_veh->poi_no }}</td>
                                            <td>{{ $offence_veh->offense_booked_vehicle_number }}</td>

                                            <td>{{ $offence_veh->offence_name }}</td>
                                            <td>{{ $offence_veh->offence_section }}</td>
                                            <td>{{ $offence_veh->division_name }}</td>c
                                            <td>{{ $offence_veh->roving_squad_number }}</td>
                                            <td class="text-right">{{ $offence_veh->tax_amount }}</td>

                                        </tr>
                                        @endforeach

                                        </tbody>
                                        <button onclick="printData()" class="print" id="print">Print</button>
                                        <!-- <button onclick="printData()" class="print">Print</button> -->
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
        <script>



$(document).ready(function (){
    $('#intelligence_division').on('click', function() {

        // var div = $('#intelligence_division').val();

        // alert($div_name);
            // var name = [];

            $.ajax({
                type: "GET",
                url: '{{ route("intelligence_division_get_roving.index") }}',
                data: {
                    'intelligence_division': $('#intelligence_division').val()
                },
                cache: false,
                success: function(data) {

                    if (data && data.length > 0) {


                        data = $.parseJSON(data); //parse response string

                        if (data.offence_sub_names == 0) {
                            $('#nature_sub').hide();
                        } else {
                            $.each(data.offence_sub_names, function(i, values) {

                                $('#nature_of_sub_offense').append($('<option/>', {
                                    value: values.unique_id,
                                    text: values.sub_offences
                                }));

                                $('#nature_sub').show();

                            });
                        }

                    }
                }
            });
        })

})
            //  $(document).ready(function(){

            //     // $('#filter').click(function(){
            //         var from_date = $('#from_date').val();
            //         // var from_date = $('#from_date').val();
            //         var to_date = $('#to_date').val();

//             function nature_filter_data(){
//                 // alert("hii");
//                 $.ajax({
//             type : 'get',
//         url : '{{ route("nature_of_offence_datafiltering.index") }}',
//         data:{
//                 'from_date': $('#from_date').val(),
//                 'to_date': $('#to_date').val(),
//                 'nature_of_the_offense': $('#nature_of_the_offense').val(),
//                 'offense_section': $('#offense_section').val(),
//                 'intelligence_division': $('#intelligence_division').val(),
//                 'roving_squad_no': $('#roving_squad_no').val(),
//         },

// 		success: function(data) {

//             // $('tbody').empty();
//             // $('tbody').append(data);

//             // $('#table_body').hide();
//             // $('#tbody').hide();

//             if (data && data.length > 0) {
//         data=$.parseJSON( data );
//     //   $('table#tab1 tbody').append(data);


//       var tr = '';
//     $.each(data.nature_of_offence, function(i, item) {
//         var k = i+1;


// // console.log(item.unique_id);
// // alert(item.unique_id);

//                                                 // if (item.need_offence_booking_sts == 0) {
//                                                 //     item.need_offence_booking_sts = "Processing";
//                                                 // } else if (item.need_offence_booking_sts == 1) {
//                                                 //     item.need_offence_booking_sts = "Pending";
//                                                 // }
//                                                 // id = item.id;
//                                                 // var editurl = '{{ route("checked_vehicle.edit", ":id") }}';
//                                                 // updateurl = editurl.replace(':id', item.id);

//                                                 // var url = '{{ route("checked_vehicle.destroy", ":id") }}';
//                                                 // destroyurl = url.replace(':id', item.id);


//       tr += '<tr><td width="5%">' + k  + '</td><td width="15%">' + item.duty_date  + '</td><td width="25%">' + item.poi_no + '</td><td width="20%">' + item.offense_booked_vehicle_number + '</td><td width="15%">'+ item.offence_name +'</td><td width="20%">'+ item.offence_section +'</td><td>' + item.division_name + '</td><td>'+ item.roving_squad_number +'</td><td>' + item.tax_amount + '</td></tr>';



//     });

//        $('#zero_configuration_table tbody').html(tr);

//     }
// }
// 	});
//             }
//             // $(document).ready(function(){

//             //     $('#filter').click(function(){
//             //         var from_date = $('#from_date').val();
//             //         // var from_date = $('#from_date').val();
//             //         var to_date = $('#to_date').val();
//             //      alert(from_date);
//             //      alert(to_date);
//             //         if(from_date != '' &&  to_date != ''){
//             //             $('#zero_configuration_table').DataTable().destroy();
//             //             load_data(from_date, to_date);
//             //         } else{
//             //             alert('Both Date is required');
//             //         }

//             //     });
//             //     // alert("hi");
//             //     $('.input-daterange').datepicker({

//             //         todayBtn:'linked',
//             //         format:'yyyy-mm-dd',
//             //         autoclose:true
//             //     });

//             //     load_data();

//             //     function load_data(from_date = '', to_date = ''){

//             //         $('#zero_configuration_table').DataTable({
//             //             processing: true,
//             //             serverSide: true,
//             //             ajax: {
//             //                 url:'{{ route("offence_wise_report.index") }}',
//             //                 data:{from_date:from_date, to_date:to_date}
//             //             },
//             //             columns: [
//             //                 {
//             //                     data:'roving_squad_no',
//             //                     name:'roving_squad_no'
//             //                 },
//             //                 {
//             //                     data:'nature_of_the_offense',
//             //                     name:'nature_of_the_offense'
//             //                 },
//             //                 {
//             //                     data:'offense_section',
//             //                     name:'offense_section'
//             //                 },
//             //                 {
//             //                     data:'created_at',
//             //                     name:'created_at'
//             //                 }

//             //             ]
//             //         });
//             //     }

//             //     $('#refresh').click(function(){
//             //         $('#from_date').val('');
//             //         $('#to_date').val('');
//             //         $('#zero_configuration_table').DataTable().destroy();
//             //         load_data();
//             //     });
//             // });

    $(document).ready(function() {
     var empDataTable = $('#zero_configuration_table').DataTable({
     dom: 'Blfrtip',
     buttons: [
        {
          extend: 'excel',
          exportOptions: {
            columns: 'th:not(:last-child)'
         }
       },
       {
          extend: 'pdf',
          exportOptions: {
            // columns: [0,4] // Column index which needs to export
            columns: 'th:not(:last-child)'
          }
       },
    //    {
    //       extend: 'print',
    //       exportOptions: {
    //       columns: 'th:not(:last-child)'
    //         // columns: [ 0, 1, 2, 3]
    //      }
    //    },
     ]
  });
});
</script>

{{-- ==================================print option======================================================== --}}
<script>
    function printData()
    {
       var divToPrint=document.getElementById("zero_configuration_table");
       newWin= window.open("");
       newWin.document.write(divToPrint.outerHTML);
       var css =`table, td, th {
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
}).appendTo( newWin.document.body);
       newWin.print();
       newWin.close();
    }

    $('#print').on('click',function(){
    printData();
    })
    </script>

</html>
