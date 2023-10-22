@extends('menu/header')
@extends('menu/menu')
<script src="asset/js/scripts/sweetalert.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<style>
    .card-icon .card-body {
        padding: 0.5rem 0.5rem;
    }

    .modal:nth-of-type(even) {
        z-index: 1052 !important;
    }

    .modal-backdrop.show:nth-of-type(even) {
        z-index: 1051 !important;
    }

    td,
    th {
        border-right: 1px solid #ccc;
        text-align: left;
        padding: 8px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    .table table tr td {
        font-size: 14px;
        color: #555;
        font-weight: 500;
        border: 1px solid #ccc;
    }

    .table table tr th {
        font-size: 14px;
        text-transform: uppercase;
        color: #024a89;

    }

    .table {
        margin-top: 20px;
    }

    a.ul-widget2__title {
        font-size: 15px;
        color: #000;
        font-weight: 700;
        text-transform: unset;
    }

    table tr {
        border: 1px solid #ccc;
        !important
    }

    span.change-co {
        font-size: 28px !important;
        font-weight: 800 !important;
    }

    .ul-widget4__img img {
        width: 142px;
    }

    .ul-widget2__info.ul-widget4__users-info {
        width: calc(208% - 178px) !important;
    }

    .ul-widget-s5__content:last-child {
        display: flex;
        justify-content: space-between;
        width: 100%;
        align-items: center;
    }

    .revenue h3 {
        font-size: 15px;
        font-weight: 600;
        color: #555 !important;
        margin-bottom: 0px;
    }

    .ul-widget-s5__progress {
        flex: 1;
        padding-right: 15px;
        padding-left: 25px;
    }

    .ul-widget-s5__item {
        border-bottom: 1px dashed #ccc;
        padding-bottom: 0px;
    }

    #chartdiv {
        width: 100%;
        height: 275px;
    }

    #chartdiv2 {
        width: 100%;
        height: 275px;
    }

    .less-pad {
        padding: 6px 11px;
    }

    .breadcrumb h1 {
        font-size: 16px !important;
        font-weight: 800;
        margin-bottom: 7px !important;
        color: #003473;
    }

    .breadcrumb {
        border-bottom: 1px dashed #ccc;
        margin: 6px 0px 16px;
    }
</style>
@php
$div_name = session('division_id');
$user_type_name = session('usertype_id');


@endphp
<!-- <br><br><br> -->
<div class="main-content-wrap d-flex flex-column">
    <!-- ============ Body content start ============= -->
    <div class="main-content">
        <div class="breadcrumb"><br><br><br>
            <h1 class="mr-2">INTELLIGENCE ROVING SQUAD SUPPORT - All Divisions
            </h1>

        </div>
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!--<div class="col-md-7">-->
                            <!--    <h5>Place of Intercepted - This month count</h5>-->
                            <!--  </div>   -->
                            <div class="col-md-5 mb-2">
                                <!-- <input type="month" class="form-control datepicker" value="2022-11"> -->
                                <!-- <input id="month" name="month" type="month" class="form-control datepicker" value="<?php echo date('Y-m'); ?>"> -->
                                <!-- <input id="month" name="month" type="year" class="form-control datepicker" value="<?php echo date('Y'); ?>"> -->
                                <select id="month" name="month" class="form-control datepicker"></select>
                            </div>
                            <input type="hidden" id="division_name" name="division_name" value="<?php echo $div_name; ?>">
                            <input type="hidden" id="user_type_name" name="user_type_name" value="<?php echo $user_type_name; ?>">
                        </div>
                        <div class="ul-widget__body">
                            <div class="ul-widget1">
                                <div class="ul-widget4__item ul-widget4__users">
                                    <div class="ul-widget4__img"><img id="userDropdown" src="{{ asset('public/asset/images/car.png')}}" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                                    <div class="ul-widget2__info ul-widget4__users-info"><a class="ul-widget2__title" href="#">Vehicle Intercepted
                                        </a>
                                        <span class="ul-widget2__username" href="#"><span id="check" class="ul-widget4__number t-font-boldest text-primary change-co"></span></span>
                                    </div>
                                    <!--                    <button data-toggle="modal" href="#myModal" class="btn btn-primary btn-icon m-1" type="button"><span class="ul-btn__icon"></span></button>
-->
                                    <!-- <a data-toggle="modal" href="#myModal" class="eye-icom"><img src="../asset/images/eye.png"></a> -->


                                    <div class="modal" id="myModal">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title w-100 text-center text-info"><b>Checked - 1600 </b></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="container"></div>
                                                <div class="modal-body">
                                                    <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Vehicle No.</th>
                                                                </th>
                                                                <th>Date & Time</th>
                                                                <th>Transport Name</th>
                                                                <th>Owner Name</th>
                                                                <th>Status</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr data-toggle="collapse" data-target="#demo3" class="accordion-toggle">
                                                                <!-- <td>TN33 AC 3377</td>
                                                                <td>18-11-2022 & 12:00 AM</td>
                                                                <td>SRS Transport Chennai</td>
                                                                <td>Selvanayagam</td> -->
                                                                <td><span class="badge badge-pill badge-danger m-2">Offence</span></td>
                                                                <td><a data-toggle="modal" href="#myModal2" class="btn btn-primary">More Info</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="modal-footer">
                                                    <a href="#" data-dismiss="modal" class="btn btn-secondary">Close</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal" id="myModal2" data-backdrop="static">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title w-100 text-center text-info"><b>TN33 AC 3377</b></h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="container"></div>
                                                <div class="modal-body">
                                                    <div>
                                                        <table class="table table-bordered table-striped mt-0">
                                                            <tbody>
                                                                <tr>
                                                                    <th colspan="2">Eway bill part A</th>

                                                                </tr>
                                                                <tr>
                                                                    <td>E-waybill number</td>
                                                                    <td class="text-align"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>E-waybill date</td>
                                                                    <td class="text-align">30-09-2022</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Invoice number</td>
                                                                    <td class="text-align">2022/INV/017</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Invoice date </td>
                                                                    <td class="text-align">09-10-2022</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Valid from </td>
                                                                    <td class="text-align">12-10-2022 13.30</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Valid until </td>
                                                                    <td class="text-align">13-10-2022 10.30</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>GSTIN of supplier/URP </td>
                                                                    <td class="text-align"> 33aabcu9603r1zm</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Place of dispatch </td>
                                                                    <td class="text-align"> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>GSTIN of recipient </td>
                                                                    <td class="text-align">29abacu9703r3zm </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Place of delivery </td>
                                                                    <td class="text-align">Bengaluru 560063</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>TDN document number </td>
                                                                    <td class="text-align">tx8233234548 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Document date </td>
                                                                    <td class="text-align">10-10-2022 13.30 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Value of goods </td>
                                                                    <td class="text-align">178000 </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>HSN code </td>
                                                                    <td class="text-align">63041930 </td>
                                                                </tr>Offence Value
                                                                <tr>
                                                                    <td>Reason for transportation</td>
                                                                    <td class="text-align">Outward supply </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>E-way bill part B</th>
                                                                    <th class="text-align"></th>
                                                                </tr>
                                                                <tr>
                                                                    <td>Vehicle number</td>
                                                                    <td class="text-align"><b style="letter-spacing: 1px;font-size: 16px;">TN09BE8123</b> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Mode</td>
                                                                    <td class="text-align">Road</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>From</td>
                                                                    <td class="text-align"><b>Chennai</b> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Date &amp;Time</td>
                                                                    <td class="text-align">05-11-2022, 13.20:00
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="table-2 text-center">
                                                            <a href="#" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i> No E-way Bill</a>


                                                        </div>
                                                        <!--<div class="table-2">
<a href="" class="eway-btn2"><i class="fa fa-check" aria-hidden="true"></i> Goods Match</a>

</div>-->
                                                        <div class="form-check pt-2 pb-2">
                                                            <input class="form-check-input" id="gridCheck1" type="checkbox">
                                                            <label class="form-check-label ml-2" for="gridCheck1">
                                                                Empty Vehicle

                                                            </label>
                                                        </div>
                                                        <!---<div class="table-2 chek">
   <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" class="form-control">
  <label for="vehicle1"></label><br>
</div>-->
                                                        <form class="login-page eway-frm">
                                                            <label for="phone">Officer Remarks:</label>
                                                            <textarea placeholder="Enter a Remarks" class="form-control"></textarea>
                                                        </form>


                                                        <center>
                                                            <div class="mt-2 mb-2">
                                                                <a href="offence_vehicle_form.php" class="btn btn-info"> Offence Booking</a>
                                                            </div>
                                                        </center>

                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="#" data-dismiss="modal" class="btn btn-secondary">Close</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ul-widget4__item ul-widget4__users">
                                    <div class="ul-widget4__img"><img id="userDropdown" src="{{ asset('public/asset/images/car-insurance.png')}}" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                                    <div class="ul-widget2__info ul-widget4__users-info"><a class="ul-widget2__title" href="#">Vehicle Passed</a>
                                        <span class="ul-widget2__username" href="#"><span class="ul-widget4__number t-font-boldest text-success change-co" id="passed_check"></span></span>
                                    </div>
                                    <!-- <a href="" class="eye-icom"><img src="../asset/images/eye.png"></a> -->
                                </div>
                                <div class="ul-widget4__item ul-widget4__users">
                                    <div class="ul-widget4__img"><img id="userDropdown" src="{{ asset('public/asset/images/searching.png')}} " alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                                    <div class="ul-widget2__info ul-widget4__users-info"><a class="ul-widget2__title" href="#">Offence Booked</a>
                                        <span class="ul-widget2__username" href="#"><span class="ul-widget4__number t-font-boldest text-danger change-co" id="vech_check"></span></span>
                                    </div>
                                    <!--                     <button class="btn btn-primary btn-icon m-1" type="button"><span class="ul-btn__icon"><i class="i-File-Clipboard-File--Text"></i></span><span class="ul-btn__text">View More</span></button>
-->
                                    <!-- <a href="" class="eye-icom"><img src="../asset/images/eye.png"></a> -->
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-md-8">
                <div class="card text-center border-primary">
                    <!-- -->
                    <div class="card-header text-left bg-primary text-white less-pad">
                        <div class="spal-hed">Division wise Revenue collected details </div>
                    </div>
                    <div class="card-body" id="demo1">
                        <!-- -->
                        <!-- -->



                    </div>
                </div>
                <!-- <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h5> Monthly wise Vehicle Checking Details </h5>
                            </div>
                            <div class="col-md-4 mb-2">
                                <input type="month" class="form-control datepicker" value="<?php echo date('Y-m'); ?>">
                            </div>

                        </div>
                        <div class="separator-breadcrumb border-top"></div>

                        <div id="stackedAreaChart"></div>
                    </div>
                </div>
            </div> -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card text-center border-primary">
                    <!-- -->
                    <div class="card-header text-left bg-primary text-white less-pad">
                        <div class="spal-hed">Division wise vehicle intercepted details</div>
                    </div>
                    <div class="card-body" id="demo">


                    </div>
                </div>
                <!-- -->
                <!-- -->
            </div>
            <!-- </div> -->
            <!-- <div class="mt-3 mb-4 col-lg-6 col-xl-6">
                <div class="card text-center border-primary">

                    <div class="card-header text-left bg-primary text-white less-pad">
                        <div class="spal-hed">Division wise Revenue collected details </div>
                    </div>
                    <div class="card-body" id="demo1">



                        </div>
                    </div>

                </div>
            </div> -->

        </div>





        <!-- <div class="row">
            <div class="col-md-6 mt-3">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <div class="spal-hed">Offence Count</div>
                    </div>
                    <div class="card-body">
                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-3">
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <div class="spal-hed">Offence Value</div>
                    </div>
                    <div class="card-body">
                        <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
                    </div>
                </div>
            </div> -->
        <!-- </div> -->
    </div>








</div>
</div>
<script type="text/javascript">
    let startYear = 1800;
    let endYear = new Date().getFullYear();
    for (i = endYear; i > startYear; i--) {
        $('#month').append($('<option />').val(i).html(i));
    }
</script>

<script>
    //canvas chart
    window.onload = function() {
        CanvasJS.addColorSet("greenShades",
            [ //colorSet Array
                "#e2555b",
                "#e57300",
                "#138061",
                "#d7b209",
                "#2494d3",
                "#607d8b"
            ]);

        var chart = new CanvasJS.Chart("chartContainer2", {
            animationEnabled: true,
            title: {
                text: "",
                horizontalAlign: "left"
            },
            colorSet: "greenShades",
            data: [{
                type: "doughnut",
                startAngle: 60,
                //innerRadius: 60,
                indexLabelFontSize: 17,
                indexLabel: "{label} - #percent%",
                toolTipContent: "<b>{label}:</b> {y} (#percent%)",
                dataPoints: [{
                        y: 67,
                        label: "Trichy"
                    },
                    {
                        y: 28,
                        label: "Covai"
                    },
                    {
                        y: 10,
                        label: "Tiruppur"
                    },
                    {
                        y: 7,
                        label: "Erode"
                    },
                    {
                        y: 15,
                        label: "Salem"
                    },
                    {
                        y: 6,
                        label: "chennai"
                    }
                ]
            }]
        });
        chart.render();


        CanvasJS.addColorSet("greenShades",
            [ //colorSet Array

                "#91ba13",
                "#6f58a8",
                "#e2555b",
                "#e57300",
                "#22c3bd",
                "#2996d4"
            ]);
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "",
                horizontalAlign: "left"
            },
            colorSet: "greenShades",
            data: [{
                type: "doughnut",
                startAngle: 60,
                //innerRadius: 60,
                indexLabelFontSize: 17,
                indexLabel: "{label} - #percent%",
                toolTipContent: "<b>{label}:</b> {y} (#percent%)",
                dataPoints: [{
                        y: 67,
                        label: "Trichy"
                    },
                    {
                        y: 28,
                        label: "Covai"
                    },
                    {
                        y: 10,
                        label: "Tiruppur"
                    },
                    {
                        y: 7,
                        label: "Erode"
                    },
                    {
                        y: 15,
                        label: "Salem"
                    },
                    {
                        y: 6,
                        label: "chennai"
                    }
                ]
            }]
        });
        chart.render();
    }
    // // Create chart instance
    // var chart = am4core.create("chartdiv2", am4charts.PieChart);

    // // Add data
    // chart.data = [{
    //     "country": "Chennai",
    //     "litres": 20,
    //     "color": "red"
    // }, {
    //     "country": "Vellore",
    //     "litres": 40,
    //     "color": am4core.color("#F1D302")
    // }, {
    //     "country": "Madurai",
    //     "litres": 30,
    //     "color": "#f44336"
    // }];


    // // Add and configure Series
    // var pieSeries = chart.series.push(new am4charts.PieSeries());
    // pieSeries.dataFields.value = "litres";
    // pieSeries.dataFields.category = "country";

    // // Add legend
    // chart.legend = new am4charts.Legend();
    // pieSeries.colors.list = [
    //     am4core.color("#0075cf"),
    //     am4core.color("#00e396"),
    //     am4core.color("#feb019"),
    //     am4core.color("#FF9671"),
    //     am4core.color("#FFC75F"),
    //     am4core.color("#F9F871"),
    // ];
</script>

<script>
    // Create chart instance
    // var chart = am4core.create("chartdiv", am4charts.PieChart);

    // // Add data
    // chart.data = [{
    //     "country": "Salem",
    //     "litres": 60
    // }, {
    //     "country": "Erode",
    //     "litres": 30
    // }, {
    //     "country": "Trichy",
    //     "litres": 10
    // }];


    // // Add and configure Series
    // var pieSeries = chart.series.push(new am4charts.PieSeries());
    // pieSeries.dataFields.value = "litres";
    // pieSeries.dataFields.category = "country";
    // // Add legend
    // chart.legend = new am4charts.Legend();
    // pieSeries.colors.list = [
    //     am4core.color("#003473"),
    //     am4core.color("#4caf50"),
    //     am4core.color("#f44336"),
    //     am4core.color("#FF9671"),
    //     am4core.color("#FFC75F"),
    //     am4core.color("#F9F871"),
    // ];
</script>
<script>
    $(document).ready(function() {
        // dashboard initial count start
        var month = $("#month").val();
        var division_name = $("#division_name").val();
        var user_type_name = $("#user_type_name").val();
        // alert(month);
        $('#check').empty();
        $('#vech_check').empty();
        $('#passed_check').empty();

        $.ajax({
            type: 'GET',
            url: '{{ route('dashboard.index') }}',
            data: {
                'month': month,
                'division_name': division_name,
                'user_type_name': user_type_name,
            },
            cache: false,
            success: function(data) {
                // alert(data);
                if (data && data.length > 0) {
                    data = $.parseJSON(data);
                    // console.log(data.month);
                    $('#check').append(data.checked_vehicle);
                    $('#vech_check').append(data.offenceVehicle);
                    $('#passed_check').append(data.passed);

                }

            }
        });
        // dashboard initial count end


        var month = $("#month").val();
        var division_name = $("#division_name").val();
        var user_type_name = $("#user_type_name").val();

        $('#demo').empty();
        // $('#passed').empty();
        // $('#offence').empty();

        $.ajax({
            type: 'GET',
            url: '{{ route('dashboarddivisiondata.index') }}',
            data: {
                'month': month,
                'division_name': division_name,
                'user_type_name': user_type_name,
            },
            // cache: false,
            success: function(data) {

                if (data && data.length > 0) {
                    data = $.parseJSON(data);


                    var div = '';
                    var val1 = data.checked_vehicle;
                    var val2 = data.passed;
                    var val3 = data.offenceVehicle;
                    var a = data.checked_vehicle.length;
                    var b = data.passed.length;
                    var c = data.offenceVehicle.length;
                    if (c == 0) {
                        var cc = 0;
                    } else {

                        var cc = c;
                    }
                    if (data.checked_vehicle == '') {
                        alert("hii");
                        $('#demo').append('<div class="ul-widget5"><h1 style="text-align:center;color:red;">No Division Data In This Year</h1></div>');

                    } else if (data.checked_vehicle != '') {
                        // alert("hello");
                        for (var i = 0; i <= a; ++i) {



                            for (var i = 0; i <= b; ++i) {



                                for (var i = 0; i <= cc; ++i) {


                                    if (val1 == 0) {
                                        var checked = 0;
                                    } else {
                                        var checked = val1[i].cnt_division;
                                    }
                                    if (val2 == 0) {
                                        var passed = 0;
                                    } else if (val2[i].cnt_division == null) {
                                        var passed = 0;
                                    } else {
                                        var passed = val2[i].cnt_division;
                                    }
                                    if (val3 == 0) {
                                        var offence = 0;
                                    } else if (val3[i].cnt_division == null) {
                                        var offence = 0;
                                    } else {
                                        var offence = val3[i].cnt_division;
                                    }


                                    if (passed != '0' && offence != '0') {
                                        // var percentage  =   parseInt((parseInt(val3[i].cnt_division)/parseInt(val2[i].cnt_division))*100);
                                        var percentage = parseInt((parseInt(val3[i].cnt_division) / parseInt(val1[i].cnt_division)) * 100);
                                        // console.log(percentage);
                                        // alert(percentage);
                                    } else {
                                        var percentage = 0;
                                    }

                                    $('#demo').append('<div class="ul-widget5"><div class="ul-widget-s5__item mb-1"><div class="ul-widget-s5__content"><div class="ul-widget-s5__section"><div class="reve-img"><img id="userDropdown" src="../public/asset/images/location.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div><a class="ul-widget4__title" href="#">' + val1[i].division_name + '</a> </div></div><div class="ul-widget-s5__content"> <div class="ul-widget-s5__progress"><div class="ul-widget-s5__stats" style="display: unset;"><div class="row revenue"><div class="col-md-4 cc1"><h3 class="text-primary">Intercepted</h3><p class="text-primary">' + checked + ' <small>Count</small></p></div> <div class="col-md-4 cc2"><h3 class="text-success" >Passed</h3><p class="text-success">' + passed + '<small>Count</small></p></div><div class="col-md-4 cc3"><h3 class="text-danger">Offence</h3><p class="text-danger">' + offence + ' <small>Count</small></p> </div></div></div> <div class="progress"> <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" style="width: ' + percentage + '%;">' + percentage + '</div> </div></div></div></div>');
                                    // <a  href="" class="eye-icom2"><img src="../asset/images/eye.png"></a>
                                    // $('#demo').append('<div class="ul-widget5"><div class="ul-widget-s5__item mb-1"><div class="ul-widget-s5__content"><div class="ul-widget-s5__section"><div class="reve-img"><img id="userDropdown" src="../asset/images/location.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div><a class="ul-widget4__title" href="#">'+ item.division_name +'</a> </div></div><div class="ul-widget-s5__content"> <div class="ul-widget-s5__progress"><div class="ul-widget-s5__stats" style="display: unset;"><div class="row revenue"><div class="col-md-4 cc1"><h3 class="text-primary">Intercepted</h3><p class="text-primary">'+item.cnt_division+' <small>Count</small></p></div> <div class="col-md-4 cc2"><h3 class="text-success" >Passed</h3><p class="text-success">'+item.cnt_division +'<small>Count</small></p></div><div class="col-md-4 cc3"><h3 class="text-danger">Offence</h3><p class="text-danger">'+item.cnt_division+' <small>Count</small></p> </div></div></div> <div class="progress"> <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" style="width: 25%;">25</div> </div></div><a  href="" class="eye-icom2"><img src="../asset/images/eye.png"></a></div></div>');
                                }
                                //   }
                                // });
                                // });
                                //

                            }
                        }
                        //  });
                    }

                }
            }
        });
        // division wise interchepted count end



        // division wise offence count start
        var month = $("#month").val();
        var division_name = $("#division_name").val();
        var user_type_name = $("#user_type_name").val();

        $('#demo1').empty();
        // $('#passed').empty();
        // $('#offence').empty();

        $.ajax({
            type: 'GET',
            url: '{{ route('dashboardrevenuecollected.index') }}',
            data: {
                'month': month,
                'division_name': division_name,
                'user_type_name': user_type_name,
            },
            // cache: false,
            success: function(data) {
                // alert("hii");
                // alert(data);
                if (data && data.length > 0) {
                    data = $.parseJSON(data);
                    // console.log(data.demos);
                    var a = 0;
                    var div = '';

                    if (data.demos == '') {

                        $('#demo1').append('<div class="ul-widget5"><h1 style="text-align:center;color:red;">No Division Data In This Year</h1></div>');

                    } else {
                        $.each(data.over_amount, function(i, item2) {
                            var amount = item2.totamount;
                            // alert(amount);


                            $.each(data.demos, function(i, item) {


                                if (item.cnt_division == '') {
                                    var count = 0;
                                } else {
                                    var count = item.cnt_division;
                                }
                                if (item.tax_amnt == '') {
                                    var tax_amount = 0;
                                } else {
                                    var tax_amount = item.tax_amnt;
                                }

                                // console.log(a);

                                if (item.cnt_division != '0' && item.tax_amnt != '0') {
                                    // var percentage  =   parseInt((parseInt(val3[i].cnt_division)/parseInt(val2[i].cnt_division))*100);
                                    var percentage = parseInt((parseInt(item.tax_amnt) / parseInt(amount)) * 100);
                                    // console.log(percentage);
                                    // alert(percentage);x
                                } else {
                                    var percentage = 0;
                                }
                                // a += item.tax_amnt;
                                //  alert(a);

                                $('#demo1').append('<div class="ul-widget5"><div class="ul-widget-s5__item mb-1"><div class="ul-widget-s5__content"><div class="ul-widget-s5__section"><div class="reve-img"><img id="userDropdown" src="../public/asset/images/location.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div><a class="ul-widget4__title" href="#">' + item.division_name + '</a></div></div><div class="ul-widget-s5__content"><div class="ul-widget-s5__progress"><div class="ul-widget-s5__stats" style="display: unset;"><div class="row revenue"><div class="col-md-8 cc1"><h3 class="text-primary">Offence Count / Value</h3><p class="text-primary">' + count + ' <small>Count</small> /  <span class="text-success"> ' + tax_amount + ' <small>Value</small></span></p></div> <!-- <div class="col-md-4 cc2"><h3 class="text-success" >Offence value</h3><p class="text-success">10000</p></div>--><!--  <div class="col-md-4 cc3"><h3 class="text-danger">Offence</h3><p class="text-danger">200</p></div>--></div></div><div class="progress"><div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="50" style="width: ' + percentage + '%;">' + percentage + '</div></div></div> </div></div>');
                                // <a  href="" class="eye-icom2"><img src="../asset/images/eye.png"></a>


                            });
                        });
                    }

                }
            }

        });



    });



    // view more
    $("#count_data").click(function() {
        //  alert('hi');
        // var month = $("#month").val();
        // alert(month);
        var division_name = $("#division_name").val();
        var count_data = $("#count_data").val();
        var user_type_name = $("#user_type_name").val();

        // alert(division_name);
        $('#cnt').empty();
        // $('#cnt').append(data.checked_count);
        // $('#vech_check').empty();
        // $('#passed_check').empty()
        $.ajax({
            type: 'GET',
            url: '{{ route('dashboardview.index') }}',
            data: {
                // 'month': month,
                'division_name': division_name,
                'count_data': count_data,
                'user_type_name': user_type_name,
            },
            cache: false,
            success: function(data) {
                // alert(data);
                if (data && data.length > 0) {
                    data = $.parseJSON(data);
                    console.log(data.checked_data);

                    $('#cnt').append(data.checked_count);
                    // $('#vech_check').append(data.offenceVehicle);
                    // $('#passed_check').append(data.passed);
                    // tbody start
                    // alert(data.checked_data);
                    var tr = '';
                    $.each(data.checked_data, function(i, item) {

                        var k = i + 1;


                        // console.log(item.unique_id);
                        // alert(item.unique_id);

                        if (item.need_offence_booking_sts == 0) {
                            item.need_offence_booking_sts = "Processing";
                        } else if (item.need_offence_booking_sts == 1) {
                            item.need_offence_booking_sts = "Pending";
                        }
                        // // id = item.id;
                        // var editurl = '{{ route("checked_vehicle.edit", ":id") }}';
                        // updateurl = editurl.replace(':id', item.id);

                        // var url = '{{ route("checked_vehicle.destroy", ":id") }}';
                        // destroyurl = url.replace(':id', item.id);



                        tr += '<tr><td width="15%">' + item.vechicle_no + '</td><td width="S15%">' + item.booking_entry_date + '-' + item.booking_entry_date + '</td><td width="25%">' + item.veh_place + '</td><td width="20%">' + item.veh_owner + '</td><td width="15%">' + item.need_offence_booking_sts + '</td><td width="20%"><a data-toggle="modal" href="#myModal2" value=' + item.need_offence_booking_sts + ' class="btn btn-primary edit">More Info</a> </td></tr>';



                    });


                    $('#checked_zero_configuration_table tbody').html(tr);

                    // }
                    // tbody end






                }

            }
        });
    });
    // view more end
    // });


    // revenue wise count
    // division wise name and count start

    // });
    $("#month").change(function() {
        // alert();
        var month = $("#month").val();
        var division_name = $("#division_name").val();
        var user_type_name = $("#user_type_name").val();
        // alert(month);
        $('#check').empty();
        $('#vech_check').empty();
        $('#passed_check').empty();

        $.ajax({
            type: 'GET',
            url: '{{ route('dashboard.index') }}',
            data: {
                'month': month,
                'division_name': division_name,
                'user_type_name': user_type_name,
            },
            cache: false,
            success: function(data) {
                // alert(data);
                if (data && data.length > 0) {
                    data = $.parseJSON(data);
                    // console.log(data.month);
                    $('#check').append(data.checked_vehicle);
                    $('#vech_check').append(data.offenceVehicle);
                    $('#passed_check').append(data.passed);

                }

            }
        });
        // division wise name and count start
        var month = $("#month").val();
        var division_name = $("#division_name").val();
        var user_type_name = $("#user_type_name").val();

        $('#demo').empty();
        // $('#passed').empty();
        // $('#offence').empty();

        $.ajax({
            type: 'GET',
            url: '{{ route('dashboarddivisiondata.index') }}',
            data: {
                'month': month,
                'division_name': division_name,
                'user_type_name': user_type_name,
            },
            // cache: false,
            success: function(data) {

                if (data && data.length > 0) {
                    data = $.parseJSON(data);


                    var div = '';

                    //    var arr1 = data[0].checked_vehicle;
                    //     var arr2 = data[1].passed;
                    //    console.log(data[1].passed);

                    //    var a =data[0].checked_vehicle.length;
                    //    alert(a);
                    //    var b =data[1].passed.length;
                    //    var c =data[2].offenceVehicle.length;
                    var val1 = data.checked_vehicle;
                    var val2 = data.passed;
                    var val3 = data.offenceVehicle;
                    var a = data.checked_vehicle.length;
                    //    alert(a);
                    var b = data.passed.length;
                    var c = data.offenceVehicle.length;
                    //    var val1 =data.checked_vehicle;
                    // alert(val1);


                    //    console.log(data.array);
                    //    $.each(data.array, function(i, item) {

                    for (var i = 0; i < a; ++i) {
                        //     // alert("hii");
                        for (var i = 0; i < b; ++i) {
                            if (val2[i].cnt_division == '') {
                                $passed = 0;
                            } else {
                                $passed = val2[i].cnt_division;
                            }

                            for (var i = 0; i < c; ++i) {
                                if (val3[i].cnt_division == '') {
                                    $offence = 0;
                                } else {
                                    $offence = val3[i].cnt_division;
                                }

                                //                                 var tr = '';
                                // $.each(data.checked_vehicle, function(i, item) {
                                // $.each(data.passed, function(i, item1) {
                                //     $.each(data.offenceVehicle, function(i, item2) {
                                // // for (var i = 0; i < b; ++i) {
                                //                           for (var i = 0; i < c; ++i) {


                                // var k = i+1;
                                if (val2[i].cnt_division != '0' && val3[i].cnt_division != '0') {
                                    // var percentage  =   parseInt((parseInt(val3[i].cnt_division)/parseInt(val2[i].cnt_division))*100);
                                    var percentage = parseInt((parseInt(val3[i].cnt_division) / parseInt(val1[i].cnt_division)) * 100);
                                    // console.log(percentage);
                                    // alert(percentage);
                                } else {
                                    var percentage = 0;
                                }

                                $('#demo').append('<div class="ul-widget5"><div class="ul-widget-s5__item mb-1"><div class="ul-widget-s5__content"><div class="ul-widget-s5__section"><div class="reve-img"><img id="userDropdown" src="../public/asset/images/location.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div><a class="ul-widget4__title" href="#">' + val1[i].division_name + '</a> </div></div><div class="ul-widget-s5__content"> <div class="ul-widget-s5__progress"><div class="ul-widget-s5__stats" style="display: unset;"><div class="row revenue"><div class="col-md-4 cc1"><h3 class="text-primary">Intercepted</h3><p class="text-primary">' + val1[i].cnt_division + ' <small>Count</small></p></div> <div class="col-md-4 cc2"><h3 class="text-success" >Passed</h3><p class="text-success">' + val2[i].cnt_division + '<small>Count</small></p></div><div class="col-md-4 cc3"><h3 class="text-danger">Offence</h3><p class="text-danger">' + val3[i].cnt_division + ' <small>Count</small></p> </div></div></div> <div class="progress"> <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" style="width: ' + percentage + '%;">' + percentage + '</div> </div></div></div></div>');
                                // <a  href="" class="eye-icom2"><img src="../asset/images/eye.png"></a>
                                // $('#demo').append('<div class="ul-widget5"><div class="ul-widget-s5__item mb-1"><div class="ul-widget-s5__content"><div class="ul-widget-s5__section"><div class="reve-img"><img id="userDropdown" src="../asset/images/location.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div><a class="ul-widget4__title" href="#">'+ item.division_name +'</a> </div></div><div class="ul-widget-s5__content"> <div class="ul-widget-s5__progress"><div class="ul-widget-s5__stats" style="display: unset;"><div class="row revenue"><div class="col-md-4 cc1"><h3 class="text-primary">Intercepted</h3><p class="text-primary">'+item.cnt_division+' <small>Count</small></p></div> <div class="col-md-4 cc2"><h3 class="text-success" >Passed</h3><p class="text-success">'+item.cnt_division +'<small>Count</small></p></div><div class="col-md-4 cc3"><h3 class="text-danger">Offence</h3><p class="text-danger">'+item.cnt_division+' <small>Count</small></p> </div></div></div> <div class="progress"> <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" style="width: 25%;">25</div> </div></div><a  href="" class="eye-icom2"><img src="../asset/images/eye.png"></a></div></div>');
                            }
                            //   }
                            // });
                            // });
                            //

                        }
                    }
                    //  });


                }
            }
        });
        // division wise interchepted count end

        // division wise offence count start
        var month = $("#month").val();
        var division_name = $("#division_name").val();
        var user_type_name = $("#user_type_name").val();

        $('#demo1').empty();
        // $('#passed').empty();
        // $('#offence').empty();

        $.ajax({
            type: 'GET',
            url: '{{ route('dashboardrevenuecollected.index') }}',
            data: {
                'month': month,
                'division_name': division_name,
                'user_type_name': user_type_name,
            },
            // cache: false,
            success: function(data) {

                if (data && data.length > 0) {
                    data = $.parseJSON(data);
                    // console.log(data.demos);
                    var a = 0;
                    var div = '';
                    $.each(data.over_amount, function(i, item2) {
                        var amount = item2.totamount;
                        // alert(amount);


                        $.each(data.demos, function(i, item) {


                            if (item.cnt_division == '') {
                                var count = 0;
                            } else {
                                var count = item.cnt_division;
                            }
                            if (item.tax_amnt == '') {
                                var tax_amount = 0;
                            } else {
                                var tax_amount = item.tax_amnt;
                            }

                            // console.log(a);

                            if (item.cnt_division != '0' && item.tax_amnt != '0') {
                                // var percentage  =   parseInt((parseInt(val3[i].cnt_division)/parseInt(val2[i].cnt_division))*100);
                                var percentage = parseInt((parseInt(item.tax_amnt) / parseInt(amount)) * 100);
                                // console.log(percentage);
                                // alert(percentage);x
                            } else {
                                var percentage = 0;
                            }
                            // a += item.tax_amnt;
                            //  alert(a);

                            $('#demo1').append('<div class="ul-widget5"><div class="ul-widget-s5__item mb-1"><div class="ul-widget-s5__content"><div class="ul-widget-s5__section"><div class="reve-img"><img id="userDropdown" src="../public/asset/images/location.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div><a class="ul-widget4__title" href="#">' + item.division_name + '</a></div></div><div class="ul-widget-s5__content"><div class="ul-widget-s5__progress"><div class="ul-widget-s5__stats" style="display: unset;"><div class="row revenue"><div class="col-md-8 cc1"><h3 class="text-primary">Offence Count / Value</h3><p class="text-primary">' + count + ' <small>Count</small> /  <span class="text-success"> ' + tax_amount + ' <small>Value</small></span></p></div> <!-- <div class="col-md-4 cc2"><h3 class="text-success" >Offence value</h3><p class="text-success">10000</p></div>--><!--  <div class="col-md-4 cc3"><h3 class="text-danger">Offence</h3><p class="text-danger">200</p></div>--></div></div><div class="progress"><div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="50" style="width: ' + percentage + '%;">' + percentage + '</div></div></div> </div></div>');
                            // <a  href="" class="eye-icom2"><img src="../asset/images/eye.png"></a>


                        });
                    });

                }
            }

        });


    });

    // division wise offence count end
</script>

@extends('menu/footer')
