<?php 
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
/**
 * After setup theme hook
 */
function meetup_conference_theme_setup(){
    /*
     * Make chile theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'meetup-conference', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'meetup_conference_theme_setup', 100 );

/**
 * Meetup Conference Header Image
 */
function meetup_conference_custom_header_args_callback(){
    $default_image = array(
        'default-image'    => get_stylesheet_directory_uri().'/images/banner-img.jpg',
        'video'         => true,
		'width'         => 1920,
		'height'        => 1008, 
        'header-text'   => false
    ); 
    return $default_image;
}
add_filter( 'the_conference_custom_header_args', 'meetup_conference_custom_header_args_callback' );

/**
 * Enqueue scripts and styles.
 */
function meetup_conference_styles() {
    $my_theme = wp_get_theme();
    $version  = $my_theme['Version'];
    $build         = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix        = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
    $rtc_activated = the_conference_is_rara_theme_companion_activated();

    //Enqueue perfect-scrollbar again to fix the issue of CSS getting overridden
    if( $rtc_activated && is_active_widget( false, false, 'rrtc_description_widget' ) ){
        wp_enqueue_style( 'perfect-scrollbar', get_template_directory_uri(). '/css' . $build . '/perfect-scrollbar' . $suffix . '.css', array(), '1.3.0' );
        wp_enqueue_script( 'perfect-scrollbar', get_template_directory_uri() . '/js' . $build . '/perfect-scrollbar' . $suffix . '.js', array( 'jquery' ), '1.3.0', true ); 
    }
    wp_enqueue_style( 'the-conference-css', get_template_directory_uri()  . '/style.css' );
    wp_enqueue_style( 'meetup-conference-style', get_stylesheet_directory_uri() . '/style.css', array( 'the-conference-css' ), $version );

}
add_action( 'wp_enqueue_scripts', 'meetup_conference_styles');

/**
 * Register custom fonts.
 */
function the_conference_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by respective fonts, translate this to 'off'. Do not translate
    * into your own language.
    */

    $poppins       = _x( 'on', 'Poppins: on or off', 'meetup-conference' );

    if ( 'off' !== $poppins ) {
        $font_families = array();

        $font_families[] = 'Poppins:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i';

        $query_args = array(
            'family' => implode( '|', $font_families ),
            'subset' => 'latin,latin-ext',
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url( $fonts_url );
}

function the_conference_header(){ ?>
    <header class="site-header header-lay2" itemscope itemtype="https://schema.org/WPHeader">
        <div class="container">
            <?php the_conference_site_branding(); ?>
            <div class="nav-wrap">
                <?php 
                    the_conference_primary_nagivation(); 
                    the_conference_custom_header_link();
                ?>
            </div>
        </div>
    </header><!-- .site-header -->
    <?php
}

function the_conference_footer_bottom(){ ?>
    <div class="bottom-footer">
		<div class="container">
			<div class="site-info">            
            <?php
                the_conference_get_footer_copyright();
                if ( function_exists( 'the_privacy_policy_link' ) ) {
                    the_privacy_policy_link();
                }
            ?>               
            </div>
		</div>
	</div>
    <?php
}