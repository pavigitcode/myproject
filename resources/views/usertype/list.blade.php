<html>
<script src="{{ asset('public/asset/onlinecdn/jquery.min.js')}}"></script>
 <!-- Datatable JS -->
 <script src="{{ asset('public/asset/onlinecdn/jquery.dataTables.min.js')}}"></script>
 <!-- <script src=" {{ asset('public/asset/onlinecdn/dataTables.buttons.min.js')}} "></script> -->
 <script src="{{ asset('public/asset/onlinecdn/jszip.min.js')}}"></script>
 <script src="{{ asset('public/asset/onlinecdn/pdfmake.min.js')}}"></script>
 <script src="{{ asset('public/asset/onlinecdn/vfs_fonts.js')}}"></script> 

<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Datatable Dependency start -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-colvis-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script tyep="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script tyep="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script tyep="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script tyep="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>

Datatable Dependency end -->
<style>
    .btn-secondary,
    .btn-raised-secondary {
        color: #f8f9fa !important;
        background-color: #172050 !important;
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
</style>
@extends('menu/header')
@extends('menu/menu')
@include('sweetalert::alert')



<div class="main-content-wrap d-flex flex-column" style="margin-top:60px;">
    <!-- ============ Body content start ============= -->
    <div class="main-content">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb">
                    <h1 class="mr-2">User Type List</h1>
                    <ul>
                        <li><a href="#">Admin</a></li>
                        <li>User Type List</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="add_btn text-right">
                    <button class="btn btn-info m-1" onclick="window.location='{{ route('usertype.create') }}'" type="button"> <i class="i-Add"></i> Add New</button>

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
                            <th>User Type Name</th>

                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table_body">
                        @foreach ($usertypes as $usertype)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $usertype->user_type }}</td>
                            <?php
                            if ($usertype->is_active == 1) {
                                $usertype->is_active_value = "Active";
                                $color = "#17cd17";
                            } elseif ($usertype->is_active == 0) {
                                $usertype->is_active_value = "In Active";
                                $color = "tomato";
                            }
                            ?>
                            <td><span class="badge badge-pill badge-danger" style="background-color:{{$color}}">{{ $usertype->is_active_value }}</span></td>
                            <td>
                                <form id="delete-user-form" method="POST" action="{{ route('usertype.destroy',$usertype->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <!-- <a class="btn btn-info" href="{{ route('usertype.edit',  $usertype->id) }}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a> -->
                                    <!-- <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button> -->
                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>
                                        <x-zondicon-trash style="height: 13px;" />
                                    </button>
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
//           columns: 'th:not(:last-child)'
//             // columns: [ 0, 1, 2, 3]
//          }
//        }, 
//      ] 
//   });
// });
    // export end
</script>

</html>