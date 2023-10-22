<style>
   h3.divi {
      font-size: 14px;
      margin-bottom: 0px;
      font-weight: 600;
      padding-right: 10px;
      color: #003473;
      line-height: 22px;
   }

   h3.divi p {
      margin-bottom: 0px;
      color: #555;
   }
</style>

<?php
session_start();

$user_unique_id = session('unique_id');
$staff_name = session('staff_name');
$user_name = session('user_name');
$user_type_name = session('user_type');

?>


<body class="text-left">
   <div class="app-admin-wrap layout-horizontal-bar">
      <div class="main-header">
         <a href="dashboard.php">
            <div class="logo"><img src="../../asset/images/t-logo1.png" alt="" /></div>
         </a>
         <div class="menu-toggle">
            <div></div>
            <div></div>
            <div></div>
         </div>
         <!--<div class="logo-name">
      <h5 class="text-info mt-2">Commercial Taxes Department</h5>
      <h6 class="text-muted">Goverment of Tamilnadu</h6>
   </div>-->
   <!-- Super Admin -->
   <?php if($user_type_name == '62c80e7c2536911885' || $user_type_name == '62c80e8cac02318910' || $user_type_name == '63b4fd095bf7675259'){
      
      ?>

         <div class="d-flex align-items-center">

            <!-- / Mega menu-->
            <div class="dropdown mega-menu d-none d-md-block">
               <a class="btn text-muted dropdown-toggle mr-2 ml-3" id="dropdownMegaMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="i-Add-User"></i> Admin</a>
               <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                  <div class="row m-0">
                     <div class="col-md-4 p-1">
                        <img src="../../asset/images/st2_bg.jpg" />

                     </div>
                     
                     <div class="col-md-8 p-4">
                        <p class="text-info text--cap border-bottom-info d-inline-block">Features</p>
                        <div class="menu-icon-grid w-auto p-0 text-center">

                           <a href="{{ url('/screensectionadd') }}"><i class="i-Window"></i> Screen Section</a>
                           <a href="{{ url('/userscreen') }}"><i class="i-Monitor-2"></i> User Screen</a>
                           <a href="{{ url('/usertype') }}"><i class="i-Find-User"></i> User Type</a>
                           <a href="{{ url('/usertypepermission') }}"><i class="i-Add-User"></i> User Type Permission</a>
                           <a href="{{ url('/usercreation') }} "><i class="i-Add-UserStar"></i> User Creation</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- / Mega menu-->
            <!-- Mega menu-->
            <div class="dropdown mega-menu d-none d-md-block">
               <a class="btn text-muted dropdown-toggle mr-2 ml-2" id="dropdownMegaMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="i-Gear"></i> Settings</a>
               <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                  <div class="row m-0">
                     <div class="col-md-4 p-1">
                        <img src="../../asset/images/st1_bg.jpg" />

                     </div>
                     <div class="col-md-8 p-4">
                        <p class="text-info text--cap border-bottom-info d-inline-block">Features</p>
                        <div class="menu-icon-grid w-auto p-0 text-center">
                           <a href="{{ url('/division_creation') }}"><i class="i-File-Network"></i> Intelligence Division</a>
                           <a href="{{ url('/designation_creation') }}"><i class="i-File-Pie"></i> Designation Creation</a>
                           <a href="{{ url('/rovingsquad_creation') }}"><i class="i-Find-User"></i> Roving Squad Number</a>
                           <a href="{{ url('/shift') }}"><i class="i-Add-UserStar"></i> Shift</a>
                           <a href="{{ url('/offence_section') }}"><i class="i-Add-User"></i> Nature of the Offence / Offense Section</a>
                           <a href="{{ url('/hsn') }}"><i class="i-Bar-Code"></i> HSN Commodity Name(s), Code</a>
                           <a href="{{ url('/consignorcreation') }}"><i class="i-Arrow-Circle"></i> Consignor circle details</a>
                           <a href="{{ url('/officeregistration') }}"><i class="i-File-Edit"></i> Officer Registration</a>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         
            <div class="dropdown mega-menu d-none d-md-block">
               <a class="btn text-muted dropdown-toggle mr-2 ml-2" id="dropdownMegaMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="i-Information"></i>Entry Forms</a>
               <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                  <div class="row m-0">
                     <div class="col-md-4 p-1">
                        <img src="../../asset/images/st3_bg.jpg" />

                     </div>
                     <div class="col-md-4 p-4">
                        <p class="text-info text--cap border-bottom-info d-inline-block">Features</p>
                        <div class="menu-icon-grid w-auto p-0 text-center">
                           <a href="{{ url('/checked_vehicle') }}"><i class="i-Car"></i> Intercepted Vehicle</a>
                           <a href="{{ url('/offence_vehicle') }}"><i class="i-Car-2"></i> Offence Vehicle</a>

                           <!-- <a href="checked-vehicle-list.php"><i class="i-Car"></i> Checked Vehicle</a>
                           <a href="offence_vehicle_list.php"><i class="i-Car-2"></i> Offence Vehicle</a> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dropdown mega-menu d-none d-md-block">
               <a class="btn text-muted dropdown-toggle mr-2 ml-2" id="dropdownMegaMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="i-Information"></i> Reports</a>
               <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                  <div class="row m-0">
                     <div class="col-md-4 p-1">
                        <img src="../../asset/images/st3_bg2.png" />

                     </div>
                     <div class="col-md-4 p-4">
                        <p class="text-info text--cap border-bottom-info d-inline-block">Features</p>
                        <div class="menu-icon-grid w-auto p-0 text-center">
                           <a href="{{ url('/offence_wise_report') }}"><i class="i-Add-User"></i> Nature Of Offence Wise Reports</a>
                           <a href="{{ url('/revenue_wise_report') }}"><i class="i-Money-2"></i> Revenue Wise Reports</a>
                           <a href="{{ url('/commodity_wise_report') }}"><i class="i-Bar-Code"></i> Commodity Wise Reports</a>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Joint Commissioner Admin -->
            <?php }else if($user_type_name == '62b55fe64789d40213'){?>
           

         <div class="d-flex align-items-center">

            <!-- / Mega menu-->
            <div class="dropdown mega-menu d-none d-md-block">
               <a class="btn text-muted dropdown-toggle mr-2 ml-3" id="dropdownMegaMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="i-Add-User"></i> Admin</a>
               <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                  <div class="row m-0">
                     <div class="col-md-4 p-1">
                        <img src="../../asset/images/st2_bg.jpg" />

                     </div>
                     
                     <div class="col-md-8 p-4">
                        <p class="text-info text--cap border-bottom-info d-inline-block">Features</p>
                        <div class="menu-icon-grid w-auto p-0 text-center">

                           <a href="{{ url('/usercreation') }} "><i class="i-Add-UserStar"></i> User Creation</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- / Mega menu-->
            <!-- Mega menu-->
            <div class="dropdown mega-menu d-none d-md-block">
               <a class="btn text-muted dropdown-toggle mr-2 ml-2" id="dropdownMegaMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="i-Gear"></i> Settings</a>
               <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                  <div class="row m-0">
                     <div class="col-md-4 p-1">
                        <img src="../../asset/images/st1_bg.jpg" />

                     </div>
                     <div class="col-md-8 p-4">
                        <p class="text-info text--cap border-bottom-info d-inline-block">Features</p>
                        <div class="menu-icon-grid w-auto p-0 text-center">
                           <a href="{{ url('/division_creation') }}"><i class="i-File-Network"></i> Intelligence Division</a>
                           <a href="{{ url('/designation_creation') }}"><i class="i-File-Pie"></i> Designation Creation</a>
                           <a href="{{ url('/rovingsquad_creation') }}"><i class="i-Find-User"></i> Roving Squad Number</a>
                           <a href="{{ url('/shift') }}"><i class="i-Add-UserStar"></i> Shift</a>
                           <a href="{{ url('/offence_section') }}"><i class="i-Add-User"></i> Nature of the Offence / Offense Section</a>
                           <a href="{{ url('/hsn') }}"><i class="i-Bar-Code"></i> HSN Commodity Name(s), Code</a>
                           <a href="{{ url('/consignorcreation') }}"><i class="i-Arrow-Circle"></i> Consignor circle details</a>
                           <a href="{{ url('/officeregistration') }}"><i class="i-File-Edit"></i> Officer Registration</a>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         
            <div class="dropdown mega-menu d-none d-md-block">
               <a class="btn text-muted dropdown-toggle mr-2 ml-2" id="dropdownMegaMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="i-Information"></i>Entry Forms</a>
               <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                  <div class="row m-0">
                     <div class="col-md-4 p-1">
                        <img src="../../asset/images/st3_bg.jpg" />

                     </div>
                     <div class="col-md-4 p-4">
                        <p class="text-info text--cap border-bottom-info d-inline-block">Features</p>
                        <div class="menu-icon-grid w-auto p-0 text-center">
                           <a href="{{ url('/checked_vehicle') }}"><i class="i-Car"></i> Intercepted Vehicle</a>
                           <a href="{{ url('/offence_vehicle') }}"><i class="i-Car-2"></i> Offence Vehicle</a>

                           <!-- <a href="checked-vehicle-list.php"><i class="i-Car"></i> Checked Vehicle</a>
                           <a href="offence_vehicle_list.php"><i class="i-Car-2"></i> Offence Vehicle</a> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dropdown mega-menu d-none d-md-block">
               <a class="btn text-muted dropdown-toggle mr-2 ml-2" id="dropdownMegaMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="i-Information"></i> Reports</a>
               <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                  <div class="row m-0">
                     <div class="col-md-4 p-1">
                        <img src="../../asset/images/st3_bg2.png" />

                     </div>
                     <div class="col-md-4 p-4">
                        <p class="text-info text--cap border-bottom-info d-inline-block">Features</p>
                        <div class="menu-icon-grid w-auto p-0 text-center">
                           <a href="{{ url('/offence_wise_report') }}"><i class="i-Add-User"></i> Nature Of Offence Wise Reports</a>
                           <a href="{{ url('/revenue_wise_report') }}"><i class="i-Money-2"></i> Revenue Wise Reports</a>
                           <a href="{{ url('/commodity_wise_report') }}"><i class="i-Bar-Code"></i> Commodity Wise Reports</a>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- Deputy Commissioner Admin -->
            <?php }else if($user_type_name == '5f97fc3257f2525529'){?>
           

               <div class="dropdown mega-menu d-none d-md-block">
               <a class="btn text-muted dropdown-toggle mr-2 ml-2" id="dropdownMegaMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="i-Information"></i>Entry Forms</a>
               <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                  <div class="row m-0">
                     <div class="col-md-4 p-1">
                        <img src="../../asset/images/st3_bg.jpg" />

                     </div>
                     <div class="col-md-4 p-4">
                        <p class="text-info text--cap border-bottom-info d-inline-block">Features</p>
                        <div class="menu-icon-grid w-auto p-0 text-center">
                           <a href="{{ url('/checked_vehicle') }}"><i class="i-Car"></i> Intercepted Vehicle</a>
                           <a href="{{ url('/offence_vehicle') }}"><i class="i-Car-2"></i> Offence Vehicle</a>

                           <!-- <a href="checked-vehicle-list.php"><i class="i-Car"></i> Checked Vehicle</a>
                           <a href="offence_vehicle_list.php"><i class="i-Car-2"></i> Offence Vehicle</a> -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="dropdown mega-menu d-none d-md-block">
               <a class="btn text-muted dropdown-toggle mr-2 ml-2" id="dropdownMegaMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="i-Information"></i> Reports</a>
               <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                  <div class="row m-0">
                     <div class="col-md-4 p-1">
                        <img src="../../asset/images/st3_bg2.png" />

                     </div>
                     <div class="col-md-4 p-4">
                        <p class="text-info text--cap border-bottom-info d-inline-block">Features</p>
                        <div class="menu-icon-grid w-auto p-0 text-center">
                           <a href="{{ url('/offence_wise_report') }}"><i class="i-Add-User"></i> Nature Of Offence Wise Reports</a>
                           <a href="{{ url('/revenue_wise_report') }}"><i class="i-Money-2"></i> Revenue Wise Reports</a>
                           <a href="{{ url('/commodity_wise_report') }}"><i class="i-Bar-Code"></i> Commodity Wise Reports</a>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
           
              
              
              <!-- Field User -->
              <?php }else if($user_type_name == '62c80e9f0914e68331'){?>
           

           <div class="dropdown mega-menu d-none d-md-block">
           <a class="btn text-muted dropdown-toggle mr-2 ml-2" id="dropdownMegaMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="i-Information"></i>Entry Forms</a>
           <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
              <div class="row m-0">
                 <div class="col-md-4 p-1">
                    <img src="../../asset/images/st3_bg.jpg" />

                 </div>
                 <div class="col-md-4 p-4">
                    <p class="text-info text--cap border-bottom-info d-inline-block">Features</p>
                    <div class="menu-icon-grid w-auto p-0 text-center">
                       <a href="{{ url('/checked_vehicle') }}"><i class="i-Car"></i> Intercepted Vehicle</a>
                       <a href="{{ url('/offence_vehicle') }}"><i class="i-Car-2"></i> Offence Vehicle</a>

                       <!-- <a href="checked-vehicle-list.php"><i class="i-Car"></i> Checked Vehicle</a>
                       <a href="offence_vehicle_list.php"><i class="i-Car-2"></i> Offence Vehicle</a> -->
                    </div>
                 </div>
              </div>
           </div>
        </div>
        
          
          <?php }?>




            <!--<div class="search-bar">
         <input type="text" placeholder="Search" /><i class="search-icon text-muted i-Magnifi-Glass1"></i>
         </div>-->
         </div>
         <div style="margin: auto"></div>
         <div class="header-part-right">

            <h3 class="divi">Chennai Intelligence - I<br>
               <p>{{$staff_name}} / {{$user_name}}</p>
            </h3>

            <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen=""></i>

            <!--<div class="dropdown">
         <i class="i-Add-User text-muted header-icon" id="dropdownMenuButton" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <div class="menu-icon-grid text-center">
                <a href="screen_section.php"><i class="i-Block-Window"></i> Screen Section</a>
                <a href="#"><i class="i-Library"></i> User Screen</a>
                <a href="#"><i class="i-Find-User"></i> User <br/>Type</a>
                <a href="#"><i class="i-File-Clipboard-File--Text"></i> User Creation</a>
                <a href="#"><i class="i-Checked-User"></i> User Type Permissions</a>
                </div>
         </div>
      </div>-->

            <!-- User avatar dropdown-->
            <div class="dropdown">
               <div class="user col align-self-end">
                  <img id="userDropdown" src="../../asset/images/img_avatar.png" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                     <div class="dropdown-header"><i class="i-Lock-User mr-1"></i> Welcome! <b>{{$user_name}}</b></div>

                     <a class="dropdown-item" href="#">Password Change</a>
                     <a class="dropdown-item" href="{{ url('/logout') }}">Sign Out</a>

                     <!-- <a class="dropdown-item" href="index.php">Sign out</a> -->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- header top menu end-->

      </ul>
   </div>
   </div>
   </div>
   </div>
   <!-- =============== Horizontal bar End ================-->
   </div>
