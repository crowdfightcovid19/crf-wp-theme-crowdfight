<?php

function cfct_shortcode_btn_gen($atts, $content = "") {

    extract(
        shortcode_atts(
            array(
                'id' => '',
                'class' => '',
                'href' => '',
                'text' => ''
            ), 
            $atts
        )
    );

    $el_href = "";
    if(!empty($href)) {
        $el_href="href='$href'";        
    }
    else {
        $el_href="href='#'";
    }

    $el_class="";
    if(!empty($class)) {
        $el_class = "class='btn btn-primary $class'";
    }
    else {
        $el_class = "class='btn btn-primary '";
    }

    $el_id="";
    if(!empty($id)) {
        $el_id = "id='$id'";
    }

    return "<a $el_href $el_id $el_class role='button'>$text</a>";
}
add_shortcode('btn', 'cfct_shortcode_btn_gen');