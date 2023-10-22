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
$user_unique_id = session('unique_id');
$staff_name = session('staff_name');
$user_name = session('user_name');
$user_type = session('user_type');
$div_name = session('div_name'); 
$user_type_name = session('usertype_id');
$main_screens = session('main_screens');
$screens = session('screens');


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
   
   
         <div class="d-flex align-items-center">
         <?php 
                        $main_screens  = user_main_screen($user_type_name);
                        foreach ($main_screens as $main_key => $main_value) {
                           $section_unique_id =  $main_value->unique_id;
                           
                           // if(in_array($main_value->unique_id, $main_screens)) {
                            $menu_main_name    =  $main_value->screen_main_name;
                            $menu_main_icon    = "";
                           //  if ($main_value->icon_name) {
                            $menu_main_icon    =  $main_value->icon_name;
                            
                           //  } 
                            
                    ?>
            <!-- / Mega menu-->
            <div class="dropdown mega-menu d-none d-md-block">
            
               <a class="btn text-muted dropdown-toggle mr-2 ml-3" id="dropdownMegaMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="<?php echo $menu_main_icon;?>"></i> <?php echo $menu_main_name; ?></a>
               <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                  <div class="row">
                  
                     <div class="col-md-4 p-1">
                        <img src="../../asset/images/st2_bg.jpg" />

                     </div>
                     
                     <?php 
                     //  $user_screens     = user_screen_names('',$main_value->unique_id);
                     //  foreach ($user_screens as $sub_key => $sub_value) {
                     //    $screen_name    =  disname($sub_value->screen_name);
                       
                     //    $folder         = $sub_value->folder_name;
                     //    $sub_icon    =  '<i class="'.$sub_value->icon_name.'"></i>';
                     $screen_sections   = user_screen_names($section_unique_id);
                  //   print_r('hi');die();
                        foreach ($screen_sections as $screens_key => $screens_value) {
                           $unique_id = $screens_value->unique_id;
                           // print_r($screens_value->unique_id, $screens);die();
                           if (in_array($screens_value->unique_id, $screens)) {










                              
                             
                           // if (array($unique_id, $screens)) {
                                                        // User Screen Permission Based On User Type
                                                      //   if (in_array($screens_value->unique_id,$_SESSION->screens)) {
                                                        
                        $menu_screen_name   = $screens_value->user_screen_name;
                        
                        $sub_icon    =  $screens_value->icon_name;
                        $menu_screen_folder = $screens_value->folder_name;
                        $menu_screen_icon   = "";
                      ?>
                     
                     
                        <!-- <p class="text-info text--cap border-bottom-info d-inline-block">Features</p> -->
                        <div class="col-md-8 p-4">
                        <div class="menu-icon-grid w-auto p-0 text-center">
                        
                           <a href="{{ url('/'.$screens_value->folder_name) }}"><i class="<?php echo $sub_icon;?>"></i><?php echo $menu_screen_name;?></a>
                            </div>
                            </div>
                  
                     <?php } 
                     // }
                  // }
                  ?>
                  </div>
               </div>
            </div>
            <?php } 
         }
         ?>




            <!--<div class="search-bar">
         <input type="text" placeholder="Search" /><i class="search-icon text-muted i-Magnifi-Glass1"></i>
         </div>-->
         </div>
         <div style="margin: auto"></div>
         <div class="header-part-right">

            <h3 class="divi">{{ $div_name }}<br>
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
