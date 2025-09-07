<?php
	
	/*---------------First highlight color-------------------*/

	$vw_kids_first_color = get_theme_mod('vw_kids_first_color');

	$vw_kids_custom_css = '';

	if($vw_kids_first_color != false){
		$vw_kids_custom_css .='.cart-value, #menu-box, #slider .view-more:hover, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .scrollup i, input[type="submit"], #sidebar .custom-social-icons i, #footer .custom-social-icons i, #footer .tagcloud a:hover, #footer-2, .view-more:hover, .pagination .current, .pagination a:hover, #sidebar .tagcloud a:hover, #comments input[type="submit"], nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .header-fixed, #comments a.comment-reply-link, #sidebar .widget_price_filter .ui-slider .ui-slider-range, #sidebar .widget_price_filter .ui-slider .ui-slider-handle, #sidebar .woocommerce-product-search button, #footer .widget_price_filter .ui-slider .ui-slider-range, #footer .widget_price_filter .ui-slider .ui-slider-handle, #sidebar #respond input#submit:hover, #sidebar a.button:hover, #sidebar button.button:hover, #footer input.button:hover, #footer #respond input#submit.alt:hover, #footer a.button.alt:hover, #footer button.button.alt:hover, #footer input.button.alt:hover, #footer #respond input#submit:hover, #footer a.button:hover, #footer button.button:hover, #footer input.button:hover, #footer #respond input#submit.alt:hover, #footer a.button.alt:hover, #footer button.button.alt:hover, #footer input.button.alt:hover, #footer .woocommerce-product-search button, #sidebar .more-button a:hover, #footer a.custom_read_more, .nav-previous a:hover, .nav-next a:hover, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, #preloader, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button,.bradcrumbs span,.bradcrumbs a:hover,.post-categories li a, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, #sidebar h3, #sidebar .wp-block-search .wp-block-search__label, #sidebar .wp-block-search .wp-block-search__label, #sidebar .wp-block-heading, nav.navigation.posts-navigation .nav-previous a, .wp-block-tag-cloud a:hover, .wp-block-button .wp-block-button__link:hover, .wp-block-button .wp-block-button__link:focus, a.wc-block-components-checkout-return-to-cart-button{';
			$vw_kids_custom_css .='background-color: '.esc_attr($vw_kids_first_color).';';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_first_color != false){
		$vw_kids_custom_css .='.products li:hover, .products li:hover span.onsale,.wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button,.wc-block-components-order-summary .wc-block-components-order-summary-item__quantity,.wp-block-woocommerce-cart .wc-block-components-product-badgem,#tag-cloud-sec .tag-cloud-link,.wp-block-woocommerce-empty-cart-block a.wp-block-button__link.add_to_cart_button.ajax_add_to_cart,header.woocommerce-Address-title.title a,.wp-block-woocommerce-empty-cart-block .wc-block-grid__product-onsale,.wp-block-woocommerce-cart .wc-block-components-product-badge{';
			$vw_kids_custom_css .='background-color: '.esc_attr($vw_kids_first_color).'!important;';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_first_color != false){
		$vw_kids_custom_css .='a, #footer .custom-social-icons i:hover, #footer li a:hover, #sidebar li a:hover, .post-main-box:hover h2, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .entry-content a, #sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, .main-navigation ul.sub-menu a:hover, #footer .more-button a:hover, #footer .more-button:hover i, .post-main-box:hover h2 a, .post-main-box:hover .entry-date a, .post-main-box:hover .entry-author a, .single-post .post-info:hover .entry-date a, .single-post .post-info:hover .entry-author a, #topbar span a:hover, .logo .site-title a:hover, .account a:hover, .cart_no i:hover, .product-cat li a:hover, #slider .inner_carousel h1 a:hover{';
			$vw_kids_custom_css .='color: '.esc_attr($vw_kids_first_color).';';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_first_color != false){
		$vw_kids_custom_css .='#slider .view-more:hover, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .products li:hover a.button, .view-more:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #sidebar .more-button a:hover,.main-navigation ul li:first-child a,.main-navigation a,.wp-block-woocommerce-empty-cart-block .wc-block-grid__product-onsale,.wp-block-woocommerce-cart .wc-block-components-product-badge{';
			$vw_kids_custom_css .='border-color: '.esc_attr($vw_kids_first_color).'!important;';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_first_color != false){
		$vw_kids_custom_css .='#slider hr, #popular-toys hr, .main-navigation ul ul{';
			$vw_kids_custom_css .='border-top-color: '.esc_attr($vw_kids_first_color).';';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_first_color != false){
		$vw_kids_custom_css .='#footer h3:after, .main-navigation ul ul, #footer .wp-block-search .wp-block-search__label:after{';
			$vw_kids_custom_css .='border-bottom-color: '.esc_attr($vw_kids_first_color).';';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_first_color != false){
		$vw_kids_custom_css .='.post-main-box, #sidebar .widget{
		box-shadow: 0px 15px 10px -15px '.esc_attr($vw_kids_first_color).';
		}';
	}

	/*------------------Second highlight color-------------------*/

	$vw_kids_second_color = get_theme_mod('vw_kids_second_color');

	if($vw_kids_second_color != false){
		$vw_kids_custom_css .='#topbar, .categry-title, #sidebar .custom-social-icons i:hover, .pagination span, .pagination a, .woocommerce span.onsale, .products li, .woocommerce ul.products li.product, .nav-previous a, .nav-next a, .woocommerce nav.woocommerce-pagination ul li a{';
			$vw_kids_custom_css .='background-color: '.esc_attr($vw_kids_second_color).';';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_second_color != false){
		$vw_kids_custom_css .='h1,h2,h3,h4,h5,h6, .custom-social-icons i:hover, .logo h1 a, .logo p.site-title a, .cart_no i, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, #slider .inner_carousel h1, #slider .view-more, .view-more, .post-main-box h2, #sidebar caption, #sidebar h3, .post-navigation a, .woocommerce div.product .product_title, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce .quantity .qty, .woocommerce-message::before,.woocommerce-info::before, #comments a.comment-reply-link, .main-navigation a:hover, .main-navigation ul ul a, #sidebar a.custom_read_more, nav.woocommerce-MyAccount-navigation ul li a:hover, .copyright a:hover{';
			$vw_kids_custom_css .='color: '.esc_attr($vw_kids_second_color).';';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_second_color != false){
		$vw_kids_custom_css .='.products li:hover .star-rating span{';
			$vw_kids_custom_css .='color: '.esc_attr($vw_kids_second_color).'!important;';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_second_color != false){
		$vw_kids_custom_css .='.cart_no i, #slider .carousel-control-prev-icon,#slider .carousel-control-next-icon, #slider .view-more, .view-more, a.button.product_type_simple.add_to_cart_button, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce .quantity .qty, #sidebar a.custom_read_more{';
			$vw_kids_custom_css .='border-color: '.esc_attr($vw_kids_second_color).';';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_second_color != false){
		$vw_kids_custom_css .='.post-info hr, .woocommerce-message,.woocommerce-info{';
			$vw_kids_custom_css .='border-top-color: '.esc_attr($vw_kids_second_color).';';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_second_color != false){
		$vw_kids_custom_css .='nav.woocommerce-MyAccount-navigation ul li{
		box-shadow: 2px 2px 0 0 '.esc_attr($vw_kids_second_color).';
		}';
	}

	/*--------------------- Grid Posts Posts -------------------*/

	$vw_kids_display_grid_posts_settings = get_theme_mod( 'vw_kids_display_grid_posts_settings','Into Blocks');
    if($vw_kids_display_grid_posts_settings == 'Without Blocks'){
		$vw_kids_custom_css .='.grid-post-main-box{';
			$vw_kids_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$vw_kids_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_kids_theme_lay = get_theme_mod( 'vw_kids_width_option','Full Width');
    if($vw_kids_theme_lay == 'Boxed'){
		$vw_kids_custom_css .='body{';
			$vw_kids_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='.scrollup i{';
			$vw_kids_custom_css .='right: 100px;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='.scrollup.left i{';
			$vw_kids_custom_css .='left: 100px;';
		$vw_kids_custom_css .='}';
	}else if($vw_kids_theme_lay == 'Wide Width'){
		$vw_kids_custom_css .='body{';
			$vw_kids_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='.scrollup i{';
			$vw_kids_custom_css .='right: 30px;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='.scrollup.left i{';
			$vw_kids_custom_css .='left: 30px;';
		$vw_kids_custom_css .='}';
	}else if($vw_kids_theme_lay == 'Full Width'){
		$vw_kids_custom_css .='body{';
			$vw_kids_custom_css .='max-width: 100%;';
		$vw_kids_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_kids_theme_lay = get_theme_mod( 'vw_kids_slider_opacity_color','0.9');
	if($vw_kids_theme_lay == '0'){
		$vw_kids_custom_css .='#slider img{';
			$vw_kids_custom_css .='opacity:0';
		$vw_kids_custom_css .='}';
		}else if($vw_kids_theme_lay == '0.1'){
		$vw_kids_custom_css .='#slider img{';
			$vw_kids_custom_css .='opacity:0.1';
		$vw_kids_custom_css .='}';
		}else if($vw_kids_theme_lay == '0.2'){
		$vw_kids_custom_css .='#slider img{';
			$vw_kids_custom_css .='opacity:0.2';
		$vw_kids_custom_css .='}';
		}else if($vw_kids_theme_lay == '0.3'){
		$vw_kids_custom_css .='#slider img{';
			$vw_kids_custom_css .='opacity:0.3';
		$vw_kids_custom_css .='}';
		}else if($vw_kids_theme_lay == '0.4'){
		$vw_kids_custom_css .='#slider img{';
			$vw_kids_custom_css .='opacity:0.4';
		$vw_kids_custom_css .='}';
		}else if($vw_kids_theme_lay == '0.5'){
		$vw_kids_custom_css .='#slider img{';
			$vw_kids_custom_css .='opacity:0.5';
		$vw_kids_custom_css .='}';
		}else if($vw_kids_theme_lay == '0.6'){
		$vw_kids_custom_css .='#slider img{';
			$vw_kids_custom_css .='opacity:0.6';
		$vw_kids_custom_css .='}';
		}else if($vw_kids_theme_lay == '0.7'){
		$vw_kids_custom_css .='#slider img{';
			$vw_kids_custom_css .='opacity:0.7';
		$vw_kids_custom_css .='}';
		}else if($vw_kids_theme_lay == '0.8'){
		$vw_kids_custom_css .='#slider img{';
			$vw_kids_custom_css .='opacity:0.8';
		$vw_kids_custom_css .='}';
		}else if($vw_kids_theme_lay == '0.9'){
		$vw_kids_custom_css .='#slider img{';
			$vw_kids_custom_css .='opacity:0.9';
		$vw_kids_custom_css .='}';
		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$vw_kids_slider_image_overlay = get_theme_mod('vw_kids_slider_image_overlay', true);
	if($vw_kids_slider_image_overlay == false){
		$vw_kids_custom_css .='#slider img{';
			$vw_kids_custom_css .='opacity:1;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_slider_image_overlay_color = get_theme_mod('vw_kids_slider_image_overlay_color', true);
	if($vw_kids_slider_image_overlay_color != false){
		$vw_kids_custom_css .='#slider{';
			$vw_kids_custom_css .='background-color: '.esc_attr($vw_kids_slider_image_overlay_color).';';
		$vw_kids_custom_css .='}';
	}

	/*--------------------Slider Content Layout -------------------*/

	$vw_kids_theme_lay = get_theme_mod( 'vw_kids_slider_content_option','Left');
    if($vw_kids_theme_lay == 'Left'){
		$vw_kids_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_kids_custom_css .='text-align:left; left:10%; right:22%; top: 45%;';
		$vw_kids_custom_css .='}';
	}else if($vw_kids_theme_lay == 'Center'){
		$vw_kids_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_kids_custom_css .='text-align:center; left:20%; right:20%; top: 45%;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='#slider hr{';
			$vw_kids_custom_css .='margin: 0 15em;';
		$vw_kids_custom_css .='}';
	}else if($vw_kids_theme_lay == 'Right'){
		$vw_kids_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_kids_custom_css .='text-align:right; left:22%; right:17%; top: 45%;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='#slider hr{';
			$vw_kids_custom_css .='margin: 0 30em;';
		$vw_kids_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$vw_kids_slider_content_padding_top_bottom = get_theme_mod('vw_kids_slider_content_padding_top_bottom');
	$vw_kids_slider_content_padding_left_right = get_theme_mod('vw_kids_slider_content_padding_left_right');
	if($vw_kids_slider_content_padding_top_bottom != false || $vw_kids_slider_content_padding_left_right != false){
		$vw_kids_custom_css .='#slider .carousel-caption{';
			$vw_kids_custom_css .='top: '.esc_attr($vw_kids_slider_content_padding_top_bottom).'; bottom: '.esc_attr($vw_kids_slider_content_padding_top_bottom).';left: '.esc_attr($vw_kids_slider_content_padding_left_right).';right: '.esc_attr($vw_kids_slider_content_padding_left_right).';';
		$vw_kids_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_kids_slider_height = get_theme_mod('vw_kids_slider_height');
	if($vw_kids_slider_height != false){
		$vw_kids_custom_css .='#slider img{';
			$vw_kids_custom_css .='height: '.esc_attr($vw_kids_slider_height).';';
		$vw_kids_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_kids_theme_lay = get_theme_mod( 'vw_kids_blog_layout_option','Default');
    if($vw_kids_theme_lay == 'Default'){
		$vw_kids_custom_css .='.post-main-box{';
			$vw_kids_custom_css .='';
		$vw_kids_custom_css .='}';
	}else if($vw_kids_theme_lay == 'Center'){
		$vw_kids_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn{';
			$vw_kids_custom_css .='text-align:center;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='.post-info{';
			$vw_kids_custom_css .='margin-top:10px;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='.post-info hr{';
			$vw_kids_custom_css .='margin:15px auto;';
		$vw_kids_custom_css .='}';
	}else if($vw_kids_theme_lay == 'Left'){
		$vw_kids_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_kids_custom_css .='text-align:Left;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='.post-info hr{';
			$vw_kids_custom_css .='margin-bottom:10px;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='.post-main-box h2{';
			$vw_kids_custom_css .='margin-top:10px;';
		$vw_kids_custom_css .='}';
	}

	/*--------------------- Blog Page Posts -------------------*/

	$vw_kids_blog_page_posts_settings = get_theme_mod( 'vw_kids_blog_page_posts_settings','Into Blocks');
		if($vw_kids_blog_page_posts_settings == 'Without Blocks'){
		$vw_kids_custom_css .='.post-main-box{';
			$vw_kids_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$vw_kids_custom_css .='}';
	}

	/*---------------------Responsive Media -----------------------*/

	$vw_kids_resp_topbar = get_theme_mod( 'vw_kids_resp_topbar_hide_show',false);
	if($vw_kids_resp_topbar == true && get_theme_mod( 'vw_kids_topbar_hide_show', true) == false){
    	$vw_kids_custom_css .='#topbar{';
			$vw_kids_custom_css .='display:none;';
		$vw_kids_custom_css .='} ';
	}
    if($vw_kids_resp_topbar == true){
    	$vw_kids_custom_css .='@media screen and (max-width:575px) {';
		$vw_kids_custom_css .='#topbar{';
			$vw_kids_custom_css .='display:block;';
		$vw_kids_custom_css .='} }';
	}else if($vw_kids_resp_topbar == false){
		$vw_kids_custom_css .='@media screen and (max-width:575px) {';
		$vw_kids_custom_css .='#topbar{';
			$vw_kids_custom_css .='display:none;';
		$vw_kids_custom_css .='} }';
	}

	$vw_kids_resp_stickyheader = get_theme_mod( 'vw_kids_stickyheader_hide_show',false);
	if($vw_kids_resp_stickyheader == true && get_theme_mod( 'vw_kids_sticky_header',false) != true){
    	$vw_kids_custom_css .='.header-fixed{';
			$vw_kids_custom_css .='position:static;';
		$vw_kids_custom_css .='} ';
	}
    if($vw_kids_resp_stickyheader == true){
    	$vw_kids_custom_css .='@media screen and (max-width:575px) {';
		$vw_kids_custom_css .='.header-fixed{';
			$vw_kids_custom_css .='position:fixed;';
		$vw_kids_custom_css .='} }';
	}else if($vw_kids_resp_stickyheader == false){
		$vw_kids_custom_css .='@media screen and (max-width:575px){';
		$vw_kids_custom_css .='.header-fixed{';
			$vw_kids_custom_css .='position:static;';
		$vw_kids_custom_css .='} }';
	}

	$vw_kids_resp_slider = get_theme_mod( 'vw_kids_resp_slider_hide_show',true);
	if($vw_kids_resp_slider == true && get_theme_mod( 'vw_kids_slider_hide_show', true) == false){
    	$vw_kids_custom_css .='#slider{';
			$vw_kids_custom_css .='display:none;';
		$vw_kids_custom_css .='} ';
	}
    if($vw_kids_resp_slider == true){
    	$vw_kids_custom_css .='@media screen and (max-width:575px) {';
		$vw_kids_custom_css .='#slider{';
			$vw_kids_custom_css .='display:block;';
		$vw_kids_custom_css .='} }';
	}else if($vw_kids_resp_slider == false){
		$vw_kids_custom_css .='@media screen and (max-width:575px) {';
		$vw_kids_custom_css .='#slider{';
			$vw_kids_custom_css .='display:none;';
		$vw_kids_custom_css .='} }';
	}

	$vw_kids_sidebar = get_theme_mod( 'vw_kids_sidebar_hide_show',true);
    if($vw_kids_sidebar == true){
    	$vw_kids_custom_css .='@media screen and (max-width:575px) {';
		$vw_kids_custom_css .='#sidebar{';
			$vw_kids_custom_css .='display:block;';
		$vw_kids_custom_css .='} }';
	}else if($vw_kids_sidebar == false){
		$vw_kids_custom_css .='@media screen and (max-width:575px) {';
		$vw_kids_custom_css .='#sidebar{';
			$vw_kids_custom_css .='display:none;';
		$vw_kids_custom_css .='} }';
	}

	$vw_kids_resp_scroll_top = get_theme_mod( 'vw_kids_resp_scroll_top_hide_show',true);
	if($vw_kids_resp_scroll_top == true && get_theme_mod( 'vw_kids_hide_show_scroll',true) != true){
    	$vw_kids_custom_css .='.scrollup i{';
			$vw_kids_custom_css .='visibility:hidden !important;';
		$vw_kids_custom_css .='} ';
	}
    if($vw_kids_resp_scroll_top == true){
    	$vw_kids_custom_css .='@media screen and (max-width:575px) {';
		$vw_kids_custom_css .='.scrollup i{';
			$vw_kids_custom_css .='visibility:visible !important;';
		$vw_kids_custom_css .='} }';
	}else if($vw_kids_resp_scroll_top == false){
		$vw_kids_custom_css .='@media screen and (max-width:575px){';
		$vw_kids_custom_css .='.scrollup i{';
			$vw_kids_custom_css .='visibility:hidden !important;';
		$vw_kids_custom_css .='} }';
	}

	$vw_kids_resp_menu_toggle_btn_bg_color = get_theme_mod('vw_kids_resp_menu_toggle_btn_bg_color');
	if($vw_kids_resp_menu_toggle_btn_bg_color != false){
		$vw_kids_custom_css .='.toggle-nav i,.sidenav .closebtn{';
			$vw_kids_custom_css .='background: '.esc_attr($vw_kids_resp_menu_toggle_btn_bg_color).';';
		$vw_kids_custom_css .='}';
	}

	/*------------- Top Bar Settings ------------------*/

	$vw_kids_topbar_padding_top_bottom = get_theme_mod('vw_kids_topbar_padding_top_bottom');
	if($vw_kids_topbar_padding_top_bottom != false){
		$vw_kids_custom_css .='#topbar{';
			$vw_kids_custom_css .='padding-top: '.esc_attr($vw_kids_topbar_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_kids_topbar_padding_top_bottom).';';
		$vw_kids_custom_css .='}';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_kids_navigation_menu_font_size = get_theme_mod('vw_kids_navigation_menu_font_size');
	if($vw_kids_navigation_menu_font_size != false){
		$vw_kids_custom_css .='.main-navigation a{';
			$vw_kids_custom_css .='font-size: '.esc_attr($vw_kids_navigation_menu_font_size).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_navigation_menu_font_weight = get_theme_mod('vw_kids_navigation_menu_font_weight','');
	if($vw_kids_navigation_menu_font_weight != false){
		$vw_kids_custom_css .='.main-navigation a{';
			$vw_kids_custom_css .='font-weight: '.esc_attr($vw_kids_navigation_menu_font_weight).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_theme_lay = get_theme_mod( 'vw_kids_menu_text_transform','Capitalize');
	if($vw_kids_theme_lay == 'Capitalize'){
		$vw_kids_custom_css .='.main-navigation a{';
			$vw_kids_custom_css .='text-transform:Capitalize;';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_theme_lay == 'Lowercase'){
		$vw_kids_custom_css .='.main-navigation a{';
			$vw_kids_custom_css .='text-transform:Lowercase;';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_theme_lay == 'Uppercase'){
		$vw_kids_custom_css .='.main-navigation a{';
			$vw_kids_custom_css .='text-transform:Uppercase;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_header_menus_color = get_theme_mod('vw_kids_header_menus_color');
	if($vw_kids_header_menus_color != false){
		$vw_kids_custom_css .='.main-navigation a,.main-navigation .menu > li > a{';
			$vw_kids_custom_css .='color: '.esc_attr($vw_kids_header_menus_color).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_header_menus_hover_color = get_theme_mod('vw_kids_header_menus_hover_color');
	if($vw_kids_header_menus_hover_color != false){
		$vw_kids_custom_css .='.main-navigation a:hover,.main-navigation .menu > li > a:hover{';
			$vw_kids_custom_css .='color: '.esc_attr($vw_kids_header_menus_hover_color).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_header_submenus_color = get_theme_mod('vw_kids_header_submenus_color');
	if($vw_kids_header_submenus_color != false){
		$vw_kids_custom_css .='.main-navigation ul ul a,.main-navigation ul.sub-menu li a{';
			$vw_kids_custom_css .='color: '.esc_attr($vw_kids_header_submenus_color).'!important';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_header_submenus_hover_color = get_theme_mod('vw_kids_header_submenus_hover_color');
	if($vw_kids_header_submenus_hover_color != false){
		$vw_kids_custom_css .='.main-navigation ul.sub-menu a:hover,.main-navigation ul.sub-menu > li > a:hover{';
			$vw_kids_custom_css .='color: '.esc_attr($vw_kids_header_submenus_hover_color).'!important;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_menus_item = get_theme_mod( 'vw_kids_menus_item_style','None');
    if($vw_kids_menus_item == 'None'){
		$vw_kids_custom_css .='.main-navigation a{';
			$vw_kids_custom_css .='';
		$vw_kids_custom_css .='}';
	}else if($vw_kids_menus_item == 'Zoom In'){
		$vw_kids_custom_css .='.main-navigation a:hover{';
			$vw_kids_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: #fff;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_sticky_header_padding = get_theme_mod('vw_kids_sticky_header_padding');
	if($vw_kids_sticky_header_padding != false){
		$vw_kids_custom_css .='.header-fixed{';
			$vw_kids_custom_css .='padding: '.esc_attr($vw_kids_sticky_header_padding).';';
		$vw_kids_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_kids_button_padding_top_bottom = get_theme_mod('vw_kids_button_padding_top_bottom');
	$vw_kids_button_padding_left_right = get_theme_mod('vw_kids_button_padding_left_right');
	if($vw_kids_button_padding_top_bottom != false || $vw_kids_button_padding_left_right != false){
		$vw_kids_custom_css .='.post-main-box .view-more{';
			$vw_kids_custom_css .='padding-top: '.esc_attr($vw_kids_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_kids_button_padding_top_bottom).';padding-left: '.esc_attr($vw_kids_button_padding_left_right).';padding-right: '.esc_attr($vw_kids_button_padding_left_right).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_button_border_radius = get_theme_mod('vw_kids_button_border_radius');
	if($vw_kids_button_border_radius != false){
		$vw_kids_custom_css .='.post-main-box .view-more{';
			$vw_kids_custom_css .='border-radius: '.esc_attr($vw_kids_button_border_radius).'px;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_button_font_size = get_theme_mod('vw_kids_button_font_size',14);
	$vw_kids_custom_css .='.post-main-box .view-more{';
		$vw_kids_custom_css .='font-size: '.esc_attr($vw_kids_button_font_size).';';
	$vw_kids_custom_css .='}';

	$vw_kids_theme_lay = get_theme_mod( 'vw_kids_button_text_transform','Capitalize');
	if($vw_kids_theme_lay == 'Capitalize'){
		$vw_kids_custom_css .='.post-main-box .view-more{';
			$vw_kids_custom_css .='text-transform:Capitalize;';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_theme_lay == 'Lowercase'){
		$vw_kids_custom_css .='.post-main-box .view-more{';
			$vw_kids_custom_css .='text-transform:Lowercase;';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_theme_lay == 'Uppercase'){ 
		$vw_kids_custom_css .='.post-main-box .view-more{';
			$vw_kids_custom_css .='text-transform:Uppercase;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_button_letter_spacing = get_theme_mod('vw_kids_button_letter_spacing');
	$vw_kids_custom_css .='.post-main-box .view-more{';
		$vw_kids_custom_css .='letter-spacing: '.esc_attr($vw_kids_button_letter_spacing).';';
	$vw_kids_custom_css .='}';

	/*------------- Single Blog Page------------------*/

	$vw_kids_featured_image_border_radius = get_theme_mod('vw_kids_featured_image_border_radius', 0);
	if($vw_kids_featured_image_border_radius != false){
		$vw_kids_custom_css .='.box-image img, .feature-box img{';
			$vw_kids_custom_css .='border-radius: '.esc_attr($vw_kids_featured_image_border_radius).'px;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_featured_image_box_shadow = get_theme_mod('vw_kids_featured_image_box_shadow',0);
	if($vw_kids_featured_image_box_shadow != false){
		$vw_kids_custom_css .='.box-image img, #content-vw img{';
			$vw_kids_custom_css .='box-shadow: '.esc_attr($vw_kids_featured_image_box_shadow).'px '.esc_attr($vw_kids_featured_image_box_shadow).'px '.esc_attr($vw_kids_featured_image_box_shadow).'px #cccccc;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_singlepost_image_box_shadow = get_theme_mod('vw_kids_singlepost_image_box_shadow',0);
	if($vw_kids_singlepost_image_box_shadow != false){
		$vw_kids_custom_css .='.feature-box img{';
			$vw_kids_custom_css .='box-shadow: '.esc_attr($vw_kids_singlepost_image_box_shadow).'px '.esc_attr($vw_kids_singlepost_image_box_shadow).'px '.esc_attr($vw_kids_singlepost_image_box_shadow).'px #cccccc;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_single_blog_post_navigation_show_hide = get_theme_mod('vw_kids_single_blog_post_navigation_show_hide',true);
	if($vw_kids_single_blog_post_navigation_show_hide != true){
		$vw_kids_custom_css .='.post-navigation{';
			$vw_kids_custom_css .='display: none;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_single_blog_comment_title = get_theme_mod('vw_kids_single_blog_comment_title', 'Leave a Reply');
	if($vw_kids_single_blog_comment_title == ''){
		$vw_kids_custom_css .='#comments h2#reply-title {';
			$vw_kids_custom_css .='display: none;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_single_blog_comment_button_text = get_theme_mod('vw_kids_single_blog_comment_button_text', 'Post Comment');
	if($vw_kids_single_blog_comment_button_text == ''){
		$vw_kids_custom_css .='#comments p.form-submit {';
			$vw_kids_custom_css .='display: none;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_comment_width = get_theme_mod('vw_kids_single_blog_comment_width');
	if($vw_kids_comment_width != false){
		$vw_kids_custom_css .='#comments textarea{';
			$vw_kids_custom_css .='width: '.esc_attr($vw_kids_comment_width).';';
		$vw_kids_custom_css .='}';
	}

	// featured image dimention
	$vw_kids_blog_post_featured_image_dimension = get_theme_mod('vw_kids_blog_post_featured_image_dimension', 'default');
	$vw_kids_blog_post_featured_image_custom_width = get_theme_mod('vw_kids_blog_post_featured_image_custom_width',250);
	$vw_kids_blog_post_featured_image_custom_height = get_theme_mod('vw_kids_blog_post_featured_image_custom_height',250);
	if($vw_kids_blog_post_featured_image_dimension == 'custom'){
		$vw_kids_custom_css .='.post-main-box img{';
			$vw_kids_custom_css .='width: '.esc_attr($vw_kids_blog_post_featured_image_custom_width).'; height: '.esc_attr($vw_kids_blog_post_featured_image_custom_height).';';
		$vw_kids_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_kids_copyright_background_color = get_theme_mod('vw_kids_copyright_background_color');
	if($vw_kids_copyright_background_color != false){
		$vw_kids_custom_css .='#footer-2{';
			$vw_kids_custom_css .='background-color: '.esc_attr($vw_kids_copyright_background_color).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_footer_padding = get_theme_mod('vw_kids_footer_padding');
	if($vw_kids_footer_padding != false){
		$vw_kids_custom_css .='#footer{';
			$vw_kids_custom_css .='padding: '.esc_attr($vw_kids_footer_padding).' 0;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_footer_background_color = get_theme_mod('vw_kids_footer_background_color');
	if($vw_kids_footer_background_color != false){
		$vw_kids_custom_css .='#footer{';
			$vw_kids_custom_css .='background-color: '.esc_attr($vw_kids_footer_background_color).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_footer_widgets_heading = get_theme_mod( 'vw_kids_footer_widgets_heading','Left');
    if($vw_kids_footer_widgets_heading == 'Left'){
		$vw_kids_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$vw_kids_custom_css .='text-align: left;';
		$vw_kids_custom_css .='}';
	}else if($vw_kids_footer_widgets_heading == 'Center'){
		$vw_kids_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$vw_kids_custom_css .='text-align: center; position: relative;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='#footer h3:after, #footer .wp-block-search .wp-block-search__label:after{';
			$vw_kids_custom_css .='margin: 0 auto;';
		$vw_kids_custom_css .='}';
	}else if($vw_kids_footer_widgets_heading == 'Right'){
		$vw_kids_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$vw_kids_custom_css .='text-align: right; position: relative;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='#footer h3:after, #footer .wp-block-search .wp-block-search__label:after{';
			$vw_kids_custom_css .='margin-left: auto;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_footer_widgets_content = get_theme_mod( 'vw_kids_footer_widgets_content','Left');
    if($vw_kids_footer_widgets_content == 'Left'){
		$vw_kids_custom_css .='#footer .widget{';
		$vw_kids_custom_css .='text-align: left;';
		$vw_kids_custom_css .='}';
	}else if($vw_kids_footer_widgets_content == 'Center'){
		$vw_kids_custom_css .='#footer .widget{';
			$vw_kids_custom_css .='text-align: center;';
		$vw_kids_custom_css .='}';
	}else if($vw_kids_footer_widgets_content == 'Right'){
		$vw_kids_custom_css .='#footer .widget{';
			$vw_kids_custom_css .='text-align: right;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_copyright_font_size = get_theme_mod('vw_kids_copyright_font_size');
	if($vw_kids_copyright_font_size != false){
		$vw_kids_custom_css .='.copyright p{';
			$vw_kids_custom_css .='font-size: '.esc_attr($vw_kids_copyright_font_size).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_copyright_alignment = get_theme_mod('vw_kids_copyright_alignment');
	if($vw_kids_copyright_alignment != false){
		$vw_kids_custom_css .='.copyright p,#footer-2 p{';
			$vw_kids_custom_css .='text-align: '.esc_attr($vw_kids_copyright_alignment).';';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='
		@media screen and (max-width:720px) {
			.copyright p,#footer-2 p{';
			$vw_kids_custom_css .='text-align: center;} }';
	}

	$vw_kids_resp_stickycopyright = get_theme_mod( 'vw_kids_stickycopyright_hide_show',false);
	if($vw_kids_resp_stickycopyright == true && get_theme_mod( 'vw_kids_copyright_sticky',false) != true){
    	$vw_kids_custom_css .='.copyright-sticky{';
			$vw_kids_custom_css .='position:static;';
		$vw_kids_custom_css .='} ';
	}

	$vw_kids_footer_social_icons_font_size = get_theme_mod('vw_kids_footer_social_icons_font_size','16');
	$vw_kids_custom_css .='.copyright .widget i{';
		$vw_kids_custom_css .='font-size: '.esc_attr($vw_kids_footer_social_icons_font_size).'px;';
	$vw_kids_custom_css .='}';

	$vw_kids_align_footer_social_icon = get_theme_mod('vw_kids_align_footer_social_icon');
	if($vw_kids_align_footer_social_icon != false){
		$vw_kids_custom_css .='.copyright .widget{';
			$vw_kids_custom_css .='text-align: '.esc_attr($vw_kids_align_footer_social_icon).';';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='
		@media screen and (max-width:720px) {
			.copyright .widget{';
			$vw_kids_custom_css .='text-align: center;} }';
	}

	$vw_kids_copyright_padding_top_bottom = get_theme_mod('vw_kids_copyright_padding_top_bottom');
	if($vw_kids_copyright_padding_top_bottom != false){
		$vw_kids_custom_css .='#footer-2{';
			$vw_kids_custom_css .='padding-top: '.esc_attr($vw_kids_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_kids_copyright_padding_top_bottom).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_footer_background_image = get_theme_mod('vw_kids_footer_background_image');
	if($vw_kids_footer_background_image != false){
		$vw_kids_custom_css .='#footer{';
			$vw_kids_custom_css .='background: url('.esc_attr($vw_kids_footer_background_image).');background-size:cover;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_theme_lay = get_theme_mod( 'vw_kids_img_footer','scroll');
	if($vw_kids_theme_lay == 'fixed'){
		$vw_kids_custom_css .='#footer{';
			$vw_kids_custom_css .='background-attachment: fixed !important;';
		$vw_kids_custom_css .='}';
	}elseif ($vw_kids_theme_lay == 'scroll'){
		$vw_kids_custom_css .='#footer{';
			$vw_kids_custom_css .='background-attachment: scroll !important;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_footer_img_position = get_theme_mod('vw_kids_footer_img_position','center center');
	if($vw_kids_footer_img_position != false){
		$vw_kids_custom_css .='#footer{';
			$vw_kids_custom_css .='background-position: '.esc_attr($vw_kids_footer_img_position).'!important;';
		$vw_kids_custom_css .='}';
	} 
	
	$vw_kids_copyright_font_weight = get_theme_mod('vw_kids_copyright_font_weight');
	if($vw_kids_copyright_font_weight != false){
		$vw_kids_custom_css .='.copyright p, .copyright a{';
			$vw_kids_custom_css .='font-weight: '.esc_attr($vw_kids_copyright_font_weight).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_copyright_text_color = get_theme_mod('vw_kids_copyright_text_color');
	if($vw_kids_copyright_text_color != false){
		$vw_kids_custom_css .='.copyright p, .copyright a{';
			$vw_kids_custom_css .='color: '.esc_attr($vw_kids_copyright_text_color).';';
		$vw_kids_custom_css .='}';
	} 


	/*----------------Sroll to top Settings ------------------*/

	$vw_kids_scroll_to_top_font_size = get_theme_mod('vw_kids_scroll_to_top_font_size');
	if($vw_kids_scroll_to_top_font_size != false){
		$vw_kids_custom_css .='.scrollup i{';
			$vw_kids_custom_css .='font-size: '.esc_attr($vw_kids_scroll_to_top_font_size).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_scroll_to_top_padding = get_theme_mod('vw_kids_scroll_to_top_padding');
	$vw_kids_scroll_to_top_padding = get_theme_mod('vw_kids_scroll_to_top_padding');
	if($vw_kids_scroll_to_top_padding != false){
		$vw_kids_custom_css .='.scrollup i{';
			$vw_kids_custom_css .='padding-top: '.esc_attr($vw_kids_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_kids_scroll_to_top_padding).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_scroll_to_top_width = get_theme_mod('vw_kids_scroll_to_top_width');
	if($vw_kids_scroll_to_top_width != false){
		$vw_kids_custom_css .='.scrollup i{';
			$vw_kids_custom_css .='width: '.esc_attr($vw_kids_scroll_to_top_width).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_scroll_to_top_height = get_theme_mod('vw_kids_scroll_to_top_height');
	if($vw_kids_scroll_to_top_height != false){
		$vw_kids_custom_css .='.scrollup i{';
			$vw_kids_custom_css .='height: '.esc_attr($vw_kids_scroll_to_top_height).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_scroll_to_top_border_radius = get_theme_mod('vw_kids_scroll_to_top_border_radius');
	if($vw_kids_scroll_to_top_border_radius != false){
		$vw_kids_custom_css .='.scrollup i{';
			$vw_kids_custom_css .='border-radius: '.esc_attr($vw_kids_scroll_to_top_border_radius).'px;';
		$vw_kids_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_kids_social_icon_font_size = get_theme_mod('vw_kids_social_icon_font_size');
	if($vw_kids_social_icon_font_size != false){
		$vw_kids_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_kids_custom_css .='font-size: '.esc_attr($vw_kids_social_icon_font_size).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_social_icon_padding = get_theme_mod('vw_kids_social_icon_padding');
	if($vw_kids_social_icon_padding != false){
		$vw_kids_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_kids_custom_css .='padding: '.esc_attr($vw_kids_social_icon_padding).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_social_icon_width = get_theme_mod('vw_kids_social_icon_width');
	if($vw_kids_social_icon_width != false){
		$vw_kids_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_kids_custom_css .='width: '.esc_attr($vw_kids_social_icon_width).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_social_icon_height = get_theme_mod('vw_kids_social_icon_height');
	if($vw_kids_social_icon_height != false){
		$vw_kids_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_kids_custom_css .='height: '.esc_attr($vw_kids_social_icon_height).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_social_icon_border_radius = get_theme_mod('vw_kids_social_icon_border_radius');
	if($vw_kids_social_icon_border_radius != false){
		$vw_kids_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$vw_kids_custom_css .='border-radius: '.esc_attr($vw_kids_social_icon_border_radius).'px;';
		$vw_kids_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_kids_related_product_show_hide = get_theme_mod('vw_kids_related_product_show_hide',true);
	if($vw_kids_related_product_show_hide != true){
		$vw_kids_custom_css .='.related.products{';
			$vw_kids_custom_css .='display: none;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_products_padding_top_bottom = get_theme_mod('vw_kids_products_padding_top_bottom');
	if($vw_kids_products_padding_top_bottom != false){
		$vw_kids_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_kids_custom_css .='padding-top: '.esc_attr($vw_kids_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_kids_products_padding_top_bottom).'!important;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_products_padding_left_right = get_theme_mod('vw_kids_products_padding_left_right');
	if($vw_kids_products_padding_left_right != false){
		$vw_kids_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_kids_custom_css .='padding-left: '.esc_attr($vw_kids_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_kids_products_padding_left_right).'!important;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_products_box_shadow = get_theme_mod('vw_kids_products_box_shadow');
	if($vw_kids_products_box_shadow != false){
		$vw_kids_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_kids_custom_css .='box-shadow: '.esc_attr($vw_kids_products_box_shadow).'px '.esc_attr($vw_kids_products_box_shadow).'px '.esc_attr($vw_kids_products_box_shadow).'px #ddd;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_products_border_radius = get_theme_mod('vw_kids_products_border_radius', 0);
	if($vw_kids_products_border_radius != false){
		$vw_kids_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_kids_custom_css .='border-radius: '.esc_attr($vw_kids_products_border_radius).'px;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_products_btn_padding_top_bottom = get_theme_mod('vw_kids_products_btn_padding_top_bottom');
	if($vw_kids_products_btn_padding_top_bottom != false){
		$vw_kids_custom_css .='a.button.product_type_simple.add_to_cart_button{';
			$vw_kids_custom_css .='padding-top: '.esc_attr($vw_kids_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($vw_kids_products_btn_padding_top_bottom).' !important;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_products_btn_padding_left_right = get_theme_mod('vw_kids_products_btn_padding_left_right');
	if($vw_kids_products_btn_padding_left_right != false){
		$vw_kids_custom_css .='a.button.product_type_simple.add_to_cart_button{';
			$vw_kids_custom_css .='padding-left: '.esc_attr($vw_kids_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($vw_kids_products_btn_padding_left_right).' !important;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_products_button_border_radius = get_theme_mod('vw_kids_products_button_border_radius', 100);
	if($vw_kids_products_button_border_radius != false){
		$vw_kids_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_kids_custom_css .='border-radius: '.esc_attr($vw_kids_products_button_border_radius).'px;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_woocommerce_sale_position = get_theme_mod( 'vw_kids_woocommerce_sale_position','left');
    if($vw_kids_woocommerce_sale_position == 'left'){
		$vw_kids_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_kids_custom_css .='left: -10px; right: auto;';
		$vw_kids_custom_css .='}';
	}else if($vw_kids_woocommerce_sale_position == 'right'){
		$vw_kids_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_kids_custom_css .='left: auto !important; right: 20px !important;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_woocommerce_sale_font_size = get_theme_mod('vw_kids_woocommerce_sale_font_size');
	if($vw_kids_woocommerce_sale_font_size != false){
		$vw_kids_custom_css .='.woocommerce span.onsale{';
			$vw_kids_custom_css .='font-size: '.esc_attr($vw_kids_woocommerce_sale_font_size).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_woocommerce_sale_padding_top_bottom = get_theme_mod('vw_kids_woocommerce_sale_padding_top_bottom');
	if($vw_kids_woocommerce_sale_padding_top_bottom != false){
		$vw_kids_custom_css .='.woocommerce span.onsale{';
			$vw_kids_custom_css .='padding-top: '.esc_attr($vw_kids_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_kids_woocommerce_sale_padding_top_bottom).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_woocommerce_sale_padding_left_right = get_theme_mod('vw_kids_woocommerce_sale_padding_left_right');
	if($vw_kids_woocommerce_sale_padding_left_right != false){
		$vw_kids_custom_css .='.woocommerce span.onsale{';
			$vw_kids_custom_css .='padding-left: '.esc_attr($vw_kids_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($vw_kids_woocommerce_sale_padding_left_right).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_woocommerce_sale_border_radius = get_theme_mod('vw_kids_woocommerce_sale_border_radius', 100);
	if($vw_kids_woocommerce_sale_border_radius != false){
		$vw_kids_custom_css .='.woocommerce span.onsale{';
			$vw_kids_custom_css .='border-radius: '.esc_attr($vw_kids_woocommerce_sale_border_radius).'px;';
		$vw_kids_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$vw_kids_site_title_font_size = get_theme_mod('vw_kids_site_title_font_size');
	if($vw_kids_site_title_font_size != false){
		$vw_kids_custom_css .='.logo h1, .logo p.site-title{';
			$vw_kids_custom_css .='font-size: '.esc_attr($vw_kids_site_title_font_size).';';
		$vw_kids_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_kids_site_tagline_font_size = get_theme_mod('vw_kids_site_tagline_font_size');
	if($vw_kids_site_tagline_font_size != false){
		$vw_kids_custom_css .='.logo p.site-description{';
			$vw_kids_custom_css .='font-size: '.esc_attr($vw_kids_site_tagline_font_size).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_logo_padding = get_theme_mod('vw_kids_logo_padding');
	if($vw_kids_logo_padding != false){
		$vw_kids_custom_css .='.main-header .logo{';
			$vw_kids_custom_css .='padding: '.esc_attr($vw_kids_logo_padding).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_logo_margin = get_theme_mod('vw_kids_logo_margin');
	if($vw_kids_logo_margin != false){
		$vw_kids_custom_css .='.main-header .logo{';
			$vw_kids_custom_css .='margin: '.esc_attr($vw_kids_logo_margin).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_site_title_color = get_theme_mod('vw_kids_site_title_color');
	if($vw_kids_site_title_color != false){
		$vw_kids_custom_css .='p.site-title a{';
			$vw_kids_custom_css .='color: '.esc_attr($vw_kids_site_title_color).'!important;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_site_tagline_color = get_theme_mod('vw_kids_site_tagline_color');
	if($vw_kids_site_tagline_color != false){
		$vw_kids_custom_css .='.logo p.site-description{';
			$vw_kids_custom_css .='color: '.esc_attr($vw_kids_site_tagline_color).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_logo_width = get_theme_mod('vw_kids_logo_width');
	if($vw_kids_logo_width != false){
		$vw_kids_custom_css .='.logo img{';
			$vw_kids_custom_css .='width: '.esc_attr($vw_kids_logo_width).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_logo_height = get_theme_mod('vw_kids_logo_height');
	if($vw_kids_logo_height != false){
		$vw_kids_custom_css .='.logo img{';
			$vw_kids_custom_css .='height: '.esc_attr($vw_kids_logo_height).';';
		$vw_kids_custom_css .='}';
	}

		/*---------------------------Footer Style -------------------*/

	$vw_kids_theme_lay = get_theme_mod( 'vw_kids_footer_template','vw_kids-footer-one');
    if($vw_kids_theme_lay == 'vw_kids-footer-one'){
		$vw_kids_custom_css .='#footer{';
			$vw_kids_custom_css .='';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='#footer ul li{';
			$vw_kids_custom_css .='color:#fff;';
		$vw_kids_custom_css .='}';

	}else if($vw_kids_theme_lay == 'vw_kids-footer-two'){
		$vw_kids_custom_css .='#footer{';
			$vw_kids_custom_css .='background: linear-gradient(to right, #f9f8ff, #dedafa);';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field,#footer ul li{';
			$vw_kids_custom_css .='color:#000;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='#footer ul li::before{';
			$vw_kids_custom_css .='background:#000;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$vw_kids_custom_css .='border: 1px solid #000;';
		$vw_kids_custom_css .='}';

	}else if($vw_kids_theme_lay == 'vw_kids-footer-three'){
		$vw_kids_custom_css .='#footer{';
			$vw_kids_custom_css .='background: #232524;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='#footer ul li{';
			$vw_kids_custom_css .='color: #fff;';
		$vw_kids_custom_css .='}';
	}
	else if($vw_kids_theme_lay == 'vw_kids-footer-four'){
		$vw_kids_custom_css .='#footer{';
			$vw_kids_custom_css .='background: #f7f7f7;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='#footer p, #footer li a, #footer, #footer h3, #footer a.rsswidget, #footer #wp-calendar a, .copyright a, #footer .custom_details, #footer ins span, #footer .tagcloud a, .main-inner-box span.entry-date a, nav.woocommerce-MyAccount-navigation ul li:hover a, #footer ul li a, #footer table, #footer th, #footer td, #footer caption, #sidebar caption,#footer nav.wp-calendar-nav a,#footer .search-form .search-field,#footer ul li{';
			$vw_kids_custom_css .='color:#000;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='#footer ul li::before{';
			$vw_kids_custom_css .='background:#000;';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='#footer table, #footer th, #footer td,#footer .search-form .search-field,#footer .tagcloud a{';
			$vw_kids_custom_css .='border: 1px solid #000;';
		$vw_kids_custom_css .='}';
	}
	else if($vw_kids_theme_lay == 'vw_kids-footer-five'){
		$vw_kids_custom_css .='#footer{';
			$vw_kids_custom_css .='background: linear-gradient(to right, #01093a, #2d0b00);';
		$vw_kids_custom_css .='}';
		$vw_kids_custom_css .='#footer ul li{';
			$vw_kids_custom_css .='color: #fff;';
		$vw_kids_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_kids_preloader_bg_color = get_theme_mod('vw_kids_preloader_bg_color');
	if($vw_kids_preloader_bg_color != false){
		$vw_kids_custom_css .='#preloader{';
			$vw_kids_custom_css .='background-color: '.esc_attr($vw_kids_preloader_bg_color).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_preloader_border_color = get_theme_mod('vw_kids_preloader_border_color');
	if($vw_kids_preloader_border_color != false){
		$vw_kids_custom_css .='.loader-line{';
			$vw_kids_custom_css .='border-color: '.esc_attr($vw_kids_preloader_border_color).'!important;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_preloader_bg_img = get_theme_mod('vw_kids_preloader_bg_img');
	if($vw_kids_preloader_bg_img != false){
		$vw_kids_custom_css .='#preloader{';
			$vw_kids_custom_css .='background: url('.esc_attr($vw_kids_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$vw_kids_custom_css .='}';
	}

	// Header Background Color

	$vw_kids_header_background_color = get_theme_mod('vw_kids_header_background_color');
	if($vw_kids_header_background_color != false){
		$vw_kids_custom_css .='.home-page-header{';
			$vw_kids_custom_css .='background-color: '.esc_attr($vw_kids_header_background_color).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_header_img_position = get_theme_mod('vw_kids_header_img_position','center top');
	if($vw_kids_header_img_position != false){
		$vw_kids_custom_css .='.main-header{';
			$vw_kids_custom_css .='background-position: '.esc_attr($vw_kids_header_img_position).'!important;';
		$vw_kids_custom_css .='}';
	} 

	/*---------------- Grid Posts Settings ------------------*/

	$vw_kids_grid_featured_image_border_radius = get_theme_mod('vw_kids_grid_featured_image_border_radius', 0);
	if($vw_kids_grid_featured_image_border_radius != false){
		$vw_kids_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img{';
			$vw_kids_custom_css .='border-radius: '.esc_attr($vw_kids_grid_featured_image_border_radius).'px;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_grid_featured_image_box_shadow = get_theme_mod('vw_kids_grid_featured_image_box_shadow',0);
	if($vw_kids_grid_featured_image_box_shadow != false){
		$vw_kids_custom_css .='.grid-post-main-box .box-image img, .grid-post-main-box .feature-box img, #content-vw img{';
			$vw_kids_custom_css .='box-shadow: '.esc_attr($vw_kids_grid_featured_image_box_shadow).'px '.esc_attr($vw_kids_grid_featured_image_box_shadow).'px '.esc_attr($vw_kids_grid_featured_image_box_shadow).'px #cccccc;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_related_image_box_shadow = get_theme_mod('vw_kids_related_image_box_shadow',0);
	if($vw_kids_related_image_box_shadow != false){
		$vw_kids_custom_css .='.related-post .box-image img{';
			$vw_kids_custom_css .='box-shadow: '.esc_attr($vw_kids_related_image_box_shadow).'px '.esc_attr($vw_kids_related_image_box_shadow).'px '.esc_attr($vw_kids_related_image_box_shadow).'px #cccccc;';
		$vw_kids_custom_css .='}';
	}

 	/*---------------- Footer Settings ------------------*/

	$vw_kids_button_footer_heading_letter_spacing = get_theme_mod('vw_kids_button_footer_heading_letter_spacing',1);
	$vw_kids_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
		$vw_kids_custom_css .='letter-spacing: '.esc_attr($vw_kids_button_footer_heading_letter_spacing).'px;';
	$vw_kids_custom_css .='}';

	$vw_kids_button_footer_font_size = get_theme_mod('vw_kids_button_footer_font_size','30');
	$vw_kids_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
		$vw_kids_custom_css .='font-size: '.esc_attr($vw_kids_button_footer_font_size).'px;';
	$vw_kids_custom_css .='}';

	$vw_kids_theme_lay = get_theme_mod( 'vw_kids_button_footer_text_transform','Capitalize');
	if($vw_kids_theme_lay == 'Capitalize'){
		$vw_kids_custom_css .='#footer h3{';
			$vw_kids_custom_css .='text-transform:Capitalize;';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_theme_lay == 'Lowercase'){
		$vw_kids_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$vw_kids_custom_css .='text-transform:Lowercase;';
		$vw_kids_custom_css .='}';
	}
	if($vw_kids_theme_lay == 'Uppercase'){
		$vw_kids_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$vw_kids_custom_css .='text-transform:Uppercase;';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_footer_heading_weight = get_theme_mod('vw_kids_footer_heading_weight','600');
	if($vw_kids_footer_heading_weight != false){
		$vw_kids_custom_css .='#footer h3, a.rsswidget.rss-widget-title{';
			$vw_kids_custom_css .='font-weight: '.esc_attr($vw_kids_footer_heading_weight).';';
		$vw_kids_custom_css .='}';
	}

	$vw_kids_responsive_preloader_hide = get_theme_mod('vw_kids_responsive_preloader_hide',false);
	if($vw_kids_responsive_preloader_hide == true && get_theme_mod('vw_kids_loader_enable',false) == false){
		$vw_kids_custom_css .='@media screen and (min-width:575px){
			#preloader{';
			$vw_kids_custom_css .='display:none !important;';
		$vw_kids_custom_css .='} }';
	}

	if($vw_kids_responsive_preloader_hide == false){
		$vw_kids_custom_css .='@media screen and (max-width:575px){
			#preloader{';
			$vw_kids_custom_css .='display:none !important;';
		$vw_kids_custom_css .='} }';
	}

	$vw_kids_bradcrumbs_alignment = get_theme_mod( 'vw_kids_bradcrumbs_alignment','Left');
    if($vw_kids_bradcrumbs_alignment == 'Left'){
    	$vw_kids_custom_css .='@media screen and (min-width:768px) {';
		$vw_kids_custom_css .='.bradcrumbs{';
			$vw_kids_custom_css .='text-align:start;';
		$vw_kids_custom_css .='}}';
	}else if($vw_kids_bradcrumbs_alignment == 'Center'){
		$vw_kids_custom_css .='@media screen and (min-width:768px) {';
		$vw_kids_custom_css .='.bradcrumbs{';
			$vw_kids_custom_css .='text-align:center;';
		$vw_kids_custom_css .='}}';
	}else if($vw_kids_bradcrumbs_alignment == 'Right'){
		$vw_kids_custom_css .='@media screen and (min-width:768px) {';
		$vw_kids_custom_css .='.bradcrumbs{';
			$vw_kids_custom_css .='text-align:end;';
		$vw_kids_custom_css .='}}';
	}