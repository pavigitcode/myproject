@extends('menu/header')
@extends('menu/menu')
<script src="{{ asset('public/asset/js/sweetalert.js')}}"></script>

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
    font-size: 13px;
    color: #000;
    font-weight: 700;
    text-transform: uppercase;
  }

  table tr {
    border: 1px solid #ccc;
     /* !important */
  }

  span.change-co {
    font-size: 25px !important;
    font-weight: 800 !important;
  }

  .ul-widget4__img img {
    width: 46px;
  }

  .ul-widget-s5__content:last-child {
    display: flex;
    justify-content: space-between;
    width: 100%;
    align-items: center;
  }

  .revenue h3 {
    font-size: 16px;
    font-weight: 600;
  }

  .ul-widget-s5__progress {
    flex: 1;
    padding-right: 3rem;
    padding-left: 3rem;
  }

  .ul-widget-s5__item.mb-3 {
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
</style>


<div class="main-content-wrap d-flex flex-column">
  <!-- ============ Body content start ============= -->
  <div class="main-content">
    <div class="row">
      <div class="col-lg-5 col-xl-5">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-7">
                <h5>Vehicle Details - This month count</h5>
              </div>
              <div class="col-md-5 mb-2">
                <input type="month" class="form-control datepicker" value="2022-11">
              </div>

            </div>


            <div class="ul-widget__body">
              <div class="ul-widget1">
                <div class="ul-widget4__item ul-widget4__users">
                  <div class="ul-widget4__img"><img id="userDropdown" src="../asset/images/car.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                  <div class="ul-widget2__info ul-widget4__users-info"><a class="ul-widget2__title" href="#">Checked</a>
                    <span class="ul-widget2__username" href="#"><span class="ul-widget4__number t-font-boldest text-primary change-co">500</span></span>
                  </div>
                  <button data-toggle="modal" href="#myModal" class="btn btn-primary btn-icon m-1" type="button"><span class="ul-btn__icon"><i class="i-File-Clipboard-File--Text"></i></span><span class="ul-btn__text">View More</span></button>
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
                                <td>TN33 AC 3377</td>
                                <td>18-11-2022 & 12:00 AM</td>
                                <td>SRS Transport Chennai</td>
                                <td>Selvanayagam</td>
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
                                </tr>
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
                  <div class="ul-widget4__img"><img id="userDropdown" src="../asset/images/car-insurance.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                  <div class="ul-widget2__info ul-widget4__users-info"><a class="ul-widget2__title" href="#">Passed</a>
                    <span class="ul-widget2__username" href="#"><span class="ul-widget4__number t-font-boldest text-success change-co">200</span></span>
                  </div>
                  <button class="btn btn-primary btn-icon m-1" type="button"><span class="ul-btn__icon"><i class="i-File-Clipboard-File--Text"></i></span><span class="ul-btn__text">View More</span></button>
                </div>
                <div class="ul-widget4__item ul-widget4__users">
                  <div class="ul-widget4__img"><img id="userDropdown" src="../asset/images/searching.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                  <div class="ul-widget2__info ul-widget4__users-info"><a class="ul-widget2__title" href="#">Offence</a>
                    <span class="ul-widget2__username" href="#"><span class="ul-widget4__number t-font-boldest text-danger change-co">300</span></span>
                  </div>
                  <button class="btn btn-primary btn-icon m-1" type="button"><span class="ul-btn__icon"><i class="i-File-Clipboard-File--Text"></i></span><span class="ul-btn__text">View More</span></button>
                </div>


              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-7 col-md-7">
        <div class="card mb-2">
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <h5>Vehicle Details - This month Chart</h5>
              </div>
              <div class="col-md-4 mb-2">
                <input type="month" class="form-control datepicker" value="<?php echo date('Y-m'); ?>">
              </div>

            </div>
            <div class="separator-breadcrumb border-top"></div>

            <div id="stackedAreaChart"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="mt-3 mb-4 col-lg-7 col-xl-7">
        <div class="card text-center border-primary">
          <!-- -->
          <div class="card-header text-left bg-primary text-white">
            <div>Revenue Details in Count Wise</div>
          </div>
          <div class="card-body">
            <!-- -->
            <!-- -->
            <div class="ul-widget5">
              <div class="ul-widget-s5__item mb-3">
                <div class="ul-widget-s5__content">
                  <div class="ul-widget-s5__section">
                    <div class="reve-img"><img id="userDropdown" src="../asset/images/location.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>

                    <a class="ul-widget4__title" href="#">Chennai</a>

                  </div>
                </div>
                <div class="ul-widget-s5__content">
                  <div class="ul-widget-s5__progress">
                    <div class="ul-widget-s5__stats" style="display: unset;">
                      <div class="row revenue">
                        <div class="col-md-4 cc1">
                          <h3 class="text-primary">Checked</h3>
                          <p class="text-primary">400</p>
                        </div>
                        <div class="col-md-4 cc2">
                          <h3 class="text-success">Passed</h3>
                          <p class="text-success">200</p>
                        </div>
                        <div class="col-md-4 cc3">
                          <h3 class="text-danger">Offence</h3>
                          <p class="text-danger">200</p>
                        </div>
                      </div>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" style="width: 25%;">25</div>
                    </div>
                  </div>
                  <button class="btn btn-outline-primary" type="button">View More</button>
                </div>
              </div>

              <div class="ul-widget-s5__item mb-3">
                <div class="ul-widget-s5__content">
                  <div class="ul-widget-s5__section">
                    <div class="reve-img"><img id="userDropdown" src="../asset/images/location.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>

                    <a class="ul-widget4__title" href="#">Vellore</a>

                  </div>
                </div>
                <div class="ul-widget-s5__content">
                  <div class="ul-widget-s5__progress">
                    <div class="ul-widget-s5__stats" style="display: unset;">
                      <div class="row revenue">
                        <div class="col-md-4 cc1">
                          <h3 class="text-primary">Checked</h3>
                          <p class="text-primary">400</p>
                        </div>
                        <div class="col-md-4 cc2">
                          <h3 class="text-success">Passed</h3>
                          <p class="text-success">200</p>
                        </div>
                        <div class="col-md-4 cc3">
                          <h3 class="text-danger">Offence</h3>
                          <p class="text-danger">200</p>
                        </div>
                      </div>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" style="width: 25%;">25</div>
                    </div>
                  </div>
                  <button class="btn btn-outline-primary" type="button">View More</button>
                </div>
              </div>

              <div class="ul-widget-s5__item mb-3">
                <div class="ul-widget-s5__content">
                  <div class="ul-widget-s5__section">
                    <div class="reve-img"><img id="userDropdown" src="../asset/images/location.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>

                    <a class="ul-widget4__title" href="#">Vellore</a>

                  </div>
                </div>
                <div class="ul-widget-s5__content">
                  <div class="ul-widget-s5__progress">
                    <div class="ul-widget-s5__stats" style="display: unset;">
                      <div class="row revenue">
                        <div class="col-md-4 cc1">
                          <h3 class="text-primary">Checked</h3>
                          <p class="text-primary">400</p>
                        </div>
                        <div class="col-md-4 cc2">
                          <h3 class="text-success">Passed</h3>
                          <p class="text-success">200</p>
                        </div>
                        <div class="col-md-4 cc3">
                          <h3 class="text-danger">Offence</h3>
                          <p class="text-danger">200</p>
                        </div>
                      </div>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" style="width: 25%;">25</div>
                    </div>
                  </div>
                  <button class="btn btn-outline-primary" type="button">View More</button>
                </div>
              </div>


            </div>
          </div>
          <!-- -->
          <!-- -->
        </div>
      </div>
      <div class="col-md-5 mt-3">

        <div class="card mb-4">
          <div class="card-header bg-primary text-white">
            <div>Offence Count</div>
          </div>
          <div class="card-body">
            <script src="https://www.amcharts.com/lib/4/core.js"></script>
            <script src="https://www.amcharts.com/lib/4/charts.js"></script>
            <div id="chartdiv2"></div>
          </div>
        </div>

      </div>
    </div>





    <div class="row">
      <div class="mt-3 mb-4 col-lg-7 col-xl-7">
        <div class="card text-center border-primary">
          <!-- -->
          <div class="card-header text-left bg-primary text-white">
            <div>Revenue Details in Amount Wise</div>
          </div>
          <div class="card-body">
            <!-- -->
            <!-- -->
            <div class="ul-widget5">
              <div class="ul-widget-s5__item mb-3">
                <div class="ul-widget-s5__content">
                  <div class="ul-widget-s5__section">
                    <div class="reve-img"><img id="userDropdown" src="../asset/images/location.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>

                    <a class="ul-widget4__title" href="#">Chennai</a>

                  </div>
                </div>
                <div class="ul-widget-s5__content">
                  <div class="ul-widget-s5__progress">
                    <div class="ul-widget-s5__stats" style="display: unset;">
                      <div class="row revenue">
                        <div class="col-md-4 cc1">
                          <h3 class="text-primary">Offence Count</h3>
                          <p class="text-primary">400</p>
                        </div>
                        <div class="col-md-4 cc2">
                          <h3 class="text-success">Offence value</h3>
                          <p class="text-success">10000</p>
                        </div>
                        <!--  <div class="col-md-4 cc3">
                                                                    <h3 class="text-danger">Offence</h3>
                                                                   <p class="text-danger">200</p>
                                                                </div>-->
                      </div>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="50" style="width: 50%;">50</div>
                    </div>
                  </div>
                  <button class="btn btn-outline-primary" type="button">View More</button>
                </div>
              </div>

              <div class="ul-widget-s5__item mb-3">
                <div class="ul-widget-s5__content">
                  <div class="ul-widget-s5__section">
                    <div class="reve-img"><img id="userDropdown" src="../asset/images/location.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>

                    <a class="ul-widget4__title" href="#">Vellore</a>

                  </div>
                </div>
                <div class="ul-widget-s5__content">
                  <div class="ul-widget-s5__progress">
                    <div class="ul-widget-s5__stats" style="display: unset;">
                      <div class="row revenue">
                        <div class="col-md-4 cc1">
                          <h3 class="text-primary">Offence Count</h3>
                          <p class="text-primary">400</p>
                        </div>
                        <div class="col-md-4 cc2">
                          <h3 class="text-success">Offence value</h3>
                          <p class="text-success">10000</p>
                        </div>
                        <!--<div class="col-md-4 cc3">
                                                                    <h3 class="text-danger">Offence</h3>
                                                                   <p class="text-danger">200</p>
                                                                </div>-->
                      </div>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="25" style="width: 25%;">25</div>
                    </div>
                  </div>
                  <button class="btn btn-outline-primary" type="button">View More</button>
                </div>
              </div>

              <div class="ul-widget-s5__item mb-3">
                <div class="ul-widget-s5__content">
                  <div class="ul-widget-s5__section">
                    <div class="reve-img"><img id="userDropdown" src="../asset/images/location.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>

                    <a class="ul-widget4__title" href="#">Vellore</a>

                  </div>
                </div>
                <div class="ul-widget-s5__content">
                  <div class="ul-widget-s5__progress">
                    <div class="ul-widget-s5__stats" style="display: unset;">
                      <div class="row revenue">
                        <div class="col-md-4 cc1">
                          <h3 class="text-primary">Offence Count</h3>
                          <p class="text-primary">400</p>
                        </div>
                        <div class="col-md-4 cc2">
                          <h3 class="text-success">Offence value</h3>
                          <p class="text-success">10000</p>
                        </div>
                        <!--<div class="col-md-4 cc3">
                                                                    <h3 class="text-danger">Offence</h3>
                                                                   <p class="text-danger">200</p>
                                                                </div>-->
                      </div>
                    </div>
                    <div class="progress">
                      <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="40" style="width: 40%;">40</div>
                    </div>
                  </div>
                  <button class="btn btn-outline-primary" type="button">View More</button>
                </div>
              </div>


            </div>
          </div>
          <!-- -->
          <!-- -->
        </div>
      </div>

      <div class="col-md-5 mt-3">

        <div class="card mb-4">
          <div class="card-header bg-primary text-white">
            <div>Offence Value</div>
          </div>
          <div class="card-body">
            <script src="https://www.amcharts.com/lib/4/core.js"></script>
            <script src="https://www.amcharts.com/lib/4/charts.js"></script>
            <div id="chartdiv"></div>
          </div>
        </div>

      </div>
    </div>








  </div>
</div>





























<script>
  // Create chart instance
  var chart = am4core.create("chartdiv2", am4charts.PieChart);

  // Add data
  chart.data = [{
    "country": "Chennai",
    "litres": 20,
    "color": "red"
  }, {
    "country": "Vellore",
    "litres": 40,
    "color": am4core.color("#F1D302")
  }, {
    "country": "Madurai",
    "litres": 30,
    "color": "#f44336"
  }];


  // Add and configure Series
  var pieSeries = chart.series.push(new am4charts.PieSeries());
  pieSeries.dataFields.value = "litres";
  pieSeries.dataFields.category = "country";

  // Add legend
  chart.legend = new am4charts.Legend();
  pieSeries.colors.list = [
    am4core.color("#0075cf"),
    am4core.color("#00e396"),
    am4core.color("#feb019"),
    am4core.color("#FF9671"),
    am4core.color("#FFC75F"),
    am4core.color("#F9F871"),
  ];
</script>

<script>
  // Create chart instance
  var chart = am4core.create("chartdiv", am4charts.PieChart);

  // Add data
  chart.data = [{
    "country": "Salem",
    "litres": 60
  }, {
    "country": "Erode",
    "litres": 30
  }, {
    "country": "Trichy",
    "litres": 10
  }];


  // Add and configure Series
  var pieSeries = chart.series.push(new am4charts.PieSeries());
  pieSeries.dataFields.value = "litres";
  pieSeries.dataFields.category = "country";
  // Add legend
  chart.legend = new am4charts.Legend();
  pieSeries.colors.list = [
    am4core.color("#003473"),
    am4core.color("#4caf50"),
    am4core.color("#f44336"),
    am4core.color("#FF9671"),
    am4core.color("#FFC75F"),
    am4core.color("#F9F871"),
  ];
</script>



@extends('menu/footer')
<!-- asset('public/asset/js/plugins/jquery-3.3.1.min.js') -->
<script src="{{ asset('public/asset/js/plugins/bootstrap.bundle.min.js') }}"></script>
<!-- 
<script src="{{ asset('public/asset/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ asset('public/asset/js/plugins/apexcharts.dataseries.js') }}"></script>
<script src="{{ asset('public/asset/js/scripts/apexAreaChart.script.min.js') }}"></script>
<script src="{{ asset('public/asset/js/scripts/apexPieDonutChart.script.min.js') }} "></script>
<script src="{{ asset('public/asset/js/plugins/echarts.min.js') }} "></script>
<script src="{{ asset('public/asset/js/scripts/echarts.script.min.js') }} "></script> -->
