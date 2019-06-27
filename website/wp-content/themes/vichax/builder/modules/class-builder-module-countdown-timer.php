<?php

/**
 * Class Vichax_Builder_Module_Countdown_Timer.
 */
class Vichax_Builder_Module_Countdown_Timer extends Tm_Builder_Module {

	public $function_name;

	public function init() {
		$this->name = esc_html__( 'Countdown Timer', 'vichax' );
		$this->slug = 'tm_pb_countdown_timer';
		$this->icon = 'f073';

		$this->whitelisted_fields = array(
			'title',
			'date_time',
			'use_background_color',
			'background_color',
			'timer_layout',
			'circle_background',
			'circle_size',
			'circle_size_laptop',
			'circle_size_tablet',
			'circle_size_phone',
			'use_circle_border',
			'circle_border_color',
			'circle_border_width',
			'admin_label',
			'module_id',
			'module_class',
		);

		$this->fields_defaults = array(
			'use_background_color' => array( 'on' ),
			'background_color'     => array( tm_builder_accent_color(), 'only_default_setting' ),
			'circle_background'    => array( tm_builder_accent_color(), 'only_default_setting' ),
			'circle_size'          => array( '130' ),
			'use_circle_border'    => array( 'off' ),
			'circle_border_color'  => array( tm_builder_accent_color(), 'only_default_setting' ),
		);

		$this->main_css_element = '%%order_class%%.tm_pb_countdown_timer';
		$this->advanced_options = array(
			'fonts' => array(
				'header' => array(
					'label'    => esc_html__( 'Header', 'vichax' ),
					'css'      => array(
						'main' => "{$this->main_css_element} h4",
					),
				),
				'numbers' => array(
					'label'    => esc_html__( 'Numbers', 'vichax' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .section span.value",
					),
					'line_height' => array(
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
					),
				),
				'label' => array(
					'label'    => esc_html__( 'Label', 'vichax' ),
					'css'      => array(
						'main' => "{$this->main_css_element} .section span.label",
					),
					'line_height' => array(
						'range_settings' => array(
							'min'  => '1',
							'max'  => '100',
							'step' => '1',
						),
					),
				),
			),
			'background' => array(
				'use_background_color' => false,
			),
			'custom_margin_padding' => array(
				'css' => array(
					'important' => 'all',
				),
			),
		);
		$this->custom_css_options = array(
			'container' => array(
				'label'    => esc_html__( 'Container', 'vichax' ),
				'selector' => '.tm_pb_countdown_timer_container',
			),
			'title' => array(
				'label'    => esc_html__( 'Title', 'vichax' ),
				'selector' => '.title',
			),
			'timer_section' => array(
				'label'    => esc_html__( 'Timer Section', 'vichax' ),
				'selector' => '.section',
			),
		);
	}

	public function get_fields() {
		$fields = array(
			'title' => array(
				'label'           => esc_html__( 'Countdown Timer Title', 'vichax' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'This is the title displayed for the countdown timer.', 'vichax' ),
			),
			'date_time' => array(
				'label'           => esc_html__( 'Countdown To', 'vichax' ),
				'type'            => 'date_picker',
				'option_category' => 'basic_option',
				'description'     => tm_get_safe_localization(
					sprintf(
						'%2$s<a href="%1$s" target="_blank" title="%3$s">%3$s</a>',
						esc_url( admin_url( 'options-general.php' ) ),
						esc_html__( 'This is the date the countdown timer is counting down to. Your countdown timer is based on your timezone settings in your ', 'vichax' ),
						esc_html__( 'WordPress General Settings', 'vichax' )
					)
				),
			),
			'use_background_color' => array(
				'label'           => esc_html__( 'Use Background Color', 'vichax' ),
				'type'            => 'yes_no_button',
				'option_category' => 'color_option',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'vichax' ),
					'off' => esc_html__( 'No', 'vichax' ),
				),
				'affects'           => array(
					'#tm_pb_background_color',
				),
				'description' => esc_html__( 'Here you can choose whether background color setting below should be used or not.', 'vichax' ),
			),
			'background_color' => array(
				'label'             => esc_html__( 'Background Color', 'vichax' ),
				'type'              => 'color-alpha',
				'depends_default'   => true,
				'description'       => esc_html__( 'Here you can define a custom background color for your countdown timer.', 'vichax' ),
			),
			'timer_layout' => array(
				'label'             => esc_html__( 'Layout', 'vichax' ),
				'type'              => 'select',
				'options'           => array(
					'flat'   => esc_html__( 'Flat', 'vichax' ),
					'circle' => esc_html__( 'Circle', 'vichax' ),
				),
				'affects'           => array(
					'#tm_pb_circle_background',
					'#tm_pb_circle_size',
					'#tm_pb_use_circle_border',
				),
			),
			'circle_background' => array(
				'label'               => esc_html__( 'Circle Background Color', 'vichax' ),
				'type'                => 'color-alpha',
				'depends_show_if_not' => 'flat',
			),
			'circle_size' => array(
				'label'           => esc_html__( 'Circle Size', 'vichax' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'default'         => '130',
				'range_settings' => array(
					'min'  => 50,
					'max'  => 250,
					'step' => 1,
				),
				'depends_show_if_not' => 'flat',
				'mobile_options'      => true,
				'mobile_global'       => true,
			),
			'circle_size_laptop' => array(
				'type' => 'skip',
			),
			'circle_size_tablet' => array(
				'type' => 'skip',
			),
			'circle_size_phone' => array(
				'type' => 'skip',
			),
			'use_circle_border' => array(
				'label'           => esc_html__( 'Use Circle Border', 'vichax' ),
				'type'            => 'yes_no_button',
				'option_category' => 'layout',
				'options'         => array(
					'off' => esc_html__( 'No', 'vichax' ),
					'on'  => esc_html__( 'Yes', 'vichax' ),
				),
				'affects'           => array(
					'#tm_pb_circle_border_color',
					'#tm_pb_circle_border_width',
				),
				'depends_show_if_not' => 'flat',
			),
			'circle_border_color' => array(
				'label'           => esc_html__( 'Circle Border Color', 'vichax' ),
				'type'            => 'color-alpha',
				'depends_default' => true,
			),
			'circle_border_width' => array(
				'label'           => esc_html__( 'Circle Border Width', 'vichax' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'default'         => '1',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '20',
					'step' => '1',
				),
				'depends_default' => true,
			),
			'disabled_on' => array(
				'label'           => esc_html__( 'Disable on', 'vichax' ),
				'type'            => 'multiple_checkboxes',
				'options'         => tm_pb_media_breakpoints(),
				'additional_att'  => 'disable_on',
				'option_category' => 'configuration',
				'description'     => esc_html__( 'This will disable the module on selected devices', 'vichax' ),
			),
			'admin_label' => array(
				'label'       => esc_html__( 'Admin Label', 'vichax' ),
				'type'        => 'text',
				'description' => esc_html__( 'This will change the label of the module in the builder for easy identification.', 'vichax' ),
			),
			'module_id' => array(
				'label'           => esc_html__( 'CSS ID', 'vichax' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'option_class'    => 'tm_pb_custom_css_regular',
			),
			'module_class' => array(
				'label'           => esc_html__( 'CSS Class', 'vichax' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'tab_slug'        => 'custom_css',
				'option_class'    => 'tm_pb_custom_css_regular',
			),
		);
		return $fields;
	}

	public function shortcode_callback( $atts, $content = null, $function_name ) {

		$this->set_vars(
			array(
				'title',
				'date_time',
				'background_color',
				'timer_layout',
				'circle_background',
				'circle_size',
				'circle_size_laptop',
				'circle_size_tablet',
				'circle_size_phone',
				'use_background_color',
				'use_circle_border',
				'circle_border_color',
				'circle_border_width',
			)
		);

		$this->function_name = $function_name;

		$end_date = gmdate( 'M d, Y H:i:s', strtotime( $this->_var( 'date_time' ) ) );

		$gmt_offset        = get_option( 'gmt_offset' );
		$gmt_divider       = '-' === substr( $gmt_offset, 0, 1 ) ? '-' : '+';
		$gmt_offset_hour   = str_pad( abs( intval( $gmt_offset ) ), 2, "0", STR_PAD_LEFT );
		$gmt_offset_minute = str_pad( ( ( abs( $gmt_offset ) * 100 ) % 100 ) * ( 60 / 100 ), 2, "0", STR_PAD_LEFT );
		$gmt               = "GMT{$gmt_divider}{$gmt_offset_hour}{$gmt_offset_minute}";

		if ( $this->_var( 'background_color' ) && 'on' === $this->_var( 'use_background_color' ) ) {
			TM_Builder_Element::set_style( $function_name, array(
				'selector'    => '%%order_class%%',
				'declaration' => sprintf(
					'background-color: %1$s;',
					esc_attr( $this->_var( 'background_color' ) )
				),
			) );
		}

		$classes = array( 'tm_pb_bg_layout_light' );
		$atts    = array(
			'data-end-timestamp' => esc_attr( strtotime( "{$end_date} {$gmt}" ) ),
		);

		if ( 'circle' === $this->_var( 'timer_layout' ) ) {

			$classes[] = 'tm_pb_countdown_timer_circle_layout';

			if ( $this->_var( 'circle_size' ) ) {
				$this->set_circle_size();
			}

			if ( $this->_var( 'circle_background' ) ) {
				TM_Builder_Element::set_style( $function_name, array(
					'selector'    => '%%order_class%% .section.values',
					'declaration' => sprintf(
						'background-color: %1$s;',
						esc_attr( $this->_var( 'circle_background' ) )
					),
				) );
			}

			if ( 'on' === $this->_var( 'use_circle_border' ) ) {

				$classes[] = 'tm_pb_countdown_timer_circle_border';

				if ( $this->_var( 'circle_border_color' ) ) {
					TM_Builder_Element::set_style(
						$function_name, array(
						'selector'    => '%%order_class%% .section.values',
						'declaration' => sprintf(
							'border-color: %1$s;',
							esc_attr( $this->_var( 'circle_border_color' ) )
						),
					));
				}

				if ( '' !== $this->_var( 'circle_border_width' ) ) {
					TM_Builder_Element::set_style(
						$function_name, array(
						'selector'    => '%%order_class%% .section.values',
						'declaration' => sprintf(
							'border-width: %1$spx;',
							esc_attr( $this->_var( 'circle_border_width' ) )
						),
					));
				}
			}
		}

		$content = $this->get_template_part( 'countdown-timer.php' );
		$output  = $this->wrap_module( $content, $classes, $function_name, $atts );

		return $output;
	}

	/**
	 * Set circle size values
	 */
	public function set_circle_size() {

		$circle_size_d  = intval( $this->_var( 'circle_size' ) );
		$circle_size_l  = intval( $this->_var( 'circle_size_laptop' ) );
		$circle_size_t  = intval( $this->_var( 'circle_size_tablet' ) );
		$circle_size_ph = intval( $this->_var( 'circle_size_phone' ) );

		if ( ! $circle_size_l ) {
			$circle_size_l = $circle_size_d;
		}

		if ( ! $circle_size_t ) {
			$circle_size_t = $circle_size_d;
		}

		if ( ! $circle_size_ph ) {
			$circle_size_ph = $circle_size_t;
		}

		if ( ! empty( $circle_size_d ) || ! empty( $circle_size_l ) || ! empty( $circle_size_t ) || ! empty( $circle_size_ph ) ) {

			$radius_d  = round( $circle_size_d / 2 );
			$radius_l  = round( $circle_size_l / 2 );
			$radius_t  = round( $circle_size_t / 2 );
			$radius_ph = round( $circle_size_ph / 2 );

			$sizes = array(
				'desktop' => $circle_size_d,
				'laptop'  => $circle_size_l,
				'tablet'  => $circle_size_t,
				'phone'   => $circle_size_ph,
			);

			$radius = array(
				'desktop' => $radius_d,
				'laptop'  => $radius_l,
				'tablet'  => $radius_t,
				'phone'   => $radius_ph,
			);

			tm_pb_generate_responsive_css( $sizes, '%%order_class%% .section.values', 'width', $this->function_name );
			tm_pb_generate_responsive_css( $sizes, '%%order_class%% .section.values', 'height', $this->function_name );
			tm_pb_generate_responsive_css( $radius, '%%order_class%% .section.values', 'border-radius', $this->function_name );
		}
	}
}

new Vichax_Builder_Module_Countdown_Timer;
