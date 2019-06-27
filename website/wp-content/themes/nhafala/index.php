<?php get_header(); ?>

<body>
<div id="loginwrapper"><div id="loginbutton"><a href="http://www.nha-fala.ch/login">login</a></div></div>
<div id="outerwrapper">
<div id="wrapper">
<div class="content_full shadow">
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
  <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
    <div style="clear:both"></div>
    <div style="border-bottom: 1px solid #333333"></div>
<?php endwhile; ?>
<?php else : ?>
 <h2 class="center">Nicht vorhanden</h2>
 <p class="center">Tut uns leid, der gewählte Inhalt existiert nicht.</p>
<?php endif; ?>
</div>
</div>
</div>
</body>

<?php get_footer(); ?>