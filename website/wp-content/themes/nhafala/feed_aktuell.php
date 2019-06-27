<?php
/*
Template Name: Feed Aktuell
*/
?>
<?php get_header(); ?>


<body>
<div id="loginwrapper"><div id="loginbutton"><a href="http://www.nha-fala.ch/login">login</a></div></div>
<div id="outerwrapper">
<div id="wrapper">
<div class="content_full shadow">
<?php 
$args=array(
'post_status' => 'publish');

$aktuell = new WP_Query($args);
 
while($aktuell->have_posts()) :
$aktuell->the_post();?>
<h1 class="pageTitle"><?php the_title(); ?></h1>
    <div class="post-content">
        <?php the_content(); ?>
    </div>
<div class="bottom_line"><p> </p></div>
<?php endwhile; ?>
</div>
</div>
</div>
</body> 

<?php get_footer(); ?>