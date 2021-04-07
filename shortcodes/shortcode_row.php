<?php

function cfct_shortcode_row_gen($atts, $content = "") {

    extract(
        shortcode_atts(
            array(
                'id' => '',
                'class' => '',
            ), 
            $atts
        )
    );

    $el_class="";
    if(!empty($class)) {
        $el_class = "class='row $class'";
    }
    else {
        $el_class = "class='row'";
    }

    $el_id="";
    if(!empty($id)) {
        $el_id = "id='$id'";
    }

    $bsp = Better_Shortcode_Parser::getInstance();
    return "<div $el_id $el_class>" . $bsp->do_shortcode($content) . "</div>";
}
add_shortcode('row', 'cfct_shortcode_row_gen');