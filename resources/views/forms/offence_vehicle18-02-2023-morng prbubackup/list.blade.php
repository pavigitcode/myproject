<html>
@extends('menu/header')
@extends('menu/menu')

<!-- Datatable CSS -->
<link href='https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<link href='https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>

   <!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

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
            <div class="col-md-6">
                <div class="add_btn text-right">
                    <!-- <a href="offence_vehicle_form.php"> <button class="btn btn-info m-1" type="button"> <i class="i-Add"></i> Add New</button></a> -->
                    <button class="btn btn-info m-1" onclick="window.location='{{ route('offence_vehicle.create') }}'" type="button"><i class="i-Add"></i> Add New</button>
                    <!-- </a> -->
                </div>
            </div>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="card text-left">
            <div class="card-body">
                <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>POi No</th>
                            <th>Intelligence Division</th>

                            <th>Offense booked Vehicle Number</th>
                            <!-- <th>Vehicle Owner</th> -->
                            <th>Vehicle Date</th>


                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($demo as $offence_vehicle)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $offence_vehicle->poi_no }}</td>
                            <td>{{ $offence_vehicle->division_name }}</td>

                            <td>{{ $offence_vehicle->offense_booked_vehicle_number}}</td>
                            <td>{{ $offence_vehicle->duty_date }}</td>

                            <?php
                            if ($offence_vehicle->need_offence_booking_sts == 0) {
                                $offence_vehicle->need_offence_booking_sts = "Processing";
                            } elseif ($offence_vehicle->need_offence_booking_sts == 1) {
                                $offence_vehicle->need_offence_booking_sts = "Pending";
                            }
                            ?>
                            <td><span class="badge badge-pill badge-danger">{{ $offence_vehicle->need_offence_booking_sts }}</span></td>
                            </td>


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
