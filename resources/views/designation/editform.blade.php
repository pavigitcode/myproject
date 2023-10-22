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

$is_btn_disable     = "";
$unique_id          = "";
$designation_name     = "";
$folder_name= "";
$is_active          = 1;
$description        = "";

$active_status_options= active_status($is_active);
@endphp
<div class="main-content-wrap d-flex flex-column" style="margin-top: 60px;">
    <div class="main-content">
       <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb">
                    <h1 class="mr-2">Designation Creation</h1>
                    <ul>
                        <li><a href="#">Settings</a></li>
                        <li>Designation Creation</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="card text-left">
            <div class="card-body">
                <form class="was-validated" method="post" action="{{ route('designation_creation.update',$designation->id) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Designation Name</label>
                        <div class="col-sm-4">
                            <input type="text" id="designation_name" name="designation_name" class="form-control"  placeholder="" value="{{ $designation->designation_name }}" required>
                        </div>
                        <label class="col-sm-2 col-form-label" for="">Status</label>
                        <div class="col-sm-4">
                            <select name="is_active" id="is_active" class="select2 form-control" required>
                                <option value='1' {{ $designation->is_active == '1' ? 'selected' : '' }}>Active</option>
                                <option value='0' {{ $designation->is_active == '0' ? 'selected' : '' }}>In Active</option>
                                   </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Description</label>
                            <div class="col-sm-4">
                                <textarea name="description" value="{{ $designation->description }}" id="description" rows="5" class="form-control">{{ $designation->description }}</textarea>
                            </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-md-12" align="right">
                            <!-- Cancel,save and update Buttons -->
                            <a href="{{ route('designation_creation.index')}}"><button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a>
                            <button type="submit" class="btn btn-success waves-effect waves-light createupdate_btn">update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@extends('menu/footer')
</html>