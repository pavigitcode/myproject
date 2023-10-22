<?php

include 'function.php';

// Variables Declaration
$action             = $_POST['action'];
$action_obj         = (object) [
    "status"    => 0,
    "data"      => "",
    "error"     => "Action Not Performed"
];

$json_array         = "";
$sql                = "";

$main_screen        = "";
$section_name       = "";
$screen_name        = "";
$screen_folder_name = "";
$icon_name          = "";
$order_no           = "";
$user_actions       = "";
$is_active          = "";
$description        = "";
$unique_id          = "";
$prefix             = "";

$data               = "";
$msg                = "";
$error              = "";
$status             = "";
$test               = ""; // For Developer Testing Purpose

switch ($action) {
    
    
    case 'permission_ui':

        $main_screen_id         = $_POST['main_screen'];
        $user_type              = $_POST['user_type'];
        $department_name        = $_POST['department_name'];

        $perm_ui               = user_permission_ui($main_screen_id,$user_type,$department_name);

        // $section_name_options  = section_name('',$main_screen_id);

        // $section_name_options  = select_option($section_name_options,"Select the Screen Section");

        echo $perm_ui;
        
        break;

    default:
            
            break;
}

?>