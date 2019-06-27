<?php get_header(); ?>

<div class="container">
  <div class="row">
    <?php
    if (have_posts()) : 
      while (have_posts()) :
        the_post();
        $post_type = get_post_type();
        $with_sidebar = array('post', 'projects');
        /*
        if (in_array($post_type, $with_sidebar)) {
          ?>
          <div class="c-x-12 c-s-12 c-m-8 c-l-8">
            <?php get_template_part('template-parts/single/content', $post_type); ?>
          </div>
          <div class="c-x-12 c-s-12 c-m-4 c-l-4">
            <?php get_sidebar(); ?>
          </div>
          <?php
        } else {
        */
          ?>
          <div class="c-x-12">
            <?php get_template_part('template-parts/single/content', $post_type); ?>
          </div>
          <?php
        /*
        }
        */
      endwhile;
    else :
      get_template_part('template-parts/content', 'none');
    endif;
    ?>

  </div> <!-- /.row -->
</div> <!-- /.container -->

<?php get_footer(); ?>
