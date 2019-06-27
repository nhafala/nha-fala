<?php get_header(); ?>

<body>
<div id="loginwrapper"><div id="loginbutton"><a href="http://www.nha-fala.ch/login">login</a></div></div>
<div id="outerwrapper">
<div id="wrapper">
<div class="content_full shadow">
<? /*Begin Content area Query*/ ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
      <h1 class="pageTitle"><?php the_title(); ?></h1>
    <div class="post-content">
        <?php the_content(); ?>
    </div>

   <?php endwhile; ?>
 <?php else : ?>
 <h2 class="center">Nicht vorhanden</h2>
 <p class="center">Tut uns leid, der gewählte Inhalt existiert nicht.</p>
<?php endif; wp_reset_query(); ?>
<? /*End Content area Query*/ ?>
</div>
</div>
</div>
</body>  

<?php get_footer(); ?>