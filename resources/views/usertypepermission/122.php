<html>
@extends('menu/header')
@extends('menu/menu')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

@php

$is_btn_disable = "";

$unique_id = "";

$order_no = "";
$icon_name = "";
$is_active = 1;
$description = "";

$main_screen_options = main_screen();
$active_status_options= active_status($is_active);

$usertypes = user_type();
$division_creation = division_creation();

@endphp

<div class="main-content-wrap d-flex flex-column" style="margin-top:60px;">
    <div class="main-content">
        <div class="card text-left">
            <div class="card-body">
                <form class="was-validated" method="post" autocomplete="off">
                    <div class="row">
                        <div class="col-12">
                            <div class="row mb-3">
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label"> User
                                            Type</label>
                                        <div class="col-8 col-xl-9 mrg-btm">
                                            <select name="user_type" id="user_type" onchange="permui_val()" class="select2 form-control" required>
                                                <option value="">Select User Type</option>
                                                @foreach($usertypes as $usertype)
                                                <option value="{{ $usertype->unique_id }}">
                                                    {{ $usertype->user_type }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Main
                                            Screen</label>
                                        <div class="col-8 col-xl-9 mrg-btm">
                                            <select name="main_screen" id="main_screen" onchange="permui_val()" class="select2 form-control" required>
                                                <option value="">Select Main Screen</option>
                                                @foreach($main_screen_options as $main_screen)
                                                <option value="{{ $main_screen->unique_id }}">
                                                    {{ $main_screen->screen_main_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="row">
                                        <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Division
                                            Name</label>
                                        <div class="col-8 col-xl-9 mrg-btm">
                                            <select name="department_name" id="department_name" class="select2 form-control" required>
                                                <option value="">Select Division</option>
                                                @foreach($division_creation as $division)
                                                <option value="{{ $division->unique_id }}">
                                                    {{ $division->division_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-12" id="perm_ui"> -->

                    <!-- <div class="card-box"> -->
                    <!-- <input type="hidden" id="perm_ui" value=""> -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <div id="demodata">
                                <div>
                                <ul class = 'nav nav-pills navtab-bg nav-justified'>
                    <!-- <label>
                        <input type = "checkbox"
                    id = "selectall"/> All </label> -->

                            <?php 
                            foreach($value as $key => $values){

                            $name=$values->action_name;

                            ?>
                        <li class = 'nav-item'>

                        <!-- <div id = "checkboxlist" >
                        <input type = "checkbox"
                    name = "sample[]"/> -->
                   <?php echo $name;?>
                        <!-- </div>  -->
                    </li>
<?php }?>
                        </ul>
                                </div>

                        <div id="right">
                            <table id="empTable">
                                <tbody>
                                </tbody>
                            </table>

                        </div>
                    </div>

                    <br>
                    <div class="col-12">
                        <div class="form-group row ">
                            <div class="col-md-12" align="right">
                                <!-- Cancel,save and update Buttons -->
                                <a href="user_type_permission.php"><button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a>
                                <button type="button" class="btn btn-success waves-effect waves-light createupdate_btn  ">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@extends('menu/footer')

<script>
    $('#selectall').click(function() {
        $(this.form.elements).filter(':checkbox').prop('checked', this.checked);
    });

    function permui_val() {
        var user_type = $('#user_type').val();
        var main_screen = $('#main_screen').val();
        $.ajax({
            type: 'GET',
            url: "{{ route('getuidata') }}",
            data: {
                'user_type': user_type,
                'main_screen': main_screen
            },
            success: function(response) {
                createRows(response);
            }
            // $.each(response["_embedded"]["city:search-results"], function(index, element) {
        });

        // $('right').html(res);

        //  $('#right').append(html);

    }

    // Create table rows
    function createRows(response) {
        alert(response);
        console.log(response);
        var len = 0;
        $('#empTable tbody').empty(); // Empty <tbody>
        if (response['data'] != null) {
            len = response['data'].length;
        }
        // if (response['value'] != null) {
        //     len1 = response['value'].length;
        // }


        if (len > 0) {
            for (var i = 0; i < len; i++) {

                var screen_name = response['data'][i].screen_name;
                console.log(screen_name);


                var tr_str = "<tr>" +

                    "<td >" + screen_name + "</td>"
                "</tr>";

                $("#empTable tbody").append(tr_str);
            }
        } else {
            var tr_str = "<tr>" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#empTable tbody").append(tr_str);
        }
    }
</script>

</html>