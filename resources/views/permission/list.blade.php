
@extends('menu/header')
@extends('menu/menu')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="main-content-wrap d-flex flex-column">
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
                  <button class="btn btn-info m-1" onclick="window.location='{{ route('screensectionadd.create') }}'" type="button"> <i class="i-Add"></i> Add New</button></a>
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
            <td>{{ $screensection->screen_name }}</td>
            <td>{{ $screensection->order_no }}</td>
            <td>{{ $screensection->description }}</td>
            <td>
                <form action="{{ route('screensectionadd.destroy',$screensection->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('screensectionadd.edit',  $screensection->id) }}"><i
                            class="nav-icon i-Pen-2 font-weight-bold"></i></a>

                    @csrf
                    @method('DELETE')
                    <button type="submit"><i class="nav-icon i-Close-Window font-weight-bold"></i></button>
                    <!-- <a class="btn btn-primary" href="{{ route('screensectionadd.destroy', $screensection->id) }}">
                                                        <i class="nav-icon i-Close-Window font-weight-bold"></i></a> -->
                </form>
            </td>
        </tr>
        @endforeach
        <!-- <tr>
                                                <th>1</th>
                                                <td>Admin </td>
                                                <td>Admin</td>
                                                <td>1</td>
                                                <td><span class="badge badge-pill badge-success">Active</span></td>
                                             <td><a class=" btn btn-success mr-2" href="#"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a><a class="btn btn-danger mr-2" href="#"><i class="nav-icon i-Close-Window font-weight-bold"></i></a></td>
                                            </tr>
                                             <tr>
                                                <th>2</th>
                                                <td>Settings</td>
                                                <td>Settings</td>
                                                <td>1</td>
                                                <td><span class="badge badge-pill badge-danger">Pending</span></td>
                                             <td><a class="btn btn-success mr-2" href="#"><i class="nav-icon i-Pen-2 font-weight-bold"></i></a><a class="btn btn-danger mr-2" href="#"><i class="nav-icon i-Close-Window font-weight-bold"></i></a></td>
                                            </tr> -->

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