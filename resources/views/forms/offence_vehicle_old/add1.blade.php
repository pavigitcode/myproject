<html>

<style>
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
</style>


@extends('menu/header')
@extends('menu/menu')

<link href="../../asset/dist-assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
<link rel="stylesheet" href="../../asset/dist-assets/css/plugins/smart.wizard/smart_wizard.min.css" />
<link rel="stylesheet" href="../../asset/dist-assets/css/plugins/smart.wizard/smart_wizard_theme_arrows.min.css" />
<link rel="stylesheet" href="../../asset/dist-assets/css/plugins/smart.wizard/smart_wizard_theme_circles.min.css" />
<link rel="stylesheet" href="../../asset/dist-assets/css/plugins/smart.wizard/smart_wizard_theme_dots.min.css" />




<div class="">


    <div class="main-content-wrap d-flex flex-column">
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
                    <div id="smartwizard" class="sw-main sw-theme-default">
                        <ul class="nav nav-tabs step-anchor">
                            <li class="nav-item done active"><a href="#step-1" class="nav-link">Step 1<br><small>Officer Details</small></a></li>
                            <li class="nav-item "><a href="#step-2" class="nav-link">Step 2<br><small>Offence Booking Details</small></a></li>
                            <li class="nav-item"><a href="#step-3" class="nav-link">Step 3<br><small>Penality Details</small></a></li>
                            <li class="nav-item"><a href="#step-4" class="nav-link">Step 4<br><small>Order Processing</small></a></li>
                        </ul>
                        <div class="btn-toolbar sw-toolbar sw-toolbar-top justify-content-end">
                            <div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div>
                            <div class="btn-group mr-2 sw-btn-group-extra" role="group"><button class="btn btn-info">Finish</button><button class="btn btn-danger">Cancel</button></div>
                        </div>
                        <div class="sw-container tab-content" style="min-height: 184.566px;">
                            <div id="step-1" class="tab-pane step-content">
                                <h3 class="border-bottom border-gray pb-2">
                                    <form>
                                        <div class="row form-p">
                                            <div class="col-md-4 form-group mb-3"></div>
                                            <div class="col-md-4 form-group mb-3"></div>
                                            <div class="col-md-4 form-group mb-3">
                                                <h3 class="offence-no">OFFENCE NO :<span>CHN1112200001</span></h3>
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label for="picker1">Intelligence Division</label>
                                                <select class="form-control">
                                                    <option value="volvo">Choose</option>
                                                    <option value="saab">Chennai Intelligence - I</option>
                                                    <option value="mercedes">Chennai Intelligence - II</option>
                                                    <option value="mercedes">Vellore Intelligence </option>
                                                    <option value="mercedes">Madurai</option>
                                                    <option value="mercedes">Salem</option>
                                                    <option value="mercedes">Erode</option>
                                                    <option value="mercedes">Coimbatore</option>
                                                    <option value="mercedes">Trichy</option>
                                                    <option value="mercedes">Tirunelveli</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label for="picker1">Roving Squad Number</label>
                                                <select class="form-control">
                                                    <option value="volvo">Choose</option>
                                                    <option value="volvo">CHN1RS1</option>
                                                    <option value="volvo">CHN2RS2</option>
                                                    <option value="volvo">CHN3RS3</option>
                                                    <option value="volvo">CHN4RS4</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label for="birthday">Duty Date</label>
                                                <input type="date" id="birthday" name="" class="form-control">
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label for="firstName1">Name of the officer - Mobile No</label>
                                                <!-- <input class="form-control" id="firstName1" type="searh" >-->
                                                <select class="form-control">
                                                    <option value="volvo">Karthika.G-9856958962</option>
                                                    <option value="volvo">Priya.R-9585423564</option>
                                                    <option value="volvo">Kannan.K-9632545896</option>
                                                    <option value="volvo">Kalai.P-2593258589</option>

                                                </select>
                                            </div>
                                            <div class="col-md-3 form-group mb-3">
                                                <label for="phone">Designation</label><br>
                                                <p>STO</p>
                                            </div>
                                            <div class="col-md-3 form-group mb-3">
                                                <label for="phone">GPF/CPS Number</label><br>
                                                <p>2546</p>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="accordion" id="accordionExample">
                                                    <div class="card ul-card__border-radius">
                                                        <div class="card-header acc-bg">
                                                            <h6 class="card-title mb-0">
                                                                <a class="text-default collapsed btn-acc" data-toggle="collapse" href="#accordion-item-group1" aria-expanded="false">
                                                                    <i class="i-Add"></i> Add New</a>
                                                            </h6>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="collapse" id="accordion-item-group1" data-parent="#accordionExample" style="">
                                                    <div class="">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-font-s">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Officer Name</th>
                                                                        <th scope="col">Designation</th>
                                                                        <th scope="col">GPF/CPS Number</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">1</th>
                                                                        <td>Smith Doe</td>
                                                                        <td>STO</td>
                                                                        <td>255986</td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">

                                            </div>



                                            <!-- <div class="col-md-3">
                                      <div class="add_btn text-right">
                                          <a href=""> <button class="btn btn-info m-1" type="button"> <i class="i-Add"></i> Add New</button></a>
                                      </div>
            
                                  </div>-->
                                            <div class="col-md-4 form-group mb-3">
                                                <label for="phone">Shift</label><br>
                                                <select class="form-control">
                                                    <option value="volvo">Day Shift</option>
                                                    <option value="volvo">Night Shift</option>

                                                </select>
                                            </div>
                                        </div>
                                    </form>

                                </h3>
                            </div>
                            <div id="step-2" class="tab-pane step-content" style="display: block;">

                                <form>
                                    <div class="row form-p">

                                        <div class="col-md-4 form-group mb-3">
                                            <label for="firstName1">Offense booked Vehicle Number</label>
                                            <p>TN09BE8123</p>
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="firstName1"> Place of Interception</label>
                                            <p>Chennai</p>
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="firstName1">Offense Booking Time</label>
                                            <input class="form-control" id="firstName1" type="time">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="firstName1">Nature of the offense</label>
                                            <select class="form-control">
                                                <option value="volvo">Goods moved/uploaded at unregistered place of business</option>
                                                <option value="volvo">Prima facie documents found to be defective</option>
                                                <option value="volvo">E-waybill not generated at the time interception</option>
                                                <option>If others</option>
                                            </select>
                                        </div>

                                        <!-- <div class="col-md-4 form-group mb-3">
                                        <label for="firstName1"> Offense Register Number</label>
                                        <input class="form-control" id="firstName1" type="text" >
                                    </div>-->
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="picker1">Offense Section</label>
                                            <p>Act-129</p>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div id="step-3" class="tab-pane step-content">
                                <form>
                                    <div class="row form-p">
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="picker1">Count of Commodity Involved</label>
                                            <select class="form-control">
                                                <option value="volvo">Choose</option>
                                                <option value="volvo">1</option>
                                                <option value="volvo">2</option>
                                                <option value="volvo">3</option>
                                                <option value="volvo">Others</option>

                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="picker1">Tax Type</label>
                                            <select class="form-control">
                                                <option value="volvo">Intra State</option>
                                                <option value="volvo">Inter State</option>


                                            </select>
                                        </div>

                                        <div class="col-md-4 form-group mb-3">
                                            <label for="firstName1">CGST-PENALTY</label>
                                            <input class="form-control" id="firstName1" type="text">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="firstName1">SGST-PENALTY</label>
                                            <input class="form-control" id="firstName1" type="text">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="firstName1">IGST-PENALTY</label>
                                            <input class="form-control" id="firstName1" type="text">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="firstName1">CESS-PENALTY</label>
                                            <input class="form-control" id="firstName1" type="text">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="firstName1">Total Penalty Levied and collected</label>
                                            <input class="form-control" id="firstName1" type="text">
                                        </div>
                                        <!-- <div class="col-md-4 form-group mb-3">
                                        <label for="picker1">Is the Consignor Registered</label>
                                        <select class="form-control">
                                                <option value="volvo">Choose</option>
                                                <option value="volvo">Yes</option>
                                                <option value="volvo">No</option>
                                        </select>
                                    </div>-->
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="firstName1">GSTIN /Temporary ID of Consignor</label>
                                            <input class="form-control" id="firstName1" type="text">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="firstName1">Name of the Consignor</label>
                                            <input class="form-control" id="firstName1" type="text">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="picker1">Consignor division</label>
                                            <select class="form-control">
                                                <option value="volvo">Choose</option>
                                                <option value="volvo">Chennai North</option>
                                                <option value="volvo">Chennai South</option>
                                                <option value="volvo">Chennai East</option>
                                                <option value="volvo">Chennai Central</option>
                                                <option value="volvo">Vellore</option>
                                                <option value="volvo">Madurai</option>
                                                <option value="volvo">If others</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 form-group mb-3">
                                            <label for="picker1">Consignor Circle details</label>
                                            <select class="form-control">
                                                <option value="volvo">Choose</option>
                                                <option value="volvo">BROADWAY - TN031</option>
                                                <option value="volvo">HARBOUR - TN076</option>
                                                <option value="volvo">LOANSQUARE - TN114</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="picker1">Is the Consignee Registered</label>
                                            <select class="form-control">
                                                <option value="volvo">Yes</option>
                                                <option value="volvo">No</option>

                                            </select>
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="picker1">GSTIN/Temporary ID of Consignee</label>
                                            <input class="form-control" id="firstName1" type="text">
                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="firstName1">Brief Description of offense (Max 100 words)
                                            </label>
                                            <input class="form-control" id="firstName1" type="text">
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div id="step-4" class="tab-pane step-content">
                                <form>
                                    <div class="row form-p">
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="phone">Orders passed </label><br>
                                            <select class="form-control">
                                                <option value="volvo">RS officer</option>
                                                <option value="volvo">Adjudication officer</option>

                                            </select>

                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="phone">Penality Details </label><br>
                                            <select class="form-control">
                                                <option value="volvo">Penalty Collected</option>
                                                <option value="volvo">Released without Penalty</option>

                                            </select>

                                        </div>
                                        <div class="col-md-4 form-group mb-3">
                                            <label for="firstName1">Reson
                                            </label>
                                            <input class="form-control" id="firstName1" type="text">
                                        </div>





                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="btn-toolbar sw-toolbar sw-toolbar-bottom justify-content-end">
                            <div class="btn-group mr-2 sw-btn-group" role="group"><button class="btn btn-secondary sw-btn-prev" type="button">Previous</button><button class="btn btn-secondary sw-btn-next" type="button">Next</button></div>
                            <div class="btn-group mr-2 sw-btn-group-extra" role="group"><button class="btn btn-info">Finish</button><button class="btn btn-danger">Cancel</button></div>
                        </div>
                    </div>
                </div>
            </div><!-- end of main-content -->

             <div class="row">
                    <div class="col-md-12">
                        <!--  SmartWizard html -->
                        <div id="smartwizard">
                            <ul>
                                <li><a href="#step-1">Step 1<br /><small>This is step description</small></a></li>
                                <li><a href="#step-2">Step 2<br /><small>This is step description</small></a></li>
                                <li><a href="#step-3">Step 3<br /><small>This is step description</small></a></li>
                                <li><a href="#step-4">Step 4<br /><small>This is step description</small></a></li>
                            </ul>
                            <div>
                                <div id="step-1">
                                    <h3 class="border-bottom border-gray pb-2">Step 1 Content</h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                </div>
                                <div id="step-2">
                                    <h3 class="border-bottom border-gray pb-2">Step 2 Content</h3>
                                    <div>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                                </div>
                                <div id="step-3">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

                                </div>
                                <div id="step-4">
                                    <h3 class="border-bottom border-gray pb-2">Step 4 Content</h3>
                                    <div class="card o-hidden">
                                        <div class="card-header">My Details</div>
                                        <div class="card-block p-0">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>Name:</th>
                                                        <td>Tim Smith</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email:</th>
                                                        <td>example@example.com</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end of main-content -->
        </div>

    </div>
</div>


<!-- ============ Search UI Start ============= -->


<script src="../../asset/dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
<!-- <script src="https://ascentrecyclers.in/chennai_admin/assets/js/plugins/jquery-3.3.1.min.js"></script> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
<script src="https://unpkg.com/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script> -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script> -->

<!-- <script src="https://ascentrecyclers.in/chennai_admin/assets/dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
<script src="https://ascentrecyclers.in/chennai_admin/assets/dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
<script src="https://ascentrecyclers.in/chennai_admin/assets/dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="https://ascentrecyclers.in/chennai_admin/assets/dist-assets/js/scripts/script.min.js"></script>
<script src="https://ascentrecyclers.in/chennai_admin/assets/dist-assets/js/scripts/sidebar-horizontal.script.js"></script>
<script src="https://ascentrecyclers.in/chennai_admin/assets/dist-assets/js/plugins/jquery.smartWizard.min.js"></script>
<script src="https://ascentrecyclers.in/chennai_admin/assets/dist-assets/js/scripts/smart.wizard.script.min.js"></script> -->

<script src="../../asset/dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
<script src="../../asset/dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../../asset/dist-assets/js/scripts/script.min.js"></script>
<script src="../../asset/dist-assets/js/scripts/sidebar-horizontal.script.js"></script>
<script src="../../asset/dist-assets/js/plugins/jquery.smartWizard.min.js"></script>
<script src="../../asset/dist-assets/js/scripts/smart.wizard.script.min.js"></script>


@extends('menu/footer')


</html>