<?php get_header(); ?>

<div class="container">

  <div class="row">
    <div class="col-xs-12 col-md-8">
      <header class="page-header">
      <?php if ( have_posts() ) : ?>
        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'nhafala' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
      <?php else : ?>
        <h1 class="page-title"><?php _e( 'Nothing Found', 'nhafala' ); ?></h1>
      <?php endif; ?>
      </header><!-- .page-header -->
      <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <?php
        if ( have_posts() ) :
          while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/post/content', 'excerpt' );
          endwhile;

          the_posts_pagination(
            array(
              'prev_text'          => nhafala_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'nhafala' ) . '</span>',
              'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'nhafala' ) . '</span>' . nhafala_get_svg( array( 'icon' => 'arrow-right' ) ),
              'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'nhafala' ) . ' </span>',
            )
          );

        else :
        ?>
          <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nhafala' ); ?></p>
          <?php 
          get_search_form();
        endif;
        ?>
        
        </main><!-- #main -->
      </div><!-- #primary -->
    </div>
    <div class="col-xs-12 col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div><!-- .wrap -->

<?php get_footer(); ?>
