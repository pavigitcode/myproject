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
$session_main_screens = session('main_screens');
$screens = session('screens');

// print_r($session_main_screens);die();
?>


<body class="text-left">
    <div class="app-admin-wrap layout-horizontal-bar">
      <!-- header top menu end-->
      <div class="horizontal-bar-wrap">
            <div class="header-topnav d-block d-sm-block d-md-none">
                <div class="">
                    <div class="topnav rtl-ps-none" id="" data-perfect-scrollbar="" data-suppress-scroll-x="true">
                        <ul class="menu float-start">
                            <li>
                                <div>
                                    <div>
                                    <label class="toggle" for="drop-1"></label><a href="#"><i class="nav-icon me-2 i-Bar-Chart"></i> Admin</a>
                                        <input id="drop-1" type="checkbox" />
                                        <ul>
                                            <li><a href="{{ url('/usertype') }}"><i class="i-Find-User"></i> User Type</a></li>
                            
                                            <li> <a href="{{ url('/usercreation') }} "><i class="i-Add-UserStar"></i> User Creation</a></li>
                                            <li> <a href="{{ url('/usertypepermission') }}"><i class="i-Add-User"></i> User Type Permission</a></li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </li>
  
                            <li>
                                <div>
                                    <div>
                                        <label class="toggle" for="drop-2">UI kits</label><a href="#"><i class="nav-icon mr-2 i-Suitcase"></i> UI kits</a>
                                        <input id="drop-2" type="checkbox" />
                                        <ul>
                                            <li><a href="alerts.html"><i class="nav-icon mr-2 i-Bell1"></i><span class="item-name">Alerts</span></a></li>
                                            <li><a href="accordion.html"><i class="nav-icon mr-2 i-Split-Horizontal-2-Window"></i><span class="item-name">Accordion</span></a></li>
                                            <li><a href="badges.html"><i class="nav-icon mr-2 i-Medal-2"></i><span class="item-name">Badges</span></a></li>
                                            <li><a href="buttons.html"><i class="nav-icon mr-2 i-Cursor-Click"></i><span class="item-name">Buttons</span></a></li>
                                            <li><a href="lists.html"><i class="nav-icon mr-2 i-Belt-3"></i><span class="item-name">Lists</span></a></li>
                                            <li><a href="pagination.html"><i class="nav-icon mr-2 i-Arrow-Next"></i><span class="item-name">Paginations</span></a></li>
                                            <li><a href="popover.html"><i class="nav-icon mr-2 i-Speach-Bubble-2"></i><span class="item-name">Popover</span></a></li>
                                            <li><a href="progressbar.html"><i class="nav-icon mr-2 i-Loading"></i><span class="item-name">Progressbar</span></a></li>
                                            <li><a href="tables.html"><i class="nav-icon mr-2 i-File-Horizontal-Text"></i><span class="item-name">Tables</span></a></li>
                                            <li><a href="tabs.html"><i class="nav-icon mr-2 i-New-Tab"></i><span class="item-name">Tabs</span></a></li>
                                            <li><a href="tooltip.html"><i class="nav-icon mr-2 i-Speach-Bubble-8"></i><span class="item-name">Tooltip</span></a></li>
                                            <li><a href="modals.html"><i class="nav-icon mr-2 i-Duplicate-Window"></i><span class="item-name">Modals</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                           
                            <!--end-doc  -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- =============== Horizontal bar End ================-->
        <div class="main-header">
        <div class="menu-toggle">
                <div></div>
                <div></div>
                <div></div>
            </div>
        <!-- <a href="{{ url('/screensectionadd') }}"><i class="i-Window"></i> Screen Section</a> -->

            <a href="{{ url('/dashboard/create') }}">
                <div class="logo"><img src="{{ asset('public/asset/images/t-logo1.png')}}" alt="" /></div>
            </a>
            
            <!--<div class="logo-name">
      <h5 class="text-info mt-2">Commercial Taxes Department</h5>
      <h6 class="text-muted">Goverment of Tamilnadu</h6>
   </div>-->
            <!-- Super Admin -->


            <div class="d-flex align-items-center">
                <?php
                $main_screens  = user_main_screen();
                // $mains = count($main_screens);

                foreach ($main_screens as $main_key => $main_value) {

                    if (in_array($main_value->unique_id, $session_main_screens)) {
                        $section_unique_id =  $main_value->unique_id;
                        $menu_main_name    =  $main_value->screen_main_name;

                        $menu_main_icon    =  $main_value->icon_name;




                ?>
                        <!-- / Mega menu-->
                        <div class="dropdown mega-menu d-none d-md-block">

                            <a class="btn text-muted dropdown-toggle mr-2 ml-3" id="dropdownMegaMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="<?php echo $menu_main_icon; ?>"></i> <?php echo $menu_main_name; ?></a>
                            
                            <?php

                            $screen_sections   = user_screen_names($section_unique_id);

                            foreach ($screen_sections as $screens_key => $screens_value) {
                                $image = $screens_value->image;
                                $heading = $screens_value->heading;
                            }
                            ?>
                            <div class="dropdown-menu text-left" aria-labelledby="dropdownMenuButton">
                                <div class="row">



                                    <div class="col-md-4">
                                        <img src="{{ asset('public/asset/images/')}}/<?php echo $image; ?>" />

                                    </div>
                                    <!-- <p class="text-info text--cap border-bottom-info d-inline-block"><?php echo $heading; ?></p> -->

                                    <div class="col-md- p-4">
                                        <p class="text-info text--cap border-bottom-info d-inline-block">Features</p>
                                        <div class="menu-icon-grid w-auto p-0 text-center">

                                            <?php

                                            foreach ($screen_sections as $screens_key => $screens_value) {
                                                if (in_array($screens_value->unique_id, $screens)) {
                                                    // $demo1 = [$screens_value];
                                                    // $unique_id = $screens_value->unique_id;

                                                    $menu_screen_name   = $screens_value->user_screen_name;

                                                    $sub_icon    =  $screens_value->icon_name;
                                                    $menu_screen_folder = $screens_value->folder_name;
                                                    $menu_screen_icon   = "";

                                            ?>

                                                    <a href="{{ url('/'.$screens_value->folder_name) }}"><i class="<?php echo $sub_icon; ?>"></i><?php echo $menu_screen_name; ?></a>


                                            <?php }
                                                // }
                                            }
                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                <?php  }
                }
                ?>



                <!--<div class="search-bar">
         <input type="text" placeholder="Search" /><i class="search-icon text-muted i-Magnifi-Glass1"></i>
         </div>-->
            </div>
            
            <div style="margin: auto"></div>
            <div class="header-part-right">

                <h3 class="divi d-none d-sm-block">{{ $div_name }}<br>
                    <p>{{$staff_name}} / {{$user_type}}</p>
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
                        <img id="userDropdown" src="{{ asset('public/asset/images/img_avatar.png')}}" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" />
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header"><i class="i-Lock-User mr-1"></i> Welcome! <b>{{$user_name}}</b></div>
                            <h3 class="divi d-block d-sm-none" style="padding-left: 24px;font-size:10px;">{{ $div_name }}<br>
                    <p>{{$staff_name}} / {{$user_type}}</p>
                </h3>
                            <!-- <a class="dropdown-item" href="#">Password Change</a> -->
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
