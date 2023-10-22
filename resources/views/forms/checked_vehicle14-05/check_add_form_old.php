<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<style>
    .form-p p {
        font-size: 14px;
        color: #555;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .header-elements-inline {
        display: unset !important;
    }

    .ul-widget__item {

        padding: 4px;
    }

    h3.ul-widget__head-title {
        font-size: 15px;
        font-weight: 700;
        text-transform: uppercase;
        color: #003473;
    }

    .msg {
        color: red;
        text-align: center;
    }
</style>

@extends('menu/header')
@extends('menu/menu')
<?php
// session_start();


$div_name = session('division_id');
print_r($div_name);

?>

<div class="main-content-wrap d-flex flex-column" style="margin-top: 60px;">
    <!-- ============ Body content start ============= -->
    <div class="main-content">

        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb">
                    <h1 class="mr-2">Intercepted Form</h1>
                    <ul>
                        <li><a href="#">Form</a></li>
                        <li>Place of Interception Form</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="add_btn text-right">
                    <a href="../checked_vehicle">
                        <button class="btn btn-info m-1" type="button"> <i class="i-Arrow-Back-2"></i> Back</button></a>
                </div>
            </div>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card mb-3">
            <div class="card-body" style="background: #eee;">
                <!-- <form class="was-validated" method="get" action="{{ route('vehicleSearch.index') }}" autocomplete="off">
                    @csrf -->
                <div class="row row-xs">
                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <input class="form-control" name="veh_number" id="veh_number" type="text" placeholder="Enter a Vehicle Number" oninput="this.value = this.value.toUpperCase()">
                    </div>
                    <!-- <input type="hidden" name="division_no" id="division_no" value="<?php echo $div_name; ?>"> -->

                    <!-- <input type="text" id="division" value="<?php echo $div_name; ?>"> -->


                    <div class="col-md-2 mt-3 mt-md-0">
                        <button type="submit" id="vehicle_search" class="btn btn-primary btn-block">Go</button>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <!-- </form> -->
            </div>
        </div>
        <div class="text-align-center" id="no_data" style="display:none">
            <div class="card">
                <div class="card-body">
                    <h4 id="no_vehicle_data" class="msg"> </h4>
                </div>
            </div>
        </div>
        <form action="{{ route('checked_vehicle.store') }}" method="post">
            @csrf
            <div class="row" id="data_show" style="display:none">
                <div class="col-md-6"></div>
                <div class="col-md-6 col-lg-6 col-xl-6 mt-2 ">
                    <div class="card">


                        <div class="">
                            <div class="card-body">
                                <div class="ul-widget__head mo-mard v-margin">
                                    <div class="ul-widget__head-label">
                                        <h3 class="ul-widget__head-title">Vehicle Details</h3>
                                    </div>
                                    <h3 class="date">{{ now()->format('d-m-Y') }}</h3>
                                    <input type="hidden" id="entry_date" name="entry_date" value="<?php echo date('Y-m-d'); ?>">
                                    <input type="hidden" name="division_no" id="division_no" value="<?php echo $div_name; ?>">
                                </div>
                                <!-- begin::widget-stats-1-->
                                <div class="ul-widget1 vehcil-deta">
                                    <div class="ul-widget__item">
                                        <div class="ul-widget__info">
                                            <h3 class="ul-widget1__title ceh-h1">Vehicle No</h3>
                                        </div>
                                        <span class="ul-widget__number text-primary no-h3" id="vehicle_no"><b style="font-size: 21px;"></b></span>
                                        <input type="hidden" id="vehicle_num" name="vehicle_num" value="">
                                    </div>
                                    <div class="ul-widget__item">
                                        <div class="ul-widget__info">
                                            <h3 class="ul-widget1__title ceh-h1">Place</h3>
                                        </div><span class="ul-widget__number text-danger no-h3" id="veh_place"></span>
                                    </div>

                                    <!-- <div class="ul-widget__item">
                                    <div class="ul-widget__info">
                                        <h3 class="ul-widget1__title ceh-h1">Owner Name</h3>
                                    </div><span class="ul-widget__number text-success no-h3" id="veh_owner"></span>
                                </div> -->
                                    <div class="ul-widget__item">
                                        <div class="ul-widget__info">
                                            <h3 class="ul-widget1__title ceh-h1">POI Number</h3>
                                        </div><span class="ul-widget__number text-warning   no-h3"><b style="font-size: 21px;color: #000;" id="poi_number"></b></span>
                                        <input type="hidden" id="poi_no" name="poi_no">
                                        <!-- POICHN1221200001 -->
                                    </div>

                                </div>
                                <!-- end::widget-stats-1-->
                            </div>
                        </div>


                    </div>
                </div>

            </div>


            <div class="card mt-4" id="data_show_table" style="display:none">
                <table class="table check-vechicle vehilce-bg">
                    <!-- <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="15%">E-way No</th>
                                        <th width="25%">Inv No & Date</th>
                                        <th width="20%">Delivery </th>
                                        <th width="15%">Valid from</th>
                                        <th width="20%">Valid until</th>
                                    </tr>
                                </thead> -->
                </table>
                <div class="card-body">
                    <!-- id="eway_data_list" -->
                    <h3 class="card-title">

                    </h3>



                    <!-- right control icon-->
                    <div class="accordion chck-brd" id="accordionRightIcon">

                        <div class="card no-brd-rad">
                            <div class="card-header header-elements-inline chek-no-pad">

                                <h6 class="card-title ul-collapse_icon--size ul-collapse_right-icon mb-0">

                                    <table class="table check-vechicle" style="display:none;" id="tab1">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="15%">E-way No</th>
                                                <th width="25%">Inv No & Date</th>
                                                <th width="20%">Delivery </th>
                                                <th width="15%">Valid from</th>
                                                <th width="20%">Valid until</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <!-- <tr>
                                            <th width="5%">1</th>
                                            <td width="15%">00</td>
                                            <td width="25%">2022/INV/017 & 09-10-2022</td>
                                            <td width="20%">Bengaluru </td>
                                            <td width="15%">12-10-2022 13.30</td>
                                            <td width="20%">14-10-2022 13.30</td>
                                        </tr> -->
                                        </tbody>
                                    </table>
                                    </a>
                                </h6>
                            </div>
                            <!-- arrow data -->

                            <!-- arrow data -->

                        </div>

                        <!-- /right control icon-->

                        <div id="msg">


                        </div>

                        <br><br>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="radio" onclick="javascript:yesnoCheck();" onChange="empty1()" name="yesno" id="yesCheck" value="1">
                                <label for="html">Need Offence Booking</label>
                            </div>
                            <div class="col-md-6">
                                <input type="radio" onclick="javascript:yesnoCheck();" onChange="empty2()" name="yesno" id="noCheck" value="0">
                                <label for="html">Verified Vehicle</label>
                            </div>

                            <div class="col-md-6" id="ifYes" style="visibility:hidden">

                                <select class="form-control" id="book_now" name="book_now">
                                    <option value="">Select</option>
                                    <option value="booking_now">Booking Now</option>
                                    <option value="booking_later">Booking Later</option>
                                </select>


                            </div>
                            <div class="col-md-6" id="ifNo" style="visibility:hidden">

                                <select class="form-control" id="vehicle" name="vehicle">
                                    <option value="">Select</option>
                                    <option value="empty_vehicle">Empty vehicle</option>
                                    <option value="government_vehicle">Government vehicle</option>
                                    <option value="expected_vehicle">Expected Vehicle</option>
                                </select>


                            </div>


                            <!-- <input type="hidden"   id="book_sts" name="book_sts" value=1 > -->

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                        <label for="website">Officer Remarks</label>
                        <textarea class="form-control" id="offence_remark" name="offence_remark" placeholder="Enter Remarks"></textarea>
                    </div>
                    <div class="col-md-12">
                        <!-- <a href="checked_vehicle/list">
                    <button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a> -->
                        <button class="btn btn-primary float-left" type="submit"> Save</button>

                    </div>
                </div>
            </div>
    </div>
    </form>
</div>
</div>
<!-- end of main-content -->
</div>
</div>


@extends('menu/footer')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script type="text/javascript">
    let j = 0;
    $('#vehicle_search').on('click', function() {

        $('#tab1').hide();
        $("#vehicle_no").empty();
        $("#veh_place").empty();
        $("#veh_owner").empty();
        $("#poi_number").empty();
        $("#vehicle_num").empty();
        $("#poi_no").empty();
        $('#msg').empty();
        $.ajax({
            type: 'get',
            url: '{{ route("vehicleSearch.index") }}',
            data: {
                'veh_number': $('#veh_number').val(),
                'division': $('#division_no').val(),
                // hidden
            },

            success: function(data) {

                if (data && data.length > 0) {
                    data = $.parseJSON(data);

                    if (data.veh_data == '') {
                        // $("#no_vehicle_data").append(" ");
                        $("#no_data").show();
                        $("#no_vehicle_data").html("Vehicle Data Not Available");
                        $('#data_show').hide();
                        $('#data_show_table').hide();

                    } else if (data.veh_data != '') {

                        $("#no_data").hide();
                        // $("#no_vehicle_data").append(" ");
                        $('#data_show').show();
                        $('#data_show_table').show();

                        $.each(data.veh_data, function(index, value) {
                            // alert(value.ewb_part_b_dtls_id,'hi');die();
                            vehicle_no = value.vehno;
                            veh_place = value.frplace;

                            // alert(veh_place, 'place');

                            var n = j + 1;


                            eway_no = value.ewb_no;



                        });

                        $("#vehicle_no").append(vehicle_no);
                        $("#veh_place").append(veh_place);
                        // $("#veh_owner").append(veh_owner);

                        poi_number = data.poi_num.num;
                        // alert(poi_number, 'poi');
                        $("#poi_number").append(poi_number);
                        document.getElementById("vehicle_num").value = vehicle_no;
                        document.getElementById("poi_no").value = poi_number;

                        var i = 0;

                        var tr = '';
                        $.each(data.eway_data, function(i, item) {
                            var k = i + 1;
                            tr += '<tr><td width="5%">' + k + '</td><td width="15%">' + item.e_way_no + '</td><td width="25%">' + item.invoice_no + '</td><td width="20%">' + item.place_of_delivery + '</td><td width="15%">' + item.valid_from + '</td><td width="20%">' + item.valid_until + '</td><td><a class="text-default collapsed"  data-toggle="collapse" href="#accordion-item-icon-right-1" aria-expanded="false"></a><br><div class="collapse" style="margin-left: -705%;" id="accordion-item-icon-right-1" data-parent="#accordionRightIcon" style=""><div class="card-body"> <div class=""><div class=""><div class="card-title">EWAY BILL PART A</div><div class="row form-p"><div class="col-md-4 form-group mb-2"><label for="firstName2">E-waybill number</label><p >' + item.e_way_bill_no + '</p> </div> <div class="col-md-4 form-group mb-2"><label for="firstName2">E-waybill date</label><p>' + item.e_waybill_date + '</p> </div><div class="col-md-4 form-group mb-2"><label for="firstName2">Invoice number</label><p>' + item.invoice_no + '</p></div><div class="col-md-4 form-group mb-2"><label for="firstName2">Invoice date</label> <p>' + item.invoice_date + '</p></div> <div class="col-md-4 form-group mb-2"><label for="firstName2">Valid from</label><p>' + item.valid_from + '</p></div><div class="col-md-4 form-group mb-2"><label for="firstName2">Valid until</label><p>' + item.valid_until + '</p></div><div class="col-md-4 form-group mb-2"><label for="firstName2">GSTIN of supplier/URP</label><p>' + item.gst_supplier + '</p></div> <div class="col-md-4 form-group mb-2"><label for="firstName2">Place of dispatch</label><p>' + item.place_of_dispatch + '</p></div><div class="col-md-4 form-group mb-2"><label for="firstName2">GSTIN of recipient</label><p>' + item.gst_recipient + '</p></div><div class="col-md-4 form-group mb-2"><label for="firstName2">Place of delivery</label><p>' + item.place_of_delivery + '</p></div><div class="col-md-4 form-group mb-2"> <label for="firstName2">TDN document number</label> <p>' + item.tdn_doc_no + '</p></div><div class="col-md-4 form-group mb-2"><label for="firstName2">Document date</label> <p>' + item.document_date + '</p></div><div class="col-md-4 form-group mb-3"> <label for="firstName2">Value of goods</label><p>' + item.value_of_goods + '</p> </div><div class="col-md-4 form-group mb-2"><label for="firstName2">HSN code</label> <p>' + item.hsn_code + '</p> </div><div class="col-md-4 form-group mb-2"><label for="firstName2">Reason for transportation</label><p>' + item.reason_for_trans + '</p></div></div><hr style="margin: 0px 10px 20px"><div class="card-title">EWAY BILL PART B</div><div class="row form-p"><div class="col-md-4 form-group mb-2"><label for="firstName2">Vehicle number</label><p><b>' + item.veh_number + '</b></p></div><div class="col-md-4 form-group mb-2"><label for="firstName2">Mode</label><p>' + item.mode + '</p></div> <div class="col-md-4 form-group mb-2"><label for="firstName2">From</label> <p><b>' + item.valid_from + '</b></p></div><div class="col-md-4 form-group mb-2"><label for="firstName2">Date&time</label> <p>' + item.valid_until + '</p></div></div></div></div></div></div></td></tr>';



                        });
                        $('#tab1 tbody').html(tr);
                        $('#tab1').show();
                        if (data.eway_data != '') {
                            $('#msg').append('<div class="row"><div class="col-md-3 mt-10"></div><div class="col-md-6 mt-10"><span class="btn btn-success" style="margin-top: 20px;width: 100%;" >E-way Bill Generated</span></div><div class="col-md-3 mt-10"></div></div>');


                            // document.getElementById('msg').value = "E-way Bill Generated";

                            // $('#msg').append('<div class="col-md-3 mt-10"></div><div class="col-md-6 mt-10"><span class="btn btn-success" style="margin-top: 20px;width: 100%;">E-way Bill Generated</span></div><div class="col-md-3 mt-10"></div>');

                        } else if (data.eway_data == '') {

                            $('#msg').append('<div class="row"><div class="col-md-3 mt-10"></div><div class="col-md-6 mt-10"><span class="btn btn-success" style="margin-top: 20px;width: 100%;" >E-way Bill Not Generated</span></div><div class="col-md-3 mt-10"></div></div>');
                            // document.getElementById('demo').value = ">E-way Bill Not Generated";
                            // $('#demo').append('<div class="col-md-3 mt-10"></div><div class="col-md-6 mt-10"><span class="btn btn-success" style="margin-top: 20px;width: 100%;">E-way Bill Not Generated</span></div><div class="col-md-3 mt-10"></div>');

                            // $('#msg').append("E-way Bill Not Generated");
                        }



                    }
                }
            }
        });
    })
    //         $('input[type="checkbox"]').on('change', function(){


    //              document.getElementById("book_sts").value="0";


    //     // this.value ^= 1;
    // });



    function yesnoCheck() {
        if (document.getElementById('yesCheck').checked) {

            document.getElementById('ifYes').style.visibility = 'visible';
            document.getElementById('ifNo').style.visibility = 'hidden';
        } else if (document.getElementById('noCheck').checked) {
            // alert("hello");
            document.getElementById('ifNo').style.visibility = 'visible';
            document.getElementById('ifYes').style.visibility = 'hidden';


        }

    }

    function empty1() {

        var add = document.getElementById('yesCheck').value;
        if (add == 1) {
            document.getElementById('book_now').value = '';
        } else {
            document.getElementById('vehicle').value = '';
        }
    }

    function empty2() {
        var add1 = document.getElementById('noCheck').value;
        if (add1 == 2) {
            document.getElementById('book_now').value = '';
        } else {
            document.getElementById('vehicle').value = '';
        }
    }
</script>

</html>
