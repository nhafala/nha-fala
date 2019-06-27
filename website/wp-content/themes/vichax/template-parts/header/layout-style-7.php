<?php
/**
 * Template part for style-7 header layout.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vichax
 */

$vertical_menu_slide = 'left';
?>
<div class="header-container_wrap container">
	<?php vichax_vertical_main_menu( $vertical_menu_slide ); ?>
	<div class="row row-md-center">
		<div class="col-xs-12 col-md-4 col-lg-3">
			<?php vichax_vertical_menu_toggle( 'main-menu' ); ?>
		</div>
		<div class="col-xs-12 col-md-4 col-lg-6">
			<div class="site-branding">
				<?php vichax_header_logo() ?>
				<?php vichax_site_description(); ?>
			</div>
		</div>
		<div class="col-xs-12 col-md-4 col-lg-3">
			<div class="header-btn-wrap">
				<?php vichax_header_btn(); ?>
			</div>
		</div>
	</div>
</div>
