<html>
<!-- Datatable CSS -->
<!-- <link href='https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
   <link href='https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   
   <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
   <script src="htt ps://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}"> -->


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

@if($message = Session::get('success'))

<div class="alert alert-success">
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
                    <h1 class="mr-2">User Type Permision List</h1>
                    <ul>
                        <li><a href="#">Admin</a></li>
                        <li>User Type Permision List</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">

                <div class="add_btn text-right">
                    <button class="btn btn-info m-1" onclick="window.location='{{ route('usertypepermission.create') }}'" type="button"> <i class="i-Add"></i> Add New</button></a>
                </div>
            </div>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="card text-left" style="margin-top: 8px;">
            <div class="card-body">
            <div class="table-responsive">

                <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>User Type</th>
                            <!-- <th>Main Screen Name</th> -->
                            <th>Division Name</th>
                            <th>Status</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usertypepermission as $permission)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $permission->user_type }}</td>
                            <!-- <td>{{ $permission->screen_main_name }}</td> -->
                            <td>{{ $permission->division_name }}</td>

                            <?php
                            if ($permission->is_active == 1) {
                                $permission->is_active_value = "Active";
                                $color = "#17cd17";
                            } elseif ($permission->is_active == 0) {
                                $permission->is_active_value = "In Active";
                                $color = "tomato";
                            }
                            ?>
                            <td><span class="badge badge-pill badge-danger" style="background-color:{{$color}}">{{ $permission->is_active_value }}</span></td>
                            <td>

                                <form id="delete-user-form" action="{{ route('usertypepermission.destroy', $permission->department_name ) }}" method="post">
                                <!-- ['usertype' => $permission->user_type, 'department' => $permission->department_name] -->
                                    <a class="btn btn-info" href="{{ route('usertypepermission.edit', $permission->id ) }}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                    @csrf
                                    @method('POST')
                                    <!-- <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>
                                        <x-zondicon-trash style="height: 13px;" />
                                    </button> -->
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
    //     var empDataTable = $('#zero_configuration_table').DataTable({
    //         dom: 'Blfrtip',
    //         buttons: [{
    //                 extend: 'excel',
    //                 exportOptions: {
    //                     columns: 'th:not(:last-child)'
    //                 }
    //             },
    //             {
    //                 extend: 'pdf',
    //                 exportOptions: {
    //                     // columns: [0,4] // Column index which needs to export
    //                     columns: 'th:not(:last-child)'
    //                 }
    //             },
    //             {
    //                 extend: 'print',
    //                 exportOptions: {
    //                     columns: 'th:not(:last-child)'
    //                     // columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
    //                 }
    //             },
    //         ]
    //     });
    // });
    // export end
</script>

</html>