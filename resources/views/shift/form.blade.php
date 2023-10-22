<html>
@extends('menu/header')
@extends('menu/menu')

<script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet" />

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

<div class="main-content-wrap d-flex flex-column" style="margin-top:60px;">
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
                <form class="was-validated" method="post" action="{{ route('shift.store') }}" autocomplete="off">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Shift</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="shift_name" id="shift_name">
                                <option value="">Choose</option>
                                <option value="1">Day</option>
                                <option value="2">Night</option>

                            </select>
                        </div>
                        <label class="col-sm-2 col-form-label" for="">From Time</label>
                        <div class="col-sm-4">
                            <input class="form-control" name="from_time" id="from_time" type="time">
                        </div>
                    </div>
                    <!-- <label class=" col-form-label" for="">Timing</label> -->

                    <div class="form-group row">
                        
                        <label class="col-sm-2 col-form-label" for="">End Time</label>
                        <div class="col-sm-4">
                            <input class="form-control" name="to_time" id="to_time" type="time">
                        </div>
                        <label class="col-sm-2 col-form-label" for="">Status</label>
                        <div class="col-sm-4">
                            <select name="is_active" id="is_active" class="select2 form-control" required>
                                <option value='1' selected='selected'>Active</option>
                                <option value='0'>In Active</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        
                        <label class="col-sm-2 col-form-label" for="">Description</label>
                        <div class="col-sm-4">
                            <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="col-sm-12 text-right">
                            <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>
                            <button class="btn btn-success">Save</button>
                        </div>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
</div>


@extends('menu/footer')

<script>
    var timepicker = new TimePicker('time', {
        lang: 'en',
        theme: 'dark'
    });

    var input = document.getElementById('time');

    timepicker.on('change', function(evt) {

        var value = (evt.hour || '00') + ':' + (evt.minute || '00');
        evt.element.value = value;

    });
</script>

</html>