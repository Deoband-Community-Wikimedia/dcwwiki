<?php

	/*---------------------------Width Layout -------------------*/
	$event_management_theme_lay = get_theme_mod( 'event_management_width_layout_options','Default');
    if($event_management_theme_lay == 'Default'){
		$event_management_custom_css .='body{';
			$event_management_custom_css .='max-width: 100%;';
		$event_management_custom_css .='}';
	}else if($event_management_theme_lay == 'Container Layout'){
		$event_management_custom_css .='body{';
			$event_management_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$event_management_custom_css .='}';
	}else if($event_management_theme_lay == 'Box Layout'){
		$event_management_custom_css .='body{';
			$event_management_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$event_management_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$event_management_theme_lay = get_theme_mod( 'event_management_slider_content_layout','Left');
    if($event_management_theme_lay == 'Left'){
		$event_management_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$event_management_custom_css .='text-align:left;';
		$event_management_custom_css .='}';
	}else if($event_management_theme_lay == 'Center'){
		$event_management_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn{';
			$event_management_custom_css .='text-align:center;';
		$event_management_custom_css .='}';
	}else if($event_management_theme_lay == 'Right'){
		$event_management_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$event_management_custom_css .='text-align:right;';
		$event_management_custom_css .='}';
	}

	/*------------ Slider Opacity -------------------*/
	$event_management_theme_lay = get_theme_mod( 'event_management_slider_opacity','0.4');
	if($event_management_theme_lay == '0'){
	$event_management_custom_css .='#slider .slider-bg img{';
		$event_management_custom_css .='opacity:0';
	$event_management_custom_css .='}';
	}else if($event_management_theme_lay == '0.1'){
	$event_management_custom_css .='#slider .slider-bg img{';
		$event_management_custom_css .='opacity:0.1';
	$event_management_custom_css .='}';
	}else if($event_management_theme_lay == '0.2'){
	$event_management_custom_css .='#slider .slider-bg img{';
		$event_management_custom_css .='opacity:0.2';
	$event_management_custom_css .='}';
	}else if($event_management_theme_lay == '0.3'){
	$event_management_custom_css .='#slider .slider-bg img{';
		$event_management_custom_css .='opacity:0.3';
	$event_management_custom_css .='}';
	}else if($event_management_theme_lay == '0.4'){
	$event_management_custom_css .='#slider .slider-bg img{';
		$event_management_custom_css .='opacity:0.4';
	$event_management_custom_css .='}';
	}else if($event_management_theme_lay == '0.5'){
	$event_management_custom_css .='#slider .slider-bg img{';
		$event_management_custom_css .='opacity:0.5';
	$event_management_custom_css .='}';
	}else if($event_management_theme_lay == '0.6'){
	$event_management_custom_css .='#slider .slider-bg img{';
		$event_management_custom_css .='opacity:0.6';
	$event_management_custom_css .='}';
	}else if($event_management_theme_lay == '0.7'){
	$event_management_custom_css .='#slider .slider-bg img{';
		$event_management_custom_css .='opacity:0.7';
	$event_management_custom_css .='}';
	}else if($event_management_theme_lay == '0.8'){
	$event_management_custom_css .='#slider .slider-bg img{';
		$event_management_custom_css .='opacity:0.8';
	$event_management_custom_css .='}';
	}else if($event_management_theme_lay == '0.9'){
	$event_management_custom_css .='#slider .slider-bg img{';
		$event_management_custom_css .='opacity:0.9';
	$event_management_custom_css .='}';
	}

	/*-------------- Footer Text -------------------*/
	$event_management_footer_text_align = get_theme_mod('event_management_footer_text_align');
	$event_management_custom_css .='.copyright-wrapper{';
		$event_management_custom_css .='text-align: '.esc_attr($event_management_footer_text_align).';';
	$event_management_custom_css .='}';

	$event_management_footer_text_padding = get_theme_mod('event_management_footer_text_padding');
	$event_management_custom_css .='.copyright-wrapper{';
		$event_management_custom_css .='padding-top: '.esc_attr($event_management_footer_text_padding).'px !important; padding-bottom: '.esc_attr($event_management_footer_text_padding).'px !important;';
	$event_management_custom_css .='}';

	$event_management_footer_bg_color = get_theme_mod('event_management_footer_bg_color');
	$event_management_custom_css .='.footer-wp{';
		$event_management_custom_css .='background-color: '.esc_attr($event_management_footer_bg_color).';';
	$event_management_custom_css .='}';

	$event_management_footer_bg_image = get_theme_mod('event_management_footer_bg_image');
	if($event_management_footer_bg_image != false){
		$event_management_custom_css .='.footer-wp{';
			$event_management_custom_css .='background: url('.esc_attr($event_management_footer_bg_image).');';
		$event_management_custom_css .='}';
	}

	$event_management_copyright_text_font_size = get_theme_mod('event_management_copyright_text_font_size', 15);
	$event_management_custom_css .='.copyright-wrapper p, .copyright-wrapper a{';
		$event_management_custom_css .='font-size: '.esc_attr($event_management_copyright_text_font_size).'px;';
	$event_management_custom_css .='}';

	/*------------- Back to Top  -------------------*/
	$event_management_back_to_top_border_radius = get_theme_mod('event_management_back_to_top_border_radius');
	$event_management_custom_css .='#scrollbutton i{';
		$event_management_custom_css .='border-radius: '.esc_attr($event_management_back_to_top_border_radius).'px;';
	$event_management_custom_css .='}';

	$event_management_scroll_icon_font_size = get_theme_mod('event_management_scroll_icon_font_size', 22);
	$event_management_custom_css .='#scrollbutton i{';
		$event_management_custom_css .='font-size: '.esc_attr($event_management_scroll_icon_font_size).'px;';
	$event_management_custom_css .='}';

	$event_management_top_bottom_scroll_padding = get_theme_mod('event_management_top_bottom_scroll_padding', 12);
	$event_management_custom_css .='#scrollbutton i{';
		$event_management_custom_css .='padding-top: '.esc_attr($event_management_top_bottom_scroll_padding).'px; padding-bottom: '.esc_attr($event_management_top_bottom_scroll_padding).'px;';
	$event_management_custom_css .='}';

	$event_management_left_right_scroll_padding = get_theme_mod('event_management_left_right_scroll_padding', 17);
	$event_management_custom_css .='#scrollbutton i{';
		$event_management_custom_css .='padding-left: '.esc_attr($event_management_left_right_scroll_padding).'px; padding-right: '.esc_attr($event_management_left_right_scroll_padding).'px;';
	$event_management_custom_css .='}';

	/*-------------- Post Button  -------------------*/
	$event_management_post_button_padding_top = get_theme_mod('event_management_post_button_padding_top');
	$event_management_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$event_management_custom_css .='padding-top: '.esc_attr($event_management_post_button_padding_top).'px; padding-bottom: '.esc_attr($event_management_post_button_padding_top).'px;';
	$event_management_custom_css .='}';

	$event_management_post_button_padding_right = get_theme_mod('event_management_post_button_padding_right');
	$event_management_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$event_management_custom_css .='padding-left: '.esc_attr($event_management_post_button_padding_right).'px; padding-right: '.esc_attr($event_management_post_button_padding_right).'px;';
	$event_management_custom_css .='}';

	$event_management_post_button_border_radius = get_theme_mod('event_management_post_button_border_radius');
	$event_management_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$event_management_custom_css .='border-radius: '.esc_attr($event_management_post_button_border_radius).'px;';
	$event_management_custom_css .='}';

	$event_management_post_comment_enable = get_theme_mod('event_management_post_comment_enable',true);
	if($event_management_post_comment_enable == false){
		$event_management_custom_css .='#comments{';
			$event_management_custom_css .='display: none;';
		$event_management_custom_css .='}';
	}

	/*----------- Preloader Color Option  ----------------*/
	$event_management_preloader_bg_color_option = get_theme_mod('event_management_preloader_bg_color_option');
	$event_management_preloader_icon_color_option = get_theme_mod('event_management_preloader_icon_color_option');
	$event_management_custom_css .='.frame{';
		$event_management_custom_css .='background-color: '.esc_attr($event_management_preloader_bg_color_option).';';
	$event_management_custom_css .='}';
	$event_management_custom_css .='.dot-1,.dot-2,.dot-3{';
		$event_management_custom_css .='background-color: '.esc_attr($event_management_preloader_icon_color_option).';';
	$event_management_custom_css .='}';

	// preloader type
	$event_management_theme_lay = get_theme_mod( 'event_management_preloader_type','First Preloader Type');
    if($event_management_theme_lay == 'First Preloader Type'){
		$event_management_custom_css .='.dot-1, .dot-2, .dot-3{';
			$event_management_custom_css .='';
		$event_management_custom_css .='}';
	}else if($event_management_theme_lay == 'Second Preloader Type'){
		$event_management_custom_css .='.dot-1, .dot-2, .dot-3{';
			$event_management_custom_css .='border-radius:0;';
		$event_management_custom_css .='}';
	}

	/*------------------ Skin Option  -------------------*/
	$event_management_theme_lay = get_theme_mod( 'event_management_background_skin','Without Background');
    if($event_management_theme_lay == 'With Background'){
		$event_management_custom_css .='.inner-service,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin{';
			$event_management_custom_css .='background-color: #fff; padding:20px;';
		$event_management_custom_css .='}';
		$event_management_custom_css .='.login-box a{';
			$event_management_custom_css .='background-color: #fff;';
		$event_management_custom_css .='}';
	}else if($event_management_theme_lay == 'Without Background'){
		$event_management_custom_css .='{';
			$event_management_custom_css .='background-color: transparent;';
		$event_management_custom_css .='}';
	}

	/*-------------- Woocommerce Button  -------------------*/
	$event_management_woocommerce_button_padding_top = get_theme_mod('event_management_woocommerce_button_padding_top',12);
	$event_management_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$event_management_custom_css .='padding-top: '.esc_attr($event_management_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($event_management_woocommerce_button_padding_top).'px;';
	$event_management_custom_css .='}';
	

	$event_management_woocommerce_button_padding_right = get_theme_mod('event_management_woocommerce_button_padding_right',15);
	$event_management_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$event_management_custom_css .='padding-left: '.esc_attr($event_management_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($event_management_woocommerce_button_padding_right).'px;';
	$event_management_custom_css .='}';

	$event_management_woocommerce_button_border_radius = get_theme_mod('event_management_woocommerce_button_border_radius',30);
	$event_management_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$event_management_custom_css .='border-radius: '.esc_attr($event_management_woocommerce_button_border_radius).'px;';
	$event_management_custom_css .='}';

	$event_management_related_product_enable = get_theme_mod('event_management_related_product_enable',true);
	if($event_management_related_product_enable == false){
		$event_management_custom_css .='.related.products{';
			$event_management_custom_css .='display: none;';
		$event_management_custom_css .='}';
	}

	$event_management_woocommerce_product_border_enable = get_theme_mod('event_management_woocommerce_product_border_enable',true);
	if($event_management_woocommerce_product_border_enable == false){
		$event_management_custom_css .='.products li{';
			$event_management_custom_css .='border: none;';
		$event_management_custom_css .='}';
	}

	$event_management_woocommerce_product_padding_top = get_theme_mod('event_management_woocommerce_product_padding_top',10);
	$event_management_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$event_management_custom_css .='padding-top: '.esc_attr($event_management_woocommerce_product_padding_top).'px !important; padding-bottom: '.esc_attr($event_management_woocommerce_product_padding_top).'px !important;';
	$event_management_custom_css .='}';

	$event_management_woocommerce_product_padding_right = get_theme_mod('event_management_woocommerce_product_padding_right',10);
	$event_management_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$event_management_custom_css .='padding-left: '.esc_attr($event_management_woocommerce_product_padding_right).'px !important; padding-right: '.esc_attr($event_management_woocommerce_product_padding_right).'px !important;';
	$event_management_custom_css .='}';

	$event_management_woocommerce_product_border_radius = get_theme_mod('event_management_woocommerce_product_border_radius',0);
	$event_management_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$event_management_custom_css .='border-radius: '.esc_attr($event_management_woocommerce_product_border_radius).'px;';
	$event_management_custom_css .='}';

	$event_management_woocommerce_product_box_shadow = get_theme_mod('event_management_woocommerce_product_box_shadow', 5);
	$event_management_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$event_management_custom_css .='box-shadow: '.esc_attr($event_management_woocommerce_product_box_shadow).'px '.esc_attr($event_management_woocommerce_product_box_shadow).'px '.esc_attr($event_management_woocommerce_product_box_shadow).'px #eee;';
	$event_management_custom_css .='}';

	$event_management_woo_product_sale_top_bottom_padding = get_theme_mod('event_management_woo_product_sale_top_bottom_padding', 0);
	$event_management_woo_product_sale_left_right_padding = get_theme_mod('event_management_woo_product_sale_left_right_padding', 0);
	$event_management_custom_css .='.woocommerce span.onsale{';
		$event_management_custom_css .='padding-top: '.esc_attr($event_management_woo_product_sale_top_bottom_padding).'px; padding-bottom: '.esc_attr($event_management_woo_product_sale_top_bottom_padding).'px; padding-left: '.esc_attr($event_management_woo_product_sale_left_right_padding).'px; padding-right: '.esc_attr($event_management_woo_product_sale_left_right_padding).'px; display:inline-block;';
	$event_management_custom_css .='}';

	$event_management_woo_product_sale_border_radius = get_theme_mod('event_management_woo_product_sale_border_radius',50);
	$event_management_custom_css .='.woocommerce span.onsale {';
		$event_management_custom_css .='border-radius: '.esc_attr($event_management_woo_product_sale_border_radius).'px;';
	$event_management_custom_css .='}';

	$event_management_woo_product_sale_position = get_theme_mod('event_management_woo_product_sale_position', 'Right');
	if($event_management_woo_product_sale_position == 'Right' ){
		$event_management_custom_css .='.woocommerce ul.products li.product .onsale{';
			$event_management_custom_css .=' left:auto; right:0;';
		$event_management_custom_css .='}';
	}elseif($event_management_woo_product_sale_position == 'Left' ){
		$event_management_custom_css .='.woocommerce ul.products li.product .onsale{';
			$event_management_custom_css .=' left:0; right:auto;';
		$event_management_custom_css .='}';
	}

	$event_management_wooproduct_sale_font_size = get_theme_mod('event_management_wooproduct_sale_font_size',14);
	$event_management_custom_css .='.woocommerce span.onsale{';
		$event_management_custom_css .='font-size: '.esc_attr($event_management_wooproduct_sale_font_size).'px;';
	$event_management_custom_css .='}';

	// Responsive Media
	$event_management_post_date = get_theme_mod( 'event_management_display_post_date',true);
	if($event_management_post_date == true && get_theme_mod( 'event_management_metafields_date',true) != true){
    	$event_management_custom_css .='.metabox .entry-date{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} ';
	}
    if($event_management_post_date == true){
    	$event_management_custom_css .='@media screen and (max-width:575px) {';
		$event_management_custom_css .='.metabox .entry-date{';
			$event_management_custom_css .='display:inline-block;';
		$event_management_custom_css .='} }';
	}else if($event_management_post_date == false){
		$event_management_custom_css .='@media screen and (max-width:575px){';
		$event_management_custom_css .='.metabox .entry-date{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} }';
	}

	$event_management_post_author = get_theme_mod( 'event_management_display_post_author',true);
	if($event_management_post_author == true && get_theme_mod( 'event_management_metafields_author',true) != true){
    	$event_management_custom_css .='.metabox .entry-author{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} ';
	}
    if($event_management_post_author == true){
    	$event_management_custom_css .='@media screen and (max-width:575px) {';
		$event_management_custom_css .='.metabox .entry-author{';
			$event_management_custom_css .='display:inline-block;';
		$event_management_custom_css .='} }';
	}else if($event_management_post_author == false){
		$event_management_custom_css .='@media screen and (max-width:575px){';
		$event_management_custom_css .='.metabox .entry-author{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} }';
	}

	$event_management_post_comment = get_theme_mod( 'event_management_display_post_comment',true);
	if($event_management_post_comment == true && get_theme_mod( 'event_management_metafields_comment',true) != true){
    	$event_management_custom_css .='.metabox .entry-comments{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} ';
	}
    if($event_management_post_comment == true){
    	$event_management_custom_css .='@media screen and (max-width:575px) {';
		$event_management_custom_css .='.metabox .entry-comments{';
			$event_management_custom_css .='display:inline-block;';
		$event_management_custom_css .='} }';
	}else if($event_management_post_comment == false){
		$event_management_custom_css .='@media screen and (max-width:575px){';
		$event_management_custom_css .='.metabox .entry-comments{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} }';
	}

	$event_management_post_time = get_theme_mod( 'event_management_display_post_time',false);
	if($event_management_post_time == true && get_theme_mod( 'event_management_metafields_time',false) != true){
    	$event_management_custom_css .='.metabox .entry-time{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} ';
	}
    if($event_management_post_time == true){
    	$event_management_custom_css .='@media screen and (max-width:575px) {';
		$event_management_custom_css .='.metabox .entry-time{';
			$event_management_custom_css .='display:inline-block;';
		$event_management_custom_css .='} }';
	}else if($event_management_post_time == false){
		$event_management_custom_css .='@media screen and (max-width:575px){';
		$event_management_custom_css .='.metabox .entry-time{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} }';
	}

	if($event_management_post_date == false && $event_management_post_author == false && $event_management_post_comment == false && $event_management_post_time == false){
		$event_management_custom_css .='@media screen and (max-width:575px) {';
    	$event_management_custom_css .='.metabox {';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} }';
	}

	$event_management_metafields_date = get_theme_mod( 'event_management_metafields_date',true);
	$event_management_metafields_author = get_theme_mod( 'event_management_metafields_author',true);
	$event_management_metafields_comment = get_theme_mod( 'event_management_metafields_comment',true);
	$event_management_metafields_time = get_theme_mod( 'event_management_metafields_time',true);
	if($event_management_metafields_date == false && $event_management_metafields_author == false && $event_management_metafields_comment == false && $event_management_metafields_time == false){
		$event_management_custom_css .='@media screen and (min-width:576px) {';
    	$event_management_custom_css .='.metabox {';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} }';
	}

	$event_management_slider = get_theme_mod( 'event_management_display_slider',false);
	if($event_management_slider == true && get_theme_mod( 'event_management_slider_hide', false) == false){
    	$event_management_custom_css .='#slider{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} ';
	}
    if($event_management_slider == true){
    	$event_management_custom_css .='@media screen and (max-width:575px) {';
		$event_management_custom_css .='#slider{';
			$event_management_custom_css .='display:block;';
		$event_management_custom_css .='} }';
	}else if($event_management_slider == false){
		$event_management_custom_css .='@media screen and (max-width:575px){';
		$event_management_custom_css .='#slider{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} }';
	}

	$event_management_sidebar = get_theme_mod( 'event_management_display_sidebar',true);
    if($event_management_sidebar == true){
    	$event_management_custom_css .='@media screen and (max-width:575px) {';
		$event_management_custom_css .='#sidebar{';
			$event_management_custom_css .='display:block;';
		$event_management_custom_css .='} }';
	}else if($event_management_sidebar == false){
		$event_management_custom_css .='@media screen and (max-width:575px) {';
		$event_management_custom_css .='#sidebar{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} }';
	}

	$event_management_scroll = get_theme_mod( 'event_management_display_scrolltop',true);
	if($event_management_scroll == true && get_theme_mod( 'event_management_hide_show_scroll',true) != true){
    	$event_management_custom_css .='#scrollbutton i{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} ';
	}
    if($event_management_scroll == true){
    	$event_management_custom_css .='@media screen and (max-width:575px) {';
		$event_management_custom_css .='#scrollbutton i{';
			$event_management_custom_css .='display:block;';
		$event_management_custom_css .='} }';
	}else if($event_management_scroll == false){
		$event_management_custom_css .='@media screen and (max-width:575px){';
		$event_management_custom_css .='#scrollbutton i{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} }';
	}

	$event_management_preloader = get_theme_mod( 'event_management_display_preloader',false);
	if($event_management_preloader == true && get_theme_mod( 'event_management_preloader',false) == false){
		$event_management_custom_css .='@media screen and (min-width:575px) {';
    	$event_management_custom_css .='.frame{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} }';
	}
    if($event_management_preloader == true){
    	$event_management_custom_css .='@media screen and (max-width:575px) {';
		$event_management_custom_css .='.frame{';
			$event_management_custom_css .='display:block;';
		$event_management_custom_css .='} }';
	}else if($event_management_preloader == false){
		$event_management_custom_css .='@media screen and (max-width:575px){';
		$event_management_custom_css .='.frame{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} }';
	}

	$event_management_search = get_theme_mod( 'event_management_display_search_category',true);
	if($event_management_search == true && get_theme_mod( 'event_management_search_enable_disable',true) != true){
    	$event_management_custom_css .='.search-cat-box{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} ';
	}
    if($event_management_search == true){
    	$event_management_custom_css .='@media screen and (max-width:575px) {';
		$event_management_custom_css .='.search-cat-box{';
			$event_management_custom_css .='display:block;';
		$event_management_custom_css .='} }';
	}else if($event_management_search == false){
		$event_management_custom_css .='@media screen and (max-width:575px){';
		$event_management_custom_css .='.search-cat-box{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} }';
	}

	$event_management_myaccount = get_theme_mod( 'event_management_display_myaccount',true);
	if($event_management_myaccount == true && get_theme_mod( 'event_management_myaccount_enable_disable',true) != true){
    	$event_management_custom_css .='.login-box{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} ';
	}
    if($event_management_myaccount == true){
    	$event_management_custom_css .='@media screen and (max-width:575px) {';
		$event_management_custom_css .='.login-box{';
			$event_management_custom_css .='display:block;';
		$event_management_custom_css .='} }';
	}else if($event_management_myaccount == false){
		$event_management_custom_css .='@media screen and (max-width:575px){';
		$event_management_custom_css .='.login-box{';
			$event_management_custom_css .='display:none;';
		$event_management_custom_css .='} }';
	}

	// menu settings
	$event_management_menu_font_size_option = get_theme_mod('event_management_menu_font_size_option',14);
	$event_management_custom_css .='.primary-navigation ul li a{';
		$event_management_custom_css .='font-size: '.esc_attr($event_management_menu_font_size_option).'px;';
	$event_management_custom_css .='}';

	$event_management_menu_padding = get_theme_mod('event_management_menu_padding');
	$event_management_custom_css .='.primary-navigation ul li a{';
		$event_management_custom_css .='padding: '.esc_attr($event_management_menu_padding).'px;';
	$event_management_custom_css .='}';

	$event_management_theme_lay = get_theme_mod( 'event_management_text_tranform_menu','Uppercase');
    if($event_management_theme_lay == 'Uppercase'){
		$event_management_custom_css .='.primary-navigation ul li a{';
			$event_management_custom_css .='text-transform: Uppercase;';
		$event_management_custom_css .='}';
	}else if($event_management_theme_lay == 'Lowercase'){
		$event_management_custom_css .='.primary-navigation ul li a{';
			$event_management_custom_css .='text-transform: lowercase;';
		$event_management_custom_css .='}';
	}
	else if($event_management_theme_lay == 'Capitalize'){
		$event_management_custom_css .='.primary-navigation ul li a{';
			$event_management_custom_css .='text-transform: Capitalize;';
		$event_management_custom_css .='}';
	}

	// menu font weight
	$event_management_font_weight_option_menu = get_theme_mod( 'event_management_font_weight_option_menu','600');
	if($event_management_font_weight_option_menu != ''){
		$event_management_custom_css .='.primary-navigation ul li a, #site-navigation li a{';
			$event_management_custom_css .='font-weight: '.esc_attr($event_management_font_weight_option_menu).';';
		$event_management_custom_css .='}';
	}

	// slider height
	$event_management_option_slider_height = get_theme_mod('event_management_option_slider_height');
	$event_management_custom_css .='#slider .slider-bg img{';
		$event_management_custom_css .='height: '.esc_attr($event_management_option_slider_height).'px;';
	$event_management_custom_css .='}';

	// slider content spacing
	$event_management_slider_content_top_padding = get_theme_mod('event_management_slider_content_top_padding');
	$event_management_slider_content_left_padding = get_theme_mod('event_management_slider_content_left_padding');
	$event_management_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
		$event_management_custom_css .='top: '.esc_attr($event_management_slider_content_top_padding).'%; bottom: '.esc_attr($event_management_slider_content_top_padding).'%;left: '.esc_attr($event_management_slider_content_left_padding).'%;right: '.esc_attr($event_management_slider_content_left_padding).'%;';
	$event_management_custom_css .='}';

	// slider overlay
	$event_management_enable_slider_overlay = get_theme_mod('event_management_enable_slider_overlay', true);
	if($event_management_enable_slider_overlay == false){
		$event_management_custom_css .='#slider image{';
			$event_management_custom_css .='opacity:1;';
		$event_management_custom_css .='}';
	} 
	$event_management_slider_overlay_color = get_theme_mod('event_management_slider_overlay_color', true);
	if($event_management_enable_slider_overlay != false){
		$event_management_custom_css .='#slider{';
			$event_management_custom_css .='background: '.esc_attr($event_management_slider_overlay_color).';';
		$event_management_custom_css .='}';
	}

	//  comment form width
	$event_management_comment_form_width = get_theme_mod( 'event_management_comment_form_width');
	$event_management_custom_css .='#comments textarea{';
		$event_management_custom_css .='width: '.esc_attr($event_management_comment_form_width).'%;';
	$event_management_custom_css .='}';

	$event_management_title_comment_form = get_theme_mod('event_management_title_comment_form', 'Leave a Reply');
	if($event_management_title_comment_form == ''){
		$event_management_custom_css .='#comments h2#reply-title {';
			$event_management_custom_css .='display: none;';
		$event_management_custom_css .='}';
	}

	$event_management_comment_form_button_content = get_theme_mod('event_management_comment_form_button_content', 'Post Comment');
	if($event_management_comment_form_button_content == ''){
		$event_management_custom_css .='#comments p.form-submit {';
			$event_management_custom_css .='display: none;';
		$event_management_custom_css .='}';
	}

	// featured image setting
	$event_management_image_border_radius = get_theme_mod('event_management_image_border_radius', 0);
	$event_management_custom_css .='.box-image img, .content_box img{';
		$event_management_custom_css .='border-radius: '.esc_attr($event_management_image_border_radius).'%;';
	$event_management_custom_css .='}';

	$event_management_image_box_shadow = get_theme_mod('event_management_image_box_shadow',0);
	$event_management_custom_css .='.box-image img, .content_box img{';
		$event_management_custom_css .='box-shadow: '.esc_attr($event_management_image_box_shadow).'px '.esc_attr($event_management_image_box_shadow).'px '.esc_attr($event_management_image_box_shadow).'px #b5b5b5;';
	$event_management_custom_css .='}';

	// Post Block
	$event_management_post_block_option = get_theme_mod( 'event_management_post_block_option','By Block');
    if($event_management_post_block_option == 'By Without Block'){
		$event_management_custom_css .='.gridbox .inner-service, .related-inner-box, .mainbox-post, .layout2, .layout1, .post_format-post-format-video,.post_format-post-format-image,.post_format-post-format-audio, .post_format-post-format-gallery, .mainbox, #blog_sec .sticky{';
			$event_management_custom_css .='border:none; margin:30px 0;';
		$event_management_custom_css .='}';
	}

	// post image 
	$event_management_post_featured_color = get_theme_mod('event_management_post_featured_color', '#FD5056');
	$event_management_post_featured_image = get_theme_mod('event_management_post_featured_image','Image');
	if($event_management_post_featured_image == 'Color'){
		$event_management_custom_css .='.post-color{';
			$event_management_custom_css .='background-color: '.esc_attr($event_management_post_featured_color).';';
		$event_management_custom_css .='}';
	}

	// featured image dimention
	$event_management_post_featured_image_dimention = get_theme_mod('event_management_post_featured_image_dimention', 'Default');
	$event_management_post_featured_image_custom_width = get_theme_mod('event_management_post_featured_image_custom_width');
	$event_management_post_featured_image_custom_height = get_theme_mod('event_management_post_featured_image_custom_height');
	if($event_management_post_featured_image_dimention == 'Custom'){
		$event_management_custom_css .='.box-image img{';
			$event_management_custom_css .='width: '.esc_attr($event_management_post_featured_image_custom_width).'px; height: '.esc_attr($event_management_post_featured_image_custom_height).'px;';
		$event_management_custom_css .='}';
	}

	// featured image dimention
	$event_management_custom_post_color_width = get_theme_mod('event_management_custom_post_color_width');
	$event_management_custom_post_color_height = get_theme_mod('event_management_custom_post_color_height');
	if($event_management_post_featured_image == 'Color'){
		$event_management_custom_css .='.post-color{';
			$event_management_custom_css .='width: '.esc_attr($event_management_custom_post_color_width).'px; height: '.esc_attr($event_management_custom_post_color_height).'px;';
		$event_management_custom_css .='}';
	}

	// site title font size
	$event_management_site_title_font_size = get_theme_mod('event_management_site_title_font_size', 30);
	$event_management_custom_css .='.logo h1, .site-title a, .logo .site-title a{';
	$event_management_custom_css .='font-size: '.esc_attr($event_management_site_title_font_size).'px;';
	$event_management_custom_css .='}';

	// site tagline font size
	$event_management_site_tagline_font_size = get_theme_mod('event_management_site_tagline_font_size', 15);
	$event_management_custom_css .='p.site-description{';
	$event_management_custom_css .='font-size: '.esc_attr($event_management_site_tagline_font_size).'px;';
	$event_management_custom_css .='}';

	// site logo padding 
	$event_management_logo_padding_font_size = get_theme_mod('event_management_logo_padding_font_size', '');
	$event_management_custom_css .='.logo{';
	$event_management_custom_css .='padding: '.esc_attr($event_management_logo_padding_font_size).'px !important;';
	$event_management_custom_css .='}';

	// woocommerce Product Navigation
	$event_management_wooproducts_nav = get_theme_mod('event_management_wooproducts_nav', 'Yes');
	if($event_management_wooproducts_nav == 'No'){
		$event_management_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$event_management_custom_css .='display: none;';
		$event_management_custom_css .='}';
	}

	/*------ Footer background css -------*/
	$event_management_footer_text_bg_color = get_theme_mod('event_management_footer_text_bg_color');
	if($event_management_footer_text_bg_color != false){
		$event_management_custom_css .='.copyright-wrapper{';
			$event_management_custom_css .='background-color: '.esc_attr($event_management_footer_text_bg_color).';';
		$event_management_custom_css .='}';
	}

	// social icons font size
	$event_management_social_icons_size = get_theme_mod('event_management_social_icons_size', 13);
	$event_management_custom_css .='.social-icons i{';
		$event_management_custom_css .='font-size: '.esc_attr($event_management_social_icons_size).'px;';
	$event_management_custom_css .='}';

	// site title color
	$event_management_site_title_color = get_theme_mod('event_management_site_title_color');
	$event_management_custom_css .='.site-title a{';
		$event_management_custom_css .='color: '.esc_attr($event_management_site_title_color).' !important;';
	$event_management_custom_css .='}';

	// site tagline color
	$event_management_site_tagline_color = get_theme_mod('event_management_site_tagline_color');
	$event_management_custom_css .='.site-description{';
		$event_management_custom_css .='color: '.esc_attr($event_management_site_tagline_color).' !important;';
	$event_management_custom_css .='}';

	// site toggle button color
	$event_management_toggle_button_color = get_theme_mod('event_management_toggle_button_color');
	$event_management_custom_css .='.toggle-menu i{';
		$event_management_custom_css .='color: '.esc_attr($event_management_toggle_button_color).' !important;';
	$event_management_custom_css .='}';

	// menu color
	$event_management_menu_color = get_theme_mod('event_management_menu_color');

	$event_management_custom_css .='.primary-navigation a, .primary-navigation ul li a, #site-navigation li a{';
			$event_management_custom_css .='color: '.esc_attr($event_management_menu_color).' !important;';
	$event_management_custom_css .='}';

// Sub menu color
	$event_management_sub_menu_color = get_theme_mod('event_management_sub_menu_color');

	$event_management_custom_css .='.primary-navigation ul.sub-menu a, .primary-navigation ul.sub-menu li a, #site-navigation ul.sub-menu li a{';
			$event_management_custom_css .='color: '.esc_attr($event_management_sub_menu_color).' !important;';
	$event_management_custom_css .='}';

// menu hover color
	$event_management_menu_hover_color = get_theme_mod('event_management_menu_hover_color');

	$event_management_custom_css .='.primary-navigation a:hover, .primary-navigation ul li a:hover, #site-navigation li a:hover{';
			$event_management_custom_css .='color: '.esc_attr($event_management_menu_hover_color).' !important;';
	$event_management_custom_css .='}';

// submenu hover color
	$event_management_sub_menu_hover_color = get_theme_mod('event_management_sub_menu_hover_color');

	$event_management_custom_css .='.primary-navigation ul.sub-menu a, .primary-navigation ul.sub-menu li a:hover, #site-navigation ul.sub-menu li a:hover{';
			$event_management_custom_css .='color: '.esc_attr($event_management_sub_menu_hover_color).' !important;';
	$event_management_custom_css .='}';

	// topbar padding option
	$event_management_topbar_padding_settings = get_theme_mod('event_management_topbar_padding_settings', 15);
		$event_management_custom_css .='.top-header{';
			$event_management_custom_css .='padding: '.esc_attr($event_management_topbar_padding_settings).'px !important;';
		$event_management_custom_css .='}';

	// site logo margin 
	$event_management_logo_margin = get_theme_mod('event_management_logo_margin', '');
	$event_management_custom_css .='.logo{';
	$event_management_custom_css .='margin: '.esc_attr($event_management_logo_margin).'px ;';
	$event_management_custom_css .='}';



	


	
