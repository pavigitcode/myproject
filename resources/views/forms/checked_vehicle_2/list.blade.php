<html>

 <!-- Datatable CSS -->
 <!-- <link href='https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
   <link href='https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>
    -->
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
        <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
        <style>
    .odd{
        display: none;
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
                <div class="row">
                    <div class="col-md-3 form-group mb-3">
                        <label for="firstName1">From Date</label>
                        <input class="form-control" id="from_date" type="Date" value="<?php echo date('Y-m-01');?>">
                    </div>
                    <div class="col-md-3 form-group mb-3">
                        <label for="firstName1">To Date</label>
                        <input class="form-control" id="to_date" type="Date" value="<?php echo date('Y-m-d');?>">
                    </div>
                    <div class="col-md-2 align-self-center ">
                        <button class="btn btn-primary" type="button" onclick="get_data()">Submit</button>
                    </div>
                </div>



                <table class="display table table-striped table-bordered" id="tab1" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.NO.</th>
                            <th>POI No</th>
                            <th>Vehicle No</th>
                            <th>Date</th>
                            <th>Transport Name</th>
                            <th>Owner </th>
                            <th>Status</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                                            
                                            </tbody>
                    <tbody class="table_body" id="table_body">
                        <!-- $i=0; -->
                                            @foreach ($checked_vehicle as $checked_vehicle)
                                            
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $checked_vehicle->poi_no }}</td>
                                                <td>{{ $checked_vehicle->vechicle_no }}</td>
                                                <td>{{ $checked_vehicle->booking_entry_date }}</td>
                                                <td>{{ $checked_vehicle->veh_place }}</td>
                                                <td>{{ $checked_vehicle->veh_owner }}</td>
                                                
                       
                                                <?php
                                                if ($checked_vehicle->need_offence_booking_sts == 0) {
                                                    $checked_vehicle->need_offence_booking_sts = "Processing";
                                                } elseif ($checked_vehicle->need_offence_booking_sts == 1) {
                                                    $checked_vehicle->need_offence_booking_sts = "Pending";
                                                }
                                                ?>
                                                <td><span class="badge badge-pill badge-danger">{{ $checked_vehicle->need_offence_booking_sts }}</span></td>
                                                
                                                <td>
                                                  <form action="{{ route('checked_vehicle.destroy',$checked_vehicle->id) }}" method="POST">
                                                    <a class="btn btn-info" href="{{ route('checked_vehicle.edit',  $checked_vehicle->id) }}"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'> <x-zondicon-trash style="height: 13px;" /></button>
                                                  </form>
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        
                    <!-- <tbody>
                        <tr>
                            <th>1</th>
                            <td>5548</td>
                            <td>TN33 AC 3377</td>
                            <td>17-11-2022</td>
                            <td>SRS Transport Chennai</td>
                            <td>Selvanayagam</td>
                            <td>Verified</td>
                            <td><a class=" btn btn-success mr-2" href="#"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a><a class="btn btn-danger mr-2" href="#"><i class="nav-icon i-Close-Window font-weight-bold"></i></a></td>
                        </tr>
                        <tr>
                            <th>2</th>
                            <td>5548</td>
                            <td>TN56 B 5757</td>
                            <td>17-11-2022</td>
                            <td>TRP Transport </td>
                            <td>Kumar</td>
                            <td>Offence</td>
                            <td><a class=" btn btn-success mr-2" href="#"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a><a class="btn btn-danger mr-2" href="#"><i class="nav-icon i-Close-Window font-weight-bold"></i></a></td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <td>5548</td>
                            <td>TN33 AC 3377</td>
                            <td>17-11-2022</td>
                            <td>RR Transport</td>
                            <td>Selvanayagam</td>
                            <td>Verified</td>
                            <td><a class=" btn btn-success mr-2" href="#"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a><a class="btn btn-danger mr-2" href="#"><i class="nav-icon i-Close-Window font-weight-bold"></i></a></td>
                        </tr>
                    </tbody> -->

                </table>
            </div>

        </div>
    </div>
</div>
<!-- end of main-content -->
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
    function get_data(){
       
        $.ajax({
            type : 'get',
        url : '{{ route("filter_data.index") }}',
        data:{             
                'from_date': $('#from_date').val(),
                'to_date': $('#to_date').val()
        },
    
		success: function(data) {
           
            // $('tbody').empty();
            // $('tbody').append(data);

            $('#table_body').hide();
            
            if (data && data.length > 0) {  
        data=$.parseJSON( data );
    //   $('table#tab1 tbody').append(data);

   
      var tr = '';
    $.each(data.checked_vehicle, function(i, item) {
        var k = i+1;
        
        
// console.log(item.id);
// alert(item.id);

                                                if (item.need_offence_booking_sts == 0) {
                                                    item.need_offence_booking_sts = "Processing";
                                                } else if (item.need_offence_booking_sts == 1) {
                                                    item.need_offence_booking_sts = "Pending";
                                                }
                                                // id = item.id;
                                                var editurl = '{{ route("checked_vehicle.edit", ":id") }}';
                                                updateurl = editurl.replace(':id', item.id);

                                                var url = '{{ route("checked_vehicle.destroy", ":id") }}';
                                                destroyurl = url.replace(':id', item.id);

                                               
                                                
      tr += '<tr><td width="5%">' + k  + '</td><td width="15%">' + item.poi_no  + '</td><td width="25%">' + item.vechicle_no + '</td><td width="20%">' + item.booking_entry_date + '</td><td width="15%">' + item.veh_place + '</td><td width="20%">' + item.veh_owner + '</td><td><span class="badge badge-pill badge-danger">' + item.need_offence_booking_sts + '</span></td><td><form action="'+destroyurl+'" method="POST"><a class="btn btn-info" href="'+updateurl+'"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a>@csrf @method("DELETE")<a href="'+destroyurl+'"><button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title="Delete"><x-zondicon-trash style="height: 13px;" /></button></a></form></tr>';

   
                                        
    });
    
       $('#tab1 tbody').html(tr);
    
    }
}
	});
    
    }
    $(document).ready(function(){
  var empDataTable = $('#tab1').DataTable({
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
            columns:[ 0, 1, 2, 3]
         }
       }, 
     ] 
  });
});
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

@extends('menu/footer')
</html>