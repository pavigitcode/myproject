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
                <h1 class="mr-2">Shift Creation</h1>
                    <ul>
                        <li><a href="#">Settings</a></li>
                        <li>Shift Creation</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card text-left">
            <div class="card-body">
                <form class="was-validated" method="post" action="{{ route('shift.update',$shift->id) }}" autocomplete="off">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-12">
                            <!-- <h4 class="header-title">Delivery / Invoice Details </h4> -->
                            <div class="form-group row ">
                                <label class="col-md-2 col-form-label" for="shift_name"> Shift Name </label>
                                <div class="col-md-4">
                                    <select name="shift_name" id="shift_name" class="select2 form-control" required>
                                        <option value='1' {{ $shift->shift_name == '1' ? 'selected' : '' }}>Day</option>
                                        <option value='2' {{ $shift->shift_name == '2' ? 'selected' : '' }}>Night</option>
                                    </select>
                                    <!-- <input type="text" id="shift_name" name="shift_name" class="form-control" value="{{ $shift->shift_name }}" required> -->
                                </div>
                                <label class="col-sm-2 col-form-label" for="">From Time</label>
                                <div class="col-sm-4">
                                    <input class="form-control" name="from_time" id="from_time" type="time" value="{{ $shift->from_time }}">
                                </div>
                            </div>
                            <div class="form-group row">

                                <label class="col-sm-2 col-form-label" for="">End Time</label>
                                <div class="col-sm-4">
                                    <input class="form-control" name="to_time" id="to_time" type="time" value="{{ $shift->to_time }}">
                                </div>
                                <label class="col-md-2 col-form-label" for="is_active"> Active Status</label>
                                <div class="col-md-4">
                                    <select name="is_active" id="is_active" class="select2 form-control" required>
                                        <option value='1' {{ $shift->is_active == '1' ? 'selected' : '' }}>Active</option>
                                        <option value='0' {{ $shift->is_active == '0' ? 'selected' : '' }}>In Active</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row ">


                                <label class="col-sm-2 col-form-label" for="">Description</label>
                                <div class="col-sm-4">
                                    <textarea name="description" value="{{ $shift->description }}" id="description" rows="5" class="form-control">{{ $shift->description }}</textarea>
                                </div>
                                <div class="col-md-12" align="right">
                                    <!-- Cancel,save and update Buttons -->
                                    <a href="{{ route('shift.index') }}"><button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a>
                                    <button type="submit" class="btn btn-success waves-effect waves-light createupdate_btn ">Update</button>
                                </div>
                            </div>
                            <br>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@extends('menu/footer')