@section('content')

<div class="row">
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
                            </div>
                            <!-- begin::widget-stats-1-->
                            <div class="ul-widget1 vehcil-deta">
                                <div class="ul-widget__item">
                                    <div class="ul-widget__info">
                                        <h3 class="ul-widget1__title ceh-h1" >Vehicle No</h3>
                                    </div>
                                    <span class="ul-widget__number text-primary no-h3" id="vehicle_no"><b style="font-size: 21px;"></b></span>
                                   
                                </div>
                                <div class="ul-widget__item">
                                    <div class="ul-widget__info">
                                        <h3 class="ul-widget1__title ceh-h1">Place</h3>
                                    </div><span class="ul-widget__number text-danger no-h3" id="veh_place"></span>
                                </div>

                                <div class="ul-widget__item">
                                    <div class="ul-widget__info">
                                        <h3 class="ul-widget1__title ceh-h1">Owner Name</h3>
                                    </div><span class="ul-widget__number text-success no-h3" id="veh_owner"></span>
                                </div>
                                <div class="ul-widget__item">
                                    <div class="ul-widget__info">
                                        <h3 class="ul-widget1__title ceh-h1">POI Number</h3>
                                    </div><span class="ul-widget__number text-warning   no-h3"><b style="font-size: 21px;color: #000;" id="poi_number"></b></span>
                                    <!-- POICHN1221200001 -->
                                </div>

                            </div>
                            <!-- end::widget-stats-1-->
                        </div>
                    </div>


                </div>
            </div>

        </div>


        <div class="card mt-4" >
        <table  class="table check-vechicle vehilce-bg"  >
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
                            </table>
            <div class="card-body" id="eway_data_list" >
                
                <h3 class="card-title">

                </h3>
                
                    
                
                <!-- right control icon-->
                <div class="accordion chck-brd" id="accordionRightIcon" style="display:none;" >
                
                    <div class="card no-brd-rad">
                        <div class="card-header header-elements-inline chek-no-pad">
                            
                            <h6 class="card-title ul-collapse__icon--size ul-collapse__right-icon mb-0">
                                <a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-icon-right-1" aria-expanded="false">
                                    <table class="table check-vechicle" >
                                        <tr>
                                            <th width="5%">1</th>
                                            <td width="15%">00</td>
                                            <td width="25%">2022/INV/017 & 09-10-2022</td>
                                            <td width="20%">Bengaluru </td>
                                            <td width="15%">12-10-2022 13.30</td>
                                            <td width="20%">14-10-2022 13.30</td>
                                        </tr>
                                    </table>
                                </a>
                            </h6>
                        </div>
                        <div class="collapse" id="accordion-item-icon-right-1" data-parent="#accordionRightIcon" style="">
                            <div class="card-body">

                                <div class="">
                                    <div class="">
                                        <div class="card-title">EWAY BILL PART A</div>

                                        <div class="row form-p">
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">E-waybill number</label>
                                                <p>TN01 BR 2352</p>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">E-waybill date</label>
                                                <p>30-09-2022</p>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">Invoice number</label>
                                                <p>2022/INV/017</p>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">Invoice date</label>
                                                <p>09-10-2022</p>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">Valid from</label>
                                                <p>12-10-2022 13.30</p>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">Valid until</label>
                                                <p>13-10-2022 10.30</p>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">GSTIN of supplier/URP</label>
                                                <p>33aabcu9603r1zm</p>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">Place of dispatch</label>
                                                <p>Chennai</p>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">GSTIN of recipient</label>
                                                <p>29abacu9703r3zm</p>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">Place of delivery</label>
                                                <p>Bengaluru 560063</p>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">TDN document number</label>
                                                <p>tx8233234548</p>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">Document date</label>
                                                <p>10-10-2022 13.30</p>
                                            </div>
                                            <div class="col-md-4 form-group mb-3">
                                                <label for="firstName2">Value of goods</label>
                                                <p>178000</p>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">HSN code</label>
                                                <p>63041930</p>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">Reason for transportation</label>
                                                <p>Outward supply</p>
                                            </div>
                                        </div>
                                        <hr style="margin: 0px 10px 20px">
                                        <div class="card-title">EWAY BILL PART B</div>
                                        <div class="row form-p">
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">Vehicle number</label>
                                                <p><b>TN09BE8123</b></p>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">Mode</label>
                                                <p>Road</p>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">From</label>
                                                <p><b>Chennai</b></p>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                                <label for="firstName2">Date&time</label>
                                                <p>05-11-2022, 13.20:00</p>
                                            </div>
                                            <!--   <div class="col-md-8  mt-2">
                                         <button class="btn btn btn-success">No E-way Bill</button>
                                          </div>
                                            <div class="col-sm-12">
                                            <div class="form-check  mb-2">
                                            <input class="form-check-input" id="gridCheck1" type="checkbox">
                                            <label class="form-check-label ml-3" for="gridCheck1">
                                            Empty Vehicle
                                            
                                            </label>
                                            </div>
                                            </div>
                                            <div class="col-md-4 form-group mb-2">
                                       <label for="firstName2">Officer Remarks:</label>
                                       <textarea class="form-control" aria-label="With textarea" spellcheck="false"></textarea>
                                        </div>
                                        <div class="col-md-8 mt-3">
                                         <button class="btn btn-primary">Offence Booking</button>
                                           </div>-->
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                <!-- /right control icon-->

                <div class="row">
                    <div class="col-md-3 mt-10"></div>
                    <div class="col-md-6 mt-10">
                        <button class="btn btn-success  " style="margin-top: 20px;width: 100%;"> E-way Bill Generated</button>
                    </div>
                    <div class="col-md-3 mt-10"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="checkbox checkbox-primary">
                            <input type="checkbox" checked="checked"><span>Need Offence Booking</span><span class="checkmark"></span>
                        </label>
                        <div class="col-md-6 mb-3">
                            <select class="form-control">
                                <option>Booking Now</option>
                                <option>Booking Later</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                        <label for="website">Officer Remarks</label>
                        <textarea class="form-control" id="website" placeholder="Enter Remarks"></textarea>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary float-left"> Save</button>

                    </div>
                </div>
                @stop