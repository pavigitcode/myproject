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
    .sz{
        font-size: 14px;
    }
</style>

<?php
$user_unique_id = session('unique_id');


$staff_name = session('staff_name');
$user_name = session('user_name');
$user_type = session('user_type');

$mobile = session('mobile_no');
 $roving_squad_unique_id = session('roving_squad_unique_id');

if($roving_squad_unique_id != ''){
    $user_id = $roving_squad_unique_id;
}else{
    $user_id = $user_name;
}





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
                                <?php
                                    $main_screens  = user_main_screen();
                                    // $mains = count($main_screens);

                                    foreach ($main_screens as $main_key => $main_value) {

                                        if (in_array($main_value->unique_id, $session_main_screens)) {
                                            $section_unique_id =  $main_value->unique_id;
                                            $menu_main_name    =  $main_value->screen_main_name;

                                            $menu_main_icon    =  $main_value->icon_name;

                                ?>
                            <li>
                                <div>
                                    <div>

                                        <label class="toggle" for="<?php echo $menu_main_name; ?>"></label>
                                        <a href="#">
                                        <!-- <img src="../../asset/images/person.png">  -->
                                        <img src="{{ asset('public/asset/images/')}}/<?php echo $menu_main_icon; ?>">
                                        <!-- <i class="<?php echo $menu_main_icon; ?>"></i>  -->
                                        <?php echo $menu_main_name; ?></a>

                                        <input id="<?php echo $menu_main_name; ?>" type="checkbox" hidden/>

                                        <?php

                                            $screen_sections   = user_screen_names($section_unique_id);

                                            foreach ($screen_sections as $screens_key => $screens_value) {
                                                $image = $screens_value->image;
                                                $heading = $screens_value->heading;
                                            }
                                        ?>

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

                                        <ul>

                                            <li>
                                                <a href="{{ url('/'.$screens_value->folder_name) }}">
                                                <img src="{{ asset('public/asset/images/')}}/<?php echo $sub_icon; ?>"> 
                                             
                                                <?php echo $menu_screen_name; ?></a>
                                            </li>
                                        </ul>
                                        <?php
                                        }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </li>
                            <?php  }
                            }
                            ?>
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

                            <a class="btn text-muted dropdown-toggle mr-2 ml-3" id="dropdownMegaMenuButton" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           
                            <img src="{{ asset('public/asset/images/')}}/<?php echo $menu_main_icon; ?>">
                                <?php echo $menu_main_name; ?></a>
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

                                    <div class="col-md-8 p-4">
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

                                                    <a href="{{ url('/'.$screens_value->folder_name) }}">
                                                  
                                                <img src="{{ asset('public/asset/images/')}}/<?php echo $sub_icon; ?>"> 
                                                    <?php echo $menu_screen_name; ?></a>


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



<div style="margin-top: 7px;    margin-left: 50px;
">
        <h6 class="sz">
            <a href="http://tnctint.cr.tn.gov.in/" target="_blank">Thadam</a></h6>
        
         </div>

         <div style="margin-top: 7px;margin-left: 21px;">
        
        <h6 class="sz"><a href="https://mis.ewaybillgst.gov.in/" target="_blank">E-Way Bill</a></h6>
        
         </div>
            </div>

            <div style="margin: auto"></div>
            <div class="header-part-right">
                <?php
                $divStyle='block'; // show div

                if($user_type == 'Master Admin'){
                    $divStyle = 'none';
                }else if($user_type == 'Super Admin'){
                    $divStyle = "none";
                }else if($user_type == 'Admin'){
                    $divStyle = "none";
                }
                else if($user_type == 'Executive User'){
                    $divStyle = "none";
                }else{
                    $divStyle = "block";
                }
                ?>
                <h3 class="divi d-none d-sm-block "><p style="display: <?= $divStyle?>;color:#003473;">{{ $div_name }}</p>
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
                <input type="hidden" name="user_name" id="user_name" value="{{$user_id}}">
                            <a class="dropdown-item" href="#" id="createpassword">Change Password</a>
                            <a class="dropdown-item" href="{{ url('/logout') }}">Sign Out</a>

                            <!-- <a class="dropdown-item" href="index.php">Sign out</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top menu end-->

        <!--  Modal -->
<div class="modal fade" id="passwordModel" tabindex="-1" role="dialog" aria-labelledby="passwordModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordModelLabel">Change Password</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p style="text-align: center;font-weight: 600;font-size: 15px;" id="userName">Username is <?php echo $user_name;?></p>

                <div class="form-group mb-3" id="passdiv">
                    <label for="password">New Password</label>
                    <input type="text" id="new_password" name="new_password" class="form-control" value="" required>
                    <!-- <input type="text" id="old_pass" name="old_pass" class="form-control" value=""> -->

                </div>
                <div class="form-group mb-3" id="passdiv">
                    <label for="password">Confirm Password</label>
                    <input type="text" id="con_password" name="con_password" onchange="checkPass(); return false;" class="form-control" value="" required>
                    <span id="confirmMessage" class="confirmMessage"></span>
                </div>


            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>

                <button class="btn btn-primary ml-2" type="button" id="create">New Password Generte</button>

            </div>
        </div>
    </div>

</div>

        </ul>
    </div>
    </div>
    </div>
    </div>
    <!-- =============== Horizontal bar End ================-->
    </div>
    <script>
        function checkPass()
	{
        // alert("hii");
		//Store the password field objects into variables ...
		var pass1 = document.getElementById('new_password');
		var pass2 = document.getElementById('con_password');
		//Store the Confimation Message Object ...
		var message = document.getElementById('confirmMessage');
		//Set the colors we will be using ...
		var goodColor = "#66cc66";
        // var goodColor = "#ffffff";

		var badColor = "#ff6666";
		//Compare the values in the password field
		//and the confirmation field
		if(pass1.value == pass2.value){
			//The passwords match.
			//Set the color to the good color and inform
			//the user that they have entered the correct password
			pass2.style.backgroundColor = goodColor;
			message.style.color = goodColor;
			message.innerHTML = "Passwords Match!"
		}else{
			//The passwords do not match.
			//Set the color to the bad color and
			//notify the user.
			pass2.style.backgroundColor = badColor;
			message.style.color = badColor;
			message.innerHTML = "Passwords Do Not Match!"
		}
	}
         $('#createpassword').on('click', function() {

            $('#passwordModel').modal('show');
            $('#create').on('click', function() {
            $.ajax({
        type: "GET",
        url: '{{ route("new_password_create.index") }}',
        data: {
            'user_name': $('#user_name').val(),
            'new_password': $('#new_password').val(),
            'con_password': $('#con_password').val()
        },
        cache: false,
        success: function(data) {
            if (data && data.length > 0) {

                data = $.parseJSON(data); //parse response string

                if(data.user_data != 2){
                    alert("New Password Generated Successfully");
                    $('#passwordModel').modal('hide');
                    $('#new_password').empty();
                    $('#con_password').empty();




                }

            }
        }
    });
})
    })
        </script>
