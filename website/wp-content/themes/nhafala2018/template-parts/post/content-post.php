<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <?php
	if ( is_sticky() && is_home() ) :
		echo nhafala_get_svg( array( 'icon' => 'thumb-tack' ) );
	endif;
  ?>

	<header class="entry-header">
    <?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
    <span class="entry-meta">
      <?php print nhafala_time_link() ?>
    </span>
	</header><!-- .entry-header -->


	<?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( 'nhafala-post-banner' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
		if (is_single()) :
      the_content();
    else:
      the_excerpt();
        //$content = strip_shortcodes(get_the_excerpt());
        // print apply_filters('the_content', $content);
      $link = sprintf(
        '<p class="link-more"><a href="%1$s" class="more-link btn btn-secondary">%2$s</a></p>',
        esc_url( get_permalink( get_the_ID() ) ),
        /* translators: %s: Name of current post */
        sprintf( __( 'Mehr', 'nhafala' ), get_the_title( get_the_ID() ) )
      );
      //nhafala_social_likes();
      print $link;
    ?>
    <?php
    endif; ?>
    <?php
		wp_link_pages(
			array(
				'before'      => '<div class="page-links">' . __( 'Pages:', 'nhafala' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php
	if ( is_single() ) {
		// nhafala_entry_footer();
	}
	?>

</article><!-- #post-## -->
