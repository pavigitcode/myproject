<html>

@extends('menu/header')

<style>
    a, a:focus, a:hover {
    text-decoration: none;
    color: #fff;
}
</style>
<div class="auth-layout-wrap" style="background-color:#f9f9f9;">
    <div class="auth-content">
        <div class="card o-hidden">
<div class="row">

                <div class="col-md-12">
                    <div class="p-4">
                        <div class="auth-logo text-center mb-2"><img src="../asset/images/t-logo2.png" alt=""></div>
                        <h1 class="mb-1 text-22 text-center">Login</h1>
                         <h1 class="mb-3 text-13 text-center">Sign in to your account</h1>
                        <form>
                            <div class="form-group mb-3">
                                <label for="email">Username</label>
                                <input class="form-control" id="email" type="email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input class="form-control" id="password" type="password">
                            </div>
                            <!-- <a href="dashboard.php" class="btn btn-info" style="width:100%">Login</a></button> -->
                        </form>
                        <button type="button" onclick="window.location='{{ route('dashboard.create') }}'">Button</button>
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


<?php @include '../resources/views/menu/footer.blade.php';?>
</html>