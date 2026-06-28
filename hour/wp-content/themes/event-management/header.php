<?php
/**
 * The Header for our theme.
 * @package Event Management
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open(); 
  } else { 
    do_action( 'wp_body_open' ); 
  } ?>
  <?php if(get_theme_mod('event_management_preloader',false) != '' || get_theme_mod( 'event_management_display_preloader',false) != ''){ ?>
    <div class="frame w-100 h-100">
      <div class="loader">
        <div class="dot-1"></div>
        <div class="dot-2"></div>
        <div class="dot-3"></div>
      </div>
    </div>
  <?php }?>
  <header role="banner" class="header-box">
    <a class="screen-reader-text skip-link" href="#skip_content"><?php esc_html_e( 'Skip to content', 'event-management' ); ?></a>
    <?php if( get_theme_mod('event_management_show_top_header', false) != ''){ ?>
      <div class="top-header">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-3 align-self-center">
              <div class="contacts mail">
                <?php if ( get_theme_mod('event_management_email_address','') != "" ) {?>
                  <span class="me-3 mb-2 mb-md-0"><i class="<?php echo esc_attr(get_theme_mod('event_management_email_icon','far fa-envelope')); ?> me-2 icon-color"></i><a href="mailto:<?php echo esc_attr( get_theme_mod('event_management_email_address','' )); ?>"><?php echo esc_html('Email: ', 'event-management' ); ?><?php echo esc_html( get_theme_mod('event_management_email_address','') ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('event_management_email_address','') ); ?></span></a></span>
                <?php }?>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 align-self-center">
              <?php if( get_theme_mod('event_management_call') != ''){ ?>
                <div class="contacts call">
                  <span class="me-3 mb-2 mb-md-0"><i class="<?php echo esc_attr(get_theme_mod('event_management_phone_icon','fas fa-phone')); ?>"></i><a href="tel:<?php echo esc_attr( get_theme_mod('event_management_call','' )); ?>"><?php echo esc_html('Call: ', 'event-management' ); ?><?php echo esc_html( get_theme_mod('event_management_call','')); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('event_management_call','') ); ?></span></a></span>
                </div>
              <?php } ?>
            </div>
            <div class="col-lg-3 col-md-3 align-self-center">
              <?php if( get_theme_mod('event_management_location') != ''){ ?>
                <div class="contacts location">
                  <span class="me-3 mb-2 mb-md-0"><i class="<?php echo esc_attr(get_theme_mod('event_management_location_icon','fas fa-map-marker-alt')); ?>"></i><?php echo esc_html( get_theme_mod('event_management_location','')); ?></span>
                </div>
              <?php } ?>
            </div>
            <div class="col-lg-3 col-md-3 align-self-center">
              <div class="social-icons mb-2 mb-md-0">
                <?php if ( get_theme_mod('event_management_facebook_link','') != "" ) {?>
                  <a href="<?php echo esc_attr( get_theme_mod('event_management_facebook_link','' )); ?>"><i class="<?php echo esc_attr(get_theme_mod('event_management_facebook_icon','fab fa-facebook-f')); ?> me-3"></i></a>
                <?php }?>
                <?php if ( get_theme_mod('event_management_twitter_link','') != "" ) {?>
                  <a href="<?php echo esc_attr( get_theme_mod('event_management_twitter_link','' )); ?>"><i class="<?php echo esc_attr(get_theme_mod('event_management_twitter_icon','fab fa-twitter')); ?> me-3"></i></a>
                <?php }?>
                <?php if ( get_theme_mod('event_management_linkdin_link','') != "" ) {?>
                  <a href="<?php echo esc_attr( get_theme_mod('event_management_linkdin_link','' )); ?>"><i class="<?php echo esc_attr(get_theme_mod('event_management_linkdin_icon','fab fa-linkedin-in')); ?> me-3"></i></a>
                <?php }?>
                <?php if ( get_theme_mod('event_management_instagram_link','') != "" ) {?>
                  <a href="<?php echo esc_attr( get_theme_mod('event_management_instagram_link','' )); ?>"><i class="<?php echo esc_attr(get_theme_mod('event_management_instagram_icon','fab fa-instagram')); ?> me-3"></i></a>
                <?php }?>
                <?php if ( get_theme_mod('event_management_pintrest_link','') != "" ) {?>
                  <a href="<?php echo esc_attr( get_theme_mod('event_management_pintrest_link','' )); ?>"><i class="<?php echo esc_attr(get_theme_mod('event_management_pintrest_icon','fab fa-pinterest-p')); ?>"></i></a>
                <?php }?>
              </div> 
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <div id="header">
      <div class="menu-header py-2">
        <div class="container">
          <div class="menu-section">
            <div class="row">
              <div class="col-lg-3 col-md-4 col-9 align-self-center">
                <div class="logo pb-3 pb-md-0 align-self-center">
                  <div class="row">
                    <div class="<?php if( get_theme_mod( 'event_management_site_logo_inline') != '') { ?>col-lg-5 col-md-5 col-5"<?php } else { ?>col-lg-12 col-md-12  <?php } ?>">
                      <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                      <?php endif; ?>
                    </div>
                    <div class="<?php if( get_theme_mod( 'event_management_site_logo_inline') != '') { ?>col-lg-7 col-md-7 col-7 site-logo-inline"<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
                      <?php $blog_info = get_bloginfo( 'name' ); ?>
                      <?php if ( ! empty( $blog_info ) ) : ?>
                        <?php if( get_theme_mod('event_management_site_title_enable',true) != ''){ ?>
                          <?php if ( is_front_page() && is_home() ) : ?>
                            <h1 class="site-title pb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                          <?php else : ?>
                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                          <?php endif; ?>
                        <?php }?>
                      <?php endif; ?>
                      <?php
                      $description = get_bloginfo( 'description', 'display' );
                      if ( $description || is_customize_preview() ) : ?>
                        <?php if( get_theme_mod('event_management_site_tagline_enable',true) != ''){ ?>
                          <p class="site-description"><?php echo esc_html($description); ?></p>
                        <?php }?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-5 col-3 align-self-center <?php if( get_theme_mod( 'event_management_sticky_header', false) != '') { ?> sticky-header<?php } else { ?>close-sticky <?php } ?>">
                <?php
                if(has_nav_menu('primary')){ ?>
                  <div class="toggle-menu responsive-menu">
                    <button role="tab" onclick="event_management_menu_open()" class="mobiletoggle"><i class="<?php echo esc_attr(get_theme_mod('event_management_responsive_menu_open_icon','fas fa-bars')); ?>"></i><?php echo esc_html( get_theme_mod('event_management_open_menu_label', __('Open Menu','event-management'))); ?><span class="screen-reader-text"><?php esc_html_e('Open Menu','event-management'); ?></span>
                    </button>
                  </div>
                <?php }?>
                <div id="navbar-header text-center" class="menu-brand primary-nav">
                  <nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'event-management' ); ?>">
                    <?php
                      if(has_nav_menu('primary')){
                        wp_nav_menu( array( 
                          'theme_location' => 'primary',
                          'container_class' => 'main-menu-navigation clearfix' ,
                          'menu_class' => 'clearfix',
                          'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0 ps-0 text-start">%3$s</ul>',
                          'fallback_cb' => 'wp_page_menu',
                        ) );
                      } 
                    ?>
                  </nav>
                  <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="event_management_menu_close()"><?php echo esc_html( get_theme_mod('event_management_close_menu_label', __('Close Menu','event-management'))); ?><i class="<?php echo esc_attr(get_theme_mod('event_management_responsive_menu_close_icon','fas fa-times')); ?>"></i>
                    <span class="screen-reader-text"><?php esc_html_e('Close Menu','event-management'); ?></span></a>
                </div>
              </div>
              <div class="col-lg-3 col-md-3 align-self-center">
                <div class="request-btn text-md-end text-center">
                  <?php if ( get_theme_mod('event_management_request_text') != "" || get_theme_mod('event_management_request_link') != "") {?>
                    <a href="<?php echo esc_attr(get_theme_mod('event_management_request_link')); ?>"><?php echo esc_html(get_theme_mod('event_management_request_text','')); ?></a>
                  <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>