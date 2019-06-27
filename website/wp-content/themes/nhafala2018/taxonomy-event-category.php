<?php get_header(); ?>
<div class="container">
  <div class="row">
  <div class="col-xs-12">
    
    <div id="primary" role="main" class="content-area">
      <header class="page-header">
        <h1 class="page-title">
          <?php printf( __( 'Event Category: %s', 'eventorganiser' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
        </h1>

        <?php
        $category_description = category_description();
        if ( ! empty( $category_description ) ) {
          echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
        }
        ?>
      </header>
      <?php eo_get_template_part( 'eo-loop-events' ); //Lists the events ?>	
    </div><!-- #primary -->
      </div>
  </div>
</div>
<?php get_footer();
