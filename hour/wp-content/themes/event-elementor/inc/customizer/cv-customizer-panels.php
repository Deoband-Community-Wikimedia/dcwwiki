<?php
/**
 * Event Elementor manage the Customizer panels.
 *
 * @subpackage event-elementor
 * @since 1.0 
 */

/**
 * General Settings Panel
 */
Kirki::add_panel( 'event_elementor_general_panel', array(
	'priority' => 10,
	'title'    => __( 'General Settings', 'event-elementor' ),
) );

/**
 * Event Elementor Options
 */
Kirki::add_panel( 'event_elementor_options_panel', array(
	'priority' => 20,
	'title'    => __( 'Event Elementor Theme Options', 'event-elementor' ),
) );