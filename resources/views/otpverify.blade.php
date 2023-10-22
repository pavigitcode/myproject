<html>

@extends('menu/header')

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<style>
    a,
    a:focus,
    a:hover {
        text-decoration: none;
        color: #fff;
    }

    input.otp-in {
        width: 13%;

    }

    body {
        background-color: pink;
        width: auto;
        heaight: auto
    }


    .digit {
        width: 50px;
        height: 50px;
        margin: 5px;
        text-align: center;
        font-size: 20px;
        color: transparent;
        box-shadow: 0px 2px 5px -2px #f50000ce;
        text-shadow: 0 0 0 #040404bb;
        border-color: #dcdcdcfc;
        border-width: 1px;
        border-radius: 5px;
        border-style: solid;
        outline-color: #040404bb;
        transition: 0.3s transform;
    }

    .digit:focus {
        transform: scale(1.3);
        transition: 0.1s;
    }

    #verificationButton {
        width: 100px;
        height: 50px;
        margin: 5px;
        text-align: center;
        font-size: 20px;
        background-color: #ffffff;
        color: transparent;
        box-shadow: 0px 2px 5px -2px #f50000ce;
        text-shadow: 0 0 0 #040404bb;
        border-color: #dcdcdcfc;
        border-width: 1px;
        border-radius: 5px;
        border-style: solid;
        outline-color: #ff0000bb;
    }

    #verificationButton:hover {
        border: solid 2px #000000ce;
        width: 110px;
        height: 60px;
        cursor: pointer;
        /* transform: scale(0.1); */
        transform: scale(1);
        transition: 0.1s;
    }

    #digitsContainer {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        /* margin-top: 250px; */
    }
</style>
<div class="auth-layout-wrap" style="background-color:#f9f9f9;">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">

                <div class="col-md-12">
                    <div class="p-4">
                        <div class="auth-logo text-center mb-2"><img src="{{ asset('public/asset/images/t-logo2.png')}}" alt=""></div>
                        <h1 class="mb-1 text-22 text-center">Enter Your OTP</h1>
                        <h1 class="mb-3 text-13 text-center">Sign in to your account</h1>

                        <div id="digitsContainer">
                            <form class="digit-group" data-group-name="digits" data-autosubmit="false" autocomplete="off" action="{{ route('otp.create') }}" method="get" >
                            @csrf
                            <!-- <p>User Name : {{ $user->staff_name }}</p> -->

                            <input type="hidden" name="user_id" value="{{ $user->unique_id }}" />

                                <div class="modal-body">
                                    <p style="text-align: center;font-weight: 600;font-size: 15px;">A Code Has been sent to *******598</p>
                                    <!-- <p>Your OTP is {{ $otp->otp }}</p> -->
                                    <?php
                                        $otp_val = $otp->otp;
                                        $item = str_split($otp_val,1);
                                        $otpOne = $item[0];
                                        $otpTwo =  $item[1];
                                        $otpThird =  $item[2];
                                        $otpFour = $item[3];
                                    ?>
                                    <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">

                                        <input type="text" class="m-2 text-center form-control rounded otp-in otp__digit otp__field__6" id="digit_1" name="digit_1" data-next="digit_2" value="{{ $otpOne }}"/>
                                        <input type="text" class="m-2 text-center form-control rounded otp-in otp__digit otp__field__6" id="digit_2" name="digit_2" data-next="digit_3" data-previous="digit_1" value="{{ $otpTwo }}"/>
                                        <input type="text" class="m-2 text-center form-control rounded otp-in otp__digit otp__field__6" id="digit_3" name="digit_3" data-next="digit_4" data-previous="digit_2" value="{{ $otpThird }}"/>
                                        <input type="text" class="m-2 text-center form-control rounded otp-in otp__digit otp__field__6" id="digit_4" name="digit_4" data-previous="digit_3" value="{{ $otpFour }}" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <a class="btn btn-default btn-close" href="{{ url()->previous() }}"><button type="button" class="btn btn-secondary waves-effect waves-light">Close</button></a>

                                    <!-- <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button> -->
                                    <button class="btn btn-primary ml-2" type="submit">Login</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
                <!-- <div class="col-md-6 text-center" style="background-size: cover;background-image: url(../../dist-assets/images/photo-long-3.jpg)">
                    <div class="pr-3 auth-right"><a class="btn btn-rounded btn-outline-primary btn-outline-email btn-block btn-icon-text" href="signup.html"><i class="i-Mail-with-At-Sign"></i> Sign up with Email</a><a class="btn btn-rounded btn-outline-google btn-block btn-icon-text"><i class="i-Google-Plus"></i> Sign up with Google</a><a class="btn btn-rounded btn-block btn-icon-text btn-outline-facebook"><i class="i-Facebook-2"></i> Sign up with Facebook</a></div>
                </div>--->
            </div>
        </div>
    </div>
</div>

@extends('menu.footer')

<script>
    $('.digit-group').find('input').each(function() {
        $(this).attr('maxlength', 1);
        $(this).on('keyup', function(e) {
            var parent = $($(this).parent());

            if (e.keyCode === 8 || e.keyCode === 37) {
                var prev = parent.find('input#' + $(this).data('previous'));

                if (prev.length) {
                    $(prev).select();
                }
            } else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                var next = parent.find('input#' + $(this).data('next'));

                if (next.length) {
                    $(next).select();
                } else {
                    if (parent.data('autosubmit')) {
                        parent.submit();
                    }
                }
            }
        });
    });
</script>

</html>
