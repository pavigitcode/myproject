<html>
@extends('menu/header')
@extends('menu/menu')
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
</style>
<div class="main-content-wrap d-flex flex-column" style="margin-top: 60px;">
    <!-- ============ Body content start ============= -->
    <div class="main-content">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb">
                    <h1 class="mr-2">Offence Booking List</h1>
                    <ul>
                        <li><a href="#">Form</a></li>
                        <li>Offence Booking List</li>
                    </ul>
                </div>
            </div>
            <!-- <div class="col-md-6">
                <div class="add_btn text-right">
                     <a href="offence_vehicle_form.php"> <button class="btn btn-info m-1" type="button"> <i class="i-Add"></i> Add New</button></a>
                     <button class="btn btn-info m-1" onclick="window.location='{{ route('offence_vehicle.create') }}'" type="button"><i class="i-Add"></i> Add New</button>
                    </a>
                </div>
            </div> -->
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="card text-left">
            <div class="card-body">
                <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>Entry Date</th>
                            <th>POI No</th>
                            <th>Intelligence Division</th>
                            <!-- <th>Offense No</th> -->
                            {{-- <th>Roving Squad Number</th> --}}
                            <!-- <th>Name of the officer</th> -->
                            <th>Vehicle Number</th>
                            <!-- <th>Vehicle Owner</th> -->

                            {{-- <th>Offense Section</th> --}}
                            <!-- <th>Consignor division</th> -->
                            {{-- <th>Penality Details</th> --}}
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($offence_veh as $offence_vehicle)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $offence_vehicle->duty_date }}</td>

                            <td>{{ $offence_vehicle->poi_no }}</td>
                            <td>{{ $offence_vehicle->division_name }}</td>
                            {{-- <td>{{ $offence_vehicle->roving_squad_no }}</td> --}}
                            <td>{{ $offence_vehicle->offense_booked_vehicle_number}}</td>

                            {{-- <td>{{ $offence_vehicle->offence_section }}</td> --}}
                            {{-- <td>{{ $offence_vehicle->penality_details }}</td> --}}
                            <?php
                            if ($offence_vehicle->penality_details == '') {
                                $offence_vehicle->penality_details = "Pending";
                                $color ="#ff0000";
                            } elseif ($offence_vehicle->penality_details == 'In_Processing') {
                                $offence_vehicle->penality_details = "Processing";
                                $color ="#ffa500";
                            }elseif ($offence_vehicle->penality_details == 'Penalty_Collected' || $offence_vehicle->penality_details == 'Released_without_Penalty' ) {
                                $offence_vehicle->penality_details = "Completed";
                                $color ="#17cd17";
                            }
                            ?>
                            <td><span class="badge badge-pill badge-danger" style="background-color:{{$color}}">{{ $offence_vehicle->penality_details }}</span></td>

                            <td>
                                <form action="{{ route('offence_vehicle.destroy',$offence_vehicle->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('offence_vehicle.edit',  $offence_vehicle->id) }}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'> <x-zondicon-trash style="height: 13px;" /></button>
                                </form>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>

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

    // export start
// $(document).ready(function() {
//             $('#zero_configuration_table').DataTable({

    //             dom: 'Bfrtip',
    //             responsive: true,
    //             pageLength: 25,

    //             buttons: [
    //    {
    //        extend: 'excel',
    //        exportOptions: {
    //         columns: 'th:not(:last-child)'
    //      }
    //    },
    //    {
    //        extend: 'pdf',
    //        exportOptions: {
    //         columns: 'th:not(:last-child)'
    //      }

    //    },
    //    {
    //         extend: 'print',
    //         exportOptions: {
    //         columns: 'th:not(:last-child)'
    //      }
    //    }
    // ]
    //         });
        // });
        // export end
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
       {
          extend: 'print',
          exportOptions: {
            //columns: 'th:not(:last-child)'
            columns: [ 0, 1, 2, 3, 4 ]
         }
       },
     ]
  });

});
</script>
</html>
