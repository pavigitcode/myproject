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
                <h1 class="mr-2">Nature of the Offence Creation</h1>
                    <ul>
                        <li><a href="#">Settings</a></li>
                        <li>Nature of the Offence Creation</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="card text-left">
            <div class="card-body">
                <form class="was-validated" method="post" action="{{ route('offence_section.store') }}" autocomplete="off">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Offence Name</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="offence_name" name="offence_name" type="text" placeholder="" required>
                        </div>

                        <label class="col-sm-2 col-form-label" for="">Offence Section</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="offence_sec" name="offence_sec" type="text" placeholder="" required>
                        </div>
                    </div>
              
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Status</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="is_active" id="is_active" required>
                                <?php echo $active_status_options; ?>
                            </select>
                        </div>

                        <label class="col-sm-2 col-form-label" for="">Description</label>
                        <div class="col-sm-4">
                            <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12 text-right">
                            <a href="../offence_section" class="btn btn-danger">Cancel</a>
                            <button class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>




            </div>
        </div>
    </div>
</div>


@extends('menu/footer')

</html>