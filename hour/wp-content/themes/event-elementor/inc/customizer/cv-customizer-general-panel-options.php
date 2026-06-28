<?php
/**
 * Event Elementor manage the Customizer options of general panel.
 *
 * @subpackage event-elementor
 * @since 1.0 
 */
Kirki::add_field(
	'event_elementor_config', array(
		'type'        => 'checkbox',
		'settings'    => 'event_elementor_home_posts',
		'label'       => esc_attr__( 'Checked to hide latest posts in homepage.', 'event-elementor' ),
		'section'     => 'static_front_page',
		'default'     => true,
	)
);
