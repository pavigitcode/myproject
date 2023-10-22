<html>
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
                <h1 class="mr-2">HSN Commodity Creation</h1>
                    <ul>
                        <li><a href="#">Settings</a></li>
                        <li>HSN Commodity Creation</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="card text-left">
            <div class="card-body">
                <form class="was-validated" method="post" action="{{ route('hsn.update',$hsn->id) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <!-- <h4 class="header-title">Delivery / Invoice Details </h4> -->
                            <div class="form-group row ">
                                <label class="col-sm-2 col-form-label" for="hsn_name">HSN Name</label>
                                <div class="col-sm-4">
                                    <input class="form-control" name="hsn_name" id="hsn_name" type="text" value="{{ $hsn->hsn_name }}">
                                </div>

                                <label class="col-sm-2 col-form-label" for="">HSN Code</label>
                                <div class="col-sm-4">
                                    <input class="form-control" name="hsn_code" id="hsn_code" type="text" value="{{ $hsn->hsn_code }}">
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label class="col-md-2 col-form-label" for="is_active"> Status</label>
                                <div class="col-md-4">
                                    <select name="is_active" id="is_active" class="select2 form-control" required>
                                        <option value='1' {{ $hsn->is_active == '1' ? 'selected' : '' }}>Active</option>
                                        <option value='0' {{ $hsn->is_active == '0' ? 'selected' : '' }}>In Active</option>
                                    </select>
                                </div>

                                <label class="col-sm-2 col-form-label" for="">Description</label>
                                <div class="col-sm-4">
                                    <textarea name="description" value="{{ $hsn->description }}" id="description" rows="5" class="form-control">{{ $hsn->description }}</textarea>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row ">
                                <div class="col-md-12" align="right">
                                    <!-- Cancel,save and update Buttons -->
                                    <a href="{{ route('hsn.index') }} "><button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a>
                                    <button type="submit" class="btn btn-success waves-effect waves-light createupdate_btn ">Update</button>
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

</html>