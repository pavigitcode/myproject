<html>

<script src="{{ asset('public/asset/onlinecdn/jquery.min.js')}}"></script>
 <!-- Datatable JS -->
 <script src="{{ asset('public/asset/onlinecdn/jquery.dataTables.min.js')}}"></script>
 <!-- <script src=" {{ asset('public/asset/onlinecdn/dataTables.buttons.min.js')}} "></script> -->
 <script src="{{ asset('public/asset/onlinecdn/jszip.min.js')}}"></script>
 <script src="{{ asset('public/asset/onlinecdn/pdfmake.min.js')}}"></script>
 <script src="{{ asset('public/asset/onlinecdn/vfs_fonts.js')}}"></script> 

<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
 
    .dt-buttons{
   width: 100%;
   margin-bottom: 10px;
}
    </style>

@extends('menu/header')
@extends('menu/menu')
@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
    {{ $message }}
</div>

@endif
<div class="main-content-wrap d-flex flex-column" style="margin-top: 60px;">
    <!-- ============ Body content start ============= -->
    <div class="main-content">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb">
                    <h1 class="mr-2">User Screen List</h1>
                    <ul>
                        <li><a href="#">Admin</a></li>
                        <li>User Screen List</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="add_btn text-right">
                    <button class="btn btn-info m-1" onclick="window.location='{{ route('userscreen.create') }}'" type="button"><i class="i-Add"></i> Add New</button></a>
                </div>
            </div>
        </div>
        <div class="card text-left">
            <div class="card-body">
            <div class="table-responsive">

                <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>Main Screen Name</th>
                            <th>Screen Name</th>
                            <!-- <th>Main Screen</th> -->
                            <th>Order No</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user_screens as $userscreen)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $userscreen->screen_main_name }}</td>
                            <td>{{ $userscreen->user_screen_name }}</td>
                            <!-- <td>{{ $userscreen->screen_main_name }}</td> -->
                            <td>{{ $userscreen->order_no }}</td>

                            <?php
                            if ($userscreen->is_active == 1) {
                                $userscreen->is_active_value = "Active";
                                $color = "#17cd17";
                            } elseif ($userscreen->is_active == 0) {
                                $userscreen->is_active_value = "In Active";
                                $color = "orange";
                            }
                            ?>
                             <td><span class="badge badge-pill" style="background-color:{{$color}}">{{ $userscreen->is_active_value }}</span>
                            </td>
                            <td>

                                <form id="delete-user-form" action="{{ route('userscreen.destroy',$userscreen->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('userscreen.edit',  $userscreen->id) }}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                    @csrf
                                    @method('DELETE')
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
<!-- </div>
</div> -->

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
//             columns: 'th:not(:last-child)'
//             // columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
//          }
//        }, 
//      ] 
//   });    
//     });    
    // export end
</script>

</html>