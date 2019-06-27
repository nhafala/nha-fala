<?php
/**
 * Menus configuration.
 *
 * @package Vichax
 */

add_action( 'after_setup_theme', 'vichax_register_menus', 5 );
/**
 * Register menus.
 */
function vichax_register_menus() {

	register_nav_menus( array(
		'top'          => esc_html__( 'Top', 'vichax' ),
		'main'         => esc_html__( 'Main', 'vichax' ),
		'main_landing' => esc_html__( 'Landing Main', 'vichax' ),
		'footer'       => esc_html__( 'Footer', 'vichax' ),
		'social'       => esc_html__( 'Social', 'vichax' ),
	) );
}
