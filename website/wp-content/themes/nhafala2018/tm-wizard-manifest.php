<?php
/**
 * Plugins configuration example.
 *
 * @var array
 */
$plugins = array(
	'cherry-data-importer' => array(
		'name'   => esc_html__( 'Cherry Data Importer', 'nhafala' ),
		'source' => 'remote', // 'local', 'remote', 'wordpress' (default).
		'path'   => 'https://github.com/CherryFramework/cherry-data-importer/archive/master.zip',
		'access' => 'base',
	),
	'cherry-projects' => array(
		'name'   => esc_html__( 'Cherry Projects', 'nhafala' ),
		'access' => 'skins',
	),
	'cherry-services-list' => array(
		'name'   => esc_html__( 'Cherry Services List', 'nhafala' ),
		'access' => 'skins',
	),
	'cherry-sidebars' => array(
		'name'   => esc_html__( 'Cherry Sidebars', 'nhafala' ),
		'access' => 'skins',
	),
	'power-builder' => array(
		'name'   => esc_html__( 'Power Builder', 'nhafala' ),
		'source' => 'remote',
		'path'   => 'http://cloud.cherryframework.com/downloads/free-plugins/power-builder-upd.zip',
		'access' => 'skins',
	),
	'power-builder-integrator' => array(
		'name'   => esc_html__( 'Power Builder Integrator', 'nhafala' ),
		'source' => 'remote',
		'path'   => 'http://cloud.cherryframework.com/downloads/free-plugins/power-builder-integrator.zip',
		'access' => 'skins',
	),

	'contact-form-7' => array(
		'name'   => esc_html__( 'Contact Form 7', 'nhafala' ),
		'access' => 'skins',
	),

);

/**
 * Skins configuration example
 *
 * @var array
 */
$skins = array(
	'base' => array(
		'cherry-data-importer',
	),
	'advanced' => array(
		'default' => array(
			'full'  => array(
				'cherry-projects',
				'cherry-services-list',
				'cherry-sidebars',
				'power-builder',
				'power-builder-integrator',
				'contact-form-7',
			),
			'lite'  => false,
			'demo'  => 'http://ld-wp.template-help.com/wordpress_63851/',
			'thumb' => get_template_directory_uri() . '/assets/demo-content/default/default-thumb.png',
			'name'  => esc_html__( 'nhafala', 'nhafala' ),
		),
	),
);
$texts = array(
		'theme-name' => 'nhafala '
);
