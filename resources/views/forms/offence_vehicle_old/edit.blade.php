<!DOCTYPE html>
<html lang="en" dir="">
<style>
  
  /* .btn-group.mr-2.sw-btn-group-extra {
    display: none;
} */
    .btn-group.mr-2.sw-btn-group-extra{
        display:none !important;
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

    <script src="{{ asset('public/asset/dist-assets/css/plugins/smart.wizard/smart_wizard_theme_dots.min.css')}}"></script>
</head>
@php
$is_btn_disable = "";
$unique_id = "";
$off_division_name_options = division_creations();
$roving_squad_number_options = roving_squad();
$name_of_officer_options= officer_registration();
$nature_of_the_offense_options=offence_section();
$consignee_circle_options=consignor_creation();
$hsn_code = hsn_code();

$consignor_division = division_creation();
@endphp
<?php
// session_start();


$div_name = session('division_id');
// print_r($div_name);

?>

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
                                            <h3 class="offence-no">OFFENCE NO :<span>{{ $offence_number }}</span></h3>
                                            <input type="hidden" name="offence_no" id="offence_no" value="{{ $offence_number }}" />
                                            <input type="hidden" name="poi_num" id="poi_num" value="{{ $offence_vehicle->poi_no }}" />
                                            <input type="hidden" name="division_no" id="division_no" value="<?php echo $div_name; ?>">

                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="picker1">Intelligence Division</label>
                                            <select class="form-control" id="intelligence_division" name="intelligence_division">
                                                @foreach($off_division_name_options as $intelligence_division)
                                                <option value="{{ $intelligence_division->unique_id }}" {{  $intelligence_division->unique_id == $offence_vehicle->intelligence_division ? 'selected' : '' }}>
                                                    {{ $intelligence_division->division_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="picker1">Roving Squad Number</label>
                                            <select class="form-control" id="roving_squad_no" name="roving_squad_no">
                                                @foreach($roving_squad_number_options as $roving_squad_no)
                                                <option value="{{ $roving_squad_no->unique_id }}" {{  $roving_squad_no->unique_id == $offence_vehicle->roving_squad_no ? 'selected' : '' }}>
                                                    {{ $roving_squad_no->roving_squad_number }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="birthday">Duty Date</label>
                                            <input type="date" id="duty_date" name="duty_date" class="form-control" value="{{ $offence_vehicle->duty_date }}">
                                        </div>

                                        <!-- officer details sublist start  -->
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="firstName1">Name of the officer - Mobile No</label>
                                            <!-- <input class="form-control" id="firstName1" type="searh" >-->
                                            <select class="form-control" id="name_of_officer" name="name_of_officer">
                                                <option value="">Select the Officer Name</option>
                                                @foreach($name_of_officer_options as $name_of_officer)
                                                <option value="{{ $name_of_officer->unique_id }}">
                                                    {{ $name_of_officer->officer_name}} -
                                                    {{ $name_of_officer->mobile_no}}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="col-md-4 form-group mb-3">
                                                    <label for="firstName1"> officer Mobile No</label>
                                                    <!-- <input class="form-control" id="firstName1" type="searh" >-->
                                                    <select class="form-control" id="officer_mobile_no" name="officer_mobile_no">
                                                        @foreach($name_of_officer_options as $officer_mobile_no)
                                                        <option value="{{ $officer_mobile_no->unique_id }}">
                                        {{ $officer_mobile_no->mobile_no }}
                                        </option>
                                        @endforeach
                                        </select>
                                    </div> --}}
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
                                    <h3 class="offence-no">OFFENCE NO :<span>{{ $offence_number }}</span></h3>
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="firstName1">Offense booked Vehicle Number</label>
                                    <!-- {{-- <p>TN09BE8123</p> --}} -->
                                    <input type="text" class="form-control" id="offense_booked_vehicle_number" name="offense_booked_vehicle_number" value="{{ $offence_vehicle->offense_booked_vehicle_number }}">
                                    <input type="hidden" class="form-control" id="offence_no" name="offence_no" value="{{ $offence_vehicle->poi_no }}">
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="firstName1"> Place of Interception</label>
                                    <input type="text" class="form-control" id="place_of_interception" name="place_of_interception" value="{{ $offence_vehicle->place_of_interception }}">
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="firstName1">Offense Booking Time</label>
                                    <input type="time" class="form-control" id="offense_booking_time" name="offense_booking_time" value="{{ $offence_vehicle->offense_booking_time }}">
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="firstName1">Nature of the offense</label>
                                    <select class="form-control" id="nature_of_the_offense" name="nature_of_the_offense" >
                                        <option value="">Select Nature of Offence</option>
                                        @foreach($nature_of_the_offense_options as $nature_of_the_offense)
                                        <option value="{{ $nature_of_the_offense->unique_id }}" {{  $nature_of_the_offense->unique_id == $offence_vehicle->nature_of_the_offense ? 'selected' : '' }}>
                                            {{ $nature_of_the_offense->offence_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- <div class="col-md-4 form-group mb-3">
                                        <label for="firstName1"> Offense Register Number</label>
                                        <input class="form-control" id="firstName1" type="text" >
                                    </div>-->
                                <div class="col-md-4 form-group mb-3">
                                    <label for="picker1">Offense Section</label>
                                    <!-- {{-- <p>Act-129</p> --}} -->
                                    <!-- <select class="form-control" id="offense_section" name="offense_section">
                                        @foreach($nature_of_the_offense_options as $offense_section)
                                        <option value="{{ $offense_section->unique_id }}" {{  $offense_section->unique_id == $offence_vehicle->offense_section ? 'selected' : '' }}>
                                            {{ $offense_section->offence_section }}
                                        </option>
                                        @endforeach
                                    </select> -->
                                    <input tyep="text" class="form-control" id="offense_section_name" name="offense_section_name">
                                    <input type="hidden" class="form-control" id="offense_section" name="offense_section">
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
                                    <h3 class="offence-no">OFFENCE NO :<span>{{ $offence_number }}</span></h3>
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="picker1">Commodity/HSN Code</label>
                                    <select class="form-control" id="count_of_commodity_involved" name="count_of_commodity_involved">
                                        <option value="">Select Commodity/HSN Code</option>
                                        @foreach($hsn_code as $hsn)
                                        <option value="{{ $hsn->unique_id }}">
                                            {{ $hsn->hsn_code }}
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
                                </div>
                                <!-- sublist end -->


                                <!-- penality consignor/consignee sublist -->
                                <div class="col-md-4 form-group mb-3">
                                    <label for="firstName1">GSTIN /Temporary ID of Consignor</label>
                                    <input type="text" class="form-control" id="temporary_id_of_consignor" name="temporary_id_of_consignor">
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="firstName1">Name of the Consignor</label>
                                    <input type="text" class="form-control" id="name_of_the_consignor" name="name_of_the_consignor">
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="picker1">Consignor division</label>
                                    <select class="form-control" id="consignor_division" name="consignor_division">
                                        <option value=" ">Select Consignor Division</option>
                                        @foreach($consignor_division as $consignor_data)
                                        <option value="{{ $consignor_data->unique_id }}">
                                            {{ $consignor_data->division_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4 form-group mb-3">
                                    <label for="picker1">Consignor Circle details</label>
                                    <select class="form-control" id="consignor_circle_details" name="consignor_circle_details">
                                        <option value=" ">Select Consignor Circle</option>
                                        @foreach($consignee_circle_options as $consignor_circle_details)
                                        <option value="{{ $consignor_circle_details->unique_id }}">
                                            {{ $consignor_circle_details->consignee_circle }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 form-group mb-3">
                                    <label for="picker1">Is the Consignee Registered</label>
                                    <select class="form-control" id="consignee_registered" name="consignee_registered">
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
                                                        <!-- <th scope="col">Con.Circle</th> -->
                                                        <th scope="col">GSTIN/Consignee Temporary ID</th>
                                                        <th scope="col">Consignee Name</th>

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
                                <textarea type="text" class="form-control" id="description" name="description" value="{{ $offence_vehicle->description }}"></textarea>
                            </div>
                            <!-- </form> -->
                        </div>
                        <div id="step-4">

                            <!-- <form> -->
                            <div class="row form-p">
                                <div class="col-md-2 form-group mb-3"></div>
                                <div class="col-md-2 form-group mb-3"></div>
                                <div class="col-md-8 form-group mb-3">
                                    <h3 class="offence-no">OFFENCE NO :<span>{{ $offence_number }}</span></h3>
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

                                <!-- <div class="form-group row">
                                    <div class="col-sm-12 text-right">
                                        <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>

                                        <button type="button" id="overallformupdate" class="btn btn-success overallform">Save</button>
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <div class="col-sm-12 text-right">
                                        <a href="{{ URL::previous() }}" class="btn btn-danger" style="color:white !important;">Cancel</a>

                                        <button type="button" id="overallformupdate" class="btn btn-success overallform">Save</button>
                                    </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
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
                    // alert(response.success)
                },
                error: function(response) {}
            });
        });

    });

    // officer data store sublist form ajax
    // var form = '#add-user-form';

    $('#officer_sublist').on('click', function() {
       
        var name_of_officer = $('#name_of_officer').val();
        var designation = $('#designation').val();
        var gpf_cps_number = $('#gpf_cps_number').val();
        var mobile_no = $('#mobile_no').val();
        var poi_num = $('#poi_num').val();

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

                        tr += '<tr><td width="5%">' + k + '</td><td width="15%">' + item.officer_name + '</td><td>' + item.mobile_no + '</td><td width="25%">' + item.designation + '</td><td width="20%">' + item.GPF_CPS_number + '</td></tr>';



                    });
                    // alert(tr);
                    // $('#zero_configuration_table tbody').style.display;

                    $('#tbody1').html(tr);
                    //         if (data && data.length > 0) {  
                    //   data=$.parseJSON( data ); //parse response string
                }
            }
        });
    })

    // consignee tab 

    $('#consignee_tab').show();
    $('#consignee_tab_one').show();

    // $('#intra').hide();

    $('#consignee_registered').change(function() {
        if ($('#consignee_registered').val() == 'yes') {
            $('#consignee_tab').show();
            $('#consignee_tab_one').show();
        } else if ($('#consignee_registered').val() == 'no') {
            $('#consignee_tab').hide();
            $('#consignee_tab_one').hide();
        }
    });

    // Consignor Sublist ajax
    $('#consignor_sublist').on('click', function() {
        // alert('ji');
        var temporary_id_of_consignor = $('#temporary_id_of_consignor').val();
        var name_of_the_consignor = $('#name_of_the_consignor').val();
        var consignor_division = $('#consignor_division').val();
        var consignor_circle_details = $('#consignor_circle_details').val();
        var consignee_registered = $('#consignee_registered').val();
        var temporary_id_of_consignee = $('#temporary_id_of_consignee').val();
        var name_of_consignee = $('#name_of_consignee').val();
        var poi_num = $('#poi_num').val();

        $.ajax({
            type: 'post',
            url: '{{ route("offence_consignor.store") }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                temporary_id_of_consignor: temporary_id_of_consignor,
                name_of_the_consignor: name_of_the_consignor,
                consignor_division: consignor_division,
                consignor_circle_details: consignor_circle_details,
                consignee_registered: consignee_registered,
                temporary_id_of_consignee: temporary_id_of_consignee,
                name_of_consignee: name_of_consignee,
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

                        tr += '<tr><td width="5%">' + k + '</td><td width="15%">' + item.temporary_id_of_consignor + '</td><td>' + item.name_of_the_consignor + '</td><td width="25%">' + item.division_name + '</td><td width="20%">' + item.temporary_id_of_consignee + '</td><td width="20%">' + item.name_of_consignee + '</td></tr>';



                    });
                    // '</td><td width="20%">' + item.consignor_circle_details +
                    // alert(tr);
                    // $('#zero_configuration_table tbody').style.display;
                }
                $('#consignorbody').html(tr);
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

            $('#inter').hide();
            $('#interone').hide();
            $('#intertwo').hide();

        } else if ($('#tax_type').val() == 'inter') {
            $('#inter').show();
            $('#interone').show();
            $('#intertwo').show();
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
    // function Nature_of_the_offense(){
        $("#nature_of_the_offense").mouseout(function() {
        // alert("hii")
        var id= document.getElementById('nature_of_the_offense').value;
        $.ajax({
            type: 'GET',
            url: '{{ route("offence_section_name.index") }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                nature_of_the_offense:id

            },
            // dataType: 'JSON',
            // contentType: false,
            // cache: false,
            // processData: false,

            success: function(data) {
                // $(form).trigger("reset");
                
                // window.location.href = "/offence_vehicle";
                if (data && data.length > 0) {
        data=$.parseJSON( data );
        // alert(data.offence_sections.offence_section);
                document.getElementById('offense_section_name').value =data.offence_sections.offence_section;
                document.getElementById('offense_section').value =data.offence_sections.unique_id;
                
                }
            },
            // error: function(response) {}
        });

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
                hsn_code:hsn_code
            },
            success: function(data) {
                // alert(data);
                if (data && data.length > 0) {
                    data = $.parseJSON(data);
                    //   $('table#zero_configuration_table tbody').append(data);
                    var tr = '';
                    $.each(data.tax_list, function(i, item) {
                        var k = i + 1;
                        tr += '<tr><td width="5%">' + k + '</td><td width="15%">' + item.hsn_code + '</td><td width="15%">' + item.tax_type + '</td><td width="15%">' + item.tax_amount + '</td><td>' + item.cgst_penalty + '</td><td width="25%">' + item.sgst_penalty + '</td><td width="20%">' + item.igst_penalty + '</td></tr>';
                    });
                    $('#amount').empty().append(data.tax_amount);
                    $('#cgst').empty().append(data.cgst_total_amount);
                    $('#sgst').empty().append(data.sgst_total_amount);
                    $('#igst').empty().append(data.igst_total_amount);

                    // alert(tr);
                    // $('#zero_configuration_table tbody').style.display;
                    $('#taxbody').html(tr);
                    //         if (data && data.length > 0) {  
                    //   data=$.parseJSON( data ); //parse response string
                }
            }
        });
    })
    // sublist end


    $('#overallformupdate').on('click', function() {
        // alert('hi');
        var poi_num = $('#poi_num').val();
        var intelligence_division = $('#intelligence_division').val();
        var roving_squad_no = $('#roving_squad_no').val();
        var duty_date = $('#duty_date').val();
        var shift = $('#shift').val();
        var offense_booked_vehicle_number = $('#offense_booked_vehicle_number').val();
        var place_of_interception = $('#place_of_interception').val();
        var offense_booking_time = $('#offense_booking_time').val();
        var nature_of_the_offense = $('#nature_of_the_offense').val();
        var offense_section = $('#offense_section').val();
        // var count_of_commodity_involved = $('#count_of_commodity_involved').val();
        var description = $('#description').val();
        var orders_passed = $('#orders_passed').val();
        var penality_details = $('#penality_details').val();
        var reason = $('#reason').val();
        var offence_no = $('#offence_no').val();



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
                offence_no: offence_no

            },
            // dataType: 'JSON',
            // contentType: false,
            // cache: false,
            // processData: false,

            success: function(response) {
                // $(form).trigger("reset");
                // alert(response);
                window.location.href = "/offence_vehicle";

            },
            error: function(response) {}
        });

    })
    
    
</script>

</html>