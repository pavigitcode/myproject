<html>
@extends('menu/header')
@extends('menu/menu')

<link href="{{ asset('http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js')}} ">
<link rel="stylesheet" href="{{ asset('http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css')}} ">
<script src="{{asset('public/asset/onlinecdn/jquery.min.js')}}"></script>



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
                    <h1 class="mr-2"> Officer Registration</h1>
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
                <form class="was-validated" method="post" action="{{ route('officeregistration.store') }}" autocomplete="off">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Officer Name</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="officer_name" name="officer_name" placeholder="" required>
                        </div>
                        <label class="col-sm-2 col-form-label" for="">GPF/CPS Number</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="gpf_cps_no" name="gpf_cps_no" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Designation Name</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="off_designation_name" name="off_designation_name">
                                <option selected="selected">Select the Designation Name </option>
                                @foreach($off_designation_name_options as $off_designation_name)
                                <option value="{{ $off_designation_name->unique_id }}">
                                    {{ $off_designation_name->designation_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-sm-2 col-form-label" for="">Division Name</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="off_division_name" name="off_division_name">
                                <option selected="selected">Select the Division Name</option>
                                @foreach($off_division_name_options as $off_division_name)
                                <option value="{{ $off_division_name->unique_id }}">
                                    {{ $off_division_name->division_name }}
                                </option>
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
                            <input class="form-control" type="Date" id="from_date" name="from_date" value="{{ Request::get('from_date')?? date('Y-m-d')}}">
                        </div>

                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">To Date</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="Date" id="to_date" name="to_date" value="" required>
                            <!-- {{ Request::get('to_date')?? date('Y-m-d')}} -->
                        </div>
                        <label class="col-sm-2 col-form-label" for="phone">Shift</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="shift" name="shift">
                                <option value="day_shift">Day Shift</option>
                                <option value="night_shift">Night Shift</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="">Mobile No</label>
                        <div class="col-sm-4">
                            <input type="tel" class="form-control" id="mobile_no" name="mobile_no" onkeypress="return onlyNumberKey(event)" maxlength="10" class="form-control" placeholder="" required>
                        </div>

                        <label class="col-sm-2 col-form-label" for="">E-mail ID</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="" required>
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
                        <label class="col-sm-2 col-form-label" for="">Status</label>
                        <div class="col-sm-4">
                            <select name="is_active" id="is_active" class="select2 form-control" required>
                                <option value='1' selected='selected'>Active</option>
                                <option value='0'>In Active</option>
                            </select>
                        </div>
                        <div class="col-md-12" align="right">
                            <!-- Cancel,save and update Buttons -->
                            <a href="../officeregistration">
                                <button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a>
                            <button type="submit" class="btn btn-success waves-effect waves-light createupdate_btn">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@extends('menu/footer')


<script>
    // var timepicker = new TimePicker('time', {
    //     lang: 'en',
    //     theme: 'dark'
    // });

    // var input = document.getElementById('time');

    // timepicker.on('change', function(evt) {

    //     var value = (evt.hour || '00') + ':' + (evt.minute || '00');
    //     evt.element.value = value;

    // });


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
