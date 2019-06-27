<?php
/**
 * Template part for style-5 header layout.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Vichax
 */
?>
<div class="header-container_wrap container">
	<div class="header-container__flex">
		<div class="site-branding">
			<?php vichax_header_logo() ?>
			<?php vichax_site_description(); ?>
		</div>
		<?php vichax_main_menu(); ?>
		<?php vichax_header_btn(); ?>
	</div>
</div>
