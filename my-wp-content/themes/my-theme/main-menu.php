<?php

namespace MyTheme\MainMenu;

function setup() {
  register_nav_menu( 'main-menu', 'Main Menu' );
}

/** A simple WP menu walker to render BulmaCSS navbar items. */
class BulmaWalkerNavMenu extends \Walker_Nav_Menu {
  public function start_lvl( &$output, $depth = 0, $args = null ) {
    $output .= "<div class='navbar-dropdown is-right'>";
  }

  public function end_lvl( &$output, $depth = 0, $args = null ) {
    $output .= "</div>";
  }

  public function start_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
    if ( $args->walker->has_children ) {
      $output                 .= "<div class='navbar-item has-dropdown is-hoverable'>\n";
      $output                 .= "<a class='navbar-link' href='{$data_object->url}'>{$data_object->title}</a>";
      $data_object->classes[] = 'has-dropdown';
    } else {
      $output .= "<a class='navbar-item' href='{$data_object->url}'>{$data_object->title}";
    }
  }

  public function end_el( &$output, $data_object, $depth = 0, $args = null, $current_object_id = 0 ) {
    if ( in_array( "has-dropdown", $data_object->classes ) ) {
      $output .= "</div>"; // Need to close the dropdown div
    }
    $output .= "</a>";
  }
}

function render_nav_menu_items() {
  echo wp_nav_menu( [
    'menu'        => 'main-menu',
    'walker'      => new BulmaWalkerNavMenu(),
    'items_wrap'  => '%3$s',
    'container'   => '',
    'menu_class'  => '',
    'fallback_cb' => false
  ] );
}
