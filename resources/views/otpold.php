<form method="post">
    @csrf
    <!-- <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Enter Your OTP</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div> -->
    <!-- <div>
                                <p>User Name : {{ $user->staff_name }}</p>
                                <p>Designation : {{ $user->staff_name }}</p>
                                <p>Division : {{ $user->staff_name }}</p>

                            </div> -->
    <div class="modal-body">
        <p style="text-align: center;font-weight: 600;font-size: 15px;">A Code Has been sent to *******598</p>
        <p>Your OTP is {{ $otp->otp }}</p>

        <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
            <input class="m-2 text-center form-control rounded otp-in otp__digit otp__field__6" type="text" id="first" maxlength=1 />
            <input class="m-2 text-center form-control rounded  otp-in otp__digit otp__field__6" type="text" id="second" maxlength="1" />
            <input class="m-2 text-center form-control rounded  otp-in otp__digit otp__field__6" type="text" id="third" maxlength="1" />
            <input class="m-2 text-center form-control rounded  otp-in otp__digit otp__field__6" type="text" id="fourth" maxlength="1" />

        </div>


    </div>
    <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
        <button class="btn btn-primary ml-2" type="button" onclick="window.location='{{ route('dashboard.create') }}'">Login</button>

        <!-- <a href="dashboard.php"><button class="btn btn-primary ml-2" type="button">Login</button></a> -->
    </div>
    <!-- <div class="form-group mb-3">
                                <label for="mobile_no">Phone Number</label>
                                <input type="tel" id="mobile_no" name="mobile_no" class="form-control" onkeypress="number_only(event);" minlength="10" maxlength="10" value="" required>

                            </div>


                            <button type="submit" class="btn btn-info waves-effect waves-light createupdate_btn"style="width:100%" data-toggle="modal" data-target="#exampleModal">Send OTP</button> -->

</form>