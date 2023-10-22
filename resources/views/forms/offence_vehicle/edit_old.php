<!DOCTYPE html>
<html lang="en" dir="">
<style>
    .btn-toolbar.sw-toolbar.sw-toolbar-bottom.justify-content-end {
        float: left;
    }

    .btn-group.mr-2.sw-btn-group-extra {
        display: none;
    }

    .form-p p {
        font-size: 14px;
        color: #555;
        font-weight: 700;
        margin-bottom: 5px;
    }

    h3.offence-no span {
        font-size: 20px;
        font-weight: 700;
    }

    h3.offence-no {
        font-size: 18px;
        text-align: end;
    }

    .table th,
    .table td {
        padding: 0.4rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    table.table.table-striped.table-font-s tr th,
    td {
        font-size: 14px !important;
    }

    a.text-default.collapsed.btn-acc i {
        line-height: 17px;
        vertical-align: bottom;
    }

    a.text-default.collapsed.btn-acc {
        background: #003473;
        color: #fff;
        font-size: 13px;
    }

    .acc-bg {
        background: unset !important;
        text-align: center;
        border: 0px !important;
    }

    a.text-default.btn-acc {
        background: #003473;
        color: #fff;
        font-size: 13px;
        padding: 9px;
        border-radius: 3px;
    }

    div#smartwizard a small {
        color: #000;
        font-size: 15px;
        font-weight: 600;
    }

    .btn-toolbar.sw-toolbar.sw-toolbar-top.justify-content-end {
        display: none;
    }

    .sw-theme-default>ul.step-anchor>li.active>a {
        color: #00306b !important;

    }

    div#smartwizard a.nav-link {
        font-size: 15px;
        font-weight: 600;
    }

    div#smartwizard a {
        color: #a29f9f !important;
    }

    .main-content {
        margin-top: 23px;
    }

    .collapse1 {
        font-size: 13px;
        border: 1px solid lightgray;
    }

    .data {
        color: black;
        font-size: 12px;
        text-align: center;
        vertical-align: middle;
    }

    /*!
 * SmartWizard v4.3.x
 * jQuery Wizard Plugin
 * http://www.techlaboratory.net/smartwizard
 *
 * Created by Dipu Raj
 * http://dipuraj.me
 *
 * Licensed under the terms of MIT License
 * https://github.com/techlab/SmartWizard/blob/master/LICENSE
 */

    /* SmartWizard Basic CSS */
    .sw-main {
        position: relative;
        display: block;
        margin: 0;
        padding: 0;
        border-radius: .25rem !important;
    }

    .sw-main .sw-container {
        display: block;
        margin: 0;
        padding: 0;
        position: relative;
    }

    .sw-main .step-content {
        display: none;
        position: relative;
        margin: 0;
    }

    .sw-main .sw-toolbar {
        margin-left: 0;
    }

    /* SmartWizard Theme: White */
    .sw-theme-default {
        -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3);
    }

    .sw-theme-default .sw-container {
        min-height: 250px;
    }

    .sw-theme-default .step-content {
        padding: 10px;
        border: 0px solid #D4D4D4;
        background-color: #FFF;
        text-align: left;
    }

    .sw-theme-default .sw-toolbar {
        background: #f9f9f9;
        border-radius: 0 !important;
        padding-left: 10px;
        padding-right: 10px;
        padding: 10px;
        margin-bottom: 0 !important;
    }

    .sw-theme-default .sw-toolbar-top {
        border-bottom-color: #ddd !important;
    }

    .sw-theme-default .sw-toolbar-bottom {
        border-top-color: #ddd !important;
    }

    .sw-theme-default>ul.step-anchor>li {
        position: relative;
        margin-right: 2px;
    }

    .sw-theme-default>ul.step-anchor>li>a,
    .sw-theme-default>ul.step-anchor>li>a:hover {
        border: none !important;
        color: #bbb;
        text-decoration: none;
        outline-style: none;
        background: transparent !important;
        border: none !important;
        cursor: not-allowed;
    }

    .sw-theme-default>ul.step-anchor>li.clickable>a:hover {
        color: #4285F4 !important;
        background: transparent !important;
        cursor: pointer;
    }

    .sw-theme-default>ul.step-anchor>li>a::after {
        content: "";
        background: #003473;
        height: 2px;
        position: absolute;
        width: 100%;
        left: 0px;
        bottom: 0px;
        -webkit-transition: all 250ms ease 0s;
        transition: all 250ms ease 0s;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
    }

    .sw-theme-default>ul.step-anchor>li.active>a {
        border: none !important;
        color: #4285F4 !important;
        background: transparent !important;
        cursor: pointer;
    }

    .sw-theme-default>ul.step-anchor>li.active>a::after {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
    }

    .sw-theme-default>ul.step-anchor>li.done>a {
        border: none !important;
        color: #000 !important;
        background: transparent !important;
        cursor: pointer;
    }

    .sw-theme-default>ul.step-anchor>li.done>a::after {
        background: #5cb85c;
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
    }

    .sw-theme-default>ul.step-anchor>li.danger>a {
        border: none !important;
        color: #d9534f !important;
        /* background: #d9534f !important; */
        cursor: pointer;
    }

    .sw-theme-default>ul.step-anchor>li.danger>a::after {
        background: #d9534f;
        border-left-color: #f8d7da;
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
    }

    .sw-theme-default>ul.step-anchor>li.disabled>a,
    .sw-theme-default>ul.step-anchor>li.disabled>a:hover {
        color: #eee !important;
        cursor: not-allowed;
    }

    /* Responsive CSS */
    @media screen and (max-width: 768px) {
        .sw-theme-default>.nav-tabs>li {
            float: none !important;
        }
    }

    /* Common Loader */
    .sw-loading::after {
        position: absolute;
        display: block;
        opacity: 1;
        content: "";
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: rgba(255, 255, 255, .7);
        -webkit-transition: all .2s ease;
        transition: all .2s ease;
        z-index: 2;
    }

    .sw-loading::before {
        content: '';
        display: inline-block;
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 10;
        border: 10px solid #f3f3f3;
        border-radius: 50%;
        border-top: 10px solid #3498db;
        width: 80px;
        height: 80px;
        margin-top: -40px;
        margin-left: -40px;
        -webkit-animation: spin 1s linear infinite;
        /* Safari */
        animation: spin 1s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    .btn-group.mr-2.sw-btn-group {
        margin: 14px;
    }
</style>


@extends('menu/header')
@extends('menu/menu')
<!-- Mirrored from demos.ui-lib.com/gull/html/layout3/smart.wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Dec 2022 05:20:33 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<meta name="csrf-token" content="{{ csrf_token() }}" />


<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- <title>Smart Wizard | Gull Admin Template</title> -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />

    <script src="{{ asset('public/asset/dist-assets/css/themes/lite-purple.min.css')}}"></script>

    <script src="{{ asset('public/asset/dist-assets/css/plugins/perfect-scrollbar.min.css')}}"></script>

    <script src="{{ asset('public/asset/dist-assets/css/plugins/smart.wizard/smart_wizard_theme_arrows.min.css')}}"></script>

    <script src="{{ asset('public/asset/dist-assets/css/plugins/smart.wizard/smart_wizard_theme_circles.min.css')}}"></script>

    <script src="{{ asset('public/asset/dist-assets/css/plugins/smart.wizard/smart_wizard.min.css')}}"></script>

    <script src="{{ asset('public/asset/dist-assets/css/plugins/smart.wizard/smart_wizard_theme_dots.min.css')}}"></script>
</head>
@php
$is_btn_disable = "";
$unique_id = "";
$off_division_name_options = division_creations();
$roving_squad_number_options = roving_squad();
$name_of_officer_options= officer_registration();
$nature_offence_name=offence_name();
$nature_of_section=offence_section();

$consignee_circle_options=consignor_creation();
$hsn_code = hsn_code();

$consignor_division = division_creation();
$offence_section_name =offence_section_name();

@endphp
$nature_offence_names=offence_section_name_id({{ $offence_vehicle->nature_of_the_offense }});


<body class="text-left">
    <!-- <div class="app-admin-wrap layout-horizontal-bar"> -->


    <!-- =============== Horizontal bar End ================-->
    <div class="main-content-wrap d-flex flex-column" style="margin-top: 60px;">
        <!-- ============ Body content start ============= -->
        <div class="main-content">

            <div class="row">
                <div class="col-md-6">
                    <div class="breadcrumb">
                        <h1 class="mr-2">Offence Booking Form</h1>
                        <ul>
                            <li><a href="#">Form</a></li>
                            <li>Offence Booking Form</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </div>
            <div class="separator-breadcrumb border-top"></div>

            <div class="row">
                <div class="col-md-12">
                    <!--  SmartWizard html -->
                    <div id="smartwizard">
                        <ul>
                            <li><a href="#step-1">Step 1<br /><small>Officer Details</small></a></li>
                            <li><a href="#step-2">Step 2<br /><small>Offence Booking Details</small></a></li>
                            <li><a href="#step-3">Step 3<br /><small>Penality Details</small></a></li>
                            <li><a href="#step-4">Step 4<br /><small>Order Processing</small></a></li>
                        </ul>
                        <div>
                            <!-- officer details tab -->
                            <div id="step-1">
                                <h3 class="border-bottom border-gray pb-2">
                                    <!-- <form class="was-validated">
                                        @csrf -->
                                    <div class="row form-p">
                                        <div class="col-md-2 form-group mb-3"></div>
                                        <div class="col-md-2 form-group mb-3"></div>
                                        <div class="col-md-8 form-group mb-3">
                                            <h3 class="offence-no">OFFENCE NO :<span>{{ $offence_vehicle->poi_no }}</span></h3>
                                            <input type="hidden" name="poi_num" id="poi_num" value="{{ $offence_vehicle->poi_no }}" />

                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="picker1">Intelligence Division</label>
                                            <select class="form-control" id="intelligence_division" name="intelligence_division">
                                                <option value="">Select Division</option>
                                                @foreach($off_division_name_options as $intelligence_division)
                                                <option value="{{ $intelligence_division->unique_id }}" {{  $intelligence_division->unique_id == $offence_vehicle->intelligence_division ? 'selected' : '' }}>
                                                    {{ $intelligence_division->division_name }}
                                                </option>
                                                
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="picker1">Roving Squad</label>
                                            <select class="form-control" id="roving_squad_no" name="roving_squad_no">
                                                {{-- <option value="">Select Roving Squad</option>
                                                @foreach($roving_squad_number_options as $roving_squad_no)
                                                <option value="{{ $roving_squad_no->unique_id }}" {{  $roving_squad_no->unique_id == $offence_vehicle->roving_squad_no ? 'selected' : '' }}>
                                                    {{ $roving_squad_no->roving_squad_number }}
                                                </option>
                                                @endforeach  --}}
                                               
                                                  <!-- <option value="">Select Roving Squad</option> -->
                                               
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="birthday">Duty Date</label>
                                            <input type="date" id="duty_date" name="duty_date" class="form-control" value="{{ $offence_vehicle->duty_date }}">
                                        </div>
                                        <input type="text" id="offence_id" name="offence_id" value="{{ $offence_vehicle->id }}" hidden>
                                        <!-- officer details sublist start  -->
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="firstName1">Name of the officer - Mobile No</label>
                                            <!-- <input class="form-control" id="firstName1" type="searh" >-->
                                            <select class="form-control" id="name_of_officer" name="name_of_officer">
                                                <!-- <option value="">Select the Officer Name</option> -->
                                                <!-- @foreach($name_of_officer_options as $name_of_officer)
                                                <option value="{{ $name_of_officer->unique_id }}">
                                                    {{ $name_of_officer->officer_name}} -
                                                    {{ $name_of_officer->mobile_no}}
                                                </option>
                                                @endforeach -->
                                            </select>
                                        </div>
                                         <!-- <div class="col-md-4 form-group mb-3">
                                                    <label for="firstName1"> officer Mobile No</label> -->
                                                    <!-- <input class="form-control" id="firstName1" type="searh" >-->
                                                    <!-- <select class="form-control" id="officer_mobile_no" name="officer_mobile_no">
                                                        @foreach($name_of_officer_options as $officer_mobile_no)
                                                        <option value="{{ $officer_mobile_no->unique_id }}">
                                        {{ $officer_mobile_no->mobile_no }}
                                        </option>
                                        @endforeach
                                        </select>
                                    </div>  -->
                                    <div class="col-md-3 form-group mb-3">
                                        <label for="phone">Designation</label><br>
                                        <input type="text" class="form-control" id="designation" name="designation" required>
                                    </div>
                                    <div class="col-md-3 form-group mb-3">
                                        <label for="phone">GPF/CPS Number</label><br>
                                        <input type="text" class="form-control" id="gpf_cps_number" name="gpf_cps_number" required>
                                    </div>
                                    <input type="hidden" class="form-control" id="mobile_no" name="mobile_no" required>
                                    <div class="col-md-2">
                                        <div class="accordion" id="accordionExample">
                                            <div class="card ul-card__border-radius">
                                                <div class="card-header acc-bg">
                                                    <h6 class="card-title mb-0">
                                                        <a class="text-default collapsed btn-acc" data-toggle="collapse" href="#accordion-item-group1" aria-expanded="false" id="officer_sublist"> <i class="i-Add"></i> Add New
                                                        </a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="collapse1" id="accordion-item-group1 " data-parent="#accordionExample">

                                            <div class="table-responsive">
                                                <table id="demo" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Officer Name</th>
                                                            <th scope="col">Mobile No</th>
                                                            <th scope="col">Designation</th>
                                                            <th scope="col">GPF/CPS Number</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody1">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- sublist end  -->


                                    <div class="col-md-4">
                                    </div>
                                    <!-- <div class="col-md-3">
                                            <div class="add_btn text-right">
                                                <a href=""> <button class="btn btn-info m-1" type="button"> <i class="i-Add"></i> Add New</button></a>
                                            </div>
                                        </div>-->
                                    <div class="col-md-4 form-group mb-3">
                                        <label for="phone">Shift</label><br>
                                        <select class="form-control" id="shift" name="shift">
                                            <option value="">Select Shift</option>
                                            <option value='day_shift' {{ $offence_vehicle->shift == 'day_shift' ? 'selected' : '' }}>Day Shift</option>
                                            <option value='night_shift' {{ $offence_vehicle->shift == 'night_shift' ? 'selected' : '' }}>Night Shift</option>
                                            <!-- <option value="day_shift">Day Shift</option>
                                            <option value="night_shift">Night Shift</option> -->
                                        </select>
                                    </div>
                                    <!-- </form> -->
                            </div>
                            <!-- </form> -->
                            </h3>
                        </div>

                        <!-- offence booking details tab -->
                        <div id="step-2">
                            <!-- <form> -->

                            <div class="row form-p">
                                <div class="col-md-2 form-group mb-3"></div>
                                <div class="col-md-2 form-group mb-3"></div>
                                <div class="col-md-8 form-group mb-3">
                                    <h3 class="offence-no">OFFENCE NO :<span>{{ $offence_vehicle->poi_no }}</span></h3>
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="firstName1">Offence booked Vehicle Number</label>
                                    <!-- {{-- <p>TN09BE8123</p> --}} -->
                                    <input type="text" class="form-control" id="offense_booked_vehicle_number" name="offense_booked_vehicle_number" value="{{ $offence_vehicle->offense_booked_vehicle_number }}">
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="firstName1">Offence Register Number</label>
                                    <!-- {{-- <p>TN09BE8123</p> --}} -->
                                    <input type="text" class="form-control" id="offense_register_number" name="offense_register_number" value="{{ $offence_vehicle->offence_register_number }}">
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="firstName1"> Place of Interception</label>
                                    <input type="text" class="form-control" id="place_of_interception" name="place_of_interception" value="{{ $offence_vehicle->place_of_interception }}">
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="firstName1">Offence Booking Time</label>
                                    <input type="time" class="form-control" id="offense_booking_time" name="offense_booking_time" value="{{ $offence_vehicle->offense_booking_time }}">
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="picker1">Offence Section</label>
                                    <input type="hidden" name="id" value="{{$offence_section_1[0]['unique_id']}}" >                                
                               <!-- {{-- <p>Act-129</p> --}} -->
                                    <select class="form-control" id="offense_section" name="offense_section">
                                        
                                        <option value=""> Select Offence Section</option>
                                        <!-- @foreach($nature_of_section as $offense_section)
                                                <option value="{{ $offense_section->offence_section }}" {{  $offense_section->unique_id == $offence_vehicle->offense_section_unique ? 'selected' : '' }}>
                                                    {{ $offense_section->offence_section }}
                                                </option>
                                        @endforeach -->                                   
                                        <!-- @foreach($nature_of_section as $offense_section)
                                    <option value="{{ $offense_section->offence_section }}" {{  $offense_section->unique_id == $offence_vehicle->offense_section_unique ? 'selected' : '' }}>{{ $offense_section->offence_section }}</option>
                                          @endforeach -->
                                             @foreach($offence_sections as $offense_section)
                                             @if($offence_section_1[0]['nature_of_the_offense']==offense_section->unique_id)
                                    <option value="{{ $offense_section->unique_id }}" selected >{{ $offense_section->offence_section }}</option>
                                    @else
                                    <option value="{{ $offense_section->unique_id }}" >{{ $offense_section->offence_section }}</option>
                                    @endif
                                 @endforeach

                                    </select>
                                </div>

                                <div class="col-md-4 form-group mb-3">
                                    <label for="firstName1">Nature of the offence</label>
                                    <select class="form-control" id="nature_of_the_offense" name="nature_of_the_offense">
                                        <option value="">Select Offence Name</option>
                                       
                                          <!-- @foreach($offence_section_name as $nature_of_the_offense)
                                                <option value="{{ $nature_of_the_offense->unique_id }}" {{$nature_of_the_offense->unique_id == $offence_vehicle->nature_of_the_offense ? 'selected' : '' }}>
                                                    {{ $nature_of_the_offense->offence_name }}
                                                </option>
                                        
                                        @endforeach  -->
                                        <!-- @foreach($offence_section_name as $nature_of_the_offense)
                                        <option value="{{ $nature_of_the_offense->offence_name }}" {{ $nature_of_the_offense->unique_id == $offence_vehicle->nature_of_the_offense ? 'selected' : '' }}>
                                            {{ $nature_of_the_offense->offence_name }}</option>
                                        @endforeach -->
                                        
                                    </select>
                                </div>

                                <div class="col-md-4 form-group mb-3" id="nature_sub">
                                    <label>Nature of the Sub - Offence</label>
                                    <select class="form-control" id="nature_of_sub_offense" name="nature_of_sub_offense">
                                        <option value="">Select Sub Offence Name</option>
                                    </select>
                                </div>

                            </div>
                            <!-- </form> -->
                        </div>

                        <!-- Penality details tab -->
                        <div id="step-3">

                            <!-- <form> -->
                            <div class="row form-p">
                                <div class="col-md-2 form-group mb-3"></div>
                                <div class="col-md-2 form-group mb-3"></div>
                                <div class="col-md-8 form-group mb-3">
                                    <h3 class="offence-no">OFFENCE NO :<span>{{ $offence_vehicle->poi_no }}</span></h3>
                                </div>
                                <!-- <div class="row-md-12"> -->
                                <div class="col-md-4 form-group mb-3">
                                    <label for="firstName1">Goods value</label>
                                    <input type="tel" class="form-control" id="goods_value" name="goods_value" value="{{ $offence_vehicle->goods_value }}">
                                </div>
                                <!-- </div> -->

                                <div class="col-md-4 form-group mb-3">


                                    <label for="picker1">Commodity/HSN Code</label>
                                    <select class="form-control" id="count_of_commodity_involved" name="count_of_commodity_involved">
                                        <option value="">Select Commodity/HSN Code</option>
                                        @foreach($hsn_code as $hsn)
                                    <option value="{{ $hsn->unique_id }}">
                                            {{ $hsn->hsn_name."/".$hsn->hsn_code }}
                                        </option>
                                        @endforeach

                                        <!-- <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="others">Others</option> -->
                                    </select>
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="picker1">Tax Type</label>
                                    <select class="form-control" id="tax_type" name="tax_type">
                                        <option value="">Select Tax Type</option>
                                        <option value='intra' {{ $offence_vehicle->count_of_commodity_involved == 'intra' ? 'selected' : '' }}>Intra State</option>
                                        <option value='inter' {{ $offence_vehicle->count_of_commodity_involved == 'inter' ? 'selected' : '' }}>Inter State</option>
                                        <!-- <option value="intra">Intra State</option>
                                        <option value="inter">Inter State</option> -->
                                    </select>
                                </div>

                                <!-- inter state -->
                                <div class="col-md-4 form-group mb-3" id="intertwo">
                                    <label for="firstName1">Amount</label>
                                    <input type="text" class="form-control" id="inter_amount" name="inter_amount">
                                </div>
                                <div class="col-md-4 form-group mb-3" id="inter">
                                    <label for="firstName1">CGST-PENALTY</label>
                                    <input type="text" class="form-control" id="cgst_penalty" name="cgst_penalty">
                                </div>
                                <div class="col-md-4 form-group mb-3" id="interone">
                                    <label for="firstName1">SGST-PENALTY</label>
                                    <input type="text" class="form-control" id="sgst_penalty" name="sgst_penalty">
                                </div>

                                <!-- intra state -->
                                <div class="col-md-4 form-group mb-3" id="intraone">
                                    <label for="firstName1">Amount</label>
                                    <input type="text" class="form-control" id="intra_amount" name="intra_amount">
                                </div>
                                <div class="col-md-4 form-group mb-3" id="intra">
                                    <label for="firstName1">IGST-PENALTY</label>
                                    <input type="text" class="form-control" id="igst_penalty" name="igst_penalty">
                                </div>
                                <!-- <div class="col-md-4 form-group mb-3">
                                        <label for="firstName1">CESS-PENALTY</label>
                                        <input type="text" class="form-control" id="cess_penalty" name="cess_penalty">
                                    </div>
                                    <div class="col-md-4 form-group mb-3">
                                        <label for="firstName1">Total Penalty Levied and collected</label>
                                        <input type="text" class="form-control" id="penalty_levied_collected" name="penalty_levied_collected">
                                    </div> -->
                                <div class="col-md-2">
                                    <div class="accordion" id="taxaccordion">
                                        <div class="card ul-card__border-radius">
                                            <div class="card-header acc-bg">
                                                <h6 class="card-title mb-0">
                                                    <a class="text-default collapsed btn-acc" data-toggle="collapse" href="#accordion-item-group1" aria-expanded="false" id="tax_sublist"> <i class="i-Add"></i> Add New
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="collapse1" id="accordion-item-group1 " data-parent="#taxaccordion">

                                        <div class="table-responsive">
                                            <table id="demo" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">HSN Code</th>
                                                        <th scope="col">TAX TYPE</th>
                                                        <th scope="col">AMOUNT</th>
                                                        <th scope="col">CGST-PENALTY</th>
                                                        <th scope="col">SGST-PENALTY</th>
                                                        <th scope="col">IGST</th>
                                                        <th scope="col">Action</th>

                                                    </tr>

                                                </thead>

                                                <tbody id="taxbody">
                                                </tbody>
                                                <td colspan="2"><b>TOTAL:</b></td>
                                                <td></td>
                                                <td><span id="amount"></span></td>
                                                <td><span id="cgst"></span></td>
                                                <td><span id="sgst"></span></td>
                                                <td><span id="igst"></span></td>
                                            </table>
                                        </div>
                                    </div>
                                </div><br>
                                <!-- sublist end -->


                                <!-- penality consignor/consignee sublist -->

                                <div class="col-md-4 form-group mb-3">
                                    <label for="picker1">Is the Consignor Registered</label>
                                    <select class="form-control" id="consignor_registered" name="consignor_registered" onchange="demo()";>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>

                                <div class="col-md-4 form-group mb-3" id="consignor_tab">
                                    <label for="firstName1">GSTIN /Temporary ID of Consignor</label>
                                    <input type="text" class="form-control" id="temporary_id_of_consignor" name="temporary_id_of_consignor">
                                </div>
                                <div class="col-md-4 form-group mb-3" id="consignor_tab_one">
                                    <label for="firstName1">Name of the Consignor</label>
                                    <input type="text" class="form-control" id="name_of_the_consignor" name="name_of_the_consignor">
                                </div>
                                <div class="col-md-4 form-group mb-3" id="consignor_tab_two">
                                    <label for="picker1">Consignor division</label>
                                    <select class="form-control" id="consignor_division" name="consignor_division">
                                        <option value=" ">Select Consignor Division</option>
                                        @foreach($consignor_division as $consignor_data)
                                        <option value="{{ $consignor_data->division_name }}">
                                            {{ $consignor_data->division_name }}
                                        </option>
                                        @endforeach
                                        <option value="other">If other Division</option>
                                    </select>
                                </div>

                                <div class="col-md-4 form-group mb-3" id="consignor_other_division">
                                    <label for="picker1">Consignor Other Division</label>
                                    <input type="text" class="form-control" id="consignor_other_div" name="consignor_other_div">
                                </div>

                                <div class="col-md-4 form-group mb-3" id="consignor_tab_three">
                                    <label for="picker1">Consignor Circle details</label>
                                    <select class="form-control" id="consignor_circle_details" name="consignor_circle_details">
                                        <option value=" ">Select Consignor Circle</option>
                                        @foreach($consignee_circle_options as $consignor_circle_details)
                                        <option value="{{ $consignor_circle_details->consignee_circle }}">
                                            {{ $consignor_circle_details->consignee_circle }}
                                        </option>
                                        @endforeach
                                        <option value="nill">Nill</option>
                                    </select>
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="picker1">Is the Consignee Registered</label>
                                    <select class="form-control" id="consignee_registered" name="consignee_registered" onchange="demo()";>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                </div>
                                <!-- <div  > -->
                                <div class="col-md-4 form-group mb-3" id="consignee_tab">
                                    <label for="picker1">GSTIN/Temporary ID of Consignee</label>
                                    <input type="text" class="form-control" id="temporary_id_of_consignee" name="temporary_id_of_consignee">
                                </div>
                                <div class="col-md-4 form-group mb-3" id="consignee_tab_one">
                                    <label for="picker1">Name of the Consignee</label>
                                    <input type="text" class="form-control" id="name_of_consignee" name="name_of_consignee">
                                </div>

                                <div class="col-md-4 form-group mb-3" id="consignee_tab_two">
                                    <label for="picker1">Consignee division</label>
                                    <select class="form-control" id="consignee_division" name="consignee_division">
                                        <option value=" ">Select Consignee Division</option>
                                        @foreach($consignor_division as $consignor_data)
                                        <option value="{{ $consignor_data->division_name }}">
                                            {{ $consignor_data->division_name }}
                                        </option>
                                        @endforeach
                                        <option value="other">If other Division</option>
                                    </select>
                                </div>

                                <div class="col-md-4 form-group mb-3" id="consignee_other_division">
                                    <label for="picker1">Consignee Other Division</label>
                                    <input type="text" class="form-control" id="consignee_other_div" name="consignee_other_div">
                                </div>

                                <div class="col-md-4 form-group mb-3" id="consignee_circle_details">
                                    <label for="picker1">Consignee Circle details</label>
                                    <select class="form-control" id="consignee_circle_data" name="consignee_circle_data">
                                        <option value=" ">Select Consignee Circle</option>
                                        @foreach($consignee_circle_options as $consignor_circle_details)
                                        <option value="{{ $consignor_circle_details->consignee_circle }}">
                                            {{ $consignor_circle_details->consignee_circle }}
                                        </option>
                                        @endforeach
                                        <option value="nill">Nill</option>
                                    </select>
                                </div>
                                <!-- </div> -->

                                <div class="col-md-2">
                                    <div class="accordion" id="consignoraccordion">
                                        <div class="card ul-card__border-radius">
                                            <div class="card-header acc-bg">
                                                <h6 class="card-title mb-0">
                                                    <a class="text-default collapsed btn-acc" data-toggle="collapse" href="#accordion-item-group1" aria-expanded="false" id="consignor_sublist"> <i class="i-Add"></i> Add New
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="collapse1" id="accordion-item-group1 " data-parent="#consignoraccordion">

                                        <div class="table-responsive">
                                            <table id="demo" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">GSTIN/Con. Temporary ID</th>
                                                        <th scope="col">Con.Name</th>
                                                        <th scope="col">Con.Division</th>
                                                        <th scope="col">Con.Circle</th>
                                                        <th scope="col">GSTIN/Consignee Temporary ID</th>
                                                        <th scope="col">Con. Name</th>
                                                        <th scope="col">Con. Division</th>
                                                        <th scope="col">Con.Circle</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="consignorbody">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- sublist end -->

                            </div>
                            <div class="col-md-12">
                            </div>
                            <br>
                            <div class="col-md-12 form-group mb-3">
                                <label for="firstName1">Brief Description of offense (Max 100 words)
                                </label>
                                <textarea type="text" class="form-control" id="description" name="description" value="{{ $offence_vehicle->description }}">{{ $offence_vehicle->description }}</textarea>
                            </div>
                            <!-- </form> -->
                        </div>
                        <div id="step-4">

                            <!-- <form> -->
                            <div class="row form-p">
                                <div class="col-md-2 form-group mb-3"></div>
                                <div class="col-md-2 form-group mb-3"></div>
                                <div class="col-md-8 form-group mb-3">
                                    <h3 class="offence-no">OFFENCE NO :<span>{{ $offence_vehicle->poi_no }}</span></h3>
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="phone">Orders passed </label><br>
                                    <select class="form-control" id="orders_passed" name="orders_passed">
                                        <option value='RS_officer' {{ $offence_vehicle->orders_passed == 'RS_officer' ? 'selected' : '' }}>RS officer</option>
                                        <option value='Adjudication_officer' {{ $offence_vehicle->orders_passed == 'Adjudication_officer' ? 'selected' : '' }}>Adjudication officer</option>

                                        <!-- <option value="RS_officer">RS officer</option>
                                        <option value="Adjudication_officer">Adjudication officer</option> -->
                                    </select>
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="phone">Penality Details </label><br>
                                    <select class="form-control" id="penality_details" name="penality_details">
                                        <option value='In_Processing' {{ $offence_vehicle->In_Processing == 'In_Processing' ? 'selected' : '' }}>In Processing</option>
                                        <option value='Penalty_Collected' {{ $offence_vehicle->penality_details == 'Penalty_Collected' ? 'selected' : '' }}>Penalty Collected</option>
                                        <option value='Released_without_Penalty' {{ $offence_vehicle->penality_details == 'Released_without_Penalty' ? 'selected' : '' }}>Released without Penalty</option>

                                        <!-- <option value="Penalty_Collected">Penalty Collected</option>
                                        <option value="Released_without_Penalty">Released without Penalty</option> -->
                                    </select>
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="firstName1">Reason
                                    </label>
                                    <input type="text" class="form-control" id="reason" name="reason" value="{{ $offence_vehicle->reason }}">
                                </div>


                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 text-right">
                                    <a href="{{ URL::previous() }}" class="btn btn-danger" style="color: #fff !important;">Cancel</a>

                                    <button type="button" id="overallformupdate" class="btn btn-success overallform">Save</button>
                                </div>
                            </div>

                            <!-- </form> -->
                            <!-- <div class="form-group row">
                                <div class="col-sm-12 text-right">
                                    <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>

                                    <button type="button" id="overallform" class="btn btn-success overallform">Save</button>
                                </div>
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
        </div><!-- end of main-content -->
    </div><!-- Footer Start -->

    </div>

    <!-- ============ Search UI End ============= -->
    <script src="{{ asset('public/asset/dist-assets/js/plugins/jquery-3.3.1.min.js')}}"></script>

    <script src="{{ asset('public/asset/dist-assets/js/plugins/bootstrap.bundle.min.js')}}"></script>

    <script src="{{ asset('public/asset/dist-assets/js/plugins/perfect-scrollbar.min.js')}}"></script>

    <script src="{{ asset('public/asset/dist-assets/js/scripts/script.min.js')}}"></script>

    <script src="{{ asset('public/asset/dist-assets/js/scripts/sidebar-horizontal.script.js')}}"></script>

    <script src="{{ asset('public/asset/dist-assets/js/plugins/jquery.smartWizard.min.js')}}"></script>

    <script src="{{ asset('public/asset/dist-assets/js/scripts/smart.wizard.script.min.js')}}"></script>
</body>


<!-- Mirrored from demos.ui-lib.com/gull/html/layout3/smart.wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Dec 2022 05:20:35 GMT -->


{{-- script start --}}
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
       
            var div_id = $('#intelligence_division').val();
            $.ajax({
                type: "GET",
                url: '{{ route("officer_name_get.index") }}',
                data: {
                    'officer_id': div_id,
                },
                cache: false,
                success: function(data) {
                    if (data && data.length > 0) {
                        data = $.parseJSON(data); //parse response string
                        $('#roving_squad_no').append($('<option value="">Select Roving Squad</option>'));

                        $.each(data.roving_squad_number, function(i, item) {
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

            // var id = $(this).val();
            var rov_id = $('#roving_squad_no').val();
            // alert(rov_id);
            $.ajax({
                type: "GET",
                url: '{{ route("roving_name_get.index") }}',
                data: {
                    'officer_id': rov_id,
                },
                cache: false,
                success: function(data) {
                    if (data && data.length > 0) {
                        data = $.parseJSON(data); //parse response string
                        $('#name_of_officer').append($('<option value="">Selec Officer Name/Mobile No</option>'));

                        $.each(data.officer_name, function(i, item) {
                            // console.log(item.unique_id);
                            // alert(item.unique_id);
                            $('#name_of_officer').append($('<option/>', {
                                value: item.unique_id,
                                text: item.officer_name,
                                // text: item.mobile_no
                            }));
                        });
                     }
                     console.log("3:"+data);
                 }
            });


            // =================================================================================start designation gps=============

            
        // });
        // ================================================================end=================================================================

        // sublist data auto show
        // $('#consignor_sublist').on('click', function() {
        var poi_num = $('#poi_num').val();
        var off_list_id = $('#offence_id').val();

        $.ajax({
            type: 'GET',
            url: '{{ route("officer_list.index") }}',

            data: {
                poi_number: poi_num
            },
            success: function(data) {

                if (data && data.length > 0) {
                    data = $.parseJSON(data);

                    var tr = '';
                    $.each(data.officer_list, function(i, item) {

                        var layer_id =item.id;
                        // alert(layer_id);

                    // var links = "/chennai_admin/officer_list/destroy?id=" .layer_id;
                                // alert(links);
                    // url = url.replace(':id', layer_id );
                        var k = i + 1;
                        tr += '<tr><td width="5%">' + k + '</td><td width="15%">' + item.officer_name + '</td><td>' + item.mobile_no + '</td><td width="25%">' + item.designation + '</td><td width="20%">' + item.GPF_CPS_number + '</td><td width="20%"><a href="/chennai_admin/officer_list/'+layer_id+','+off_list_id+'" ><x-zondicon-trash style="height: 13px;color:red;" /></a></td></tr>';

                    });
                    $('#tbody1').html(tr);
                }
            }
        });

        // penality tax
        var poi_num = $('#poi_num').val();
        var off_list_id = $('#offence_id').val();

        $.ajax({
            type: 'GET',
            url: '{{ route("penality_list.index") }}',

            data: {
                poi_number: poi_num
            },
            success: function(data) {
                // alert(data);
                if (data && data.length > 0) {
                    data = $.parseJSON(data);
                    //   $('table#zero_configuration_table tbody').append(data);
                    var tr = '';
                    $.each(data.tax_list, function(i, item) {
                        var k = i + 1;
                        var tax_id = item.id;
                        // alert(tax_id);
                        if(item.cgst_penalty == null){
                            var cgst_penalty = '-';
                        }else{
                            var cgst_penalty = item.cgst_penalty;
                        }

                        if(item.sgst_penalty == null){
                            var sgst_penalty = '-';
                        }else{
                            var sgst_penalty = item.sgst_penalty;
                        }
                        if(item.igst_penalty == null){
                            var igst_penalty = '-';
                        }else{
                            var igst_penalty = item.igst_penalty;
                        }
                        tr += '<tr><td width="5%">' + k + '</td><td width="15%">' + item.hsn_code + '</td><td width="15%">' + item.tax_type + '</td><td width="15%">' + item.tax_amount + '</td><td>' + cgst_penalty + '</td><td width="25%">' + sgst_penalty + '</td><td width="20%">' + igst_penalty + '</td><td width="20%"><a href="/chennai_admin/penality_list/'+tax_id+','+off_list_id+'" ><x-zondicon-trash style="height: 13px;color:red;" /></a></td></tr>';
                    });

                    $('#amount').empty().append(data.tax_amount);
                    $('#cgst').empty().append(data.cgst_total_amount);
                    $('#sgst').empty().append(data.sgst_total_amount);
                    $('#igst').empty().append(data.igst_total_amount);

                    // alert(tr);
                    // $('#zero_configuration_table tbody').style.display;
                    $('#taxbody').html(tr);

                    $('#inter_amount').empty();
                    $('#intra_amount').empty();
                    // $('#tax_type').empty();
                    // $('#count_of_commodity_involved').empty();
                    $('#cgst_penalty').empty();
                    $('#sgst_penalty').empty();
                    $('#igst_penalty').empty();

                    //         if (data && data.length > 0) {
                    //   data=$.parseJSON( data ); //parse response string
                }
            }
        });

        // consignor data
        var poi_num = $('#poi_num').val();
        var off_list_id = $('#offence_id').val();

        $.ajax({
            type: 'GET',
            url: '{{ route("offence_consignor_list.index") }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                poi_number: poi_num,
            },

            success: function(data) {

                if (data && data.length > 0) {
                    data = $.parseJSON(data);

                    var tr = '';
                    $.each(data.consignor_list, function(i, item) {
                        var k = i + 1;

                        var con_id = item.id;

                        if(item.consignor_division == 'other'){
                            var divisionVal = item.consignor_other_div;
                        }else{
                            var divisionVal = item.consignor_division;
                        }

                        if(item.consignee_div == 'other'){
                            var consigneeVal = item.consignee_other_div;
                        }else{
                            var consigneeVal = item.consignee_div;
                        }

                        // tr += '<tr><td width="5%">' + k + '</td><td width="15%">' + item.temporary_id_of_consignor + '</td><td>' + item.name_of_the_consignor + '</td><td width="25%">' + divisionVal + '</td><td width="25%">' + item.consignor_circle_details + '</td><td width="20%">' + item.temporary_id_of_consignee + '</td><td width="20%">' + item.name_of_consignee + '</td><td width="25%">' + item.consignee_div + '</td><td width="25%">' + item.consignee_cir_data + '</td><td width="20%"><a href="/chennai_admin/offence_consignor_list/'+con_id+','+off_list_id+'" ><x-zondicon-trash style="height: 13px;color:red;" /></a></td></tr>';
                        if(item.temporary_id_of_consignor == null){
                            var temporary_id_of_consignor = '-';
                        }else{
                            var temporary_id_of_consignor = item.temporary_id_of_consignor;
                        }
                        if(divisionVal == null){
                            var divisionVal1 = '-';
                        }else{
                            var divisionVal1 = divisionVal;
                        }
                        if(item.name_of_the_consignor == null){
                            var name_of_the_consignor = '-';
                        }else{
                            var name_of_the_consignor = item.name_of_the_consignor;
                        }
                        if(item.consignor_circle_details == null){
                            var consignor_circle_details = '-';
                        }else{
                            var consignor_circle_details = item.consignor_circle_details;
                        }

                        if(item.temporary_id_of_consignee == null){
                            var temporary_id_of_consignee = '-';
                        }else{
                            var temporary_id_of_consignee = item.temporary_id_of_consignee;
                        }

                        if(item.name_of_consignee == null){
                            var name_of_consignee = '-';
                        }else{
                            var name_of_consignee = item.name_of_consignee;
                        }

                        if(item.consignee_div == null){
                            var consignee_div = '-';
                        }else{
                            var consignee_div = item.consignee_div;
                        }

                        if(item.consignee_cir_data == null){
                            var consignee_cir_data = '-';
                        }else{
                            var consignee_cir_data = item.consignee_cir_data;
                        }

                       tr += '<tr><td width="5%">' + k + '</td><td width="15%">' + temporary_id_of_consignor + '</td><td>' + name_of_the_consignor + '</td><td width="25%">' + divisionVal1 + '</td><td width="25%">' + consignor_circle_details + '</td><td width="20%">' + temporary_id_of_consignee + '</td><td width="20%">' + name_of_consignee + '</td><td width="25%">' + consignee_div + '</td><td width="25%">' + consignee_cir_data + '</td><td width="20%"><a href="/chennai_admin/offence_consignor_list/'+con_id+','+off_list_id+'" ><x-zondicon-trash style="height: 13px;color:red;" /></a></td></tr>';



                    });
                }
                $('#consignorbody').html(tr);
            }
        });

        // sublist data show end

        $("#name_of_officer").change(function() {
            var id = $(this).val();

            // console.log("1:"+id);
            // var dataString = '{id:'+ id+'}';
            // console.log("2:"+dataString);
            $.ajax({
                type: "GET",
                url: '{{ route("officer.index") }}',
                data: {
                    'officer_id': $(this).val()
                },
                cache: false,
                success: function(data) {

                    if (data && data.length > 0) {
                        data = $.parseJSON(data); //parse response string

                        mobile_no = data.mobile_no; //value of b
                        gpf_no = data.gpf_no;

                        designation_name = data.designation_name; //value of content1
                        $('#designation').val(designation_name);
                        $("#mobile_no").val(mobile_no); //set the attribute and content here for an example div
                        $("#gpf_cps_number").val(gpf_no);
                        //    $("#designation").append(designation_name);


                    }
                    //   console.log("3:"+data);
                }
            });

        });
//                 =========================================end===========================================================
 

        $('#nature_sub').hide();

        $('#offense_section').on('change', function() {
            // alert('hi');
            $('#nature_of_the_offense').empty();
            $.ajax({
                type: "GET",
                url: '{{ route("offence_name_get.index") }}',
                data: {
                    'offence_section': $(this).val()
                },
                cache: false,
                success: function(data) {
                    if (data && data.length > 0) {
                        // alert(data);
                        data = $.parseJSON(data); //parse response string
                        // alert(data.offence_names);
                        // var k=0;

                        $.each(data.offence_names, function(i, item) {
                            // console.log(item.unique_id);
                            // alert(item.unique_id);
                            $('#nature_of_the_offense').append($('<option/>', {
                                value: item.offence_name,
                                text: item.offence_name
                            }));

                        });

                    }
                    //   console.log("3:"+data);
                }
            });
        })

        $('#nature_of_the_offense').on('change', function() {
            var name = [];

            $.ajax({
                type: "GET",
                url: '{{ route("offence_sub_get.index") }}',
                data: {
                    'offence_unique': $(this).val()
                },
                cache: false,
                success: function(data) {

                    // for (var i = 0; i < data.length; i++) {
                    //     name.push(data[i]);
                    // }
                    // $('#feedback').text('Hello ' + name[0]);
                    // var arrayValue = data.offence_sub_names;

                    // if (data.offence_sub_names.length == 0) {
                    //     alert('hello prabu');
                    //     $('#nature_sub').hide();

                    // } else {

                    if (data && data.length > 0) {


                        data = $.parseJSON(data); //parse response string

                        // var k=0;
                        if (data.offence_sub_names == 0) {
                            // alert('ji');
                            $('#nature_sub').hide();
                        } else {
                            $.each(data.offence_sub_names, function(i, values) {

                                $('#nature_of_sub_offense').append($('<option/>', {
                                    value: values.unique_id,
                                    text: values.sub_offences
                                }));

                                $('#nature_sub').show();

                            });
                            // $('#nature_sub').show();
                        }
                        //

                        // }


                    }
                    //   console.log("3:"+data);
                }
            });
        })

        // form submit
        var form = '#add-user-form';

        $(form).on('submit', function(event) {
            event.preventDefault();

            var url = $(this).attr('data-action');

            $.ajax({
                url: url,
                method: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    $(form).trigger("reset");
                    alert(response.success)
                },
                error: function(response) {}
            });
        });



        //================ sublist division data show end division================================================

        $("#intelligence_division").change(function() {
            var id = $(this).val();
            $('#roving_squad_no').empty();
            //   alert('hi');
            // console.log("1:"+id);
            // var dataString = '{id:'+ id+'}';
            // console.log("2:"+dataString);
            $.ajax({
                type: "GET",
                url: '{{ route("officer_name_get.index") }}',
                data: {
                    'officer_id': $(this).val()
                },
                cache: false,
                success: function(data) {

                    if (data && data.length > 0) {
                        data = $.parseJSON(data); //parse response string
                        // $('#roving_squad_no').empty().append(data.roving_squad_number);
                        $('#roving_squad_no').append($('<option value="">Select Roving Squad</option>'));

                        $.each(data.roving_squad_number, function(i, item) {
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

        });
        //   ===========================end============================================================
//================ sublist roving data show division================================================

$("#roving_squad_no").change(function() {
    var id = $(this).val();
    $('#name_of_officer').empty();
    //   alert('hi');
    // console.log("1:"+id);
    // var dataString = '{id:'+ id+'}';
    // console.log("2:"+dataString);
    $.ajax({
        type: "GET",
        url: '{{ route("roving_name_get.index") }}',
        data: {
            'officer_id': $(this).val()
        },
        cache: false,
        success: function(data) {

            if (data && data.length > 0) {
                data = $.parseJSON(data); //parse response string
                $('#name_of_officer').append($('<option value="">Select Officer Name/Mobile No</option>'));
                // $('#name_of_officer').empty().append(data.officer_name);
                $.each(data.officer_name, function(i, item) {
                    // console.log(item.unique_id);
                    // alert(item.unique_id);
                    $('#name_of_officer').append($('<option/>', {
                        value: item.unique_id,
                        text: item.officer_name+"/"+item.mobile_no,
                        // text: item.mobile_no
                    }));

                });
                
            }
              console.log("3:"+data);
        }
    });

});
//   ===========================end============================================================



    });

    // officer data store sublist form ajax
    // var form = '#add-user-form';
   
function demo(){

    if ($('#consignor_registered').val() == 'no' && $('#consignee_registered').val() == 'no') {

$('#consignor_sublist').hide();




}
}

    $('#officer_sublist').on('click', function() {
        // alert('ji');
        var name_of_officer = $('#name_of_officer').val();
        var designation = $('#designation').val();
        var gpf_cps_number = $('#gpf_cps_number').val();
        var mobile_no = $('#mobile_no').val();
        var poi_num = $('#poi_num').val();

    //     $('#name_of_officer').val() = '';
    //     $('#designation').val() = '';
    //    $('#gpf_cps_number').val() = '';
    //    $('#mobile_no').val() = '';
    //      $('#poi_num').val() = ''; 

         

        $.ajax({
            type: 'post',
            url: '{{ route("officer.store") }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                name_of_officer: name_of_officer,
                designation: designation,
                gpf_cps_number: gpf_cps_number,
                mobile_no: mobile_no,
                poi_number: poi_num
                // "name_of_officer="+name_of_officer+"designation="+designation+"gpf_cps_number="+gpf_cps_number+"mobile_no="+mobile_no
            },
            //  data: 'name_of_officer='+name_of_officer+'designation='+designation+'gpf_cps_number='+gpf_cps_number+'mobile_no='+mobile_no,
            //  alert(data);



            success: function(data) {

                // $('tbody').empty();
                // $('tbody').append(data);

                // $('#table_body').hide();
                // alert(data.tax_amount);

                if (data && data.length > 0) {
                    data = $.parseJSON(data);
                    //   $('table#zero_configuration_table tbody').append(data);

                    // alert(data.tax_amount);

                    var tr = '';
                    $.each(data.officer_list, function(i, item) {
                        var k = i + 1;
                        var layer_id =item.id;
                        var off_list_id = $('#offence_id').val();
                        

                        tr += '<tr><td width="5%">' + k + '</td><td width="15%">' + item.officer_name + '</td><td>' + item.mobile_no + '</td><td width="25%">' + item.designation + '</td><td width="20%">' + item.GPF_CPS_number + '</td><td width="20%"><a href="/chennai_admin/officer_list/'+layer_id+','+off_list_id+'" ><x-zondicon-trash style="height: 13px;color:red;" /></a></td></tr>';



                    });
                    // alert(tr);
                    // $('#zero_configuration_table tbody').style.display;

                    $('#tbody1').html(tr);
                    document.getElementById('name_of_officer').value = '';
                    document.getElementById('designation').value = '';
                    document.getElementById('gpf_cps_number').value = '';
       
                    //         if (data && data.length > 0) {
                    //   data=$.parseJSON( data ); //parse response string
                }
            }
        });
    })

    $('#consignor_tab').show();
    $('#consignor_tab_one').show();
    $('#consignor_tab_two').show();
    $('#consignor_tab_three').show();

    $('#consignor_registered').change(function() {
        if ($('#consignor_registered').val() == 'yes') {
            $('#consignor_tab').show();
            $('#consignor_tab_one').show();
            $('#consignor_tab_two').show();
            $('#consignor_tab_three').show();
            $('#consignor_other_division').show();


        } else if ($('#consignor_registered').val() == 'no') {
            $('#consignor_tab').hide();
            $('#consignor_tab_one').hide();
            $('#consignor_tab_two').hide();
            $('#consignor_tab_three').hide();
            $('#consignor_other_division').hide();
        }
       
    });

    // consignee tab

    $('#consignee_tab').show();
    $('#consignee_tab_one').show();
    $('#consignee_tab_two').show();
    $('#consignor_tab_three').show();
    $('#consignee_other_division').show();
    $('#consignee_circle_details').show();




    // $('#intra').hide();

    $('#consignee_registered').change(function() {
        if ($('#consignee_registered').val() == 'yes') {
            $('#consignee_tab').show();
            $('#consignee_tab_one').show();
            $('#consignee_tab_two').show();
            $('#consignor_tab_three').show();
            $('#consignee_other_division').show();
            $('#consignee_circle_details').show();
        } else if ($('#consignee_registered').val() == 'no') {

            $('#consignee_tab').hide();
            $('#consignee_tab_one').hide();
            $('#consignee_tab_two').hide();
            $('#consignor_tab_three').hide();
            $('#consignee_other_division').hide();
            $('#consignee_circle_details').hide();
        }
    });

    $('#consignor_other_division').hide();
    $('#consignor_division').change(function() {
        if ($('#consignor_division').val() == 'other') {
            $('#consignor_other_division').show();
        } else if ($('#consignor_division').val() != 'other') {
            $('#consignor_other_division').hide();
        }
    });

    $('#consignee_other_division').hide();
    $('#consignee_division').change(function() {
        if ($('#consignee_division').val() == 'other') {
            $('#consignee_other_division').show();
        } else if ($('#consignee_division').val() != 'other') {
            $('#consignee_other_division').hide();
        }
    });


    // Consignor Sublist ajax
    $('#consignor_sublist').on('click', function() {
        // alert('ji');
        var consignor_reg = $('#consignor_registered').val();


        var temporary_id_of_consignor = $('#temporary_id_of_consignor').val();
        var name_of_the_consignor = $('#name_of_the_consignor').val();
        var consignor_division = $('#consignor_division').val();
        var consignor_other_div = $('#consignor_other_div').val();

        var consignor_circle_details = $('#consignor_circle_details').val();

        var consignee_registered = $('#consignee_registered').val();
        var temporary_id_of_consignee = $('#temporary_id_of_consignee').val();
        var name_of_consignee = $('#name_of_consignee').val();

        var consignee_div = $('#consignee_division').val();
        var consignee_other_div = $('#consignee_other_div').val();
        var consignee_cir_data = $('#consignee_circle_data').val();

        var poi_num = $('#poi_num').val();
        var off_list_id = $('#offence_id').val();

        $.ajax({
            type: 'post',
            url: '{{ route("offence_consignor.store") }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                consignor_reg: consignor_reg,
                temporary_id_of_consignor: temporary_id_of_consignor,
                name_of_the_consignor: name_of_the_consignor,
                consignor_division: consignor_division,
                consignor_other_div: consignor_other_div,
                consignor_circle_details: consignor_circle_details,
                consignee_registered: consignee_registered,
                temporary_id_of_consignee: temporary_id_of_consignee,
                name_of_consignee: name_of_consignee,
                consignee_div: consignee_div,
                consignee_other_div: consignee_other_div,
                consignee_cir_data: consignee_cir_data,
                poi_number: poi_num,
                // "name_of_officer="+name_of_officer+"designation="+designation+"gpf_cps_number="+gpf_cps_number+"mobile_no="+mobile_no
            },
            //  data: 'name_of_officer='+name_of_officer+'designation='+designation+'gpf_cps_number='+gpf_cps_number+'mobile_no='+mobile_no,
            //  alert(data);



            success: function(data) {

                // alert(data);
                // $('tbody').empty();
                // $('tbody').append(data);

                // $('#table_body').hide();

                if (data && data.length > 0) {
                    data = $.parseJSON(data);
                    //   $('table#zero_configuration_table tbody').append(data);


                    var tr = '';
                    $.each(data.consignor_list, function(i, item) {
                        var k = i + 1;
                        var con_id = item.id;
                        if(item.consignor_division == 'other'){
                            var divisionVal = item.consignor_other_div;
                        }else{
                            var divisionVal = item.consignor_division;
                        }

                        if(item.consignee_div == 'other'){
                            var consigneeVal = item.consignee_other_div;
                        }else{
                            var consigneeVal = item.consignee_div;
                        }

                        if(item.temporary_id_of_consignor == null){
                            var temporary_id_of_consignor = '-';
                        }else{
                            var temporary_id_of_consignor = item.temporary_id_of_consignor;
                        }
                        if(divisionVal == null){
                            var divisionVal1 = '-';
                        }else{
                            var divisionVal1 = divisionVal;
                        }
                        if(item.name_of_the_consignor == null){
                            var name_of_the_consignor = '-';
                        }else{
                            var name_of_the_consignor = item.name_of_the_consignor;
                        }
                        if(item.consignor_circle_details == null){
                            var consignor_circle_details = '-';
                        }else{
                            var consignor_circle_details = item.consignor_circle_details;
                        }

                        if(item.temporary_id_of_consignee == null){
                            var temporary_id_of_consignee = '-';
                        }else{
                            var temporary_id_of_consignee = item.temporary_id_of_consignee;
                        }

                        if(item.name_of_consignee == null){
                            var name_of_consignee = '-';
                        }else{
                            var name_of_consignee = item.name_of_consignee;
                        }

                        if(item.consignee_div == null){
                            var consignee_div = '-';
                        }else{
                            var consignee_div = item.consignee_div;
                        }

                        if(item.consignee_cir_data == null){
                            var consignee_cir_data = '-';
                        }else{
                            var consignee_cir_data = item.consignee_cir_data;
                        }

                       tr += '<tr><td width="5%">' + k + '</td><td width="15%">' + temporary_id_of_consignor + '</td><td>' + name_of_the_consignor + '</td><td width="25%">' + divisionVal1 + '</td><td width="25%">' + consignor_circle_details + '</td><td width="20%">' + temporary_id_of_consignee + '</td><td width="20%">' + name_of_consignee + '</td><td width="25%">' + consignee_div + '</td><td width="25%">' + consignee_cir_data + '</td><td width="20%"><a href="/chennai_admin/offence_consignor_list/'+con_id+','+off_list_id+'" ><x-zondicon-trash style="height: 13px;color:red;" /></a></td></tr>';



                    });
                    // '</td><td width="20%">' + item.consignor_circle_details +
                    // alert(tr);
                    // $('#zero_configuration_table tbody').style.display;
                }
                $('#consignorbody').html(tr);
                
                // document.getElementById('consignor_registered').innerHTML='Select';
        document.getElementById('temporary_id_of_consignor').value='';
        document.getElementById('name_of_the_consignor').value='';
        document.getElementById('consignor_division').value='';
        document.getElementById('consignor_other_div').value='';
        document.getElementById('consignor_circle_details').value='';

        // var consignee_registered = $('#consignee_registered').val();
        // var temporary_id_of_consignee = $('#temporary_id_of_consignee').val();
        // var name_of_consignee = $('#name_of_consignee').val();

        // var consignee_div = $('#consignee_division').val();
        // var consignee_other_div = $('#consignee_other_div').val();
        // var consignee_cir_data = $('#consignee_circle_data').val();
        
        // document.getElementById('consignee_registered').innerHTML='Select';
        document.getElementById('temporary_id_of_consignee').value='';
        document.getElementById('name_of_consignee').value='';
        document.getElementById('consignee_division').value='';
        document.getElementById('consignee_other_div').value='';
        document.getElementById('consignee_circle_data').value='';
                //         if (data && data.length > 0) {
                //   data=$.parseJSON( data ); //parse response string
                // }
            }
        });
    })

    // Tax waise input show/hide
    $('#inter').hide();
    $('#interone').hide();
    $('#intertwo').hide();

    $('#intra').hide();
    $('#intraone').hide();

    $('#tax_type').change(function() {
        if ($('#tax_type').val() == 'intra') {
            $('#intra').show();
            $('#intraone').show();

            $('#inter_amount').val('');
            $("#cgst_penalty").val('');
            $("#sgst_penalty").val('');
            $('#inter').hide();
            $('#interone').hide();
            $('#intertwo').hide();

        } else if ($('#tax_type').val() == 'inter') {
            $('#inter').show();
            $('#interone').show();
            $('#intertwo').show();

            $('#intra_amount').val('');
            $("#igst_penalty").val('');
            $('#intra').hide();
            $('#intraone').hide();

        }
    });

    // Tax Penality amount split and show
    $("#inter_amount").mouseout(function() {
        var interAmt = $('#inter_amount').val() / 2;
        var sgst = interAmt;
        var cgst = interAmt;
        $("#cgst_penalty").val(cgst);
        $("#sgst_penalty").val(sgst);

    });

    $("#intra_amount").mouseout(function() {

        var intraAmt = $('#intra_amount').val();
        var igst = intraAmt;
        $("#igst_penalty").val(igst);

    });

    // Tax sublist store ajax
    // intra data store sublist form ajax
    $('#tax_sublist').on('click', function() {
        // alert('ji');
        var poi_num = $('#poi_num').val();
        var tax_type = $('#tax_type').val();
        var hsn_code = $('#count_of_commodity_involved').val();
        var cgst_penalty = $('#cgst_penalty').val();
        var sgst_penalty = $('#sgst_penalty').val();
        var igst_penalty = $('#igst_penalty').val();
        var inter_amount = $('#inter_amount').val();
        var intra_amount = $('#intra_amount').val();
        var off_list_id = $('#offence_id').val();
        $.ajax({
            type: 'post',
            url: '{{ route("penality.store") }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                inter_amount: inter_amount,
                intra_amount: intra_amount,
                cgst_penalty: cgst_penalty,
                sgst_penalty: sgst_penalty,
                igst_penalty: igst_penalty,
                tax_type: tax_type,
                poi_number: poi_num,
                hsn_code: hsn_code
            },
            success: function(data) {
                // alert(data);
                if (data && data.length > 0) {
                    data = $.parseJSON(data);
                    //   $('table#zero_configuration_table tbody').append(data);
                    var tr = '';

                    $.each(data.tax_list, function(i, item) {
                        var k = i + 1;
                        var tax_id = item.id;
                        if(item.cgst_penalty == null){
                            var cgst_penalty = 0;
                        }else{
                            var cgst_penalty = item.cgst_penalty;
                        }

                        if(item.sgst_penalty == null){
                            var sgst_penalty = '-';
                        }else{
                            var sgst_penalty = item.sgst_penalty;
                        }
                        if(item.igst_penalty == null){
                            var igst_penalty = '-';
                        }else{
                            var igst_penalty = item.igst_penalty;
                        }
                        tr += '<tr><td width="5%">' + k + '</td><td width="15%">' + item.hsn_code + '</td><td width="15%">' + item.tax_type + '</td><td width="15%">' + item.tax_amount + '</td><td>' + cgst_penalty + '</td><td width="25%">' + sgst_penalty + '</td><td width="20%">' + igst_penalty + '</td><td width="20%"><a href="/chennai_admin/penality_list/'+tax_id+','+off_list_id+'" ><x-zondicon-trash style="height: 13px;color:red;" /></a></td></tr>';
                    });
                    $('#amount').empty().append(data.tax_amount);
                    $('#cgst').empty().append(data.cgst_total_amount);
                    $('#sgst').empty().append(data.sgst_total_amount);
                    $('#igst').empty().append(data.igst_total_amount);

                    // alert(tr);
                    // $('#zero_configuration_table tbody').style.display;
                    $('#taxbody').html(tr);


                    var tax_type = $('#tax_type').val();
        var hsn_code = $('#count_of_commodity_involved').val();
        var cgst_penalty = $('#cgst_penalty').val();
        var sgst_penalty = $('#sgst_penalty').val();
        var igst_penalty = $('#igst_penalty').val();
        var inter_amount = $('#inter_amount').val();
        var intra_amount = $('#intra_amount').val();
        var off_list_id = $('#offence_id').val();
        
                    document.getElementById('tax_type').value = '';
                    document.getElementById('count_of_commodity_involved').value = '';
                    document.getElementById('cgst_penalty').value = '';
                    document.getElementById('sgst_penalty').value = '';
                    document.getElementById('igst_penalty').value = '';
                    
                    document.getElementById('inter_amount').value = '';
                    document.getElementById('intra_amount').value = '';
                    // document.getElementById('gpf_cps_number').value = '';

                    $('#inter_amount').empty();
                    $('#intra_amount').empty();
                    // $('#tax_type').empty();
                    // $('#count_of_commodity_involved').empty();
                    $('#cgst_penalty').empty();
                    $('#sgst_penalty').empty();
                    $('#igst_penalty').empty();

                    //         if (data && data.length > 0) {
                    //   data=$.parseJSON( data ); //parse response string
                }
            }
        });
    })
    // sublist end

    // offence section on change function



    $('#overallformupdate').on('click', function() {
        // alert('hi');
        var poi_num = $('#poi_num').val();
        var intelligence_division = $('#intelligence_division').val();
        var roving_squad_no = $('#roving_squad_no').val();
        var duty_date = $('#duty_date').val();
        var shift = $('#shift').val();
        var offense_booked_vehicle_number = $('#offense_booked_vehicle_number').val();
        var offence_register_number = $('#offense_register_number').val();

        var place_of_interception = $('#place_of_interception').val();
        var offense_booking_time = $('#offense_booking_time').val();
        var nature_of_the_offense = $('#nature_of_the_offense').val();
        // var offense_section = $('#offense_section').val();
        var offense_section = $('#nature_of_the_offense').val();

        var nature_of_sub_offense = $('#nature_of_sub_offense').val();

        var goods_value = $('#goods_value').val();

        // var count_of_commodity_involved = $('#count_of_commodity_involved').val();
        var description = $('#description').val();
        var orders_passed = $('#orders_passed').val();
        var penality_details = $('#penality_details').val();
        var reason = $('#reason').val();


        $.ajax({
            type: 'POST',
            url: '{{ route("offence_vehicle.store") }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                intelligence_division: intelligence_division,
                roving_squad_no: roving_squad_no,
                duty_date: duty_date,
                shift: shift,
                offense_booked_vehicle_number: offense_booked_vehicle_number,
                place_of_interception: place_of_interception,
                offense_booking_time: offense_booking_time,
                nature_of_the_offense: nature_of_the_offense,
                offense_section: offense_section,
                // count_of_commodity_involved: count_of_commodity_involved,
                description: description,
                orders_passed: orders_passed,
                penality_details: penality_details,
                reason: reason,
                poi_number: poi_num,
                offence_register_number: offence_register_number,
                nature_of_sub_offense: nature_of_sub_offense,
                goods_value: goods_value
            },
            // dataType: 'JSON',
            // contentType: false,
            // cache: false,
            // processData: false,

            success: function(response) {
                // $(form).trigger("reset");
                // alert(response);
                window.location.href = "/chennai_admin/offence_vehicle";

            },
            error: function(response) {}
        });

    })
</script>

</html>
