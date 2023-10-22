@extends('menu/header')
@extends('menu/menu')
@section('content')

<script src="{{asset('public/asset/onlinecdn/jquery.min.js')}}"></script>


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

$officer_name = "";
$gpf_cps_no = "";
$off_division_name= "";
$off_designation_name = "";
$mobile_no = "";
$email = "";
$is_active = 1;

$off_division_name_options = division_creations();
$off_designation_name_options = designation_creations_officer();
$active_status_options= active_status($is_active);
@endphp
<div class="main-content-wrap d-flex flex-column" style="margin-top: 60px;">
    <div class="main-content">
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb">
                    <h1 class="mr-2">Officer Registration</h1>
                    <ul>
                        <li><a href="#">Settings</a></li>
                        <li> Officer Registration</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="card text-left">
            <div class="card-body">
                <form class="was-validated" method="post" action="{{ route('officeregistration.update',$officeregistration->id) }}" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">officer Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="officer_name" name="officer_name" placeholder="" value="{{ $officeregistration->officer_name }}" required>
                        </div>
                        <label class="col-sm-2 col-form-label" for="">GPF/CPS Number</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="gpf_cps_no" name="gpf_cps_no" placeholder="" value="{{ $officeregistration->gpf_cps_no }}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Designation Name</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="off_designation_name" name="off_designation_name" required>
                                @foreach($off_designation_name_options as $off_designation_name)
                                <option value="{{ $off_designation_name->unique_id }}" {{  $off_designation_name->unique_id == $officeregistration->off_designation_name ? 'selected' : '' }}>{{ $off_designation_name->designation_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-sm-2 col-form-label" for="">Division Name</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="off_division_name" name="off_division_name" required>
                                @foreach($off_division_name_options as $off_division_name)
                                <option value="{{ $off_division_name->unique_id }}" {{  $off_division_name->unique_id == $officeregistration->off_division_name ? 'selected' : '' }}>{{ $off_division_name->division_name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Roving Squad Number<br>(User Name)</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="roving_squad_no" name="roving_squad_no">
                                <option value="">Select Roving Squad Number</option>
                            </select>

                        </div>
                        <label class="col-sm-2 col-form-label" for="">From Date</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="Date" id="from_date" name="from_date"value="{{ $officeregistration->from_date }}">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">To Date</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="Date" id="to_date" name="to_date" value="{{ $officeregistration->to_date }}" required>
                            <!-- {{ Request::get('to_date')?? date('Y-m-d')}} -->
                        </div>
                        <label class="col-sm-2 col-form-label" for="phone">Shift</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="shift" name="shift">


                                <option value="day_shift" {{ $officeregistration->shift == 'day_shift' ? 'selected' : '' }}>Day Shift</option>
                                <option value="night_shift" {{ $officeregistration->shift == 'night_shift' ? 'selected' : '' }}>Night Shift</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Mobile No</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="mobile_no" name="mobile_no" onkeypress="return onlyNumberKey(event)" maxlength="10" placeholder="" value="{{ $officeregistration->mobile_no }}" required>
                        </div>
                        <label class="col-sm-2 col-form-label" for="">E-mail ID</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="" value="{{ $officeregistration->email }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-4">
                            <input type="password" id="password" name="password" class="form-control" value="" required>
                        </div>
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-4">
                            <input type="password" id="confirm_password" name="confirm_password" onkeyup="checkPass(); return false;" class="form-control" value="" required>
                            <span id="confirmMessage" class="confirmMessage"></span>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Status</label>
                        <div class="col-sm-4">
                            <select name="is_active" id="is_active" class="select2 form-control" required>
                                <option value='1' {{ $officeregistration->is_active == '1' ? 'selected' : '' }}>Active</option>
                                <option value='0' {{ $officeregistration->is_active == '0' ? 'selected' : '' }}>In Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row ">
                        <div class="col-md-12" align="right">
                            <!-- Cancel,save and update Buttons -->
                            <a href="{{ route('officeregistration.index') }}"><button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a>
                            <button type="submit" class="btn btn-success waves-effect waves-light createupdate_btn">update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@extends('menu/footer')

<script>
    $(document).ready(function() {

        $.ajax({
            type: "GET",
            url: '{{ route("roving_squad_list.index") }}',
            data: {
                'division_id': $('#off_division_name').val()
            },
            cache: false,
            success: function(data) {
                if (data && data.length > 0) {
                    // alert(data);
                    data = $.parseJSON(data); //parse response string
                    // alert(data.offence_names);
                    // var k=0;

                    $.each(data.roving_squad, function(i, item) {
                        // console.log(item.unique_id);
                        // alert(item.unique_id);
                        $('#roving_squad_no').append($('<option/>', {
                            value: item.roving_squad_number,
                            text: item.roving_squad_number
                        }));

                    });

                }
                //   console.log("3:"+data);
            }
        });
    })


    function onlyNumberKey(evt) {

        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }



    function checkPass() {
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
        if (pass1.value == pass2.value) {
            //The passwords match.
            //Set the color to the good color and inform
            //the user that they have entered the correct password
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Passwords Match!"
        } else {
            //The passwords do not match.
            //Set the color to the bad color and
            //notify the user.
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = "Passwords Do Not Match!"
        }
    }

    $('#off_division_name').on('change', function() {
        // alert('hi');
        // alert($('#off_division_name').val());
        $.ajax({
            type: "GET",
            url: '{{ route("roving_squad_list.index") }}',
            data: {
                'division_id': $(this).val()
            },
            cache: false,
            success: function(data) {
                if (data && data.length > 0) {
                    // alert(data);
                    data = $.parseJSON(data); //parse response string
                    // alert(data.offence_names);
                    // var k=0;

                    $.each(data.roving_squad, function(i, item) {
                        // console.log(item.unique_id);
                        // alert(item.unique_id);
                        $('#roving_squad_no').append($('<option/>', {
                            value: item.roving_squad_number,
                            text: item.roving_squad_number
                        }));

                    });

                }
                //   console.log("3:"+data);
            }
        });
    })
</script>

</html>
