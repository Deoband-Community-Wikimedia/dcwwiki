<?php
/**
 * @package Event Management
 * @subpackage event-management
 * @since event-management 1.0
 * Setup the WordPress core custom header feature.
 * @uses event_management_header_style()
*/

function event_management_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'event_management_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 85,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'event_management_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'event_management_custom_header_setup' );

if ( ! function_exists( 'event_management_header_style' ) ) :

add_action( 'wp_enqueue_scripts', 'event_management_header_style' );
function event_management_header_style() {
	if ( get_header_image() ) :
	$event_management_custom_css = "
        .menu-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'event-management-basic-style', $event_management_custom_css );
	endif;
}
endif;