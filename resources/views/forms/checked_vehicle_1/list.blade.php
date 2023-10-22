<html>



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
                        <input class="form-control" id="firstName1" type="Date" placeholder="Enter your first name">
                    </div>
                    <div class="col-md-3 form-group mb-3">
                        <label for="firstName1">To Date</label>
                        <input class="form-control" id="firstName1" type="Date" placeholder="Enter your first name">
                    </div>
                    <div class="col-md-2 align-self-center ">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </div>



                <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
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
</html>