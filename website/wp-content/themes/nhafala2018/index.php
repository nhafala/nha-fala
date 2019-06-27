<?php get_header(); ?>

<div class="container">
  <div class="row">

    <div class="c-s-12 c-s-12 c-m-8 c-l-8 sm-box sm-box-1">
      <?php if ( is_home() && ! is_front_page() ) : ?>
      <header class="page-header">
        <h1 class="page-title"><?php single_post_title(); ?></h1>
      </header>
      <?php endif; ?>
      <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        <?php 
        if ( have_posts() ) :
          while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/post/content', 'post' );
          endwhile;
          the_posts_pagination(
            array(
              'prev_text'          => nhafala_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'nhafala' ) . '</span>',
              'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'nhafala' ) . '</span>' . nhafala_get_svg( array( 'icon' => 'arrow-right' ) ),
              'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'nhafala' ) . ' </span>',
            )
          );
        else :
          get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>
        </main>
      </div> <!-- /#primary -->
    </div> <!-- .col -->

    <div class="c-s-12 c-s-12 c-m-4 c-l-4 sm-box sm-box-2">
      <?php get_sidebar(); ?>
    </div> <!-- sidebar col -->

  </div> <!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
