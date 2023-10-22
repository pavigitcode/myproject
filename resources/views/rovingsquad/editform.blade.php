@extends('menu/header')
@extends('menu/menu')

@php

$is_btn_disable     = "";

$unique_id          = "";
$roving_division_name     = "";
$area_name     = "";
$roving_squad_number     = "";
$is_active          = 1;
$description        = "";
$division_creation_options  = division_creations();
$active_status_options= active_status($is_active);
@endphp

<div class="main-content-wrap d-flex flex-column" style="margin-top: 60px;">
    <div class="main-content">
    <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb">
                <h1 class="mr-2">Roving Squad Number Creation</h1>
                    <ul>
                        <li><a href="#">Settings</a></li>
                        <li>Roving Squad Number Creation</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card text-left">
            <div class="card-body">
                <form class="was-validated" method="post" action="{{ route('rovingsquad_creation.update',$rovingsquad->id) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" >Division Name</label>
                <div class="col-sm-4">
                   <select class="form-control"  name="roving_division_name"  id="roving_division_name" >
                        @foreach($division_creation_options as $roving_division_name)
                        <option value="{{ $roving_division_name->unique_id }}" {{  $roving_division_name->unique_id == $rovingsquad->roving_division_name ? 'selected' : '' }}>{{ $roving_division_name->division_name }}</option>
                        @endforeach
                    </select>
                </div>
                <label class="col-sm-2 col-form-label" for="">Area Name</label>
                <div class="col-sm-4">
                    <input class="form-control" id="area_name" name="area_name" type="text" placeholder="" value="{{ $rovingsquad->area_name }}" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="">Roving Squad Number</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="roving_squad_number" name="roving_squad_number"  placeholder="" value="{{ $rovingsquad->roving_squad_number }}" required>
                </div>
                <label class="col-sm-2 col-form-label" for="">Status</label>
                <div class="col-sm-4">
                    <select name="is_active" id="is_active" class="select2 form-control" required>
                        <option value='1' selected = 'selected' >Active</option><option value='0'>In Active</option>
                    </select>
                </div>
            </div>
            

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="">Description</label>
                <div class="col-sm-4">
                        <textarea name="description" value="{{ $rovingsquad->description }}" id="description" rows="5" class="form-control">{{ $rovingsquad->description }}</textarea>
                    </textarea>
                </div>
            </div>
            <div class="form-group row ">
                <div class="col-md-12" align="right">
                    <!-- Cancel,save and update Buttons -->
                    <a href="{{ route('rovingsquad_creation.index') }}"><button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a>
                    <button type="submit" class="btn btn-success waves-effect waves-light createupdate_btn">update</button>
                </div>
            </div>
        </form>
                                             
            </div>
        </div>
    </div>     
</div>

@extends('menu/footer')