<?php
/**
 * Cherry-services-list hooks.
 *
 * @package Vichax
 */

// Customization cherry-services-list plugin.
add_filter( 'cherry_services_list_meta_options_args', 'vichax_change_services_list_icon_pack' );
add_filter( 'cherry_services_default_icon_format', 'vichax_cherry_services_default_icon_format' );
add_filter( 'cherry_services_listing_templates_list', 'vichax_cherry_services_listing_templates_list' );
add_filter( 'cherry_services_features_title_format', 'vichax_cherry_services_features_title_format' );
add_filter( 'cherry_services_styles', 'vichax_dequeue_cherry_services_grid_style' );

/**
 * Change cherry-services-list icon pack.
 */
function vichax_change_services_list_icon_pack( $fields ) {

	$fields['fields']['cherry-services-icon']['icon_data'] = array(
		'icon_set'    => 'vichaxLinearIcons',
		'icon_css'    => VICHAX_THEME_URI . '/assets/css/linearicons.css',
		'icon_base'   => 'linearicon',
		'icon_prefix' => 'linearicon-',
		'icons'       => vichax_get_linear_icons_set(),
	);

	return $fields;
}

/**
 * Change cherry-services-list icon format
 *
 * @return string
 */
function vichax_cherry_services_default_icon_format( $icon_format ) {
	return '<i class="linearicon %s"></i>';
}

/**
 *  Add template to cherry services-list templates list;
 */
function vichax_cherry_services_listing_templates_list( $tmpl_list ) {

	$tmpl_list['media-icon-float'] = 'media-icon-float.tmpl';
	$tmpl_list['media-icon-left'] = 'media-icon-left.tmpl';

	return $tmpl_list;
}

/**
 * Change cherry-services features title format.
 */
function vichax_cherry_services_features_title_format( $title_format ) {
	return '<h5 class="service-features_title">%s</h5>';
}

/**
 * Dequeue cherry-services grid style.
 *
 * @param array $styles Cherry services list styles.
 *
 * @return array
 */
function vichax_dequeue_cherry_services_grid_style ( $styles = array() ) {

	unset( $styles['cherry-services-grid'] );

	return $styles;
}
