<html>


@extends('menu/header')
@extends('menu/menu')

<script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
<link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet" />

<!-- <link href="{{ asset('http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js')}} ">
<link rel="stylesheet" href="{{ asset('http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css')}} "> -->


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
                    <h1 class="mr-2"> Consignor/Consignee circle Creation</h1>
                    <ul>
                        <li><a href="#">Settings</a></li>
                        <li> Consignor/Consignee circle Creation</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="card text-left">
            <div class="card-body">
                <form class="was-validated" method="post" action="{{ route('consignorcreation.store') }}" autocomplete="off">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="consignee_code">Consignor/Consignee Circle Code</label>
                        <div class="col-sm-4">
                            <input class="form-control" name="consignee_code" id="consignee_code" type="text" placeholder="">
                        </div>

                        <label class="col-sm-2 col-form-label" for="consignee_circle">Consignor/Consignee Circle </label>
                        <div class="col-sm-4">
                            <input class="form-control" id="consignee_circle" name="consignee_circle" type="text" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="is_active">Status</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="is_active" id="is_active">
                                <?php echo $active_status_options; ?>
                            </select>
                        </div>
                        <label class="col-sm-2 col-form-label" for="description">Description</label>
                        <div class="col-sm-4">
                            <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 text-right">
                            <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@extends('menu/footer')

</html>
