<?php /** Template Name: Private Feed */

function query_private_posts()
{
  global $wp_query;
  // Highlight menu item
  add_filter('nav_menu_css_class', function($classes, $item) {
    if ($item->object_id == get_the_ID()) {
      $classes[] = 'current-menu-item';
    }
    return $classes;
  }, 10, 2);

  // Correct Pagination
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $args = array(
    "paged" => $paged,
    "post_type" => "post",
    "post_status" => "private"
  );
  $wp_query = new WP_Query($args);
}

if (is_user_logged_in()) {
  // Show private posts
  query_private_posts();
  include get_parent_theme_file_path('index.php');
} else {
  // Redirect to login
  include wp_redirect(get_bloginfo('url') . "/wp-login.php");
}

die();
