<html>


<script src="{{ asset('public/asset/onlinecdn/jquery.min.js')}}"></script>
 <!-- Datatable JS -->
 <script src="{{ asset('public/asset/onlinecdn/jquery.dataTables.min.js')}}"></script>
 <!-- <script src=" {{ asset('public/asset/onlinecdn/dataTables.buttons.min.js')}} "></script> -->
 <script src="{{ asset('public/asset/onlinecdn/jszip.min.js')}}"></script>
 <script src="{{ asset('public/asset/onlinecdn/pdfmake.min.js')}}"></script>
 <script src="{{ asset('public/asset/onlinecdn/vfs_fonts.js')}}"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
            .table{
                font-size: 0.813rem !important;

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
@extends('menu/header')
@extends('menu/menu')

<div class="main-content-wrap d-flex flex-column" style="margin-top: 60px;">
    <!-- ============ Body content start ============= -->
    <div class="main-content">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb">
                    <h1 class="mr-2">Intercepted List</h1>
                    <ul>
                        <li><a href="#">Form</a></li>
                        <li>Intercepted List</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="add_btn text-right">
                <button class="btn btn-info m-1" onclick="window.location='{{ route('checked_vehicle.create') }}'" type="button"><i class="i-Add"></i> Add New</button>
                    <!-- <a href="checked-vehicle-form.php"> <button class="btn btn-info m-1" type="button"> <i class="i-Add"></i> Add New</button></a> -->
                </div>
            </div>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="card text-left">
            <div class="card-body">
            <form action="" method="GET">
                <div class="row">
                    <div class="col-md-2 form-group mb-3">
                        <label for="firstName1">From Date</label>
                        <input class="form-control" type="Date" id="from_date" name="from_date" value="{{ Request::get('from_date')?? date('Y-m-d')}}">
                        <!-- <input class="form-control" type="Date" id="from_date" type="Date" value="<?php echo date('Y-m-d');?>" > -->
                    </div>
                    <div class="col-md-2 form-group mb-3">
                        <label for="firstName1">To Date</label>
                        <input class="form-control" type="Date" id="to_date" name="to_date" value="{{ Request::get('to_date')?? date('Y-m-d')}}">
                        <!-- <input class="form-control" type="Date" id="to_date" type="Date" value="<?php echo date('Y-m-d');?>"> -->
                    </div>
                    <div class="col-md-2 align-self-center ">
                        <button type="submit" class="btn btn-primary">GO</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">


                <table id="zero_configuration_table"  class="display table table-striped table-bordered"  style="width:100%">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>Entry Date</th>
                            <th>POI No</th>
                            <th>Division Name</th>
                            <th>Vehicle No</th>

                            <!-- <th>Dispatched</th> -->
                            <!-- <th>Owner </th> -->
                            <th>Status</th>

                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody >
                        <!-- $i=0; -->
                                            @foreach ($checked_vehicle as $checked_vehicle)

                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $checked_vehicle->booking_entry_date }}</td>
                                                <td>{{ $checked_vehicle->poi_no }}</td>

                                                <td>{{ $checked_vehicle->division_name }}</td>
                                                <td>{{ $checked_vehicle->vechicle_no }}</td>
                                                



                                                <?php
                                                if ($checked_vehicle->need_offence_booking_sts == 0) {
                                                    $checked_vehicle->need_offence_booking_sts = "Verified";
                                                } elseif ($checked_vehicle->need_offence_booking_sts == 1) {
                                                    $checked_vehicle->need_offence_booking_sts = "Offence Booking";

                                                }
                                                ?>

                                                <td>
                                                <span class="badge badge-pill badge-danger" style="background:tomato">{{ $checked_vehicle->need_offence_booking_sts }}</span>
                                                    <!-- @if ($checked_vehicle->need_offence_booking_sts == 1)<span class="badge badge-pill badge-danger" style="background:tomato">{{ $checked_vehicle->need_offence_booking_sts }}</span>
                                                    @elseif ($checked_vehicle->need_offence_booking_sts == 0)
                                                    <span class="badge badge-pill badge-danger" style="background:green">{{ $checked_vehicle->need_offence_booking_sts }}</span>
                                                    @endif -->
                                                </td>

                                                <td>
                                                  <form action="{{ route('checked_vehicle.destroy',$checked_vehicle->poi_no) }}" method="POST">
                                                    <a class="btn btn-info" href="{{ route('checked_vehicle.edit',  $checked_vehicle->id) }}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'> <x-zondicon-trash style="height: 13px;" /></button>
                                                  </form>
                                                </td>

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
<!-- <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js')}} "> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script>
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
          // columns: [0,4] // Column index which needs to export
          columns: 'th:not(:last-child)'
        }
     },
    //  {
    //     extend: 'print',
    //     exportOptions: {
    //       //columns: 'th:not(:last-child)'
    //       columns:[ 0, 1, 2, 3]
    //    }
    //  },
   ]
});
});
//     function get_data(){

//         $.ajax({
//             type : 'get',
//         url : '{{ route("filter_data.index") }}',
//         data:{
//                 'from_date': $('#from_date').val(),
//                 'to_date': $('#to_date').val()
//         },

// 		success: function(data) {

//             // $('tbody').empty();
//             // $('tbody').append(data);

//             $('#table_body').hide();
//             $('#tbody').hide();


//             if (data && data.length > 0) {
//         data=$.parseJSON( data );
//     //   $('table#tab1 tbody').append(data);


//       var tr = '';
//     $.each(data.checked_vehicle, function(i, item) {
//         var k = i+1;


// // console.log(item.unique_id);
// // alert(item.unique_id);

//                                                 if (item.need_offence_booking_sts == 0) {
//                                                     item.need_offence_booking_sts = "Processing";
//                                                 } else if (item.need_offence_booking_sts == 1) {
//                                                     item.need_offence_booking_sts = "Pending";
//                                                 }
//                                                 // id = item.id;
//                                                 var editurl = '{{ route("checked_vehicle.edit", ":id") }}';
//                                                 updateurl = editurl.replace(':id', item.id);

//                                                 var url = '{{ route("checked_vehicle.destroy", ":id") }}';
//                                                 destroyurl = url.replace(':id', item.id);



//       tr += '<tr><td width="5%">' + k  + '</td><td width="15%">' + item.booking_entry_date  + '</td><td width="15%">' + item.poi_no   + '</td><td width="25%">' + item.division_name + '</td><td width="20%">' + item.vechicle_no + '</td><td width="20%">' + item.frplace + '</td><td><span class="badge badge-pill badge-danger">' + item.need_offence_booking_sts + '</span></td><td><form action="'+destroyurl+'" method="POST"><a class="btn btn-info" href="'+updateurl+'"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>@csrf @method("DELETE")<a href="'+destroyurl+'"><button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title="Delete"><x-zondicon-trash style="height: 13px;" /></button></a></form></tr>';
// // <td width="15%">' + item.veh_place + '</td><td width="20%">' + item.veh_owner + '</td>


//     });

//        $('#zero_configuration_table tbody').html(tr);

//     }
// }
// 	});

//     }

$('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: `Are you sure to delete?`,
                text: "You won't be able to revert this!",
                icon: "warning",
                // buttons: true,
                dangerMode: true,
                buttons: {
                    confirm: {
                        text: 'Yes, delete it!',
                        className: 'sweet-warning'
                    },
                    cancel: 'Cancel'
                },
                confirmButtonColor: "#DD6B55",
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
    </script>
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
@extends('menu/footer')
</html>
