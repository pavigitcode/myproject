<html>

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
                                <label for="mobile_no">Phone Number</label>
                                <input type="tel" id="mobile_no" name="mobile_no" class="form-control" onkeypress="number_only(event);" minlength="10" maxlength="10" value="" required>

                                <label for="password">Password</label>
                                <input type="text" id="password" name="password" class="form-control" value="" required>    

                                <!-- <input class="form-control" id="email" type="tel"> -->
                            </div>
                            <!--<div class="form-group mb-3">
                                <label for="password">OTP</label>
                                <input class="form-control" id="password" type="password">
                            </div>-->
                            <!-- <a href="dashboard.php" class="btn btn-info" style="width:100%" data-toggle="modal" data-target="#exampleModal">Send OTP</a></button> -->

                            <button type="submit" class="btn btn-info waves-effect waves-light createupdate_btn"style="width:100%" data-toggle="modal" data-target="#exampleModal">Sign In</button>

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
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter Your OTP</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p style="text-align: center;font-weight: 600;font-size: 15px;">A Code Has been sent to *******598</p>

                <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                    <input class="m-2 text-center form-control rounded otp-in" type="text" id="first" maxlength="1" />
                    <input class="m-2 text-center form-control rounded  otp-in" type="text" id="second" maxlength="1" />
                    <input class="m-2 text-center form-control rounded  otp-in" type="text" id="third" maxlength="1" />
                    <input class="m-2 text-center form-control rounded  otp-in" type="text" id="fourth" maxlength="1" />

                </div>


            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary ml-2" type="button" onclick="window.location='{{ route('dashboard.create') }}'">Login</button>

                <a href="dashboard.php"><button class="btn btn-primary ml-2" type="button">Login</button></a>
            </div>
        </div>
    </div>

</div> -->


@extends('menu.footer')

</html>