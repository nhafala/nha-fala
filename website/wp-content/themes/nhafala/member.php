<?php
/*
Template Name: Member
*/
?>
<?php get_header(); ?>

<body>
<div id="loginwrapper"><div id="loginbutton"><a href="http://www.nha-fala.ch/login">login</a></div></div>
<div id="outerwrapper">
<div id="wrapper">
<div class="content_full shadow">
<?php 
$member = new WP_Query();
$member->query('post_status=private');
 
while($member->have_posts()) :
$member->the_post();?>
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