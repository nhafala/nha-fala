<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Vichax
 */

$footer_contact_block_visibility = get_theme_mod( 'footer_contact_block_visibility', vichax_theme()->customizer->get_default( 'footer_contact_block_visibility' ) );
?>

<div class="footer-container <?php echo vichax_get_invert_class_customize_option( 'footer_bg' ); ?>">
	<div class="site-info container">
		<div class="site-info-wrap">
			<?php vichax_footer_logo(); ?>
			<?php vichax_footer_menu(); ?>

			<?php if ( $footer_contact_block_visibility ) : ?>
			<div class="site-info__bottom">
			<?php endif; ?>
				<?php vichax_footer_copyright(); ?>
				<?php vichax_contact_block( 'footer' ); ?>
			<?php if ( $footer_contact_block_visibility ) : ?>
			</div>
			<?php endif; ?>

			<?php vichax_social_list( 'footer' ); ?>
		</div>

	</div><!-- .site-info -->
</div><!-- .container -->
