
<html>
    <!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" >

<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" ></script>

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
$off_division_name_options = territorial_division_creations();
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
                    <h1 class="mr-2">Division Wise DealersReport</h1>
                    <ul>
                        <li><a href="#">Reports</a></li>
                        <li>Division Wise DealersReport</li>
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
                                    <div class="col-md-2 form-group mb-3">
                                            <label for="firstName1">Division wise </label>
                                            <select class="form-control" id="intelligence_division" name="intelligence_division" >
                                            <!-- <option value="">All</option> -->
                                            <option value="" selected>All</option>
                                                    @foreach($off_division_name_options as $intelligence_division)
                                                <option @if($intelligence_division->unique_id == $intelligence_division->unique_id) @endif value="{{ $intelligence_division->unique_id }}">
                                                    {{ $intelligence_division->ter_division }}
                                                </option>
                                                @endforeach
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
                                        




                                        <div class="col-md-12   mb-3 ">
                                            <!-- <button type="button" name="filter" id="filter" class="btn btn-primary" style="float: right;" onclick="nature_filter_data()">Filter</button> -->
                                            <button type="submit" class="btn btn-primary" style="float: right;">GO</button>

                                        </div>
                                    </div>
                                </form>
                                       </div>
                                       <div class="table-responsive">

                                   <table class="display table table-striped table-bordered" id="empTable" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S.NO.</th>
                                                <th>Entry Date</th>
                                                <th>Time</th>
                                                <th>Division Name</th>
                                                <th>Vehicle No</th>
                                                
                                                <!-- <th>Dealer Name</th> -->
                                                <!-- <th>From Place</th>  -->
                                                <!-- <th>Amount</th>
                                                <th>Division</th> -->
                                                <!-- <th class="text-right">Penality Value</th> -->
                                                <th>Count</th>
                                                
                                            </tr>

                                        </thead>
                                        <!-- <tbody>
                                        </tbody> -->
                                        <tbody >
                                        @foreach ($offence_vehicle as $key => $offence_veh)
                                        <?php $veh_no = $offence_veh->offense_booked_vehicle_number;?>
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $offence_veh->duty_date }}</td>
                                            <td>{{ $offence_veh->offense_booking_time }}</td>
                                            <td>{{ $offence_veh->ter_division }}</td>
                                            <td>{{ $offence_veh->offense_booked_vehicle_number }}</td>
                                            
                                            <td><button class='btn btn-info viewdetails' data-id='{{ $offence_veh->offense_booked_vehicle_number }}' >{{ $offence_veh->cnt }}</button></td>
  
                                            

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

        <!-- small modal -->
    <!-- <div class="modal fade" id="smallModal"  tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content" style="
    width: 222%;
">
                <div class="modal-header">
                <h5 class="modal-title w-100 text-center"> <b>Detailed List</b><span class="ward_name"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="smallBody">
                
                    <div>
                    <table class="table table-striped table-bordered reven_table main-table" id="main-table" width="100%">
                                        <thead>
                                        <tr class="tr_attr">
                                        <th rowspan="2"> S.NO</th>
                                        <th>Vehicle No</th>
                                                
                                                <th>Dealer Name</th>
                                                <th>From Place</th>  -->
                                                <!-- <th>Amount</th>
                                                <th>Division</th> -->
                                                <!-- <th class="text-right">Penality Value</th>
                                        </tr>   
                                    </thead>
                                    <tbody>
                                    
                                        </tbody>
                                   

                 </table>
                         the result to be displayed apply here -->
                    <!-- </div>
                </div>
            </div>
        </div>
    </div>  -->
    <!-- Modal -->
    <div class="modal fade" id="empModal" >
         <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Employee Info</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>
               <div class="modal-body">
                   <table class="w-100" id="tblempinfo">
                      <tbody></tbody>
                   </table>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>


        
        @extends('menu/footer')
        <script>



$(document).ready(function (){
    // $('#intelligence_division').on('change', function() {
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

// });
})
    // filter_roving();

// function filter_roving(){
    

    // jc
    $('#intelligence_division1').on('focus', function() {
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

});






$('#count').on('click', function() {
      
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

});


$('#empTable').on('click','.viewdetails',function(){
    alert("hii");
          var empid = $(this).attr('data-id');
            alert(empid);
          if(empid > 0){

             // AJAX request
             var url = "{{ route('getEmployeeDetails'.[':emp_id']) }}";
             url = url.replace(':empid',empid);

             // Empty modal data
             $('#tblempinfo tbody').empty();

             $.ajax({
                 url: url,
                 dataType: 'json',
                 success: function(response){

                     // Add employee details
                     $('#tblempinfo tbody').html(response.html);

                     // Display Modal
                     $('#empModal').modal('show'); 
                 }
             });
          }
      });




// });
//     $('#intelligence_division').on('click,', function() {

//         // var div = $('#intelligence_division').val();

//         // alert($div_name);
//             // var name = [];

//             $.ajax({
//                 type: "GET",
//                 url: '{{ route("intelligence_division_get_roving.index") }}',
//                 data: {
//                     'intelligence_division': $('#intelligence_division').val()
//                 },
//                 cache: false,
//                 success: function(data) {

//                     if (data && data.length > 0) {


//                         data = $.parseJSON(data); //parse response string

//                         if (data.offence_sub_names == 0) {
//                             $('#nature_sub').hide();
//                         } else {
//                             $.each(data.offence_sub_names, function(i, values) {

//                                 $('#nature_of_sub_offense').append($('<option/>', {
//                                     value: values.unique_id,
//                                     text: values.sub_offences
//                                 }));

//                                 $('#nature_sub').show();

//                             });
//                         }

//                     }
//                 }
//             });
//         })

// })
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
