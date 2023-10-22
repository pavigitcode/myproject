@extends('menu/header')
@extends('menu/menu')

@php

$is_btn_disable = "";

$unique_id = "";

$main_screen_unique_id = "";
$screen_section_unique_id = "";
$folder_name= "";
$order_no = "";
$icon_name = "";
$is_active = 1;
$description = "";
$user_action_selected = "";


$main_screen_options = main_screen();
// $user_screen_options = screen_sections();
$department_options = division_creation();
$user_action_options = user_actions();
$user_action_options = user_action_list($user_action_options, $user_action_selected);
$dashboard_setting_menu_options = dashboard_settings_creation();
$active_status_options= active_status($is_active);
@endphp
<div class="main-content-wrap d-flex flex-column" style="margin-top: 60px;">
   <div class="main-content">
      <div class="row">
         <div class="col-md-6">
            <div class="breadcrumb">
               <h1 class="mr-2">User Screen</h1>
               <ul>
                  <li><a href="#">Admin</a></li>
                  <li>User Screen</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="card text-left">
         <div class="card-body">
            <form class="was-validated" method="post" action="{{ route('userscreen.store') }}" autocomplete="off">
               @csrf
               <div class="row">
                  <div class="col-12">
                     <!-- <h4 class="header-title">Delivery / Invoice Details </h4> -->
                     <div class="row mb-3">
                        <div class="col-12 col-md-6">
                           <div class="row">
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Main Screen</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <select name="main_screen_unique_id" id="main_screen_unique_id" class="select2 form-control" required>
                                    <option selected="selected">Select the Main Screen</option>
                                    @foreach($main_screen_options as $main_screen_unique_id)
                                    <option value="{{ $main_screen_unique_id->unique_id }}">
                                       {{ $main_screen_unique_id->screen_main_name }}
                                    </option>
                                    @endforeach
                                 </select>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Screen Name</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="text" id="user_screen_name" name="user_screen_name" class="form-control" value="" required>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Order No</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="number" id="order_no" name="order_no" class="form-control" value="" required>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Icon</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="text" id="icon_name" name="icon_name" class="form-control" value="" placeholder="Material Design Icon" required>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Dashboard Setting</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <select name="dashboard_setting_menu" id="dashboard_setting_menu" class="select2 form-control" required>
                                    @foreach($dashboard_setting_menu_options as $dashboard_setting_menu)
                                    <option value="{{ $dashboard_setting_menu->unique_id }}">
                                       {{ $dashboard_setting_menu->settings_name }}
                                    </option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-md-6">
                           <div class="row">
                              <!-- <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Screen Section</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <select name="screen_section_unique_id" id="screen_section_unique_id" class="select2 form-control">
                                    <option selected="selected">Select the Main Screen</option>
                                    {{-- @foreach($user_screen_options as $screen_section_unique_id)
                                    <option value="{{ $screen_section_unique_id->unique_id }}">
                                       {{ $screen_section_unique_id->screen_name }}
                                    </option>
                                    @endforeach --}}
                                 </select>
                              </div> -->
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Folder Name</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <input type="text" id="folder_name" name="folder_name" class="form-control" value="" required>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Active Status</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <select name="is_active" id="is_active" class="select2 form-control" required>
                                    <option value='1' selected='selected'>Active</option>
                                    <option value='0'>In Active</option>
                                 </select>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Department Name</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <select name="department_id" id="department_id" class="select2 form-control" required>
                                    @foreach($department_options as $department_name)
                                    <option value="{{ $department_name->unique_id }}">
                                       {{ $department_name->division_name }}
                                    </option>
                                    @endforeach
                                 </select>
                              </div>
                              <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Description</label>
                              <div class="col-8 col-xl-9 mrg-btm">
                                 <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                              </div>
                           </div>
                           <h4 class="header-title" style="color: #343a40;">Actions </h4>
                           <div class="form-group row ">
                              <ul class="ks-cboxtags">
                                 <?php echo $user_action_options; ?>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row ">
                        <div class="col-md-12" align="right">
                           <!-- Cancel,save and update Buttons -->
                           <a href="../userscreen"><button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a>
                           <button type="submit" class="btn btn-success waves-effect waves-light createupdate_btn ">Save</button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- <link href="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js')}} "> -->

<script>
   // CheckBox Change Functions
   $('#all').change(function(e) {

      if (e.currentTarget.checked) {

         $('.action_check').prop('checked', true);

      } else {

         $('.action_check').prop('checked', false);
      }

   });

   $('.action_check').change(function(e) {

      var all_check = 1;

      $('.action_check').each(function() {

         if (this.checked) {
            all_check *= 1;
         } else {
            all_check *= 0;
         }

         if (all_check) {
            $('#all').prop('checked', true);
         } else {
            $('#all').prop('checked', false);
         }
      });
   });
</script>

@extends('menu/footer')