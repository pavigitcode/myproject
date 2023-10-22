<html>
 <!-- jQuery Library -->
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
@php
$division_creation_options  = division_creations();
@endphp

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
                <div class="col-md-8">
                <div class="breadcrumb">
                    <h1 class="mr-2">Roving Squad Number Creation List</h1>
                    <ul>
                        <li><a href="#">Settings</a></li>
                        <li>Roving Squad Number Creation List</li>
                    </ul>
                </div>
                </div>
                <div class="col-md-4">
                    <div class="add_btn text-right">
                        <button class="btn btn-info m-1" onclick="window.location='{{ route('rovingsquad_creation.create') }}'" type="button"><i class="i-Add"></i> Add New</button></a>
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
                                                <th>Division Name</th>
                                                <th>Area Name</th>
                                                <th>Roving Squad Number</th>
                                                <th>Description</th>
                                                <th>Active Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table_body">
                                            @foreach ($rovingsquads as $rovingsquad)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $rovingsquad->division_name }}</td>
                                                <td>{{ $rovingsquad->area_name }}</td>
                                                <td>{{ $rovingsquad->roving_squad_number }}</td>
                                                <td>{{ $rovingsquad->description }}</td>
                       
                                                <?php
                                                if ($rovingsquad->is_active == 1) {
                                                    $rovingsquad->is_active_value = "Active";
                                                    $color = "#17cd17";
                                                } elseif ($rovingsquad->is_active == 0) {
                                                    $rovingsquad->is_active_value = "In Active";
                                                    $color = "#17cd17";
                                                }
                                                ?>
                                                <td><span class="badge badge-pill badge-danger" style="background-color:{{$color}}">{{ $rovingsquad->is_active_value }}</span></td>
                                                <td>
                                                  <form action="{{ route('rovingsquad_creation.destroy',$rovingsquad->id) }}" method="POST">
                                                    <a class="btn btn-info" href="{{ route('rovingsquad_creation.edit',  $rovingsquad->id) }}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'> <x-zondicon-trash style="height: 13px;" /></button>
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
        <!-- <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js')}} "> -->
        
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
    //         columns: [ 0, 1, 2, 3, 4 , 5 ]
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