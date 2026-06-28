<?php

add_action( 'admin_menu', 'event_management_gettingstarted' );
function event_management_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'event-management'), esc_html__('About Theme', 'event-management'), 'edit_theme_options', 'event-management-guide-page', 'event_management_guide');   
}

function event_management_admin_theme_style() {
   wp_enqueue_style('event-management-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/get_started_info.css');
}
add_action('admin_enqueue_scripts', 'event_management_admin_theme_style');

function event_management_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {?>
    <div class="notice notice-success is-dismissible getting_started">
		<div class="notice-content">
			<h2><?php esc_html_e( 'Thanks for installing Event Management, you rock!', 'event-management' ) ?> </h2>
			<p><?php esc_html_e( 'Take benefit of a variety of features, functionalities, elements, and an exclusive set of customization options to build your own professional event management website. Please Click on the link below to know the theme setup information.', 'event-management' ) ?></p>
			<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=event-management-guide-page' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Getting Started', 'event-management' ); ?></a></p>
		</div>
	</div>
	<?php }
}
add_action('admin_notices', 'event_management_notice');

/**
 * Theme Info Page
 */
function event_management_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'event-management' ); ?>

	<div class="wrap getting-started">
		<div class="getting-started__header">
			<div class="row">
				<div class="col-md-5 intro">
					<div class="pad-box">
						<h2><?php esc_html_e( 'Welcome to Event Management', 'event-management' ); ?></h2>
						<p>Version: <?php echo esc_html($theme['Version']);?></p>
						<span class="intro__version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and flexible WordPress theme.', 'event-management' ); ?>	
						</span>
						<div class="powered-by">
							<p><strong><?php esc_html_e( 'Theme created by Buy WP Templates', 'event-management' ); ?></strong></p>
							<p>
								<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/theme-logo.png'); ?>"/>
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="pro-links">
				    	<a href="<?php echo esc_url( EVENT_MANAGEMENT_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'event-management'); ?></a>
						<a href="<?php echo esc_url( EVENT_MANAGEMENT_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'event-management'); ?></a>
						<a href="<?php echo esc_url( EVENT_MANAGEMENT_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'event-management'); ?></a>
					</div>
					<div class="install-plugins">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive1.png'); ?>" alt="" />
					</div>
				</div>
			</div>
			<h2 class="tg-docs-section intruction-title" id="section-4"><?php esc_html_e( '1). Setup Event Management Theme', 'event-management' ); ?></h2>
			<div class="row">
				<div class="theme-instruction-block col-md-7">
					<div class="pad-box">
	                    <p><?php esc_html_e( 'Event Management is a clean and sleek WordPress Theme for event management agencies and companies. The beautiful design is suitable for managing events such as weddings, special occasions, birthdays, anniversaries, engagement parties, seminars, other corporate events, and much more. The theme is well-integrated with secure and clean codes reflected in the SEO-friendly design that also takes care of your ranks in the search engines. Thanks to the highly optimized codes, you will have a speedy website that results in faster page load time. The customization and personalization options available with the theme make it multipurpose and the Bootstrap framework gives it a robust design. The responsive design of the theme gives you a fully flexible website that seamlessly adjusts its layout according to the different screen sizes. The theme is interactive and makes use of the HTML codes. To make the overall website more interactive, this theme includes Call To Action Buttons (CTA) that are smartly placed at key places resulting in improved conversion rates. It has user-friendly theme options and a lot of shortcodes for adding content elements. Several sections including the Testimonial, Team, etc. are included as a part of the design. With social media options, you will be able to reach a global audience. ', 'event-management' ); ?><p><br>
						<ol>
							<li><?php esc_html_e( 'Start','event-management'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','event-management'); ?></a> <?php esc_html_e( 'your website.','event-management'); ?> </li>
							<li><?php esc_html_e( 'Event Management','event-management'); ?> <a target="_blank" href="<?php echo esc_url( EVENT_MANAGEMENT_FREE_DOC ); ?>"><?php esc_html_e( 'Documentation','event-management'); ?></a> </li>
						</ol>
                    </div>
              	</div>
				<div class="col-md-5">
					<div class="pad-box">
              			<img class="logo" src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/screenshot.png'); ?>"/>
              		 </div> 
              	</div>
            </div>
			<div class="col-md-12 text-block">
					<h2 class="dashboard-install-title"><?php esc_html_e( '2.) Premium Theme Information.','event-management'); ?></h2>
					<div class="row">
						<div class="col-md-7">
							<img src="<?php echo esc_url(get_template_directory_uri() . '/inc/dashboard/media/responsive.png'); ?>" alt="">
							<div class="pad-box">
								<h3><?php esc_html_e( 'Pro Theme Description','event-management'); ?></h3>
	                    		<p class="pad-box-p"><?php esc_html_e( 'If you are looking to carve a niche in the event management business, what could be better than creating a website. This Event Management WordPress Theme gives you a stunning design that is exclusively created for event planners, event management firms, etc. Wedding planners and other party organizers can also use this theme. Its design is very clean and sorted yet stylish and trendy giving a perfect look for showing parties and events online. The color scheme is absolutely gorgeous and goes very well with the concept. Event Management WordPress Theme comes with a nicely designed header followed by an amazing full-width slider to display the blazing images of your events and catch the attention of your audience. To add more professional touch to your website, you can upload your company’s customized logo. There is no need to get worried about the initial setup process as well as making your website live since the demo data gives you a perfect design to kickstart your website with. A functionally beautiful homepage depicts all your details including your work, experience in the field, the number of clients you have worked for, your contact details as well as email ID.', 'event-management' ); ?><p>
	                    	</div>
						</div>
						<div class="col-md-5 install-plugin-right">
							<div class="pad-box">								
								<h3><?php esc_html_e( 'Pro Theme Features','event-management'); ?></h3>
								<div class="dashboard-install-benefit">
									<ul>
										<li><?php esc_html_e( 'Car listing Shortcode with category','event-management'); ?></li>
										<li><?php esc_html_e( 'Car listing Shortcode','event-management'); ?></li>
										<li><?php esc_html_e( 'Multiple image feature for each property with slider.','event-management'); ?></li>
										<li><?php esc_html_e( 'Brand Listing Section','event-management'); ?></li>
										<li><?php esc_html_e( 'Car Brand(categories) Option','event-management'); ?></li>
										<li><?php esc_html_e( 'Car Tags(categories) Option','event-management'); ?></li>
										<li><?php esc_html_e( 'Testimonial listing.','event-management'); ?></li>
										<li><?php esc_html_e( 'Testimonial shortcode.','event-management'); ?></li>
										<li><?php esc_html_e( 'Social icons widget.','event-management'); ?></li>
										<li><?php esc_html_e( 'Latest post with the image widget.','event-management'); ?></li>
										<li><?php esc_html_e( 'Live customize editor for the About US section.','event-management'); ?></li>
										<li><?php esc_html_e( 'Font Awesome integrated.','event-management'); ?></li>
										<li><?php esc_html_e( 'Advanced Color options and color pallets.','event-management'); ?></li>
										<li><?php esc_html_e( '100+ Font Family Options.','event-management'); ?></li>
										<li><?php esc_html_e( 'Enable-Disable options on All sections.','event-management'); ?></li>
										<li><?php esc_html_e( 'Well sanitized as per WordPress standards.','event-management'); ?></li>
										<li><?php esc_html_e( 'Allow to set site title, tagline, logo.','event-management'); ?></li>
										<li><?php esc_html_e( 'Sticky post & Comment threads.','event-management'); ?></li>
										<li><?php esc_html_e( 'Left and Right Sidebar.','event-management'); ?></li>
										<li><?php esc_html_e( 'Customizable Home Page.','event-management'); ?></li>
										<li><?php esc_html_e( 'Footer Widgets & Editor style','event-management'); ?></li>
										<li><?php esc_html_e( 'Gallery & Banner functionality','event-management'); ?></li>
										<li><?php esc_html_e( 'Multiple inner page templates','event-management'); ?></li>
										<li><?php esc_html_e( 'Full-width Template','event-management'); ?></li>
										<li><?php esc_html_e( 'Custom Menu, Colors Editor','event-management'); ?></li>
									</ul>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div class="dashboard__blocks">
			<div class="row">
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Get Support','event-management'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( EVENT_MANAGEMENT_FREE_SUPPORT ); ?>"><?php esc_html_e( 'Free Theme Support','event-management'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( EVENT_MANAGEMENT_PRO_SUPPORT ); ?>"><?php esc_html_e( 'Premium Theme Support','event-management'); ?></a></li>
					</ol>
				</div>

				<div class="col-md-3">
					<h3><?php esc_html_e( 'Getting Started','event-management'); ?></h3>
					<ol>
						<li><?php esc_html_e( 'Start','event-management'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizing','event-management'); ?></a> <?php esc_html_e( 'your website.','event-management'); ?> </li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Help Docs','event-management'); ?></h3>
					<ol>
						<li><a target="_blank" href="<?php echo esc_url( EVENT_MANAGEMENT_FREE_DOC ); ?>"><?php esc_html_e( 'Free Theme Documentation','event-management'); ?></a></li>
						<li><a target="_blank" href="<?php echo esc_url( EVENT_MANAGEMENT_PRO_DOC ); ?>"><?php esc_html_e( 'Premium Theme Documentation','event-management'); ?></a></li>
					</ol>
				</div>
				<div class="col-md-3">
					<h3><?php esc_html_e( 'Buy Premium','event-management'); ?></h3>
					<ol>
						<a href="<?php echo esc_url( EVENT_MANAGEMENT_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'event-management'); ?></a>
					</ol>
				</div>
			</div>
		</div>
	</div>

<?php }?>