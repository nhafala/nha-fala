<?php
/*
Template Name: Inhalt
*/
?>
<?php get_header(); ?>
<style type="text/css">
body {
	background-image: url(<?php bloginfo('stylesheet_directory'); ?>/elements/fondos/fondoazulprueba.jpg);
	background-repeat: repeat;
}
</style>
<body>
<div id="outerwrapper">
<div id="wrapper">
<?php while (have_posts()) : the_post(); ?>
  <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
    <div style="clear:both"></div>
<?php endwhile; ?>


</div>
</div>
</body>
<?php get_footer(); ?>