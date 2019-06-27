<?php
/**
 * The template for displaying the style-2 footer layout.
 *
 * @package Vichax
 */

?>
<div class="footer-container <?php echo vichax_get_invert_class_customize_option( 'footer_bg' ); ?>">
	<div class="site-info container">
		<?php
			vichax_footer_logo();
			vichax_footer_menu();
			vichax_contact_block( 'footer' );
			vichax_social_list( 'footer' );
			vichax_footer_copyright();
		?>
	</div><!-- .site-info -->
</div><!-- .container -->
