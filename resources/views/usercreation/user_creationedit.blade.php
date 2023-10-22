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
<style>
   .img{
 width: 49px;
 margin-top: 18px;
 /* margin-right:200px; */
   }
   </style>
@php

$is_btn_disable = "";

$unique_id = "";

$main_screen_id = "";
$staff_name = "";
$staff_id= "";
$mobile_no = "";
$email_id = "";
$is_active = 1;
$description = "";

$user_type_options = user_type();
$division_name_options = division_creation();
$active_status_options= active_status($is_active);
$design_name_options=designation_creations();

@endphp
<div class="main-content-wrap d-flex flex-column" style="margin-top: 60px;">
   <div class="main-content">
      <div class="row">
         <div class="col-md-6">
             <div class="breadcrumb">
             <h1 class="mr-2">User Creation</h1>
                 <ul>
                     <li><a href="#">Admin</a></li>
                     <li>User Creation</li>
                 </ul>
             </div>
         </div>
     </div>
      <div class="card text-left">
         <div class="card-body">
            <form method="post" action="{{ route('usercreation.update',$usercreation->id) }}" enctype="multipart/form-data" >
               @csrf
               @method('PUT')
               <div class="row">
                  <div class="col-12">
                     <!-- <h4 class="header-title">Delivery / Invoice Details </h4> -->
                     <div class="row mb-3">
                        <div class="col-6">
                           <div class="row">
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Staff Name</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="text" name="staff_name" id="staff_name" class="form-control" value="{{ $usercreation->staff_name }}" required>
                                 </select>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Staff Id</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="text" name="staff_id" id="staff_id" class="form-control" value="{{ $usercreation->staff_id }}" required>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Designation Name</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <select name="design_name" id="design_name" class="select2 form-control" required>
                                    @foreach($design_name_options as $design_name)
                                    <option value="{{ $design_name->unique_id }}" {{  $design_name->unique_id == $usercreation->design_name ? 'selected' : '' }}>{{ $design_name->designation_name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                                 <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Division Name</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <select name="div_name" id="div_name" class="select2 form-control" required>
                                    @foreach($division_name_options as $div_name)
                                    <option value="{{ $div_name->unique_id }}" {{  $div_name->unique_id == $usercreation->div_name ? 'selected' : '' }}>{{ $div_name->division_name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Mobile No</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="tel" id="mobile_no" name="mobile_no" class="form-control" minlength="10" maxlength="10" value="{{ $usercreation->mobile_no }}" required>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Email Id</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="mail" id="email_id" name="email_id" class="form-control" value="{{ $usercreation->email_id }}" required>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Image Upload</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <div class="input-group mb-3">
                                    <div class="custom-file">
                                       <input name="file" id="file" type="file" onchange="showPreview(event);"/>
                                         {{-- {{ $usercreation->image_upload }}   --}}
                                         <?php
                                         if($usercreation->image_upload){
                                          $image_val = $usercreation->image_upload;
                                         }else{
                                          $image_val = 'no-image.png';
                                         }
                                         ?>
                                       <img src="../../uploads/{{ $image_val }}" class="img"  id="output_image" name="output_image" >
                                       
                                       <!-- {{-- <input name="file" id="file" onlick="remove()" value="{{ $usercreation->image_upload }}" type="text" /> --}} -->
                                    </div>
                                 </div>
                              </div> 
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="row">
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">User Type</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <select name="user_type" id="user_type" class="select2 form-control" required>
                                    @foreach($user_type_options as $user_type)
                                    <option value="{{ $user_type->unique_id }}" {{  $user_type->unique_id == $usercreation->user_type ? 'selected' : '' }}>{{ $user_type->user_type }}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">User Name</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="text" id="user_name" name="user_name" onkeyup="get_under_users(this.value)" class="form-control" value="{{ $usercreation->user_name }}" required>
                              </div>

                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label"><br><p>(Minimum 6 letters)</p></label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="password" id="password" name="password" class="form-control" value="{{ $usercreation->password }}" required>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Confirm Password<br><p>(Minimum 6 letters)</p></label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="password" id="confirm_password" name="confirm_password" class="form-control" value="{{ $usercreation->password }}" required>
                              </div>

                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Active Status</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <select name="is_active" id="is_active" class="select2 form-control" required>
                                    <option value='1' {{ $usercreation->is_active == '1' ? 'selected' : '' }}>Active</option>
                                    <option value='0' {{ $usercreation->is_active == '0' ? 'selected' : '' }}>In Active</option>
                                 </select>
                                
                              </div>
                           </div>
                           <div class="form-group row">
                              <div class="col-md-12 float-right text-right">
                                 <!-- Cancel,save and update Buttons -->
                                 <a href="{{ route('usercreation.index') }}">
                                    <button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a>
                                 <button type="submit" class="btn btn-success waves-effect waves-light createupdate_btn ">Update</button>
                              </div>
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
<script>
function showPreview(event){
   if(event.target.files.length > 0){
     var src = URL.createObjectURL(event.target.files[0]);
     var preview = document.getElementById("output_image");
     preview.src = src;
   }
 }
 </script>