<?php
/**
 * Blog listing item template
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $this->classes['item'] ); ?>>
	<?php vichax_get_builder_module_template( sprintf( 'blog/formats/%s.php', $this->_var( 'post_format' ) ), $this, 'blog/formats/standard.php' ) ?>
</article>
