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

<!--  Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                <!-- <a href="dashboard.php"><button class="btn btn-primary ml-2" type="button">Login</button></a> -->
            </div>
        </div>
    </div>

</div>


@extends('menu.footer')

</html>