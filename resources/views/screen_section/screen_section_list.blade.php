<html>
    <!-- jQuery Library -->
    <script src="{{ asset('public/asset/onlinecdn/jquery.min.js')}}"></script>
 <!-- Datatable JS -->
 <script src="{{ asset('public/asset/onlinecdn/jquery.dataTables.min.js')}}"></script>
 <!-- <script src=" {{ asset('public/asset/onlinecdn/dataTables.buttons.min.js')}} "></script> -->
 <script src="{{ asset('public/asset/onlinecdn/jszip.min.js')}}"></script>
 <script src="{{ asset('public/asset/onlinecdn/pdfmake.min.js')}}"></script>
 <script src="{{ asset('public/asset/onlinecdn/vfs_fonts.js')}}"></script> 
 <!-- <script src="{{ asset('public/asset/onlinecdn/buttons.html5.min.js')}}"></script> -->


<meta name="csrf-token" content="{{ csrf_token() }}">


@extends('menu/header')
@extends('menu/menu')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success" style="text-align: center;">
    {{ $message }}
</div>
@endif
<style>
     .dt-buttons{
   width: 100%;
   margin-bottom: 10px;
}
    </style>
<div class="main-content-wrap d-flex flex-column" style="margin-top: 60px;">
    <!-- ============ Body content start ============= -->
    <div class="main-content">
        <div class="row">
            <div class="col-md-6">

                <div class="breadcrumb">
                    <h1 class="mr-2">Screen Section List</h1>
                    <ul>
                        <li><a href="#">Admin</a></li>
                        <li>Screen Section List</li>
                    </ul>
                </div>

            </div>
            <div class="collapse collapse-horizontal" id="collapseWidthExample">
                <div class="card card-body mb-0" style="width: 100%;">
                    <div class="row">
                        <div class="col-5">
                            <div class="mb-3">
                                <label for="example-date" class="form-label">From Date</label>
                                <input class="form-control" id="example-date" type="date" name="date">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="mb-3">
                                <label for="example-date" class="form-label">To Date</label>
                                <input class="form-control" id="example-date" type="date" name="date">
                            </div>
                        </div>
                        <div class="col-2 align-self-center">
                            <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light">Primary</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="add_btn text-right">
                <button class="btn btn-info m-1" onclick="window.location='{{ route('screensectionadd.create') }}'" type="button"> <i class="i-Add"></i> Add New</button></a>
                </div>
            </div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card text-left">
            <div class="card-body">
            <div class="table-responsive">

                <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>Section Name</th>
                            <th>Order No</th>
                            <th>Description</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($screenvalues as $screensection)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $screensection->screen_main_name }}</td>
                            <td>{{ $screensection->order_no }}</td>
                            <td>{{ $screensection->description }}</td>
                            <td>

                                <form id="delete-user-form" method="post" action="{{ route('screensectionadd.destroy', $screensection->id) }}">

                                    <a class="btn btn-info" href="{{ route('screensectionadd.edit', $screensection->id) }}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>
                                        <x-zondicon-trash style="height: 13px;" />
                                    </button>
                                    <!-- <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button> -->
                                    <!-- <a class="btn btn-primary" href="{{ route('screensectionadd.destroy', $screensection->id) }}">
                                                    <i class="nav-icon i-Close-Window font-weight-bold"></i></a> -->
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
</div>
<!-- end of main-content -->
@extends('menu/footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<!-- <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js')}} "> -->

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
    // $(document).ready(function(){
//   var empDataTable = $('#zero_configuration_table').DataTable({
//      dom: 'Blfrtip',
//      buttons: [
//         {
//           extend: 'excel',
//           exportOptions: {
//             columns: 'th:not(:last-child)'
//          }
//        },
//        {
//           extend: 'pdf',
//           exportOptions: {
//             // columns: [0,4] // Column index which needs to export
//             columns: 'th:not(:last-child)'
//           }
//        },
//        {
//           extend: 'print',
//           exportOptions: {
//             //columns: 'th:not(:last-child)'
//             columns: [ 0, 1, 2, 3]
//          }
//        },
//      ]
//   });
// });
        // export end
</script>

</html>
