
<?php
// permission start
function user_permission_ui($main_screen_unique_id = "",$user_type="") {

    $total_ui = '';

    if ($main_screen_unique_id) {
        $screen_sections = section_name('',$main_screen_unique_id);

        // Section Tab UI starts Here

        $total_ui .= '<ul class="nav nav-pills navtab-bg nav-justified">';

        $show                 = 1;
        $show1                 = 1;
        
        foreach ($screen_sections as $section_key => $section_value) {

            $active              = "";

            if ($show++ == 1) {          
                $active          = " active ";
            }

            $section_name        = disname($section_value["section_name"]);
            $section_unique_id   = $section_value["unique_id"];

            $total_ui .= '<li class="nav-item">
                            <a href="#sec'.$section_unique_id.'" data-bs-toggle="tab" aria-expanded="true" class="nav-link '.$active.'">
                                '.$section_name.'
                            </a>
                        </li>';
        }

        $total_ui .= '</ul>';

        
        // Section Tab Content UI Ends Here
    }
    return $total_ui;
}
// permission end
?>
