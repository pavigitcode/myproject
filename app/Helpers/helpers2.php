
<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * Write code on Method
 *
 * @return response()
 */
if (!function_exists('convertYmdToMdy')) {
    function convertYmdToMdy($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
    }
}

/**
 * Write code on Method
 *
 * @return response()
 */
if (!function_exists('convertMdyToYmd')) {
    function convertMdyToYmd($date)
    {
        return Carbon::createFromFormat('m-d-Y', $date)->format('Y-m-d');
    }
}

//Acc Year
function acc_year()
{
    $acc_year = '';
    $curr_year = date("Y");

    $today = strtotime(date("d-m-Y"));
    $end_date = strtotime("31-03-" . $curr_year);
    $start_date = strtotime("01-04-" . $curr_year);

    if ($today >= $start_date) {
        $next_year = $curr_year + 1;
        $acc_year = $curr_year . "-" . $next_year;
    } else if ($today <= $end_date) {
        $previous_year = $curr_year - 1;
        $acc_year = $previous_year . "-" . $curr_year;
    }

    return $acc_year;
}
// Uniqui ID Geneartor
function unique_id($prefix = "")
{

    $unique_id = uniqid() . rand(10000, 99999);

    if ($prefix) {
        $unique_id = $prefix . $unique_id;
    }

    return $unique_id;
}

// Convert Original folder Name to Display Name
function disname($name = "")
{
    if ($name) {
        $name = explode("_", $name);
        $name = array_map("ucfirst", $name);
        $name = implode(" ", $name);

        return $name;
    } else {
        return "Empty Title";
    }
}


function btn_add($add_link = "")
{
    $final_str = '<a href="' . $add_link . '" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add New</a>';

    return $final_str;
}

function btn_cancel($list_link = "")
{
    $final_str = '<a href="' . $list_link . '"><button type="button" class="btn btn-danger  m-t-15 btn-rounded waves-effect waves-light float-right ml-2" >Cancel</button></a>';

    return $final_str;
}

function btn_createupdate($folder_name = "", $unique_id = "", $btn_text, $prefix = "", $suffix = "_cu", $custom_class = "")
{

    $final_str = '<button type="button" class="btn btn-primary m-t-15 waves-effect createupdate_btn" onclick="' . $folder_name . $suffix . '(\'' . $unique_id . '\')">' . $btn_text . '</button>';

    return $final_str;
}

function btn_update($folder_name = "", $unique_id = "", $prefix = "", $suffix = "")
{

    // $final_str = '<a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#exampleModal" data-unique_id = "'.$unique_id.'"  data-toggle="tooltip" title="Edit"><i
    //                           class="fas fa-pencil-alt"></i></a>';

    $final_str = '<a class="btn  btn-action mr-1 specl" href="index.php?file=' . $prefix . $folder_name . $suffix . '/model&unique_id=' . $unique_id . '"><i class="far fa-edit"></i></a>';


    return $final_str;
}

function btn_edit($folder_name = "", $unique_id = "")
{
    $final_str = '<button type="button" class="btn btn-primary btn-action mr-1" onclick="' . $folder_name . '_edit(\'' . $unique_id . '\')"><i class="fas fa-pencil-alt"></i></button>';

    $final_str = '<a href="#" class="btn btn-primary btn-action mr-1" onclick="' . $folder_name . '_edit(\'' . $unique_id . '\')"><i class="fas fa-pencil-alt"></i></a>';

    return $final_str;
}

function btn_delete($folder_name = "", $unique_id = "")
{

    $final_str = '<a class="btn btn-danger btn-action specl2" href="#" onclick="' . $folder_name . '_delete(\'' . $unique_id . '\')"><i class="far fa-trash-alt"></i></a>';

    return $final_str;
}

// Main Screen Function
function main_screen($unique_id = "")
{
    // global $pdo;

    // $table_name    = "user_screen_main";
    // $where         = [];
    // $table_columns = [
    //     "unique_id",
    //     "screen_main_name",
    //     "icon_name"
    // ];

    // $table_details = [
    //     $table_name,
    //     $table_columns
    // ];

    // $where     = [
    //     "is_active" => 1,
    //     "is_delete" => 0
    // ];

    // if ($unique_id) {

    //     $where              = [];
    //     $where["unique_id"] = $unique_id;
    // }

    // $order_by  = 'order_no ASC';

    $main_screens = DB::table('user_screen_main')->select("unique_id", "screen_main_name", "icon_name")->where(["is_active" => 1, "is_delete" => 0])->orderBy('order_no', 'ASC')->get();


    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($main_screens) {
        return $main_screens;
    } else {
        print_r($main_screens);
        return 0;
    }
}
function active_status($is_active_val = 1)
{
    $option_str = "";
    $is_active = "";
    $is_inactive = "";

    if ($is_active_val == 1) {
        $is_active = " selected = 'selected' ";
    } else {
        $is_inactive = " selected = 'selected' ";
    }

    $option_str = "<option value='1'" . $is_active . ">Active</option>";
    $option_str .= "<option value='0'" . $is_inactive . ">In Active</option>";

    return $option_str;
}

// ========================================mythili=============================================================
// Main Screen Function
function user_type($unique_id = "")
{


    $user_types = DB::table('user_type')->select("unique_id", "user_type")->where(["is_active" => 1, "is_delete" => 0])->orderBy('id', 'ASC')->get();


    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($user_types) {
        // print_r($user_types);
        return $user_types;
    } else {
        print_r($user_types);
        return 0;
    }
}
// =====================================mythili=====================================================
function division_creation($unique_id = "")
{

    $users = DB::table('division_creation')->select("unique_id", "division_name")->where(["is_active" => 1, "is_delete" => 0])->orderBy('id', 'ASC')->get();

    if ($users) {
        return $users;
    } else {
        print_r($users);
        return 0;
    }
}
// ========================================mythili=============================================================
// Main Screen Function
function screen_sections($unique_id = "")
{

    $screen_sections = DB::table('screen_sections')->select("unique_id", "screen_name")->where(["is_active" => 1, "is_delete" => 0])->orderBy('id', 'ASC')->get();


    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($screen_sections) {
        // print_r($screen_section);
        return $screen_sections;
    } else {
        print_r($screen_sections);
        return 0;
    }
}
// ========================================mythili=============================================================
// dashboard setting Function



function dashboard_settings_creation($unique_id = "")
{

    $dashboard_settings = DB::table('dashboard_settings_menu_creation')->select("unique_id", "settings_name")->where(["is_active" => 1, "is_delete" => 0])->orderBy('id', 'ASC')->get();


    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($dashboard_settings) {
        // print_r($screen_section);
        return $dashboard_settings;
    } else {
        print_r($dashboard_settings);
        return 0;
    }
}

function shift_type($shift_type = 1)
{
    $option_str = "";
    $shift_type = "";

    if ($shift_type == 1) {
        $day = " selected = 'selected' ";
    } else {
        $night = " selected = 'selected' ";
    }

    $option_str = "<option value='1'" . $day . ">Day</option>";
    $option_str .= "<option value='2'" . $night . ">Night</option>";

    return $option_str;
}

// hsn code select box by prabu
function hsn_code($unique_id = "")
{

    $hsn_code = DB::table('hsn_creation')->select("unique_id", "hsn_code")->where(["is_active" => 1, "is_delete" => 0])->orderBy('id', 'ASC')->get();


    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($hsn_code) {
        // print_r($screen_section);
        return $hsn_code;
    } else {
        print_r($hsn_code);
        return 0;
    }
}
// prabu end
function division_creations($unique_id = "")
{

    $division_creations = DB::table('division_creation')->select("unique_id", "division_name")->where(["is_active" => 1, "is_delete" => 0])->orderBy('id', 'ASC')->get();


    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($division_creations) {
        // print_r($screen_section);
        return $division_creations;
    } else {
        print_r($division_creations);
        return 0;
    }
}
// =============================mythili=============================================================
function designation_creations($unique_id = "")
{

    $designation_creations = DB::table('designation_creation')->select("unique_id", "designation_name")->where(["is_active" => 1, "is_delete" => 0])->orderBy('id', 'ASC')->get();


    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($designation_creations) {
        // print_r($screen_section);
        return $designation_creations;
    } else {
        print_r($designation_creations);
        return 0;
    }
}

function user_actions_value($unique_id = "")
{
    $user_action_value = DB::table('user_screen_actions')->select("unique_id", "action_name")->where(["is_active" => 1, "is_delete" => 0])->orderBy('id', 'ASC')->get();


    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($user_action_value) {
        // print_r($screen_section);
        return $user_action_value;
    } else {
        print_r($user_action_value);
        return 0;
    }
}

function section_name()
{
    $screen_sections = DB::table('user_screen_main')->select("unique_id", "screen_main_name")->where(["is_active" => 1, "is_delete" => 0])->get();


    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($screen_sections) {
        // print_r($screen_section);
        return $screen_sections;
    } else {
        print_r($screen_sections);
        return 0;
    }
}

function user_screen($section_unique_id = "")
{
    $screen_sections = DB::table('screen_sections')->select("unique_id", "screen_name")->where(["main_screen_unique_id", '==', $section_unique_id, "is_active" => 1, "is_delete" => 0])->orderBy('id', 'ASC')->get();


    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($screen_sections) {
        // print_r($screen_section);
        return $screen_sections;
    } else {
        print_r($screen_sections);
        return 0;
    }
}

function user_actions($section_unique_id = "")
{
    $screen_sections = DB::table('user_screen_actions')->select("unique_id", "action_name")->where(["is_active" => 1, "is_delete" => 0])->orderBy('id', 'ASC')->get();


    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($screen_sections) {
        // print_r($screen_section);
        return $screen_sections;
    } else {
        print_r($screen_sections);
        return 0;
    }
}



// permission start
// User Action list Array
function user_action_list($user_action_array = "", $selected = "")
{
    $all_checked = "";

    if ($selected) {
        $selected = explode(",", $selected);
        $user_action_array_count = count($user_action_array);
        $selected_count = count($selected);

        if ($user_action_array_count == $selected_count) {
            $all_checked = " checked ";
        }
    }

    $return_str = '<li>
                        <input type="checkbox" id="dis_check" disabled>
                        <label for="dis_check">No Options</label>
                    </li>';

    if ($user_action_array) {

        $return_str = '<li>
                            <input type="checkbox" id="all" ' . $all_checked . '>
                            <label for="all">All</label>
                        </li>';

        foreach ($user_action_array as $key => $value) {
            $checked = "";

            if (is_array($selected)) {
                if (in_array($value->unique_id, $selected)) {
                    $checked = "checked";
                }
            }
            // print_r($action_name);
            $return_str .= '<li>
                                <input type="checkbox" id="' . $value->unique_id . '" ' . $checked . ' name="user_actions[]" value="' . $value->unique_id . '" class="action_check">
                                <label for="' . $value->unique_id . '">' . disname($value->action_name) . '</label>
                            </li>';
        }
    }

    return $return_str;
}
// permission start
function user_actions_edit($section_unique_id = "")
{
    $screen_sections = DB::table('user_screen_actions')->select("unique_id", "action_name")->where(["is_active" => 1, "is_delete" => 0])->orderBy('id', 'ASC')->get();


    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($screen_sections) {
        // print_r($screen_section);
        return $screen_sections;
    } else {
        print_r($screen_sections);
        return 0;
    }
}



// permission start
// User Action list Array
function user_action_list_edit($user_action_array = "", $selected = "")
{
    $all_checked = "";

    if ($selected) {
        $selected = explode(",", $selected);
        $user_action_array_count = count($user_action_array);
        $selected_count = count($selected);

        if ($user_action_array_count == $selected_count) {
            $all_checked = " checked ";
        }
    }

    $return_str = '<li>
                        <input type="checkbox" id="dis_check" disabled>
                        <label for="dis_check">No Options</label>
                    </li>';

    if ($user_action_array) {

        $return_str = '<li>
                            <input type="checkbox" id="all" ' . $all_checked . '>
                            <label for="all">All</label>
                        </li>';

        foreach ($user_action_array as $key => $value) {
            $checked = "";

            if (is_array($selected)) {
                if (in_array($value->unique_id, $selected)) {
                    $checked = "checked";
                }
            }
            // print_r($action_name);
            $return_str .= '<li>
                                <input type="checkbox" id="' . $value->unique_id . '" ' . $checked . ' name="user_actions[]" value="' . $value->unique_id . '" class="action_check">
                                <label for="' . $value->unique_id . '">' . disname($value->action_name) . '</label>
                            </li>';
        }
    }

    return $return_str;
}
// Permission UI Create Function

function user_screen_check($section_unique_id = "")
{

    $screen_sections = DB::table('user_screen')->select("unique_id", "user_screen_name", "actions")->where([["main_screen_unique_id", '=', $section_unique_id], ["is_delete", "=", 0]])->orderBy('id', 'ASC')->get();
    // dd($screen_sections);

    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($screen_sections) {
        // print_r($screen_section);
        return $screen_sections;
    } else {
        print_r($screen_sections);
        return 0;
    }
}
function user_actions_check($section_unique_id = "")
{
    $user_actions = DB::table('user_screen_actions')->select("unique_id", "action_name")->where(["is_active" => 1, "is_delete" => 0])->orderBy('id', 'ASC')->get();


    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($user_actions) {
        // print_r($screen_section);
        return $user_actions;
    } else {
        print_r($user_actions);
        return 0;
    }
}
function section_name_check($main_screen_id = "")
{
    // dd($main_screen_id);

    $screen_sections = DB::table('user_screen_main')->select("unique_id", "screen_main_name")->where([["unique_id", '=', $main_screen_id], ["is_delete", '=', 0]])->orderBy('id', 'ASC')->get();
    // $screen_sections = DB::table('user_screen_main')->select("unique_id","screen_main_name")->where('unique_id','=',$main_screen_unique_id)->get();
    // dd($screen_sections);

    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($screen_sections) {
        // print_r($screen_section);
        return $screen_sections;
    } else {
        print_r($screen_sections);
        return 0;
    }
}

function user_permission_ui($main_screen_id = "", $user_type = "", $department_name = "")
{

    $total_ui = '';

    if ($main_screen_id) {
        // dd($main_screen_id);
        $screen_sections = section_name_check($main_screen_id);

        // Section Tab UI starts Here

        $total_ui .= '<ul class="nav nav-pills navtab-bg nav-justified">';

        $show = 1;
        $show1 = 1;

        foreach ($screen_sections as $section_value) {

            // dd($section_value);
            $active = "";

            if ($show++ == 1) {
                $active = " active ";
            }

            $section_name = $section_value->screen_main_name;
            $section_unique_id = $section_value->unique_id;

            $total_ui .= '<li class="nav-item">
                            <a href="#sec' . $section_unique_id . '" data-bs-toggle="tab" aria-expanded="true" class="nav-link ' . $active . '">
                                ' . $section_name . '
                            </a>
                        </li>';
        }

        $total_ui .= '</ul>';

        // Section Tab UI Ends Here

        $total_ui .= '<div class="tab-content">';
        // Section Tab Content UI Starts Here
        foreach ($screen_sections as $section_value) {

            $active = "";

            if ($show1++ == 1) {
                $active = " show active ";
            }

            $section_name = $section_value->screen_main_name;
            $section_unique_id = $section_value->unique_id;


            // Tab DIV Start
            $total_ui .= '<div class="tab-pane ' . $active . '" id="sec' . $section_unique_id . '">';

            // Get Section Based Screens
            $user_screens = user_screen_check($section_unique_id);
            $user_actions = user_actions_check();

            // UI Table Start
            $total_ui .= '<div class="row">
                                        <div class="col-12">';

            $total_ui .= '<table class="user_permission_datatable table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>';

            $total_ui .= '<th>#</th>';
            $total_ui .= '<th>Screen</th>';
            $total_ui .= '<th>';
            // $total_ui           .= '<span class="toggle-button toggle-button--tuuli">
            //                             <input id="all'.$section_unique_id.'" type="checkbox">
            //                             <label for="all'.$section_unique_id.'"></label>
            //                             <div class="toggle-button__icon"></div>
            //                         </span>';
            $total_ui .= '<button onclick="check_all(\'all' . $section_unique_id . '\',this)" type="button" data-id = "all' . $section_unique_id . '" data-check="checked" class="btn btn-sm btn-soft-info btn-rounded waves-effect waves-light" value="unchecked">All</button>';
            $total_ui .= '</th>';

            foreach ($user_actions as $action_value) {

                $action_name = $action_value->action_name;

                $total_ui .= '<th><button onclick="check_all(\'' . $action_name . $section_unique_id . '\',this)" data-check="unchecked" type="button" data-id = "' . $action_name . $section_unique_id . '" class="btn btn-sm btn-soft-info btn-rounded waves-effect waves-light" value="unchecked">' . $action_name . '</button></th>';
            }

            $total_ui .= '    </tr>
                                    </thead>';

            $total_ui .= '<tbody>';

            $s_no = 1;

            foreach ($user_screens as $screen_value) {

                $all_checked = "";

                $user_per_arr = "";



                $screen_name = $screen_value->user_screen_name;
                $screen_unique_id = $screen_value->unique_id;
                $screen_actions = explode(",", $screen_value->actions);
                // $screen_actions     = $screen_value->actions;


                // if (($user_type)&&($department_name)) {
                //     $screen_perm = get_permissions($user_type,"","","",$screen_unique_id,$department_name);
                //     // print_r($screen_perm);
                //     if (empty($screen_perm)) {
                //         $screen_perm = [];
                //     } else {
                //         $screen_perm = explode(",",$screen_perm[0]["action_unique_id"]);

                //         if (count($screen_actions) == count($screen_perm)) {
                //             $all_checked = " checked ";
                //         }
                //     }

                // }

                $total_ui .= '<tr>';
                $total_ui .= '<td>' . $s_no . '</td>';
                $total_ui .= '<td>' . $screen_name . '</td>';
                $total_ui .= '<td>
                                        <span class="toggle-button toggle-button--tuuli">
                                            <input class = "all' . $section_unique_id . '" onclick="check_all(\'screen' . $screen_unique_id . '\',this)" name="checkall" id="checkall' . $screen_unique_id . '" value="' . $screen_unique_id . '" type="checkbox" ' . $all_checked . '>
                                            <label for="all' . $screen_unique_id . '"></label>
                                            <div class="toggle-button__icon"></div>
                                        </span>
                                    </td>';

                foreach ($user_actions as $action_value) {

                    $checked = "";
                    $action_unique_id = $action_value->unique_id;
                    $total_ui .= '<td>';

                    // if (($user_type)&&($department_name)) {
                    //     if(in_array($action_unique_id,$screen_perm)) {
                    //         $checked            = " checked ";
                    //     }
                    // }

                    if (in_array($action_unique_id, $screen_actions)) {

                        $total_ui .= '<span class="toggle-button toggle-button--tuuli">

                                            <input onclick="check_me(\'' . $screen_unique_id . '\',this)" class="all-checkbox ' . $action_name . $section_unique_id . ' all' . $section_unique_id . ' screen' . $screen_unique_id . ' allcheck-' . $screen_unique_id . '" data-main="' . $main_screen_id . '" data-section="' . $section_unique_id . '" data-screen="' . $screen_unique_id . '" data-action="' . $action_unique_id . '" id="' . $action_unique_id . '" ' . $checked . ' name="checkboxvalue[]" value="' . $screen_unique_id . '-' . $action_unique_id . '" type="checkbox">

                                            <label for="' . $screen_unique_id . "-" . $action_unique_id . '"></label>
                                            <div class="toggle-button__icon"></div>
                                        </span>';
                    } else {
                        $total_ui .= '<span class="table_empty_dot"></span>';
                    }

                    $total_ui .= '</td>';
                }

                $total_ui .= '</tr>';

                $s_no++;
                // return $screen_unique_id;
            }

            $total_ui .= '</tbody>';
            $total_ui .= '</table>';
            // UI Table End
            $total_ui .= '    </div>
                                    </div>';

            // Tab DIV End
            $total_ui .= '</div>';
        }
        $total_ui .= '</div>';

        // Section Tab Content UI Ends Here
    }

    return $total_ui;
}


function get_permissions($user_type = "", $main_screen = null, $screen_section = null, $screens = null, $screen_actions = null, $department_name = "")
{


    if ($user_type) {

        global $pdo;

        $all_permissions = [];
        $main_permissions = [];
        $section_permissions = [];
        $screen_permissions = [];
        $action_permissions = [];

        $permission_table = "user_screen_permission";

        $columns = [
            "user_type",
            "department_name",
            "main_screen_unique_id",
            "section_unique_id",
            "screen_unique_id",
            "GROUP_CONCAT(action_unique_id) AS action_unique_id"
        ];

        $where = [
            "is_delete" => 0,
            "is_active" => 1,
            "user_type" => $user_type,
            "department_name" => $department_name
        ];

        $group_by = "screen_unique_id";


        if ($main_screen) {

            $columns = [
                "GROUP_CONCAT(main_screen_unique_id) AS main_screen_unique_id"
            ];

            $group_by = "";
        }

        if ($screen_section) {
            $columns = [
                "GROUP_CONCAT(section_unique_id) AS section_unique_id"
            ];

            $group_by = "";
        }

        if ($screens) {
            $columns = [
                "GROUP_CONCAT(screen_unique_id) AS screen_unique_id"
            ];

            $group_by = "";
        }

        if ($screen_actions) {
            $columns = [
                "GROUP_CONCAT(action_unique_id) AS action_unique_id"
            ];

            $group_by = "screen_unique_id";

            $where['screen_unique_id'] = $screen_actions;
        }



        $table_details = [
            $permission_table,
            $columns
        ];

        $result_values = $pdo->select($table_details, $where, null, null, [], "", $group_by);

        if ($result_values->status) {
            // print_r($result_values->data);
            // echo "<br />";
            // print_r($result_values);
            return $result_values->data;
        } else {
            print_r($result_values);
        }
    }
}

// permission end



// User Permission store start

// function insertMultiple(){

// }

// User Permission end
// update ui start
function user_screen_check_update($section_unique_id = "")
{
    $user_actions = DB::table('user_screen_permission')->select("screen_unique_id", $section_unique_id)->where(["is_active" => 1, "is_delete" => 0])->orderBy('id', 'ASC')->get();


    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($user_actions) {
        // print_r($screen_section);
        return $user_actions;
    } else {
        print_r($user_actions);
        return 0;
    }
}
function user_permission_ui_update($action_unique ="",$main_screen_id = "", $user_type = "", $department_name = "", $screen_unique_id_count = "", $action_unique_id_count = "", $action_unique_ids = "")
{

    // dd($action_unique);
    $total_ui = '';

    if ($main_screen_id) {
        // dd($main_screen_id);
        $screen_sections = section_name_check($main_screen_id);

        // Section Tab UI starts Here

        $total_ui .= '<ul class="nav nav-pills navtab-bg nav-justified">';

        $show = 1;
        $show1 = 1;

        foreach ($screen_sections as $section_value) {

            // dd($section_value);
            $active = "";

            if ($show++ == 1) {
                $active = " active ";
            }

            $section_name = $section_value->screen_main_name;
            $section_unique_id = $section_value->unique_id;

            $total_ui .= '<li class="nav-item">
                            <a href="#sec' . $section_unique_id . '" data-bs-toggle="tab" aria-expanded="true" class="nav-link ' . $active . '">
                                ' . $section_name . '
                            </a>
                        </li>';
        }

        $total_ui .= '</ul>';

        // Section Tab UI Ends Here

        $total_ui .= '<div class="tab-content">';
        // Section Tab Content UI Starts Here
        foreach ($screen_sections as $section_value) {

            $active = "";

            if ($show1++ == 1) {
                $active = " show active ";
            }

            $section_name = $section_value->screen_main_name;
            $section_unique_id = $section_value->unique_id;


            // Tab DIV Start
            $total_ui .= '<div class="tab-pane ' . $active . '" id="sec' . $section_unique_id . '">';

            // Get Section Based Screens
            $user_screens = user_screen_check($section_unique_id);
            $user_actions = user_actions_check();

            // UI Table Start
            $total_ui .= '<div class="row">
                                        <div class="col-12">';

            $total_ui .= '<table class="user_permission_datatable table dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>';

            $total_ui .= '<th>#</th>';
            $total_ui .= '<th>Screen</th>';
            $total_ui .= '<th>';
            // $total_ui           .= '<span class="toggle-button toggle-button--tuuli">
            //                             <input id="all'.$section_unique_id.'" type="checkbox">
            //                             <label for="all'.$section_unique_id.'"></label>
            //                             <div class="toggle-button__icon"></div>
            //                         </span>';
            $total_ui .= '<button onclick="check_all(\'all' . $section_unique_id . '\',this)" type="button" data-id = "all' . $section_unique_id . '" data-check="checked" class="btn btn-sm btn-soft-info btn-rounded waves-effect waves-light" value="unchecked">All</button>';
            $total_ui .= '</th>';

            foreach ($user_actions as $action_value) {

                $action_name = $action_value->action_name;

                $total_ui .= '<th><button onclick="check_all(\'' . $action_name . $section_unique_id . '\',this)" data-check="unchecked" type="button" data-id = "' . $action_name . $section_unique_id . '" class="btn btn-sm btn-soft-info btn-rounded waves-effect waves-light" value="unchecked">' . $action_name . '</button></th>';
            }

            $total_ui .= '    </tr>
                                    </thead>';

            $total_ui .= '<tbody>';

            $s_no = 1;

            foreach ($user_screens as $screen_value) {

                $all_checked = "";

                $user_per_arr = "";



                $screen_name = $screen_value->user_screen_name;
                $screen_unique_id = $screen_value->unique_id;
                $screen_actions = explode(",", $screen_value->actions);
                // $screen_actions     = $screen_value->actions;


                if (($user_type)&&($department_name)) {
                    // $screen_perm = DB::table('user_screen_permission')
                    // ->select(DB::raw('group_concat(action_unique_id,main_screen_unique_id,screen_unique_id ) as action_unique_id'))
                    // ->where('screen_unique_id', $screen_actions)
                    // ->groupBy('screen_unique_id')
                    // ->get();

                    // // $screen_perm = get_permission_data($user_type,);

                    // dd($screen_perm);

                    $screen_perm = get_permissions1($user_type,"","","",$screen_unique_id,$department_name);

                    // dd($screen_perm,'hi');

                    // print_r($screen_perm);
                    if (empty($screen_perm)) {
                        $screen_perm = [];
                    } else {

                        // for($per = 0; $per < count($screen_perm); $per++){
                        foreach($screen_perm as $screen_per) {
                        $screen_perm = explode(",",$screen_per->action_unique_id);

                        if (count($screen_actions) == count($screen_perm)) {
                            $all_checked = " checked ";
                        }
                    }
                    }

                }

                $total_ui .= '<tr>';
                $total_ui .= '<td>' . $s_no . '</td>';
                $total_ui .= '<td>' . $screen_name . '</td>';

                $total_ui .= '<td>
                                        <span class="toggle-button toggle-button--tuuli">
                                            <input class = "all' . $section_unique_id . '" onclick="check_all(\'screen' . $screen_unique_id . '\',this)" name="checkall" id="checkall' . $screen_unique_id . '" value="' . $screen_unique_id . '" type="checkbox" ' . $all_checked . '>
                                            <label for="all' . $screen_unique_id . '"></label>
                                            <div class="toggle-button__icon"></div>
                                        </span>
                                    </td>';

                foreach ($user_actions as $action_value) {

                    $checked = "";
                    $action_unique_id = $action_value->unique_id;
                    $total_ui .= '<td>';

                    // if (($user_type)&&($department_name)) {
                    //     if(in_array($action_unique_id,$screen_perm)) {
                    //         $checked            = " checked ";
                    //     }
                    // }

                    if (in_array($action_unique_id, $screen_actions)) {
                        $dataofexplode = $screen_unique_id_count;
                        $dataOfActionId = $action_unique;

                        // dd($dataOfActionId);
                        for ($i = 0; $i < count($dataofexplode); $i++) {

                            // dd(count($dataofexplode));
                            if ($dataofexplode[$i]->screen_unique_id == $screen_unique_id) {

                                for ($j = 0; $j < count($dataOfActionId); $j++) {
                                    // dd($dataOfActionId[$j]->action_unique_id);
                                    if ($dataofexplode[$i]->screen_unique_id == $screen_unique_id && $dataOfActionId[$j]->action_unique_id == $action_unique_id) {
                                        // dd('hi');

                                        $total_ui .= '<span class="toggle-button toggle-button--tuuli">

                                            <input onclick="check_me(\'' . $screen_unique_id . '\',this)" class="all-checkbox ' . $action_name . $section_unique_id . ' all' . $section_unique_id . ' screen' . $screen_unique_id . ' allcheck-' . $screen_unique_id . '" data-main="' . $main_screen_id . '" data-section="' . $section_unique_id . '" data-screen="' . $screen_unique_id . '" data-action="' . $action_unique_id . '" id="' . $action_unique_id . '" ' . $checked . ' name="checkboxvalue[]" value="' . $screen_unique_id . '-' . $action_unique_id . '" type="checkbox" checked>

                                            <label for="' . $screen_unique_id . "-" . $action_unique_id . '"></label>
                                            <div class="toggle-button__icon"></div>
                                        </span>';
                                        // }
                                    }
                                    // else {
                                    //     $total_ui .= '<span class="toggle-button toggle-button--tuuli">

                                    //     <input onclick="check_me(\'' . $screen_unique_id . '\',this)" class="all-checkbox ' . $action_name . $section_unique_id . ' all' . $section_unique_id . ' screen' . $screen_unique_id . ' allcheck-' . $screen_unique_id . '" data-main="' . $main_screen_id . '" data-section="' . $section_unique_id . '" data-screen="' . $screen_unique_id . '" data-action="' . $action_unique_id . '" id="' . $action_unique_id . '"  name="checkboxvalue[]"  value="' . $screen_unique_id . '"-"' . $action_unique_id . '"  type="checkbox"  >

                                    // <label for="' . $screen_unique_id . "-" . $action_unique_id . '"></label>
                                    //     <div class="toggle-button__icon"></div>
                                    // </span>';
                                    // }
                                }
                            }
                            else {
                                // if ($dataofexplode[$i]->action_unique_id != $action_unique_id) {
                                //     // dd('hi');

                                $total_ui .= '<span class="toggle-button toggle-button--tuuli">

                                            <input onclick="check_me(\'' . $screen_unique_id . '\',this)" class="all-checkbox ' . $action_name . $section_unique_id . ' all' . $section_unique_id . ' screen' . $screen_unique_id . ' allcheck-' . $screen_unique_id . '" data-main="' . $main_screen_id . '" data-section="' . $section_unique_id . '" data-screen="' . $screen_unique_id . '" data-action="' . $action_unique_id . '" id="' . $action_unique_id . '" ' . $checked . ' name="checkboxvalue[]" value="' . $screen_unique_id . '-' . $action_unique_id . '" type="checkbox">

                                            <label for="' . $screen_unique_id . "-" . $action_unique_id . '"></label>
                                            <div class="toggle-button__icon"></div>
                                        </span>';
                                // }
                                // } else {
                                //     $total_ui .= '<span class="toggle-button toggle-button--tuuli">

                                //         <input onclick="check_me(\'' . $screen_unique_id . '\',this)" class="all-checkbox ' . $action_name . $section_unique_id . ' all' . $section_unique_id . ' screen' . $screen_unique_id . ' allcheck-' . $screen_unique_id . '" data-main="' . $main_screen_id . '" data-section="' . $section_unique_id . '" data-screen="' . $screen_unique_id . '" data-action="' . $action_unique_id . '" id="' . $action_unique_id . '"  name="checkboxvalue[]"  value="' . $screen_unique_id . '"-"' . $action_unique_id . '"  type="checkbox"  >

                                //     <label for="' . $screen_unique_id . "-" . $action_unique_id . '"></label>
                                //         <div class="toggle-button__icon"></div>
                                //     </span>';
                                // }
                            }
                            // }
                        }

                        // for ($i = 0; $i < count($dataofexplode); $i++) {

                        //     if ($dataofexplode[$i]->screen_unique_id == $screen_unique_id) {
                        //         // dd($dataofexplode[$i]->screen_unique_id);
                        //         // dd($dataofexplode[$i]->action_unique_id);
                        //         for ($j = 0; $j < count($dataOfActionId); $j++) {
                        //             // dd($dataOfActionId[$j]->action_unique_id);
                        //             if ($dataOfActionId[$j]->action_unique_id == $action_unique_id) {
                        //                 // dd('hi');

                        //                 $total_ui .= '<span class="toggle-button toggle-button--tuuli">

                        //                 <input onclick="check_me(\'' . $screen_unique_id . '\',this)" class="all-checkbox ' . $action_name . $section_unique_id . ' all' . $section_unique_id . ' screen' . $screen_unique_id . ' allcheck-' . $screen_unique_id . '" data-main="' . $main_screen_id . '" data-section="' . $section_unique_id . '" data-screen="' . $screen_unique_id . '" data-action="' . $action_unique_id . '" id="' . $action_unique_id . '" ' . $checked . ' name="checkboxvalue[]" value="' . $screen_unique_id . '-' . $action_unique_id . '" type="checkbox" checked>

                        //                 <label for="' . $screen_unique_id . "-" . $action_unique_id . '"></label>
                        //                 <div class="toggle-button__icon"></div>
                        //             </span>';
                        //                 // }
                        //             }
                        //             // else {
                        //             //     $total_ui .= '<span class="toggle-button toggle-button--tuuli">

                        //             //     <input onclick="check_me(\'' . $screen_unique_id . '\',this)" class="all-checkbox ' . $action_name . $section_unique_id . ' all' . $section_unique_id . ' screen' . $screen_unique_id . ' allcheck-' . $screen_unique_id . '" data-main="' . $main_screen_id . '" data-section="' . $section_unique_id . '" data-screen="' . $screen_unique_id . '" data-action="' . $action_unique_id . '" id="' . $action_unique_id . '"  name="checkboxvalue[]"  value="' . $screen_unique_id . '"-"' . $action_unique_id . '"  type="checkbox"  >

                        //             // <label for="' . $screen_unique_id . "-" . $action_unique_id . '"></label>
                        //             //     <div class="toggle-button__icon"></div>
                        //             // </span>';
                        //             // }
                        //         }
                        //     } else {
                        //         // if ($dataofexplode[$i]->action_unique_id != $action_unique_id) {
                        //         //     // dd('hi');

                        //         $total_ui .= '<span class="toggle-button toggle-button--tuuli">

                        //                 <input onclick="check_me(\'' . $screen_unique_id . '\',this)" class="all-checkbox ' . $action_name . $section_unique_id . ' all' . $section_unique_id . ' screen' . $screen_unique_id . ' allcheck-' . $screen_unique_id . '" data-main="' . $main_screen_id . '" data-section="' . $section_unique_id . '" data-screen="' . $screen_unique_id . '" data-action="' . $action_unique_id . '" id="' . $action_unique_id . '" ' . $checked . ' name="checkboxvalue[]" value="' . $screen_unique_id . '-' . $action_unique_id . '" type="checkbox">

                        //                 <label for="' . $screen_unique_id . "-" . $action_unique_id . '"></label>
                        //                 <div class="toggle-button__icon"></div>
                        //             </span>';
                        //         // }
                        //         // } else {
                        //         //     $total_ui .= '<span class="toggle-button toggle-button--tuuli">

                        //         //         <input onclick="check_me(\'' . $screen_unique_id . '\',this)" class="all-checkbox ' . $action_name . $section_unique_id . ' all' . $section_unique_id . ' screen' . $screen_unique_id . ' allcheck-' . $screen_unique_id . '" data-main="' . $main_screen_id . '" data-section="' . $section_unique_id . '" data-screen="' . $screen_unique_id . '" data-action="' . $action_unique_id . '" id="' . $action_unique_id . '"  name="checkboxvalue[]"  value="' . $screen_unique_id . '"-"' . $action_unique_id . '"  type="checkbox"  >

                        //         //     <label for="' . $screen_unique_id . "-" . $action_unique_id . '"></label>
                        //         //         <div class="toggle-button__icon"></div>
                        //         //     </span>';
                        //         // }
                        //     }
                        // }
                    } else {
                        $total_ui .= '<span class="table_empty_dot"></span>';
                    }
                    $total_ui .= '</td>';
                }

                $total_ui .= '</tr>';

                $s_no++;
                // return $screen_unique_id;
            }

            $total_ui .= '</tbody>';
            $total_ui .= '</table>';
            // UI Table End
            $total_ui .= '    </div>
                                    </div>';

            // Tab DIV End
            $total_ui .= '</div>';
        }
        $total_ui .= '</div>';

        // Section Tab Content UI Ends Here
    }

    return $total_ui;



    // $total_ui = '';

    // if ($main_screen_id) {
    //     // dd($main_screen_id);
    //     $screen_sections = section_name_check($main_screen_id);

    //     // Section Tab UI starts Here

    //     $total_ui .= '<ul class="nav nav-pills navtab-bg nav-justified">';

    //     $show = 1;
    //     $show1 = 1;

    //     foreach ($screen_sections as $section_value) {

    //         // dd($section_value);
    //         $active = "";

    //         if ($show++ == 1) {
    //             $active = " active ";
    //         }

    //         $section_name = $section_value->screen_main_name;
    //         $section_unique_id = $section_value->unique_id;

    //         $total_ui .= '<li class="nav-item">
    //                         <a href="#sec' . $section_unique_id . '" data-bs-toggle="tab" aria-expanded="true" class="nav-link ' . $active . '">
    //                             ' . $section_name . '
    //                         </a>
    //                     </li>';
    //     }

    //     $total_ui .= '</ul>';

    //     // Section Tab UI Ends Here

    //     $total_ui .= '<div class="tab-content">';
    //     // Section Tab Content UI Starts Here
    //     foreach ($screen_sections as $section_value) {

    //         $active = "";

    //         if ($show1++ == 1) {
    //             $active = " show active ";
    //         }

    //         $section_name = $section_value->screen_main_name;
    //         $section_unique_id = $section_value->unique_id;


    //         // Tab DIV Start
    //         $total_ui .= '<div class="tab-pane ' . $active . '" id="sec' . $section_unique_id . '">';

    //         // Get Section Based Screens
    //         $user_screens = user_screen_check($section_unique_id);
    //         $user_actions = user_actions_check();

    //         // UI Table Start
    //         $total_ui .= '<div class="row">
    //                                     <div class="col-12">';

    //         $total_ui .= '<table class="user_permission_datatable table dt-responsive nowrap w-100">
    //                                     <thead>
    //                                         <tr>';

    //         $total_ui .= '<th>#</th>';
    //         $total_ui .= '<th>Screen</th>';
    //         $total_ui .= '<th>';
    //         // $total_ui           .= '<span class="toggle-button toggle-button--tuuli">
    //         //                             <input id="all'.$section_unique_id.'" type="checkbox">
    //         //                             <label for="all'.$section_unique_id.'"></label>
    //         //                             <div class="toggle-button__icon"></div>
    //         //                         </span>';
    //         $total_ui .= '<button onclick="check_all(\'all' . $section_unique_id . '\',this)" type="button" data-id = "all' . $section_unique_id . '" data-check="checked" class="btn btn-sm btn-soft-info btn-rounded waves-effect waves-light" value="unchecked">All</button>';
    //         $total_ui .= '</th>';

    //         foreach ($user_actions as $action_value) {

    //             $action_name = $action_value->action_name;

    //             $total_ui .= '<th><button onclick="check_all(\'' . $action_name . $section_unique_id . '\',this)" data-check="unchecked" type="button" data-id = "' . $action_name . $section_unique_id . '" class="btn btn-sm btn-soft-info btn-rounded waves-effect waves-light" value="unchecked">' . $action_name . '</button></th>';
    //         }

    //         $total_ui .= '    </tr>
    //                                 </thead>';

    //         $total_ui .= '<tbody>';

    //         $s_no = 1;

    //         foreach ($user_screens as $screen_value) {

    //             $all_checked = "";

    //             $user_per_arr = "";



    //             $screen_name = $screen_value->user_screen_name;
    //             $screen_unique_id = $screen_value->unique_id;
    //             $screen_actions = explode(",", $screen_value->actions);
    //             // $screen_actions     = $screen_value->actions;


    //             // if (($user_type)&&($department_name)) {
    //             //     $screen_perm = get_permissions1($user_type,"","","",$screen_unique_id,$department_name);
    //             //     // dd($screen_perm);
    //             //     // // print_r($screen_perm);
    //             //     // if (empty($screen_perm)) {
    //             //     //     $screen_perm = [];
    //             //     // } else {
    //             //     //     $screen_perm = explode(",",$screen_perm[0]["action_unique_id"]);

    //             //     //     if (count($screen_actions) == count($screen_perm)) {
    //             //     //         $all_checked = " checked ";
    //             //     //     }
    //             //     // }

    //             // }

    //             $total_ui .= '<tr>';
    //             $total_ui .= '<td>' . $s_no . '</td>';
    //             $total_ui .= '<td>' . $screen_name . '</td>';




    //             $total_ui .= '<td>
    //                                     <span class="toggle-button toggle-button--tuuli">
    //                                         <input class = "all' . $section_unique_id . '" onclick="check_all(\'screen' . $screen_unique_id . '\',this)" name="checkall" id="checkall' . $screen_unique_id . '" value="' . $screen_unique_id . '" type="checkbox">
    //                                         <label for="all' . $screen_unique_id . '"></label>
    //                                         <div class="toggle-button__icon"></div>
    //                                     </span>
    //                                 </td>';


    //             foreach ($user_actions as $action_value) {

    //                 $checked = "";
    //                 $action_unique_id = $action_value->unique_id;
    //                 $total_ui .= '<td>';

    //                 // if (($user_type)&&($department_name)) {
    //                 //     if(in_array($action_unique_id,$screen_perm)) {
    //                 //         $checked            = " checked ";
    //                 //     }
    //                 // }

    //                 if (in_array($action_unique_id, $screen_actions)) {

    //                     // if($action_unique_id_count == 6){
    //                     // $total_ui   .= '<span class="toggle-button toggle-button--tuuli">

    //                     //                     <input onclick="check_me(\''.$screen_unique_id.'\',this)" class="all-checkbox '.$action_name.$section_unique_id.' all'.$section_unique_id.' screen'.$screen_unique_id.' allcheck-'.$screen_unique_id.'" data-main="'.$main_screen_id.'" data-section="'.$section_unique_id.'" data-screen="'.$screen_unique_id.'" data-action="'.$action_unique_id.'" id="'.$action_unique_id.'" name="checkboxvalue[]" value="'.$screen_unique_id.'"-"'.$action_unique_id.'" type="checkbox" >

    //                     //                     <label for="'.$screen_unique_id."-".$action_unique_id.'"></label>
    //                     //                     <div class="toggle-button__icon"></div>
    //                     //                 </span>';

    //                     //             }else{
    //                     //                 $total_ui   .= '<span class="toggle-button toggle-button--tuuli">

    //                     //                 <input onclick="check_me(\''.$screen_unique_id.'\',this)" class="all-checkbox '.$action_name.$section_unique_id.' all'.$section_unique_id.' screen'.$screen_unique_id.' allcheck-'.$screen_unique_id.'" data-main="'.$main_screen_id.'" data-section="'.$section_unique_id.'" data-screen="'.$screen_unique_id.'" data-action="'.$action_unique_id.'" id="'.$action_unique_id.'"  name="checkboxvalue[]" value=if($action_unique_ids == "5f8807ff00bf726601" || $action_unique_ids == "5f88082b25ec031952" || $action_unique_ids == "5f88083fd50a344823"){ echo "'.$screen_unique_id.'"-"'.$action_unique_id.' '.$checked.';}else{ echo "'.$screen_unique_id.'"-"'.$action_unique_id.' }" type="checkbox"  >

    //                     //                 <label for="'.$screen_unique_id."-".$action_unique_id.'"></label>
    //                     //                 <div class="toggle-button__icon"></div>
    //                     //             </span>';
    //                     //             }
    //                     // dd($action_unique_ids);
    //                     // if($screen_unique_id_count){
    //                     //  dd($screen_unique_id_count);
    //                     // echo $screen_unique_id_count;
    //                     // dd();
    //                     $dataofexplode = $screen_unique_id_count;
    //                     // dd($dataofexplode);
    //                     // dd(count($dataofexplode));

    //                     for ($i = 0; $i < count($dataofexplode); $i++) {
    //                         // dd($dataofexplode[$i]);

    //                         // dd($screen_unique_id_count);
    //                         // foreach ($screen_unique_id_count as $demo) {
    //                         if ($dataofexplode[$i]->screen_unique_id == $screen_unique_id) {
    //                             $total_ui .= '<span class="toggle-button toggle-button--tuuli">

    //                             <input onclick="check_me(\'' . $screen_unique_id . '\',this)" class="all-checkbox ' . $action_name . $section_unique_id . ' all' . $section_unique_id . ' screen' . $screen_unique_id . ' allcheck-' . $screen_unique_id . '" data-main="' . $main_screen_id . '" data-section="' . $section_unique_id . '" data-screen="' . $screen_unique_id . '" data-action="' . $action_unique_id . '" id="' . $action_unique_id . '"  name="checkboxvalue[]"  checked value="' . $screen_unique_id . '"-"' . $action_unique_id . '"  type="checkbox"  >

    //                             <label for="' . $screen_unique_id . "-" . $action_unique_id . '"></label>
    //                             <div class="toggle-button__icon"></div>
    //                         </span>';
    //                         }
    //                         //     }
    //                         // }
    //                         // }else {
    //                         //         $total_ui .= '<span class="toggle-button toggle-button--tuuli">

    //                         //         <input onclick="check_me(\'' . $screen_unique_id . '\',this)" class="all-checkbox ' . $action_name . $section_unique_id . ' all' . $section_unique_id . ' screen' . $screen_unique_id . ' allcheck-' . $screen_unique_id . '" data-main="' . $main_screen_id . '" data-section="' . $section_unique_id . '" data-screen="' . $screen_unique_id . '" data-action="' . $action_unique_id . '" id="' . $action_unique_id . '"  name="checkboxvalue[]"  value="' . $screen_unique_id . '"-"' . $action_unique_id . '"  type="checkbox"  >

    //                         //         <label for="' . $screen_unique_id . "-" . $action_unique_id . '"></label>
    //                         //         <div class="toggle-button__icon"></div>
    //                         //     </span>';
    //                         //     }

    //                         //   @endif

    //                         // }else{
    //                         //     $total_ui   .= '<span class="toggle-button toggle-button--tuuli">

    //                         //         <input onclick="check_me(\''.$screen_unique_id.'\',this)" class="all-checkbox '.$action_name.$section_unique_id.' all'.$section_unique_id.' screen'.$screen_unique_id.' allcheck-'.$screen_unique_id.'" data-main="'.$main_screen_id.'" data-section="'.$section_unique_id.'" data-screen="'.$screen_unique_id.'" data-action="'.$action_unique_id.'" id="'.$action_unique_id.'"  name="checkboxvalue[]" value="'.$screen_unique_id.'"-"'.$action_unique_id.'"  type="checkbox"  >

    //                         //         <label for="'.$screen_unique_id."-".$action_unique_id.'"></label>
    //                         //         <div class="toggle-button__icon"></div>
    //                         //     </span>';
    //                         // }
    //                         // }

    //                     }
    //                 } else {
    //                     $total_ui .= '<span class="table_empty_dot"></span>';
    //                 }

    //                 $total_ui .= '</td>';
    //             }

    //             $total_ui .= '</tr>';

    //             $s_no++;
    //             // return $screen_unique_id;
    //         }

    //         $total_ui .= '</tbody>';
    //         $total_ui .= '</table>';
    //         // UI Table End
    //         $total_ui .= '    </div>
    //                                 </div>';

    //         // Tab DIV End
    //         $total_ui .= '</div>';
    //     }
    //     $total_ui .= '</div>';

    //     // Section Tab Content UI Ends Here
    // }

    // return $total_ui;
}


function get_permissions1($user_type = "", $main_screen = null, $screen_section = null, $screens = null, $screen_actions = null, $department_name = "")
{

    if ($user_type) {

        // global $pdo;

        $all_permissions = [];
        $main_permissions = [];
        $section_permissions = [];
        $screen_permissions = [];
        $action_permissions = [];

        $result_values = DB::table('user_screen_permission')
                    ->select(DB::raw('group_concat(action_unique_id,main_screen_unique_id,screen_unique_id ) as action_unique_id'))
                    ->where('screen_unique_id', $screen_actions)
                    ->groupBy('screen_unique_id')
                    ->get();

        // $result_values = DB::table('user_screen_permission')->select(DB::raw('group_concat(action_unique_id) AS action_unique_id'))->where('is_delete', 0)->groupBy('screen_unique_id')->get();

        // dd($result_values);

        // return $result_values->action_unique_id;
        // $permission_table = DB::table('user_screen_permission');
        // if ($screens) {

        //         $columns                = [
        //             "GROUP_CONCAT(screen_unique_id) AS screen_unique_id"
        //         ];

        //         $group_by               = "";
        //     }

        if ($screen_actions) {

            $columns = [
                "GROUP_CONCAT(action_unique_id) AS action_unique_id"
            ];

            $group_by = "screen_unique_id";

            $where['screen_unique_id'] = $screen_actions;
        }

        // $table_details      = [
        // $permission_table,
        // $columns
        //     ];

        // $result_values  = DB::table('user_screen_permission')->select(GROUP_CONCAT(action_unique_id) AS action_unique_id)->where('screen_unique_id' , '63b50d531f60c30911')->groupBy('screen_unique_id')->get();
        // $result_values = DB::table('user_screen_permission')
        //     ->select(DB::raw('group_concat(action_unique_id, ) as action_unique_id'))
        //     ->where('screen_unique_id', $screen_actions)
        //     ->groupBy('screen_unique_id')
        //     ->get();
        return $result_values;
        // dd($result_values);






        // if ($main_screen) {

        //     $columns                = [
        //         "GROUP_CONCAT(main_screen_unique_id) AS main_screen_unique_id"
        //     ];

        //     $group_by               = "";
        // }

        // if ($screen_section) {
        //     $columns                = [
        //         "GROUP_CONCAT(section_unique_id) AS section_unique_id"
        //     ];

        //     $group_by               = "";
        // }

        // if ($screens) {
        //     $columns                = [
        //         "GROUP_CONCAT(screen_unique_id) AS screen_unique_id"
        //     ];

        //     $group_by               = "";
        // }

        // if ($screen_actions) {
        //     $columns                = [
        //         "GROUP_CONCAT(action_unique_id) AS action_unique_id"
        //     ];

        //     $group_by               = "screen_unique_id";

        //     $where['screen_unique_id']              = $screen_actions;
        // }



        // $table_details      = [
        //     $permission_table,
        //     $columns
        // ];

        // $result_values  = $pdo->select($table_details,$where,null,null,[],"",$group_by);

        // if ($result_values) {
        //     // print_r($result_values->data);
        //     // echo "<br />";
        //     // print_r($result_values);
        //     return $result_values;
        // } else {
        //     print_r($result_values);
        // }
    }
}
// ========================================mythili=============================================================
// Main Screen Function
function roving_squad($unique_id = "")
{

    $roving_squads = DB::table('roving_squad')->select("unique_id", "roving_squad_number")->where(["is_delete" => 0])->orderBy('id', 'ASC')->get();
    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($roving_squads) {
        // print_r($roving_squads);
        return $roving_squads;
    } else {
        print_r($roving_squads);
        return 0;
    }
}
// =====================================mythili=====================================================

// ========================================mythili=============================================================
// Main Screen Function
function officer_registration($unique_id = "")
{


    $rovingofficer_registrations = DB::table('officer_registration')->select("unique_id", "officer_name","mobile_no")->where(["is_active" => 1,"is_delete" => 0])->orderBy('id', 'ASC')->get();


    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($rovingofficer_registrations) {
        // print_r($rovingofficer_registrations);
        return $rovingofficer_registrations;
    } else {
        print_r($rovingofficer_registrations);
        return 0;
    }
}

// ========================================mythili=============================================================
// Main Screen Function
function offence_section($unique_id = "")
{

    $offence_sections = DB::table('offence_section')->select("unique_id", "offence_name","offence_section")->where(["is_active" => 1,"is_delete" => 0])->orderBy('id', 'ASC')->get();


    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($offence_sections) {
        // print_r($offence_sections);
        return $offence_sections;
    } else {
        print_r($offence_sections);
        return 0;
    }
}
// ========================================mythili=============================================================
// Main Screen Function
function consignor_creation($unique_id = "")
{
    $consignor_creations = DB::table('consignor_creation')->select("unique_id", "consignee_circle")->where(["is_active" => 1,"is_delete" => 0])->orderBy('id', 'ASC')->get();
    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

    if ($consignor_creations) {
        // print_r($consignor_creations);
        return $consignor_creations;
    } else {
        print_r($consignor_creations);
        return 0;
    }
}
// =====================================mythili=====================================================

  // Main Screen Function
function user_main_screen() {


    $user_main_screen_value = DB::table('user_screen_main')->select("unique_id", "screen_main_name","icon_name")->where(["is_active" => 1,"is_delete" => 0])->orderBy('order_no', 'ASC')->get();
    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);
    // dd($user_main_screen_value);
    if ($user_main_screen_value) {
        // print_r($consignor_creations);
        return $user_main_screen_value;
    } else {
        print_r($user_main_screen_value);
        return 0;
    }
    }
// user_screen
function array_implode ($value_arr = "") {

    $return_arr = [];

    if (is_array($value_arr)) {

        foreach ($value_arr as $arr_key => $arr_value) {

            $return_arr[] = array_values($arr_value)[0];

        }

    }

    return $return_arr;
    // die();
}
function user_screen_names($section_unique_id)
{

    // print_r($section_unique_id);
    // die();

    $screen_sections = DB::table('user_screen')->select("unique_id", "user_screen_name", "folder_name", "icon_name", "main_screen_unique_id","actions","image","heading")->where("main_screen_unique_id", '=', $section_unique_id)->where("is_delete", '=', 0)->orderBy('id', 'ASC')->get();

    // print_r($screen_sections);die();

    // $main_screens = $pdo->select($table_details, $where,'','',$order_by);
    // dd($screen_sections);
    if ($screen_sections) {
        // print_r($screen_section);
        return $screen_sections;
    } else {
        print_r($screen_sections);
        return 0;
    }
}
// menu main Screen
function menu_permission ($user_type_id = "",$div_name) {
    // print_r($div_name);
    $return_arr = [
        "main_screen_unique_id"  => "",
        "screen_unique_id"       => ""
    ];

    if ($user_type_id) {

        $screen_sections = DB::table('user_screen_permission')->where(["user_type"=>$user_type_id,"department_name" => $div_name])->select(DB::raw('group_concat(screen_unique_id) AS screen_unique_id'))->orderBy('id', 'ASC')->get();

        // die($screen_sections);
        // dd($screen_sections);
        if ($screen_sections) {

                // foreach($screen_sections as $screen_sections_values){
            // $return_arr["screen_unique_id"]  = array_implode($screen_sections);

        // }
            return $screen_sections;
        } else {
            print_r($screen_sections);
            return 0;
        }

        // // $main_screen_unique_id = DB::table('user_screen_permission')->select(DB::raw('group_concat(main_screen_unique_id) as main_screen_unique_id'))->where("user_type", '=', $user_type_id)->orderBy('id', 'ASC')->get();
        // dd("hii".$main_screen_unique_id);

        // if ($main_screen_unique_id) {
        //     // print_r($main_screen_unique_id);
        //     // foreach($screen_sections as $screen_sections_values){

        // $return_arr["main_screen_unique_id"]  = array_implode($main_screen_unique_id);

        // return $main_screen_unique_id;
        // } else {
        //     print_r($main_screen_unique_id);
        //     return 0;
        // }





        // $screen_result     = $pdo->select($table_details,$select_where,"","","","",$group_by);



        // $section_columns = [
        //     "GROUP_CONCAT(DISTINCT  section_unique_id) AS sections"
        // ];

        // $table_details = [
        //     $table_user_permission,
        //     $section_columns
        // ];

        // $group_by          = " section_unique_id ";

        // $section_result     = $pdo->select($table_details,$select_where,"","","","",$group_by);

        // if ($section_result->status) {
        //     $section_result_data     = $section_result->data;

        //     $return_arr["sections"]  = array_implode($section_result_data);
        // } else {
        //     print_r($section_result);
        //     echo "Section Permission Error";
        //     exit;
        // }



        // $table_details = [
        //     $table_user_permission,
        //     $main_screen_columns
        // ];

        // $group_by               = " main_screen_unique_id ";

        // $main_screen_result     = $pdo->select($table_details,$select_where,"","","","",$group_by);


    }
    // dd($screen_sections);
    return $return_arr;
}

function menu_permission_main ($user_type_id = "",$div_name) {
    // print_r($div_name);
    // die();
    $return_arr = [
        "main_screen_unique_id"  => "",
        "screen_unique_id"       => ""
    ];

    if ($user_type_id) {

        // $screen_sections = DB::table('user_screen_permission')->select(DB::raw('group_concat(screen_unique_id) AS screen_unique_id'))->where("user_type", '=', $user_type_id)->orderBy('id', 'ASC')->get();


        // // dd($screen_sections);
        // if ($screen_sections) {

        //         // foreach($screen_sections as $screen_sections_values){
        //     $return_arr["screen_unique_id"]  = array_implode($screen_sections);

        // // }
        //     return $screen_sections;
        // } else {
        //     print_r($screen_sections);
        //     return 0;
        // }

        $main_screen_unique_id = DB::table('user_screen_permission')->where(["user_type"=>$user_type_id,"department_name" => $div_name])->select(DB::raw('group_concat(main_screen_unique_id) as main_screen_unique_id'))->orderBy('id', 'ASC')->get();
        // dd($main_screen_unique_id);
            //     foreach($demo as $key =>$value){
            // print_r($value);
            // return $main_screen_unique_id[] = array($value);
        if ($main_screen_unique_id) {
            // print_r($main_screen_unique_id);
            // foreach ($main_screen_unique_id as $demo) {

            //     $return_arr[]= [$demo];
            // }
            // print_r($return_arr);
            // die();
            // die();
            // print_r($return_arr["main_screen_unique_id"]);
            // die();
        return $main_screen_unique_id;

        } else {
            print_r($main_screen_unique_id);
            return 0;
        }
    // }
 // $screen_result     = $pdo->select($table_details,$select_where,"","","","",$group_by);



        // $section_columns = [
        //     "GROUP_CONCAT(DISTINCT  section_unique_id) AS sections"
        // ];

        // $table_details = [
        //     $table_user_permission,
        //     $section_columns
        // ];

        // $group_by          = " section_unique_id ";

        // $section_result     = $pdo->select($table_details,$select_where,"","","","",$group_by);

        // if ($section_result->status) {
        //     $section_result_data     = $section_result->data;

        //     $return_arr["sections"]  = array_implode($section_result_data);
        // } else {
        //     print_r($section_result);
        //     echo "Section Permission Error";
        //     exit;
        // }



        // $table_details = [
        //     $table_user_permission,
        //     $main_screen_columns
        // ];

        // $group_by               = " main_screen_unique_id ";

        // $main_screen_result     = $pdo->select($table_details,$select_where,"","","","",$group_by);


    }
    // dd($screen_sections);
    return $return_arr;
}
function division_name_value ($div_name) {




    $division_name_val = DB::table('division_creation')->where("unique_id",'=',$div_name)->select('division_name')->orderBy('id', 'ASC')->get();

       if ($division_name_val) {

       return $division_name_val;

       } else {
           print_r($division_name_val);
           return 0;
       }

   // dd($screen_sections);
   // return $return_arr;
}
function ewb_no_group ($vehicle_datas) {
    // print_r($vehicle_datas);

    // $ewb_nos = vehicle_detail_view::where('vehno', $request->veh_number)->select('ewb_no')->groupBy('ewb_no')->get();

        $ewb_no = DB::table('view_vehicle_eway_detail')->where("vehno",'=',$vehicle_datas)->select(DB::raw('group_concat(ewb_no) AS ewb_no'))->get();


        if ($ewb_no) {


            return $ewb_no;
        } else {
            print_r($ewb_no);
            return 0;
        }





}

?>

