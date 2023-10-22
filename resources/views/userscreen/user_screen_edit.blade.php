<!-- @extends('menu/header')
@extends('menu/menu') -->


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



$main_screen_options  = main_screen();
$user_screen_options  = section_name();
$department_options  = division_creation();
$dashboard_setting_menu_options  = dashboard_settings_creation();
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
                <form class="was-validated" method="post" action="{{ route('userscreen.update',$userscreen->id) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Main Screen</label>
                                        <div class="col-8 col-xl-9 mrg-btm">
                                            <select name="main_screen_unique_id" id="main_screen_unique_id" class="select2 form-control" required>
                                                @foreach($main_screen_options as $main_screen_unique_id)
                                                <option value="{{ $main_screen_unique_id->unique_id }}" {{  $main_screen_unique_id->unique_id == $userscreen->main_screen_unique_id ? 'selected' : '' }}>{{ $main_screen_unique_id->screen_main_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Screen Name</label>
                                        <div class="col-8 col-xl-9 mrg-btm">
                                            <input type="text" id="user_screen_name" name="user_screen_name" class="form-control" value="{{ $userscreen->user_screen_name }}" required>
                                        </div>
                                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Order No</label>
                                        <div class="col-8 col-xl-9 mrg-btm">
                                            <input type="number" id="order_no" name="order_no" class="form-control" value="{{ $userscreen->order_no }}" required>
                                        </div>
                                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Icon</label>
                                        <div class="col-8 col-xl-9 mrg-btm">
                                            <input type="text" id="icon_name" name="icon_name" class="form-control" value="{{ $userscreen->icon_name }}" placeholder="Material Design Icon" required>
                                        </div>
                                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Dashboard Setting</label>
                                        <div class="col-8 col-xl-9 mrg-btm">
                                            <select name="dashboard_setting_menu" id="dashboard_setting_menu" class="select2 form-control" required>
                                                @foreach($dashboard_setting_menu_options as $dashboard_setting_menu)
                                                <option value="{{ $dashboard_setting_menu->unique_id }}" {{  $dashboard_setting_menu->unique_id == $userscreen->dashboard_setting_menu ? 'selected' : '' }}>{{ $dashboard_setting_menu->settings_name }}</option>
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
                                                {{-- @foreach($user_screen_options as $screen_section_unique_id)
                                                <option value="{{ $screen_section_unique_id->unique_id }}" {{  $screen_section_unique_id->unique_id == $userscreen->screen_section_unique_id ? 'selected' : '' }}>{{ $screen_section_unique_id->screen_name }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div> -->
                                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Folder Name</label>
                                        <div class="col-8 col-xl-9 mrg-btm">
                                            <input type="text" id="folder_name" name="folder_name" class="form-control" value="{{ $userscreen->folder_name }}" required>
                                        </div>
                                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Active Status</label>
                                        <div class="col-8 col-xl-9 mrg-btm">
                                        <select name="is_active" id="is_active" class="select2 form-control" required>
                                    <option value='1' {{ $userscreen->is_active == '1' ? 'selected' : '' }}>Active</option>
                                    <option value='0' {{ $userscreen->is_active == '0' ? 'selected' : '' }}>In Active</option>
                                       </select>
                                        </div>

                                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Department Name
                                        </label>
                                        <div class="col-8 col-xl-9 mrg-btm">
                                            <select name="department_id" id="department_id" class="select2 form-control" required>
                                                @foreach($department_options as $department_id)
                                                <option value="{{ $department_id->unique_id }}" {{  $department_id->unique_id == $userscreen->department_id ? 'selected' : '' }}>{{ $department_id->division_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Description</label>
                                        <div class="col-8 col-xl-9 mrg-btm">
                                            <textarea name="description" value="{{ $userscreen->description }}" id="description" rows="5" class="form-control">{{ $userscreen->description }}</textarea>
                                            </textarea>
                                        </div>
                                    </div>
                                    <h4 class="header-title" style="color: #343a40;">Actions </h4>
                     <div class="form-group row ">
                        <ul>
                                <li>
                                <input type="checkbox" name="adopted" id="all" class="action_check" value="" {{  ($userscreen->actions) ? ' checked' : '' }}> <label>All</label><br>
                                <input type="checkbox" name="adopted1" id="adopted1" class="action_check" value="5f8807ff00bf726601" {{  ($userscreen->actions) ? ' checked' : '' }}> <label>Add</label><br>
                                <input type="checkbox" name="adopted2" id="adopted2" class="action_check" value="5f8807ff00bf726601" {{  ($userscreen->actions) ? ' checked' : '' }}> <label>Update</label><br>
                                <input type="checkbox" name="adopted3" id="adopted3" class="action_check" value="5f88083fd50a344823" {{  ($userscreen->actions) ? ' checked' : '' }}> <label>List</label><br>
                                <input type="checkbox" name="adopted4" id="adopted4" class="action_check" value="5f8808504271036738" {{  ($userscreen->actions) ? ' checked' : '' }}> <label>Delete</label><br>
                                <input type="checkbox" name="adopted5" id="adopted5" class="action_check" value="5f88085e1fcea66282" {{  ($userscreen->actions) ? ' checked' : '' }}> <label>View</label><br>
                                <input type="checkbox" name="adopted6" id="adopted6" class="action_check" value="5ff043a4f277448188" {{  ($userscreen->actions) ? ' checked' : '' }}> <label>Print</label>

                                </li>

                            </ul>
                            </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-12" align="right">
                                    <!-- Cancel,save and update Buttons -->
                                    <a href="{{ route('userscreen.index') }}"><button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a>
                                    <button type="submit" class="btn btn-success waves-effect waves-light createupdate_btn">update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
<link href="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js')}} ">

<script> // CheckBox Change Functions
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