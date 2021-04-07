<?php

// Walker class to create a flat menu, with no submenus and simple HTML
// compatible with Bootstrap 4
class CFCT_Header_Nav_Walker extends Walker_Nav_Menu {

    // Adds $args->has_children to use in start_el()
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        $id_field = $this->db_fields['id'];
        if ( is_object( $args[0] ) ) {
            $args[0]->has_children = !empty( $children_elements[$element->$id_field] );
        }
        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

    function start_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "\n<!--start_lvl($depth)-->\n";
        if ($depth == 0) {
          $output .= '<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
        }
    }

    function end_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "\n<!--end_lvl( $depth )-->\n";
        if ($depth == 0) {
          $output .= '</div>';
        }
    }

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $output .= "\n<!--start_el($depth)-->\n";
        if ($depth == 0) {
          if ($args->has_children) {
            $output .= '<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" href="#">' . $item->title . "</a>";
          } else {
            $output .= '<li class="nav-item"><a class="nav-link" href=' . esc_attr($item->url) . ">" . $item->title . "</a>";
          }
        } else {
          $display_lvl = "dropdown-ml-" . $depth;
          $output .= '<a class="dropdown-item ' . $display_lvl . '" href=' . esc_attr($item->url) . ">" . $item->title . "</a>";
        }
    }

    function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= "\n<!--end_el($depth)-->\n";
        if ($depth == 0) {
          $output .= "</li>";
        } else {
          $output .= '';
        }
    }
}
