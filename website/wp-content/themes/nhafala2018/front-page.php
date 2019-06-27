<?php /* Template Name: Front Page */
get_header(); ?>
<div id="home-content" class="full-width container-fluid">
<?php
if (have_posts()) {
  while (have_posts()) {
    the_post(); 
    the_content();
  }
}
?>
</div>
<?php get_footer(); ?>
