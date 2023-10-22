@extends('menu/header')
@extends('menu/menu')

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
$section_name = "";
$section_folder_name= "";
$order_no = "";
$design_name="";
$div_name="";
$icon_name = "";
$is_active = 1;
$description = "";

$user_type = user_type();

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
            <form class="was-validated" method="post" action="{{ route('usercreation.store') }}" enctype="multipart/form-data" autocomplete="off">
               @csrf
               <div class="row">
                  <div class="col-12">
                     <!-- <h4 class="header-title">Delivery / Invoice Details </h4> -->
                     <div class="row mb-3">
                        <div class="col-12 col-md-6">
                           <div class="row">
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Staff Name</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="text" name="staff_name" id="staff_name" class="form-control" value="" required>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Staff Id</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="text" name="staff_id" id="staff_id" class="form-control" value="" required> 
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Designation Name</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <select name="design_name" id="design_name" class="select2 form-control" required>
                                    <option value="">Select Designation Wise</option>
                                    @foreach($design_name_options as $design_name)
                                    <option value="{{ $design_name->unique_id }}">
                                       {{ $design_name->designation_name }}
                                    </option>
                                    @endforeach
                                 </select>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Division Name</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <select name="div_name" id="div_name" class="select2 form-control" required>
                                    <option value="">Select Division Wise</option>
                                    @foreach($division_name_options as $div_name)
                                    <option value="{{ $div_name->unique_id }}">
                                       {{ $div_name->division_name }}
                                    </option>
                                    @endforeach
                                 </select>
                              </div>
                             
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Image Upload</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <div class="input-group mb-3">
                                    <div class="custom-file">
                                       <input name="file" id="file" type="file" onchange="showPreview(event);"/>
                                       <img src="../public/uploads/no-image.png" class="img"  id="output_image" name="output_image" >
                                        </div>
                                    <div class="input-group-append"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-md-6">
                           <div class="row">
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">User Type</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <select name="user_type" id="user_type" class="select2 form-control" required>
                                    @foreach($user_type as $user_type)
                                    <!-- @if($user_type == '') -->
                                    <option value="{{ $user_type->unique_id }}">
                                       {{ $user_type->user_type }}
                                    </option>
                                    <!-- @endif -->
                                    @endforeach
                                    
                                 </select>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">User Name</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="text" id="user_name" name="user_name" onkeyup="get_under_users(this.value)" class="form-control" value="" required>
                              </div>

                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Mobile No</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="tel" id="mobile_no" name="mobile_no" class="form-control" onkeypress="return onlyNumberKey(event)"   maxlength="10"  required>
                                 <!-- onkeypress="number_only(event);" minlength="10" maxlength="10" -->
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Email Id</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="mail" id="email_id" name="email_id" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="" required>
                              </div>
 
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Password<br><p>(Minimum 6 letters)</p></label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="password" id="password" name="password" class="form-control" value="" required>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Confirm Password<br><p>(Minimum 6 letters)</p></label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="password" id="confirm_password" name="confirm_password" onkeyup="checkPass(); return false;" class="form-control" value="" required>
                                 <span id="confirmMessage" class="confirmMessage"></span>
                              </div>

                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Active Status</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <select name="is_active" id="is_active" class="select2 form-control" required>
                                    <?php echo $active_status_options; ?>
                                 </select>
                                 <!-- <select name="is_active" id="is_active" class="select2 form-control" required>
                                    <option value='1' selected='selected'>Active</option>
                                    <option value='0'>In Active</option>
                                 </select> -->
                              </div>

                           </div>
                           <div class="form-group row">
                              <div class="col-md-12 float-right text-right">
                                 <!-- Cancel,save and update Buttons -->
                                 <a href="{{ URL::previous() }}">
                                    <button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button>
                                 </a>
                                 <button type="submit" class="btn btn-success waves-effect waves-light createupdate_btn ">Save</button>
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
        function onlyNumberKey(evt) {
              
            // Only ASCII character in that range allowed
            var ASCIICode = (evt.which) ? evt.which : evt.keyCode
            if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                return false;
            return true;
        } 


        function checkPass()
	{ 
		//Store the password field objects into variables ...
		var pass1 = document.getElementById('password');
		var pass2 = document.getElementById('confirm_password');
		//Store the Confimation Message Object ...
		var message = document.getElementById('confirmMessage');
		//Set the colors we will be using ...
		var goodColor = "#66cc66";
		var badColor = "#ff6666";
		//Compare the values in the password field 
		//and the confirmation field
		if(pass1.value == pass2.value){
			//The passwords match. 
			//Set the color to the good color and inform
			//the user that they have entered the correct password 
			pass2.style.backgroundColor = goodColor;
			message.style.color = goodColor;
			message.innerHTML = "Passwords Match!"
		}else{
			//The passwords do not match.
			//Set the color to the bad color and
			//notify the user.
			pass2.style.backgroundColor = badColor;
			message.style.color = badColor;
			message.innerHTML = "Passwords Do Not Match!"
		}
	}
    </script>
 <script>
   function showPreview(event){
      if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("output_image");
        preview.src = src;
      }
    }
    </script>

    