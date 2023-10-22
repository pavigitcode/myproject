<html>
@extends('menu/header')
@extends('menu/menu')


<link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<link href="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js')}} ">


<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    #list {
        text-align: center;
        padding: 1px;
        width: 53px;
        margin-left: 130px;
    }

    #head {
        text-align: center;
        padding: 7.75px;
        width: 179px;
    }
</style>
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
        <div class="row">
            <div class="col-md-6">
                <div class="breadcrumb">
                    <h1 class="mr-2">User Type Permision</h1>
                    <ul>
                        <li><a href="#">Admin</a></li>
                        <li>User Type Permision</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card text-left">
            <div class="card-body">
                <form class="was-validated"  action="{{ route('usertypepermission.store') }}" method="post" autocomplete="off">
                    @csrf
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
                                            <select name="department_name" onchange="permui_val()" id="department_name" class="select2 form-control" required>
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
                    <div class="col-12" id="perm_ui">

                        <div class="card-box">

                        </div>

                    </div>



                    <br>
                    <div class="col-12">
                        <div class="form-group row ">
                            <div class="col-md-12" align="right">
                                <!-- Cancel,save and update Buttons -->
                                <a href="{{ URL::previous() }}"><button type="button" class="btn btn-danger waves-effect waves-light">Cancel</button></a>
                                <button type="submit" class="btn btn-success waves-effect waves-light createupdate_btn  ">Save</button>
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
    function check_all(class_name = "", this_obj = "") {

        if (this_obj.type == "button") {

            is_check = $(this_obj).val();

            if (is_check == "unchecked") {
                $('.' + class_name).each(function() {
                    $(this).prop('checked', true); // checks it
                });
                $(this_obj).attr("data-check", "checked");
                $(this_obj).val("checked");
            } else {

                $('.' + class_name).each(function() {
                    $(this).prop('checked', false); // checks it
                });
                $(this_obj).attr("data-check", "unchecked");
                $(this_obj).val("unchecked");
            }
        } else {
            if (this_obj.checked) {
                $('.' + class_name).each(function() {
                    $(this).prop('checked', true); // checks it
                });
            } else {
                $('.' + class_name).each(function() {
                    $(this).prop('checked', false); // Un Checks it
                });
            }
        }
    }

    function check_me(class_name = "") {
        var is_value = 1;

        if (class_name) {
            $('.allcheck-' + class_name).each(function() {
                if (!this.checked) {
                    is_value *= 0;
                }
            });

            if (is_value) {
                $("#all" + class_name).prop('checked', true);
            } else {
                $("#all" + class_name).prop('checked', false);
            }
        }
    }

    function permui_val() {
        var user_type = $('#user_type').val();
        var main_screen = $('#main_screen').val();
        var department_name = $('#department_name').val();

        $('#left').hide();
        // alert(user_type);
        // alert(main_screen);
        $.ajax({
            type: 'GET',
            url: "{{ route('getuidata') }}",
            data: {
                'user_type': user_type,
                'main_screen': main_screen,
                'department_name': department_name
            },
            success: function(data) {
                // alert(data);

                $('#perm_ui').html(data);
                // createRows(response);

            }
            // $.each(response["_embedded"]["city:search-results"], function(index, element) {
        });

        // $('right').html(res);

        //  $('#right').append(html);

    }

    // Create table rows
    function createRows(response) {

        var len = 0;
        $('#empTable tbody').empty(); // Empty <tbody>
        if (response['data'] != null) {
            len = response['data'].length;
        }
        $('#left').show();
        if (len > 0) {
            for (var i = 0; i < len; i++) {

                var user_screen_name = response['data'][i].user_screen_name;
                console.log(user_screen_name);


                var tr_str = "<tr>" +
                    "<td>" + user_screen_name + "</td>" + "<form><th id='head'>" + '<input type="checkbox" id="selectall" />' + "</th>" +
                    "<th id='head'>" + '<input type="checkbox" class="checkSingle" name="sample[]" />' + "</th>" +
                    "<th id='head'>" + '<input type="checkbox" class="checkSingle" name="sample[]" />' + "</th>" +
                    "<th id='head'>" + '<input type="checkbox"class="checkSingle" name="sample[]" />' + "</th>" +
                    "<th id='head'>" + '<input type="checkbox" class="checkSingle" name="sample[]" />' + "</th></form>"
                "</tr>";
                $("#selectall").change(function() {

                    if (this.checked) {
                        //     if($(".checkSingle1")){
                        //   $(".checkSingle").each(function(){
                        //     this.checked=true;
                        //   });
                        // }else if($(".checkSingle2")){
                        //   $(".checkSingle").each(function(){
                        //     this.checked=true;
                        //   });
                        // }else if($(".checkSingle3")){
                        //   $(".checkSingle").each(function(){
                        //     this.checked=true;
                        //   });
                        // }
                        $(".checkSingle").each(function() {
                            this.checked = true;
                        });
                    } else {
                        $(".checkSingle").each(function() {
                            this.checked = false;
                        })
                    }
                });
                // $('#selectall').click(function() { $(this.form.elements).filter(':checkbox').prop('checked', this.checked);
                // });
                $("#empTable tbody").append(tr_str);

            }
        } else {
            var tr_str = "<tr>" +
                "<td align='center' colspan='4'>No record found.</td>" +
                "</tr>";

            $("#empTable tbody").append(tr_str);
        }

    }
    // function check(){
    //     alert("hii")
    //     $(".checkSingle").each(function(){
    //     this.checked=true;
    //     });
    // }
    // $(document).ready(function() {

    // });
</script>
<script>
    //     $("#selectall").click(function(){

    //     if(this.checked){
    //       $(".checkSingle").each(function(){
    //         this.checked=true;
    //       });
    //     }else{
    //       $(".checkSingle").each(function(){
    //         this.checked=false;
    //       })
    //     }
    //   });
</script>

</html>
