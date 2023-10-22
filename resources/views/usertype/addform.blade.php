@extends('menu/header')
@extends('menu/menu')


@section('content')

@if($errors->any())

<div class="alert alert-danger">
   <ul>
      @foreach($errors->all() as $error)

      <li>{{ $error }}</li>

      @endforeach
   </ul>
</div>

@endif

@php

$is_btn_disable = "";

$unique_id = "";

$main_screen_id = "";
$section_name = "";
$section_folder_name= "";
$order_no = "";
$icon_name = "";
$is_active = 1;
$description = "";

$main_screen_options = main_screen();
$active_status_options= active_status($is_active);

@endphp

<div class="main-content-wrap d-flex flex-column" style="margin-top: 60px;">
    <div class="main-content">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb">
                <h1 class="mr-2">User Type</h1>
                    <ul>
                        <li><a href="#">Admin</a></li>
                        <li>User Type</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card text-left">
            <div class="card-body">
                <form class="was-validated" method="post" action="{{ route('usertype.store') }}" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <!-- <h4 class="header-title">Delivery / Invoice Details </h4> -->
                            <div class="form-group row ">
                                <label class="col-md-2 col-form-label" for="user_type"> User Type </label>
                                <div class="col-md-4">
                                    <input type="text" id="user_type" name="user_type" class="form-control" value="" required >
                                </div>
                                <label class="col-md-2 col-form-label" for="is_active"> Active Status</label>
                                <div class="col-md-4">
                                    <select name="is_active" id="is_active" class="select2 form-control" required>
                                        <option value='1' selected='selected'>Active</option>
                                        <option value='0'>In Active</option>
                                    </select>
                                </div>
                            </div>
                            <!--  <div class="form-group row ">
                                <label class="col-md-2 col-form-label" for="under_user_type"> Under Users </label>
                                <div class="col-md-4">
                                     <select name="under_user_type_name" id="under_user_type_name" class="select2 form-control" onChange="get_under_user_type_ids()"  multiple>
                                        <option value='' selected>Select Staff</option><option value='5f97fc3257f2525529'>Admin</option><option value='62b55fe64789d40213'>Developer</option><option value='62c80e7c2536911885'>Super Admin</option><option value='62c80e8cac02318910'>Master Admin</option><option value='62c80e9f0914e68331'>Regular User</option><option value='62de286342da285198'>Dashboard Admin</option><option value='62e75b86efa6f38641'>TCMC</option><option value='62fe12f328df461412'>Councillor</option><option value='636de8deb343e61229'>PRO</option>                                    </select>
                                     <input type="hidden" id="under_user_type" name="under_user_type" class="form-control" value="">
                                </div>
                            </div> -->
                            <br>
                            <div class="form-group row ">
                                <div class="col-md-12" align="right">
                                    <!-- Cancel,save and update Buttons -->
                                    <a class="btn btn-default btn-close" href="{{ url()->previous() }}"><button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a>

                                    <button type="submit" class="btn btn-success waves-effect waves-light createupdate_btn">Save</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@extends('menu/footer')