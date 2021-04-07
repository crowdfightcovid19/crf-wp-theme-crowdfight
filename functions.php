<?php

// Walker for the flat menu
include_once __DIR__ . "/classes/class.cfct_header_nav_walker.php";
include_once __DIR__ . "/vendor/bettershortcodeparser/better-shortcode-parser.php";

// Includes all the shortcodes
include_once __DIR__ . "/shortcodes/shortcode_load.php";

// Removes jQuery only on the frontend of the site, as we
// include our own one via CDN for compatibility with Bootstrap 4
function cfct_remove_default_jquery_frontend(){
    wp_dequeue_script('jquery');
    wp_deregister_script('jquery');   
}
add_filter('wp_enqueue_scripts', 'cfct_remove_default_jquery_frontend', PHP_INT_MAX);

// Adds the style file from the theme to the frontend
function cfct_add_theme_scripts() {
    wp_enqueue_style('cfct-bootstrap', get_template_directory_uri() . '/vendor/bootstrap.min.css');
    wp_enqueue_script('cfct-jquery', get_template_directory_uri() . '/vendor/jquery-3.1.1.min.js', array(), true);

    wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    wp_enqueue_script('my-script', get_template_directory_uri() . '/script.js', array(), true);
}
add_action ('wp_enqueue_scripts', 'cfct_add_theme_scripts', PHP_INT_MAX);

// Registers the navigation menu to be used on the header
function cfct_register_menus() {
    register_nav_menus(
        array(
            'header-menu' => 'Header Menu',
        )
    );
}
add_action('init', 'cfct_register_menus');


function cfct_setup() {
    add_theme_support('title-tag');
}
add_action( 'after_setup_theme', 'cfct_setup' );



// Disables the AutoP to avoid bad HTML output
remove_filter('the_content', 'wpautop');

function cfct_logo_proposal($atts) {
  extract(shortcode_atts([
    'name' => 'Participant',
    'link' => '',
    'iso_img' => '',
    'mono_img' => '',
    'full_img' => ''
  ], $atts));

  if (empty($link)) {
    $name_p = esc_attr($name);
  } else {
    $name_p = '<a href="' . esc_url($link) . '">' . esc_attr($name) . '</a>';
  }
  
  return '
<div class="container">
<div class="row">
  <div class="col justify-content-center">
    <p class="h2 text-center">' . $name_p . '</p></div>
</div>
<div class="row mb-5">
  <div class="col-12 col-md-4 justify-content-center d-flex align-items-center">
    <img src="' . esc_url($iso_img) . '" class="img-fluid mh-100" alt="">
  </div>
  <div class="col-12 col-md-4 justify-content-center d-flex align-items-center">
    <img src="' . esc_url($mono_img) . '" class="img-fluid mh-100" alt="">
  </div>
  <div class="col-12 col-md-4 justify-content-center d-flex align-items-center">
    <img src="' . esc_url($full_img) . '" class="img-fluid mh-100" alt="">
  </div>
</div>
</div>
';
}

add_shortcode('crf_logo_proposal', 'cfct_logo_proposal');

