@extends('menu/header')
@extends('menu/menu')

@php

$is_btn_disable     = "";

$unique_id          = "";
$division_name     = "";
$is_active          = 1;
$description        = "";
$active_status_options= active_status($is_active);

@endphp
@if($errors->any())
<div class="alert alert-danger">
   <ul>
      @foreach($errors->all() as $error)

      <li>{{ $error }}</li>

      @endforeach
   </ul>
</div>
@endif
<div class="main-content-wrap d-flex flex-column" style="margin-top: 60px;">
    <div class="main-content">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb">
                <h1 class="mr-2">Division Creation</h1>
                    <ul>
                        <li><a href="#">Settings</a></li>
                        <li>Division Creation</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="card text-left">
            <div class="card-body">
                <form class="was-validated" method="post" action="{{ route('division_creation.update',$division->id) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Division Name</label>
                        <div class="col-sm-4">
                            <input class="form-control" id="division_name" name="division_name" type="text" placeholder="" value="{{ $division->division_name }}" required>
                        </div>
                        <label class="col-sm-2 col-form-label" for="">Division Short Name</label>
                        <div class="col-sm-4">
                           <input class="form-control" id="division_short_name" name="division_short_name" type="text" placeholder="" value="{{ $division->division_short_name }}" required>
                        </div>
                       
                    </div>                
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Description</label>
                        <div class="col-sm-4">
                            
                                <textarea name="description" value="{{ $division->description }}" id="description" rows="5" class="form-control">{{ $division->description }}</textarea>
                            
                        </div>
                        <label class="col-sm-2 col-form-label" for="">Status</label>
                        <div class="col-sm-4">
                            <select name="is_active" id="is_active" class="select2 form-control" required>
                                <option value='1' {{ $division->is_active == '1' ? 'selected' : '' }}>Active</option>
                                <option value='0' {{ $division->is_active == '0' ? 'selected' : '' }}>In Active</option>
                           </select>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-md-12" align="right">
                            <!-- Cancel,save and update Buttons -->
                            <a href="{{ route('division_creation.index') }}"><button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a>
                            <button type="submit" class="btn btn-success waves-effect waves-light createupdate_btn">update</button>
                        </div>
                    </div>
                </form>                           
            </div>
        </div>
    </div>     
</div>
@extends('menu/footer')