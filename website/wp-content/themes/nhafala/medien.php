<?php
/*
Template Name: Medien
*/
?>
<?php get_header(); ?>

<body>
<div id="loginwrapper"><div id="loginbutton"><a href="http://www.nha-fala.ch/login">login</a></div></div>
<div id="outerwrapper">
<div id="wrapper">
<div class="content_full shadow">

<div class="social-wrapper">
<a href="http://vimeo.com/nhafala" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/elements/icons/Vimeo.png" width="256" height="256"></a>
<a href="http://soundcloud.com/nha-fala" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/elements/icons/Soundcloud.png" width="256" height="256"></a>
  
<a href="http://facebook.com/nhafala.horw" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/elements/icons/Facebook.png" width="256" height="256"></a>
<a href="http://twitter.com/NhaFala" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/elements/icons/Twitter A.png" width="256" height="256"></a>
</div>  
  
<? /*Begin Content area Query*/ ?>
<div class="bottom_line"><p> </p></div>
<?php 
$args=array(
'post_status' => 'publish',
'category_name' => 'Download');

$download = new WP_Query($args);
 
while($download->have_posts()) :
$download->the_post();?>
<h1 class="pageTitle"><?php the_title(); ?></h1>
    <div class="post-content">
        <?php the_content(); ?>
    </div>
<div class="bottom_line"><p> </p></div>
<?php endwhile; ?>
<? /*End Content area Query*/ ?>
</div>
</div>
</div>
</body>  

<?php get_footer(); ?>