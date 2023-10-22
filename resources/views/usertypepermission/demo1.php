
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
function acc_year() {
  $acc_year   = '';
  $curr_year  = date("Y");
  
  $today      = strtotime(date("d-m-Y")); 
  $end_date   = strtotime("31-03-".$curr_year);
  $start_date = strtotime("01-04-".$curr_year);
  
  if ($today>=$start_date) {
      $next_year      = $curr_year + 1;
      $acc_year       = $curr_year."-".$next_year;
  }   
  else if ($today<=$end_date) {
      $previous_year  = $curr_year - 1;
      $acc_year       = $previous_year."-".$curr_year; 
  }

  return $acc_year;
  
}
// Uniqui ID Geneartor
function unique_id($prefix = "") {

  $unique_id = uniqid().rand(10000,99999);

  if($prefix) {
      $unique_id = $prefix.$unique_id;
  }

  return $unique_id;
}

// Convert Original folder Name to Display Name
function disname($name = "")
{
  if ($name) {
      $name = explode("_",$name);
      $name = array_map("ucfirst",$name);
      $name = implode(" ",$name);

      return $name;
  } else {
      return "Empty Title";
  }
}


function btn_add ($add_link = "") {
  $final_str = '<a href="'.$add_link.'" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add New</a>';

   return $final_str;
}

function btn_cancel ($list_link = "") {
   $final_str = '<a href="'.$list_link.'"><button type="button" class="btn btn-danger  m-t-15 btn-rounded waves-effect waves-light float-right ml-2" >Cancel</button></a>';

   return $final_str;
}

function btn_createupdate($folder_name = "", $unique_id = "",$btn_text ,$prefix = "", $suffix = "_cu", $custom_class = "") {
   
   $final_str = '<button type="button" class="btn btn-primary m-t-15 waves-effect createupdate_btn" onclick="'.$folder_name.$suffix.'(\''.$unique_id.'\')">'.$btn_text.'</button>';

   return $final_str;
}

function btn_update($folder_name = "",$unique_id = "", $prefix = "",$suffix = "") {
   
   // $final_str = '<a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#exampleModal" data-unique_id = "'.$unique_id.'"  data-toggle="tooltip" title="Edit"><i
   //                           class="fas fa-pencil-alt"></i></a>';
  
  $final_str = '<a class="btn  btn-action mr-1 specl" href="index.php?file='.$prefix.$folder_name.$suffix.'/model&unique_id='.$unique_id.'"><i class="far fa-edit"></i></a>';

   
   return $final_str;
}

function btn_edit($folder_name = "",$unique_id = "") {
   $final_str = '<button type="button" class="btn btn-primary btn-action mr-1" onclick="'.$folder_name.'_edit(\''.$unique_id.'\')"><i class="fas fa-pencil-alt"></i></button>';

   $final_str = '<a href="#" class="btn btn-primary btn-action mr-1" onclick="'.$folder_name.'_edit(\''.$unique_id.'\')"><i class="fas fa-pencil-alt"></i></a>';

   return $final_str;
}

function btn_delete($folder_name = "",$unique_id = "") {
  
   $final_str = '<a class="btn btn-danger btn-action specl2" href="#" onclick="'.$folder_name.'_delete(\''.$unique_id.'\')"><i class="far fa-trash-alt"></i></a>';

   return $final_str;
}

// Main Screen Function
function main_screen($unique_id = "") {
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

  $main_screens = DB::table('user_screen_main')->select("unique_id","screen_main_name","icon_name")->where(["is_active" => 1,"is_delete" => 0])->orderBy('order_no','ASC')->get();


  // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

  if ($main_screens) {
      return $main_screens;
  } else {
      print_r($main_screens);
      return 0;
  }

  
}
function active_status($is_active_val = 1) {
  $option_str    = "";
  $is_active     = "";
  $is_inactive   = "";

  if ($is_active_val == 1) {
      $is_active     = " selected = 'selected' ";
  } else {
      $is_inactive   = " selected = 'selected' ";
  }
   
  $option_str     =  "<option value='1'".$is_active.">Active</option>";
  $option_str     .=  "<option value='0'".$is_inactive.">In Active</option>";

  return $option_str;
}

// ========================================mythili=============================================================
// Main Screen Function
function user_type($unique_id = "") {

  
  $user_types = DB::table('user_type')->select("unique_id","user_type")->where(["is_active" => 1,"is_delete" => 0])->orderBy('id','ASC')->get();


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
function division_creation($unique_id = "") {

  $users = DB::table('division_creation')->select("unique_id","division_name")->where(["is_active" => 1,"is_delete" => 0])->orderBy('id','ASC')->get();

  if ($users) {
      return $users;
  } else {
      print_r($users);
      return 0;
  }

}
// ========================================mythili=============================================================
// Main Screen Function
function screen_sections($unique_id = "") {
  
  $screen_sections = DB::table('screen_sections')->select("unique_id","screen_name")->where(["is_active" => 1,"is_delete" => 0])->orderBy('id','ASC')->get();


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



function dashboard_settings_creation($unique_id = "") {
  
  $dashboard_settings = DB::table('dashboard_settings_menu_creation')->select("unique_id","settings_name")->where(["is_active" => 1,"is_delete" => 0])->orderBy('id','ASC')->get();


  // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

  if ($dashboard_settings) {
     // print_r($screen_section);
      return $dashboard_settings;
  } else {
      print_r($dashboard_settings);
      return 0;
  }
  
}

function shift_type($shift_type = 1) {
  $option_str    = "";
  $shift_type     = "";

  if ($shift_type == 1) {
      $day     = " selected = 'selected' ";
  } else {
      $night   = " selected = 'selected' ";
  }
   
  $option_str     =  "<option value='1'".$day.">Day</option>";
  $option_str     .=  "<option value='2'".$night.">Night</option>";

  return $option_str;
}

function division_creations($unique_id = "") {
  
  $division_creations = DB::table('division_creation')->select("unique_id","division_name")->where(["is_active" => 1,"is_delete" => 0])->orderBy('id','ASC')->get();


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
function designation_creations($unique_id = "") {
  
  $designation_creations = DB::table('designation_creation')->select("unique_id","designation_name")->where(["is_active" => 1,"is_delete" => 0])->orderBy('id','ASC')->get();


  // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

  if ($designation_creations) {
     // print_r($screen_section);
      return $designation_creations;
  } else {
      print_r($designation_creations);
      return 0;
  }
  
}

function user_actions_value($unique_id = "") {
  $user_action_value = DB::table('user_screen_actions')->select("unique_id","action_name")->where(["is_active" => 1,"is_delete" => 0])->orderBy('id','ASC')->get();


  // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

  if ($user_action_value) {
     // print_r($screen_section);
      return $user_action_value;
  } else {
      print_r($user_action_value);
      return 0;
  }
}

function section_name(){
  $screen_sections = DB::table('user_screen_main')->select("unique_id","screen_main_name")->where(["is_active" => 1,"is_delete" => 0])->get();


  // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

  if ($screen_sections) {
     // print_r($screen_section);
      return $screen_sections;
  } else {
      print_r($screen_sections);
      return 0;
  }
}

function user_screen($section_unique_id = ""){
  $screen_sections = DB::table('screen_sections')->select("unique_id","screen_name")->where(["main_screen_unique_id",'==',$section_unique_id,"is_active" => 1,"is_delete" => 0])->orderBy('id','ASC')->get();


  // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

  if ($screen_sections) {
     // print_r($screen_section);
      return $screen_sections;
  } else {
      print_r($screen_sections);
      return 0;
  }
}

function user_actions($section_unique_id = ""){
  $screen_sections = DB::table('user_screen_actions')->select("unique_id","action_name")->where(["is_active" => 1,"is_delete" => 0])->orderBy('id','ASC')->get();


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
function user_action_list($user_action_array = "",$selected = "") {
  $all_checked                = "";

  if ($selected) {
      $selected   = explode(",",$selected);
      $user_action_array_count    = count($user_action_array);
      $selected_count             = count($selected);

      if ($user_action_array_count == $selected_count) {
          $all_checked        = " checked ";
      }
  }

  $return_str =   '<li>
                      <input type="checkbox" id="dis_check" disabled>
                      <label for="dis_check">No Options</label>
                  </li>';

  if ($user_action_array) {

      $return_str = '<li>
                          <input type="checkbox" id="all" '.$all_checked.'>
                          <label for="all">All</label>
                      </li>';

      foreach ($user_action_array as $key => $value) {
          $checked    = "";

          if (is_array($selected)) {
              if (in_array($value->unique_id,$selected)) {
                  $checked = "checked";
              }
          }
          // print_r($action_name);
          $return_str .= '<li>
                              <input type="checkbox" id="'.$value->unique_id.'" '.$checked.' name="user_actions[]" value="'.$value->unique_id.'" class="action_check">
                              <label for="'.$value->unique_id.'">'.disname($value->action_name).'</label>
                          </li>';
      }
  }

  return $return_str;
}
// permission start
function user_actions_edit($section_unique_id = ""){
  $screen_sections = DB::table('user_screen_actions')->select("unique_id","action_name")->where(["is_active" => 1,"is_delete" => 0])->orderBy('id','ASC')->get();


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
function user_action_list_edit($user_action_array = "",$selected = "") {
  $all_checked                = "";

  if ($selected) {
      $selected   = explode(",",$selected);
      $user_action_array_count    = count($user_action_array);
      $selected_count             = count($selected);

      if ($user_action_array_count == $selected_count) {
          $all_checked        = " checked ";
      }
  }

  $return_str =   '<li>
                      <input type="checkbox" id="dis_check" disabled>
                      <label for="dis_check">No Options</label>
                  </li>';

  if ($user_action_array) {

      $return_str = '<li>
                          <input type="checkbox" id="all" '.$all_checked.'>
                          <label for="all">All</label>
                      </li>';

      foreach ($user_action_array as $key => $value) {
          $checked    = "";

          if (is_array($selected)) {
              if (in_array($value->unique_id,$selected)) {
                  $checked = "checked";
              }
          }
          // print_r($action_name);
          $return_str .= '<li>
                              <input type="checkbox" id="'.$value->unique_id.'" '.$checked.' name="user_actions[]" value="'.$value->unique_id.'" class="action_check">
                              <label for="'.$value->unique_id.'">'.disname($value->action_name).'</label>
                          </li>';
      }
  }

  return $return_str;
}
// Permission UI Create Function

function user_screen_check($section_unique_id = ""){
  
  $screen_sections = DB::table('user_screen')->select("unique_id","user_screen_name","actions")->where([["main_screen_unique_id",'=',$section_unique_id],["is_delete","=",0]])->orderBy('id','ASC')->get();
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
function user_actions_check($section_unique_id = ""){
  $user_actions = DB::table('user_screen_actions')->select("unique_id","action_name")->where(["is_active" => 1,"is_delete" => 0])->orderBy('id','ASC')->get();


  // $main_screens = $pdo->select($table_details, $where,'','',$order_by);

  if ($user_actions) {
     // print_r($screen_section);
      return $user_actions;
  } else {
      print_r($user_actions);
      return 0;
  }
}
function section_name_check($main_screen_id = ""){
  // dd($main_screen_id);
  
  $screen_sections = DB::table('user_screen_main')->select("unique_id","screen_main_name")->where([["unique_id",'=',$main_screen_id],["is_delete",'=',0]])->orderBy('id','ASC')->get();
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

function user_permission_ui($main_screen_id = "",$user_type="",$department_name="") {

  $total_ui = '';

  if ($main_screen_id) {
      // dd($main_screen_id);
       $screen_sections = section_name_check($main_screen_id);

      // Section Tab UI starts Here

      $total_ui .= '<ul class="nav nav-pills navtab-bg nav-justified">';

      $show                 = 1;
      $show1                 = 1;
      
      foreach ($screen_sections as $section_value) {

          // dd($section_value);
          $active              = "";

          if ($show++ == 1) {          
              $active          = " active ";
          }

          $section_name        = $section_value->screen_main_name;
          $section_unique_id   = $section_value->unique_id;

          $total_ui .= '<li class="nav-item">
                          <a href="#sec'.$section_unique_id.'" data-bs-toggle="tab" aria-expanded="true" class="nav-link '.$active.'">
                              '.$section_name.'
                          </a>
                      </li>';
      }

      $total_ui .= '</ul>';

      // Section Tab UI Ends Here

      $total_ui            .= '<div class="tab-content">';
      // Section Tab Content UI Starts Here
      foreach ($screen_sections as $section_value) {

          $active              = "";
          
          if ($show1++ == 1) {          
              $active          = " show active ";
          }

          $section_name        = $section_value->screen_main_name; 
          $section_unique_id   = $section_value->unique_id;
          

          // Tab DIV Start
          $total_ui            .= '<div class="tab-pane '.$active.'" id="sec'.$section_unique_id.'">';

          // Get Section Based Screens
          $user_screens       = user_screen_check($section_unique_id);
          $user_actions       = user_actions_check();

          // UI Table Start
          $total_ui           .= '<div class="row">
                                      <div class="col-12">';
          
          $total_ui           .= '<table class="user_permission_datatable table dt-responsive nowrap w-100">
                                      <thead>
                                          <tr>';

          $total_ui           .= '<th>#</th>';
          $total_ui           .= '<th>Screen</th>';
          $total_ui           .= '<th>';
          // $total_ui           .= '<span class="toggle-button toggle-button--tuuli">
          //                             <input id="all'.$section_unique_id.'" type="checkbox">
          //                             <label for="all'.$section_unique_id.'"></label>
          //                             <div class="toggle-button__icon"></div>
          //                         </span>';
          $total_ui           .= '<button onclick="check_all(\'all'.$section_unique_id.'\',this)" type="button" data-id = "all'.$section_unique_id.'" data-check="checked" class="btn btn-sm btn-soft-info btn-rounded waves-effect waves-light" value="unchecked">All</button>';
          $total_ui           .= '</th>';

          foreach ($user_actions as $action_value) {

              $action_name    = $action_value->action_name;

              $total_ui       .= '<th><button onclick="check_all(\''.$action_name.$section_unique_id.'\',this)" data-check="unchecked" type="button" data-id = "'.$action_name.$section_unique_id.'" class="btn btn-sm btn-soft-info btn-rounded waves-effect waves-light" value="unchecked">'.$action_name.'</button></th>';

          }

          $total_ui           .= '    </tr>
                                  </thead>';

          $total_ui           .= '<tbody>';

          $s_no               = 1;

          foreach ($user_screens as $screen_value) {

              $all_checked        = "";

              $user_per_arr       = "";

              
              
              $screen_name        = $screen_value->user_screen_name;
              $screen_unique_id   = $screen_value->unique_id;
              $screen_actions     = explode(",",$screen_value->actions);
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

              $total_ui       .= '<tr>';
              $total_ui       .= '<td>'.$s_no.'</td>';
              $total_ui       .= '<td>'.$screen_name.'</td>';
              $total_ui       .= '<td>
                                      <span class="toggle-button toggle-button--tuuli">
                                          <input class = "all'.$section_unique_id.'" onclick="check_all(\'screen'.$screen_unique_id.'\',this)" name="checkall" id="all'.$screen_unique_id.'" type="checkbox" '.$all_checked.'>
                                          <label for="all'.$screen_unique_id.'"></label>
                                          <div class="toggle-button__icon"></div>
                                      </span>
                                  </td>';

              foreach ($user_actions as $action_value) {

                  $checked            = "";

                  
                  $action_unique_id   = $action_value->unique_id;
                  $total_ui       .= '<td>';
                  
                  // if (($user_type)&&($department_name)) {
                  //     if(in_array($action_unique_id,$screen_perm)) {
                  //         $checked            = " checked ";
                  //     }
                  // }

                  if (in_array($action_unique_id,$screen_actions)) {

                      $total_ui   .= '<span class="toggle-button toggle-button--tuuli">

                                          <input onclick="check_me(\''.$screen_unique_id.'\',this)" class="all-checkbox '.$action_name.$section_unique_id.' all'.$section_unique_id.' screen'.$screen_unique_id.' allcheck-'.$screen_unique_id.'" data-main="'.$main_screen_id.'" data-section="'.$section_unique_id.'" data-screen="'.$screen_unique_id.'" data-action="'.$action_unique_id.'" name="checkboxvalue" value="'.$screen_unique_id."-".$action_unique_id.'"  id="'.$screen_unique_id."-".$action_unique_id.'" type="checkbox" '.$checked.'>

                                          <label for="'.$screen_unique_id."-".$action_unique_id.'"></label>
                                          <div class="toggle-button__icon"></div>
                                      </span>';

                  } else {
                      $total_ui   .= '<span class="table_empty_dot"></span>';
                  }

                  $total_ui       .= '</td>';
  
              }

              $total_ui       .= '</tr>';
              
              $s_no++;      
              // return $screen_unique_id;      
          }

          $total_ui           .= '</tbody>';
          $total_ui           .= '</table>';
          // UI Table End
          $total_ui           .= '    </div>
                                  </div>';

          // Tab DIV End
          $total_ui            .= '</div>';
      }
      $total_ui            .= '</div>';

      // Section Tab Content UI Ends Here
  }
  
  return $total_ui;
}


function get_permissions($user_type = "",$main_screen = null,$screen_section = null,$screens=null,$screen_actions=null,$department_name = "") {


  if ($user_type) {

      global $pdo;

      $all_permissions        = [];
      $main_permissions       = [];
      $section_permissions    = [];
      $screen_permissions     = [];
      $action_permissions     = [];

      $permission_table       = "user_screen_permission";

      $columns                = [
          "user_type",
          "department_name",
          "main_screen_unique_id",
          "section_unique_id",
          "screen_unique_id",
          "GROUP_CONCAT(action_unique_id) AS action_unique_id"
      ];
      
      $where                  = [
          "is_delete"     => 0,
          "is_active"     => 1,
          "user_type"     => $user_type,
          "department_name"     => $department_name
      ];

      $group_by               = "screen_unique_id";


      if ($main_screen) {

          $columns                = [
              "GROUP_CONCAT(main_screen_unique_id) AS main_screen_unique_id"
          ];

          $group_by               = "";
      }

      if ($screen_section) {
          $columns                = [
              "GROUP_CONCAT(section_unique_id) AS section_unique_id"
          ];

          $group_by               = "";            
      }

      if ($screens) {
          $columns                = [
              "GROUP_CONCAT(screen_unique_id) AS screen_unique_id"
          ];

          $group_by               = "";            
      }

      if ($screen_actions) {
          $columns                = [
              "GROUP_CONCAT(action_unique_id) AS action_unique_id"
          ];

          $group_by               = "screen_unique_id";
          
          $where['screen_unique_id']              = $screen_actions;
      }



      $table_details      = [
          $permission_table,
          $columns
      ];

      $result_values  = $pdo->select($table_details,$where,null,null,[],"",$group_by);

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


?>

