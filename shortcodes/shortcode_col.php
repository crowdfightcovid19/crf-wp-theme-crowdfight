<?php

function cfct_shortcode_row_build_sizes_array($xs, $sm, $md, $lg, $xl) {
    $sizes_array = array();
    if(!empty($xs) && is_numeric($xs)) {
        $sizes_array['xs'] = intval($xs);
    }
    if(!empty($sm) && is_numeric($sm)) {
        $sizes_array['sm'] = intval($sm);
    }
    if(!empty($md) && is_numeric($md)) {
        $sizes_array['md'] = intval($md);
    }
    if(!empty($lg) && is_numeric($lg)) {
        $sizes_array['lg'] = intval($lg);
    }
    if(!empty($xl) && is_numeric($xl)) {
        $sizes_array['xl'] = intval($xl);
    }
    return $sizes_array;
}

function cfct_shortcode_row_build_sizes_class($sizes_array) {
    $sizes_classes = "";
    if(count($sizes_array) === 0) {
        $sizes_classes = "col";
    }
    else {        
        if(array_key_exists("xs", $sizes_array)) {
            $sizes_classes .= "col-";
            $sizes_classes .= strval($sizes_array['xs']);
        }
        if(array_key_exists("sm", $sizes_array)) {
            if(strlen($sizes_classes) > 0) {
                $sizes_classes .= " ";    
            }
            $sizes_classes .= "col-sm-";
            $sizes_classes .= strval($sizes_array['sm']);
        }
        if(array_key_exists("md", $sizes_array)) {
            if(strlen($sizes_classes) > 0) {
                $sizes_classes .= " ";    
            }
            $sizes_classes .= "col-md-";
            $sizes_classes .= strval($sizes_array['md']);
        }
        if(array_key_exists("lg", $sizes_array)) {
            if(strlen($sizes_classes) > 0) {
                $sizes_classes .= " ";    
            }
            $sizes_classes .= "col-lg-";
            $sizes_classes .= strval($sizes_array['lg']);
        }
        if(array_key_exists("xl", $sizes_array)) {
            if(strlen($sizes_classes) > 0) {
                $sizes_classes .= " ";    
            }
            $sizes_classes .= "col-xl-";
            $sizes_classes .= strval($sizes_array['xl']);
        }
    }    
    return $sizes_classes;
}


function cfct_shortcode_col_gen($atts, $content = "") {

    extract(
        shortcode_atts(
            array(
                'id' => '',
                'class' => '',
                'xs' => '',
                'sm' => '',
                'md' => '',
                'lg' => '',
                'xl' => '',
            ), 
            $atts
        )
    );

    // ID
    $el_id="";
    if(!empty($id)) {
        $el_id = "id='$id'";
    }

    
    // Construction of the CLASS based on the sizes and the class attribute
    $el_class = "";
    $sizes_array = cfct_shortcode_row_build_sizes_array($xs, $sm, $md, $lg, $xl);
    $sizes_classes = cfct_shortcode_row_build_sizes_class($sizes_array);
    if(!empty($class)) {
        $el_class = "class='" . $sizes_classes . " " . $class . "'";
    }
    else {
        $el_class = "class='" . $sizes_classes . "'";
    }
    
    $bsp = Better_Shortcode_Parser::getInstance();
    return "<div $el_id $el_class>" . $bsp->do_shortcode($content) . "</div>";

}
add_shortcode('col', 'cfct_shortcode_col_gen');