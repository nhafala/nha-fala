<?php
/**
 * Template part for style-3 header layout.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vichax
 */

$vertical_menu_slide = ( ! is_rtl() ) ? 'left' : 'right';
?>
<div class="header-container_wrap container">
	<?php vichax_vertical_main_menu( $vertical_menu_slide ); ?>
	<div class="header-container__flex">
		<div class="site-branding">
			<?php vichax_header_logo() ?>
			<?php vichax_site_description(); ?>
		</div>

		<div class="header-icons">
			<?php vichax_header_search( '<div class="header-search"><span class="search-form__toggle"></span>%s<span class="search-form__close"></span></div>' ); ?>
			<?php vichax_header_woo_elements(); ?>
			<?php vichax_vertical_menu_toggle( 'main-menu' ); ?>
			<?php vichax_header_btn(); ?>
		</div>

	</div>
</div>
