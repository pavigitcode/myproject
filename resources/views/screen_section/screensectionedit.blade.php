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
$screen_name="";
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
                <h1 class="mr-2">Screen Section</h1>
                    <ul>
                        <li><a href="#">Admin</a></li>
                        <li>Screen Section</li>
                    </ul>
                </div>
            </div>
        </div>
      <div class="card text-left">
         <div class="card-body">
            <form class="was-validated" action="{{ route('screensectionadd.update',$screensection->id) }}" method="POST">
               @csrf
               @method('PUT')
               <div class="row">
                  <div class="row mb-3">
                     <div class="col-12 col-md-6">
                        <div class="row">
                           <!-- <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Main Screen</label>
                           <div class="col-8 col-xl-9 mrg-btm">
                              <select name="main_screen_unique_id" id="main_screen_unique_id" class="select2 form-control" required>
                                 @foreach($main_screen_options as $main_screen_unique_id)
                                 <option value="{{ $main_screen_unique_id->unique_id }}" {{  $main_screen_unique_id->unique_id == $screensection->main_screen_unique_id ? 'selected' : '' }}>{{ $main_screen_unique_id->screen_main_name }}</option>
                                 @endforeach
                              </select>
                           </div> -->
                           <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Screen Name</label>
                           <div class="col-8 col-xl-9 mrg-btm">
                              <input type="text" id="screen_name" name="screen_name" class="form-control" value="{{ $screensection->screen_main_name }}" required>
                              <input type="hidden" id="unique_id" name="unique_id" class="form-control" value="{{ $screensection->unique_id }}" required>
                           </div>
                           
                           <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Order No</label>
                           <div class="col-8 col-xl-9 mrg-btm">
                              <input type="number" id="order_no" name="order_no" class="form-control" value="{{ $screensection->order_no }}" required>
                           </div>
                           <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Icon</label>
                           <div class="col-8 col-xl-9 mrg-btm">
                              <input type="text" id="icon" name="icon" class="form-control" value="{{ $screensection->icon_name }}" placeholder="Material Design Icon" required>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">
                        <div class="row">
                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Status</label>
                           <div class="col-8 col-xl-9 mrg-btm">
                              <select name="is_active" id="is_active" class="select2 form-control" required>
                                 <option value='1' {{ $screensection->is_active == '1' ? 'selected' : '' }}>Active</option>
                                 <option value='0' {{ $screensection->is_active == '0' ? 'selected' : '' }}>In Active</option>
                              </select>
                           </div>
                           <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Description</label>
                           <div class="col-8 col-xl-9 mrg-btm">
                              <textarea name="description" id="description" rows="5" class="form-control">{{ $screensection->description }}</textarea>
                           </div>
                        </div>

                        <div class="form-group row ">
                           <div class="col-md-12" align="right">
                              <!-- Cancel,save and update Buttons -->
                              <a href="{{ route('screensectionadd.index') }}"><button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a>
                              <button type="submit" class="btn btn-success waves-effect waves-light createupdate_btn">update</button>
                           </div>
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