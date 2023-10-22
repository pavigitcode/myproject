<html>

<script src="{{asset('public/asset/onlinecdn/jquery.min.js')}}"></script>

@extends('menu/header')

<style>
    a,
    a:focus,
    a:hover {
        text-decoration: none;
        color: #fff;
    }

    input.otp-in {
        width: 10%;
    }
</style>
<div class="auth-layout-wrap" style="background-color:#f9f9f9;">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">

                <div class="col-md-12">
                    <div class="p-4">
                        <div class="auth-logo text-center mb-2"><img src="{{ asset('public/asset/images/t-logo2.png')}}" alt=""></div>
                        <h1 class="mb-1 text-22 text-center">Login</h1>
                        <h1 class="mb-3 text-13 text-center">Sign in to your account</h1>
                        <form method="post" action="{{ route('login.store') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="mobile_no">User Name/Roving Squad</label>
                                <input type="text" id="mobile_no" name="mobile_no" class="form-control" value="" required>

                                <!-- onkeyup="checkusername(this.value)" -->
                                <!-- <input class="form-control" id="email" type="tel"> -->
                            </div>
                            <div class="form-group mb-3" id="passdiv">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" value="" required>

                            </div>

                            <label id="error" style="color:red">UserName is Expired!. Please contact your Admin..</label>

                            <!--<div class="form-group mb-3">
                                <label for="password">OTP</label>
                                <input class="form-control" id="password" type="password">
                            </div>-->
                            <!-- <a href="dashboard.php" class="btn btn-info" style="width:100%" data-toggle="modal" data-target="#passwordModel">Next</a></button> -->

                            <button type="button" class="btn btn-info waves-effect waves-light" id="checkusername" style="width:100%" data-toggle="modal" data-target="#exampleModal">Next</button>

                            <button type="submit" class="btn btn-info waves-effect waves-light createupdate_btn" id="createupdate_btn" style="width:100%" data-toggle="modal" data-target="#exampleModal">Sign In</button>

                        </form>
                        <!--<div class="mt-3 text-center"><a class="text-muted" href="forgot.html">
                                <u>Forgot Password?</u></a></div>-->
                    </div>
                </div>
                <!-- <div class="col-md-6 text-center" style="background-size: cover;background-image: url(../../dist-assets/images/photo-long-3.jpg)">
                    <div class="pr-3 auth-right"><a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text" href="signup.html"><i class="i-Mail-with-At-Sign"></i> Sign up with Email</a><a class="btn btn-rounded btn-outline-google btn-block btn-icon-text"><i class="i-Google-Plus"></i> Sign up with Google</a><a class="btn btn-rounded btn-block btn-icon-text btn-outline-facebook"><i class="i-Facebook-2"></i> Sign up with Facebook</a></div>
                </div>--->
            </div>
        </div>
    </div>
</div>
<!--  Modal -->
<div class="modal fade" id="passwordModel" tabindex="-1" role="dialog" aria-labelledby="passwordModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordModelLabel">Create Your Password</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p style="text-align: center;font-weight: 600;font-size: 15px;" id="userName">Username is </p>

                <div class="form-group mb-3" id="passdiv">
                    <label for="password">New Password</label>
                    <input type="password" id="new_password" name="new_password" class="form-control" value="" required>

                </div>
                <div class="form-group mb-3" id="passdiv">
                    <label for="password">Confirm Password</label>
                    <input type="password" id="con_password" name="con_password" onchange="checkPass(); return false;" class="form-control" value="" required>
                    <span id="confirmMessage" class="confirmMessage"></span>
                </div>


            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>

                <button class="btn btn-primary ml-2" type="button" id="updatepassword">New Password Generte</button>

            </div>
        </div>
    </div>

</div>


@extends('menu.footer')

<script>
    $(document).ready(function() {

        $('#createupdate_btn').hide();
        $('#passdiv').hide();
        $('#checkusername').show();
        $('#error').hide();

    });

    $('#mobile_no').on('keyup', function() {
        $('#createupdate_btn').hide();
        $('#passdiv').hide();
        $('#checkusername').show();
        $('#error').hide();
    })

    $('#checkusername').on('click', function() {
        // alert('hi');
        // alert($('#off_division_name').val());

        $.ajax({
            type: "GET",
            url: '{{ route("getUser.index") }}',
            data: {
                'user_name': $('#mobile_no').val()
            },
            cache: false,
            success: function(data) {
                if (data && data.length > 0) {
                    // alert(data);
                    data = $.parseJSON(data); //parse response string
                    // alert(data.offence_names);
                    // var k=0;

                    // console.log(data.user_data);

                    if (data.user_data.new_user == '1') {
                        $('#passwordModel').modal('show');
                        $('#userName').append(data.user_data.user_name);

                    }else if(data.user_data == '2'){
                        // $('#createupdate_btn').  show();
                        
                        $('#error').show();
                        // alert('hi');
                        $('#checkusername').hide();
                    } 
                    else {
                        $('#createupdate_btn').show();
                        $('#passdiv').show();
                        $('#checkusername').hide();
                    }
                }
            }
        });
    })




    $('#updatepassword').on('click', function() {


        $.ajax({
            type: "GET",
            url: '{{ route("new_password.index") }}',
            data: {
                'user_name': $('#mobile_no').val(),
                'new_password': $('#new_password').val(),
                'con_password': $('#con_password').val()
            },
            cache: false,
            success: function(data) {
                if (data && data.length > 0) {

                    data = $.parseJSON(data); //parse response string

                    if(data.user_data != 2){
                        // alert("New Password Generated Successfully");
                        $('#passwordModel').modal('hide');
                        $('#passdiv').show();
                        $('#checkusername').hide();
                        $('#createupdate_btn').show();


                    }

                }
            }
        });
    })

    $('#createupdate_btn').on('click', function() {


        $.ajax({
            type: "GET",
            url: '{{ route("updatelogin.index") }}',
            data: {
                'user_name': $('#mobile_no').val(),

            },
            cache: false,
            success: function(data) {
                if (data && data.length > 0) {

                    data = $.parseJSON(data); //parse response string
                    // alert(data);
                    // if(data.user_data != 2){
                        // alert("Login Successfully");
                    //     window.location.href =


                    // }

                }
            }
        });
    })
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
</script>

</html>
