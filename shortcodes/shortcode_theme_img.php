<?php

function cfct_shortcode_theme_img_gen($atts, $content = "") {

    extract(
        shortcode_atts(
            array(
                'id' => '',
                'class' => '',
                'file' => '',
            ), 
            $atts
        )
    );

    // If the file attribute is empty, we don't render anything
    $el_src = "";
    $img_dir =  get_template_directory_uri() . "/img";
    if(empty($file)) {
        return;
    }
    else {
        $el_src = "src='$img_dir/$file'";
    }

    $el_class="";
    if(!empty($class)) {
        $el_class = "class='$class'";
    }

    $el_id="";
    if(!empty($id)) {
        $el_id = "id='$id'";
    }

    $bsp = Better_Shortcode_Parser::getInstance();
    return "<img $el_id $el_class $el_src />";
}
add_shortcode('theme_img', 'cfct_shortcode_theme_img_gen');