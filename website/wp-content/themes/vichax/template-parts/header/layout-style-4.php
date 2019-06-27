<?php
/**
 * Template part for style-4 header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vichax
 */

$search       = get_theme_mod( 'header_search', vichax_theme()->customizer->get_default( 'header_search' ) );
$woo_elements = vichax_is_woocommerce_activated() && get_theme_mod( 'header_woo_elements', vichax_theme()->customizer->get_default( 'header_woo_elements' ) );
?>
<div class="header-container_wrap container">
	<div class="header-container__flex">
		<div class="site-branding">
			<?php vichax_header_logo() ?>
			<?php vichax_site_description(); ?>
		</div>

		<?php vichax_main_menu(); ?>
		
		<?php if ( $search || $woo_elements ) : ?>
		<div class="header-icons divider">
			<?php vichax_header_search( '<div class="header-search"><span class="search-form__toggle"></span>%s<span class="search-form__close"></span></div>' ); ?>
			<?php vichax_header_woo_elements(); ?>
		</div>
		<?php endif; ?>

		<?php vichax_header_btn(); ?>
	</div>
</div>
