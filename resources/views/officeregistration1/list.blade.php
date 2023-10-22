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

@if($message = Session::get('success'))

<div class="alert alert-success">
    {{ $message }}
</div>

@endif
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
<div class="main-content-wrap d-flex flex-column" style="margin-top: 60px;">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="row">
                <div class="col-md-6">
                <div class="breadcrumb">
                    <h1 class="mr-2">	Officer Registration List</h1>
                    <ul>
                        <li><a href="#">Settings</a></li>
                        <li>	Officer Registration List</li>
                    </ul>
                </div>
                </div>
                <div class="col-md-6">
                <div class="add_btn text-right">
                  <button class="btn btn-info m-1" onclick="window.location='{{ route('officeregistration.create') }}'" type="button"> <i class="i-Add"></i> Add New</button></a>
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
                                                <th>Officer Name</th>
                                                <th>GPF No</th>
                                                <th>Office Division Name </th>
                                                <th>Office Designation Name</th>
                                                <th>Mobile No.</th>
                                                <th>E-Mail ID</th>
                                                 <th>Status</th>
                                                 <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table_body">
                                            @foreach ($officeregistration as $officeregistration)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $officeregistration->officer_name }}</td>
                                                <td>{{ $officeregistration->gpf_cps_no }}</td>
                                                <td>{{ $officeregistration->division_name }}</td>
                                                <td>{{ $officeregistration->designation_name }}</td>
                                                <td>{{ $officeregistration->mobile_no }}</td>
                                                <td>{{ $officeregistration->email }}</td>
                                                <?php
                                                if ($officeregistration->is_active == 1) {
                                                    $officeregistration->is_active_value = "Active";
                                                    $color = "#17cd17";
                                                } elseif ($officeregistration->is_active == 0) {
                                                    $officeregistration->is_active_value = "In Active";
                                                    $color = "tomato";
                                                }
                                                ?>
                                                <td><span class="badge badge-pill badge-danger" style="background-color:{{$color}}">{{ $officeregistration->is_active_value }}</span></td>
                                                <td>
                                                  <form action="{{ route('officeregistration.destroy',$officeregistration->id) }}" method="POST">
                                                    <a class="btn btn-info" href="{{ route('officeregistration.edit',  $officeregistration->id) }}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'> <x-zondicon-trash style="height: 13px;" />
                                                   </button>
                                                  </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <button onclick="printData()" class="print">Print</button>
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
    //    {
    //       extend: 'print',
    //       exportOptions: {
    //         //columns: 'th:not(:last-child)'
    //         columns: [ 0, 1, 2, 3, 4 , 5 ,6, 7]
    //      }
    //    },
     ]
  });
});
 // export end
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

    $('.print').on('click',function(){
    printData();
    })
    </script>

</html>
