<html>
@extends('menu/header')
@extends('menu/menu')

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


<style>
    input:focus{    
    outline:none;  
}
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
}
</style>
@php
    $is_btn_disable = '';
    $unique_id = '';
    $off_division_name_options = division_creations();
    $roving_squad_number_options = roving_squad();
    $name_of_officer_options = officer_registration();
    $nature_of_the_offense_options = offence_section();
    $hsn_options = hsn_code();

    $consignor_division = division_creation();
@endphp
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
                    <h1 class="mr-2">Month Wise Consolidated Report</h1>
                    <ul>
                        <li><a href="#">Reports</a></li>
                        <li>Month Wise Consolidated Report</li>
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
                        <label for="from_date">From Month</label>
                        <input class="form-control" type="month" id="from_date" name="from_date" value="{{ Request::get('from_date')?? date('Y-m')}}">
                    </div>
                    <div class="col-md-2 form-group mb-3">
                        <label for="to_date">To Month</label>
                        <input class="form-control" type="month" id="to_date" name="to_date" value="{{ Request::get('to_date')?? date('Y-m')}}">
                    </div>
<!--  -->
<?php if($user_type == "Admin" || $user_type == "Super Admin" || $user_type == "Master Admin" || $user_type == "Executive User"){?>
                                    <div class="col-md-2 form-group mb-3">
                                            <label for="firstName1">Division wise </label>
                                            <select class="form-control" id="intelligence_division" name="intelligence_division" >
                                            <!-- <option value="">All</option> -->
                                            <option value="" selected>All</option>
                                                    @foreach($off_division_name_options as $intelligence_division)
                                                <option @if($intelligence_division->unique_id == $intelligence_division->unique_id) @endif value="{{ $intelligence_division->unique_id }}">
                                                    {{ $intelligence_division->division_name }}
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
                                            <input type="text" value="{{$div_name}}" style="color: white;border: none;"id="intelligence_division1" name="intelligence_division1" autofocus>
                                        </div>
                                        <?php }?>
                                        <div class="col-md-2 form-group mb-3">
                                            <label for="firstName1">Roving Squad</label>
                                            <select class="form-control" id="roving_squad_no" name="roving_squad_no">
                                            <!-- <option value="">All</option> -->
                                                
                                               
                                            </select>
                                        </div>
<!--  -->
                    
                    <div class="col-md-2   mb-3 ">
                        <!-- <button class="btn btn-primary" type="button" style="float: right;"
                            onclick="nature_filter_data()">Submit</button> -->
                        <button type="submit" class="btn btn-primary" style="float: right;margin-top: 28px;">GO</button>
                    </div>
                </div>
              </form>


             <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>Division</th>
                            <!-- <th>Rowing Squad</th> -->
                            <th>Rowing Squad Count</th>
                            <th>No. of Offence </th>
                            <th>No. of Section</th>
                            <th>Collected Status</th>
                        </tr>
                    </thead>
                    <tbody class="table_body">

                        @foreach ($consolidated_data as $datas)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $datas->division_name }}</td>
                                <td>{{ $datas->roving_squad_cnt }}</td>
                                <td>{{ $datas->need_offence_booking_cnt }}</td>
                                <td>{{ $datas->offense_section_unique_cnt }}</td>
                                <td>{{ $datas->penality_collected_cnt }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <button onclick="printData()" class="print" id="print">Print</button>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end of main-content -->
</div>
</div>
@extends('menu/footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">

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

// admins
    $('#intelligence_division').on('change', function() {
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

$(document).ready(function(){
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
            columns: [0,1,2,3,4,5,6,7,8,9,10] // Column index which needs to export
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
    function printData()
    {
       var divToPrint=document.getElementById("zero_configuration_table");
       newWin= window.open("");
       newWin.document.write('<html><head><title style="text-align:center;">Month Wise Report</title></head></html>')
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
