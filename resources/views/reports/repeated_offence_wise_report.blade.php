
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
input:focus{    
    outline:none;  
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
    $divi_id = session('division_id');
    $user_type = session('user_type');

    ?>
<div class="main-content-wrap d-flex flex-column" style="margin-top:60px;">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="row">
                <div class="col-md-6">
                <div class="breadcrumb">
                    <h1 class="mr-2">Repeated Offence Wise Report</h1>
                    <ul>
                        <li><a href="#">Reports</a></li>
                        <li>Repeated Offence Wise Report</li>
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
                                    <?php if($user_type == "Admin" || $user_type == "Super Admin" || $user_type == "Master Admin" || $user_type == "Executive User"){?>
                                    <div class="col-md-4 form-group mb-3">
                                    <label for="firstName1">Repeated Offence Wise </label>
                                            <select class="form-control" id="intelligence_division" name="intelligence_division" >
                                            <!-- <option value="">All</option> -->
                                            <option value="" selected>Select</option>
                                            <option value="1" >Consignor</option>
                                            <option value="2" >Consignee</option>
                                            <option value="3" >Transport</option>
                                            <option value="4" >Vehicle No</option>
                                                    
                                            </select>
                                        </div>
                                        <?php } else if($user_type == "Joint Commissioner" || $user_type == "Deputy Commissioner"){?>
                                            <div class="col-md-2 form-group mb-3" >
                                            <label for="firstName1">Division wise </label>
                                            <select class="form-control" id="intelligence_division" name="intelligence_division" >
                                           
                                                    <option value="{{$divi_id}}" selected>{{$div_name}}</option>
                                            </select>
                                            <input type="text" value="{{$divi_id}}" style="color: white;border: none;"id="intelligence_division1" name="intelligence_division1" autofocus>
                                        </div>
                                        <?php }?>
                                        




                                        <div class="col-md-2   mb-3 ">
                                            <!-- <button type="button" name="filter" id="filter" class="btn btn-primary" style="float: right;" onclick="nature_filter_data()">Filter</button> -->
                                            <button type="submit" class="btn btn-primary" id="get_data" style="float: right;">GO</button>

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
                                                <th>Consignor Name</th>
                                                <th>Consignee Name</th>
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
                                            <td id="d1">{{ $offence_veh->name_of_the_consignor }}</td>
                                            <td id="d2">{{ $offence_veh->name_of_consignee }}</td>
                                            <td id="d3">{{ $offence_veh->offense_booked_vehicle_number }}</td>

                                            <td>{{ $offence_veh->offence_name }}</td>
                                            <td>{{ $offence_veh->offence_section }}</td>
                                            <td>{{ $offence_veh->division_name }}</td>
                                            
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
    $('#get_data').on('click', function() {
        // alert("hii");
    var intelligence_division = document.getElementById('intelligence_division').value;
    // alert(intelligence_division);
    $('#roving_squad_no').empty();
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

                    if (data.roving_names == 0) {
                        // $('#roving_squad_no').hide();
                    } else {
                        $('#roving_squad_no').append('<option value="" selected>All</option>');
                        $.each(data.roving_names, function(i, values) {
                           
                            $('#roving_squad_no').append('<option value=' + values.unique_id + '>' + values.roving_squad_number + '</option>');
                                
                            //     $('<option/>', {
                            //     value: values.unique_id,
                            //     text: values.roving_squad_number
                            // }));

                            $('#nature_sub').show();

                        });
                    }

                }
            }
        });
    // }
});  
})
    


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
