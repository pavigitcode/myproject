<html>
<script src="{{ asset('public/asset/onlinecdn/jquery.min.js')}}"></script>
 <!-- Datatable JS -->
 <script src="{{ asset('public/asset/onlinecdn/jquery.dataTables.min.js')}}"></script>
 <!-- <script src=" {{ asset('public/asset/onlinecdn/dataTables.buttons.min.js')}} "></script> -->
 <script src="{{ asset('public/asset/onlinecdn/jszip.min.js')}}"></script>
 <script src="{{ asset('public/asset/onlinecdn/pdfmake.min.js')}}"></script>
 <script src="{{ asset('public/asset/onlinecdn/vfs_fonts.js')}}"></script> 

<meta name="csrf-token" content="{{ csrf_token() }}">

@extends('menu/header')
@extends('menu/menu')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    {{ $message }}
</div>
@endif

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
    </style>
@php
$active_status_value="";
@endphp
<div class="main-content-wrap d-flex flex-column">
    <!-- ============ Body content start ============= -->
    <div class="main-content" style="padding-top: 16px;">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb">
                    <h1 class="mr-2">User Creation List</h1>
                    <ul>
                        <li><a href="#">Admin</a></li>
                        <li>User Creation List</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="add_btn text-right">
                    <button class="btn btn-info m-1" onclick="window.location='{{ route('usercreation.create') }}'" type="button"> <i class="i-Add"></i> Add New</button></a>
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
                            <th>Staff Name</th>
                            <th>Division Name</th>
                            <th>Designation Name</th>
                            <th>Mobile No</th>
                            <th>User Name</th>
                            <th>User Type</th>
                            <!-- <th>Password</th> -->
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table_body">
                        @foreach ($screenvalues as $usercreation)
                        <tr>
                            <th>{{ ++$i }} </th>
                            <td>{{ $usercreation->staff_name }} </td>
                            <td>{{ $usercreation->division_name }} </td>
                            <td>{{ $usercreation->designation_name }} </td>
                            <td>{{ $usercreation->mobile_no }} </td>
                            <td>{{ $usercreation->user_name }} </td>
                            <td>{{ $usercreation->user_type }} </td>
                            <!-- <td>{{ $usercreation->password }} </td> -->
                            <?php
                            if ($usercreation->image_upload == '') {
                                $usercreation->image_uploads = 'uploads/no-image.png';
                            } else {
                                $usercreation->image_uploads = 'uploads/'.$usercreation->image_upload;
                            }
                            ?>
                            <td><img style="width: 77px; height: 50px;" src="{{ $usercreation->image_uploads }}"> </td>
                            <?php
                            if ($usercreation->is_active == 1) {
                                $usercreation->is_active = 'Active';
                                $color = "#17cd17";
                            } elseif ($usercreation->is_active == 0) {
                                $usercreation->is_active = 'IN Active';
                                $color = "tomato";
                            }
                            ?>
                            <td><span class="badge badge-pill badge-success" style="background-color:{{$color}}">
                                {{ $usercreation->is_active }}</span>
                            </td>
                            <td>
                                <form method="post" id="delete-user-form" action="{{ route('usercreation.destroy', $usercreation->id) }}">
                                    <a class=" btn btn-success mr-2" href="{{ route('usercreation.edit', $usercreation->id) }}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>
                                        <x-zondicon-trash style="height: 13px;" />
                                    </button>
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
//     $(document).ready(function(){
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
//             columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
//          }
//        },
//      ]
//   });
// });
//         // export end
</script>

</html>