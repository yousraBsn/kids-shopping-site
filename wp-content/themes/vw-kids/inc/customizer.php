<?php
/**
 * VW Kids Theme Customizer
 *
 * @package VW Kids
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_kids_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_kids_custom_controls' );

function vw_kids_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_kids_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_kids_customize_partial_blogdescription', 
	));

	//Homepage Settings
	$wp_customize->add_panel( 'vw_kids_homepage_panel', array(
		'title' => esc_html__( 'Homepage Settings', 'vw-kids' ),
		'panel' => 'vw_kids_panel_id',
		'priority' => 20,
	));

	//Topbar
	$wp_customize->add_section( 'vw_kids_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-kids' ),
		'panel' => 'vw_kids_homepage_panel'
	) );

   	// Header Background color
	$wp_customize->add_setting('vw_kids_header_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_kids_header_background_color', array(
		'label'    => __('Header Background Color', 'vw-kids'),
		'section'  => 'vw_kids_topbar',
	)));

	$wp_customize->add_setting('vw_kids_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','vw-kids'),
		'section' => 'vw_kids_topbar',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-kids' ),
			'center top'   => esc_html__( 'Top', 'vw-kids' ),
			'right top'   => esc_html__( 'Top Right', 'vw-kids' ),
			'left center'   => esc_html__( 'Left', 'vw-kids' ),
			'center center'   => esc_html__( 'Center', 'vw-kids' ),
			'right center'   => esc_html__( 'Right', 'vw-kids' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-kids' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-kids' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-kids' ),
		),
	));

	$wp_customize->add_setting( 'vw_kids_topbar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_topbar_hide_show',
       array(
		'label' => esc_html__( 'Show / Hide Topbar','vw-kids' ),
		'section' => 'vw_kids_topbar'
    )));

    $wp_customize->add_setting('vw_kids_topbar_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_topbar_padding_top_bottom',array(
		'label'	=> __('Topbar Padding Top Bottom','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_topbar',
		'type'=> 'text'
	));

    //Sticky Header
	$wp_customize->add_setting( 'vw_kids_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-kids' ),
        'section' => 'vw_kids_topbar'
    )));

    $wp_customize->add_setting('vw_kids_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_topbar',
		'type'=> 'text'
	));

    $wp_customize->add_setting( 'vw_kids_my_account_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_my_account_hide_show',
       array(
		'label' => esc_html__( 'Show / Hide My Account','vw-kids' ),
		'section' => 'vw_kids_topbar'
    )));

    $wp_customize->add_setting( 'vw_kids_cart_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_cart_hide_show',
       array(
		'label' => esc_html__( 'Show / Hide Cart','vw-kids' ),
		'section' => 'vw_kids_topbar'
    )));

	$wp_customize->add_setting('vw_kids_discount_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_discount_text',array(
		'label'	=> __('Add Discount Text','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'FREE SHIPPING : lorem ipsum is adummy text', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_topbar',
		'type'=> 'text'
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_kids_call', array( 
		'selector' => '#topbar span', 
		'render_callback' => 'vw_kids_customize_partial_vw_kids_call', 
	));

	$wp_customize->add_setting('vw_kids_phone_number_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_phone_number_icon',array(
		'label'	=> __('Add Phone Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_topbar',
		'setting'	=> 'vw_kids_phone_number_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_kids_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_kids_sanitize_phone_number'
	));
	$wp_customize->add_control('vw_kids_call',array(
		'label'	=> __('Add Phone Number','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '+00 987 654 1230', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_email_icon',array(
		'default'	=> 'far fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_email_icon',array(
		'label'	=> __('Add Email Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_topbar',
		'setting'	=> 'vw_kids_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_kids_email',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('vw_kids_email',array(
		'label'	=> __('Add Email Address','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'example@gmail.com', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_my_account_icon',array(
		'default'	=> 'fas fa-sign-in-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_my_account_icon',array(
		'label'	=> __('Add My Account Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_topbar',
		'setting'	=> 'vw_kids_my_account_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_kids_login_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_login_icon',array(
		'label'	=> __('Add Login/Register Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_topbar',
		'setting'	=> 'vw_kids_login_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_kids_cart_icon',array(
		'default'	=> 'fas fa-shopping-basket',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_cart_icon',array(
		'label'	=> __('Add Cart Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_topbar',
		'setting'	=> 'vw_kids_cart_icon',
		'type'		=> 'icon'
	)));

	//Menus Settings
	$wp_customize->add_section( 'vw_kids_menu_section' , array(
    	'title' => __( 'Menus Settings', 'vw-kids' ),
		'panel' => 'vw_kids_homepage_panel'
	) );

	$wp_customize->add_setting('vw_kids_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_navigation_menu_font_weight',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','vw-kids'),
        'section' => 'vw_kids_menu_section',
        'choices' => array(
        	'100' => __('100','vw-kids'),
            '200' => __('200','vw-kids'),
            '300' => __('300','vw-kids'),
            '400' => __('400','vw-kids'),
            '500' => __('500','vw-kids'),
            '600' => __('600','vw-kids'),
            '700' => __('700','vw-kids'),
            '800' => __('800','vw-kids'),
            '900' => __('900','vw-kids'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('vw_kids_menu_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menus Text Transform','vw-kids'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-kids'),
            'Capitalize' => __('Capitalize','vw-kids'),
            'Lowercase' => __('Lowercase','vw-kids'),
        ),
		'section'=> 'vw_kids_menu_section',
	));

	$wp_customize->add_setting('vw_kids_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_menus_item_style',array(
        'type' => 'select',
        'section' => 'vw_kids_menu_section',
		'label' => __('Menu Item Hover Style','vw-kids'),
		'choices' => array(
            'None' => __('None','vw-kids'),
            'Zoom In' => __('Zoom In','vw-kids'),
        ),
	) );

	$wp_customize->add_setting('vw_kids_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_kids_header_menus_color', array(
		'label'    => __('Menus Color', 'vw-kids'),
		'section'  => 'vw_kids_menu_section',
	)));

	$wp_customize->add_setting('vw_kids_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_kids_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'vw-kids'),
		'section'  => 'vw_kids_menu_section',
	)));

	$wp_customize->add_setting('vw_kids_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_kids_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'vw-kids'),
		'section'  => 'vw_kids_menu_section',
	)));

	$wp_customize->add_setting('vw_kids_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_kids_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'vw-kids'),
		'section'  => 'vw_kids_menu_section',
	)));

	//Slider
	$wp_customize->add_section( 'vw_kids_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-kids' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/kids-wordpress-theme">GET PRO</a>','vw-kids'),
		'panel' => 'vw_kids_homepage_panel'
	) );

	$wp_customize->add_setting( 'vw_kids_slider_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_kids_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-kids' ),
      'section' => 'vw_kids_slidersettings'
    )));

    $wp_customize->add_setting('vw_kids_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	) );
	$wp_customize->add_control('vw_kids_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','vw-kids'),
        'section' => 'vw_kids_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','vw-kids'),
            'Advance slider' => __('Advance slider','vw-kids'),
        ),
	));

	$wp_customize->add_setting('vw_kids_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','vw-kids'),
		'section'=> 'vw_kids_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_kids_advance_slider'
	));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_kids_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_kids_customize_partial_vw_kids_slider_hide_show',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'vw_kids_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_kids_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_kids_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-kids' ),
			'description' => __('Slider image size (825 x 470)','vw-kids'),
			'section'  => 'vw_kids_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'vw_kids_default_slider'
		) );
	}

	$wp_customize->add_setting('vw_kids_slider_small_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_slider_small_text',array(
		'label'	=> __('Add Slider Small Text','vw-kids'),
		'section'=> 'vw_kids_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_kids_default_slider'
	));

	$wp_customize->add_setting('vw_kids_slider_button_text',array(
		'default'=> 'SHOP NOW',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'SHOP NOW', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_kids_default_slider'
	));

	$wp_customize->add_setting('vw_kids_top_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_kids_top_button_url',array(
		'label'	=> __('Add Button URL','vw-kids'),
		'section'	=> 'vw_kids_slidersettings',
		'setting'	=> 'vw_kids_top_button_url',
		'type'	=> 'url',
		'active_callback' => 'vw_kids_default_slider'
	));

	$wp_customize->add_setting('vw_kids_slider_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_slider_button_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_slidersettings',
		'setting'	=> 'vw_kids_slider_button_icon',
		'type'		=> 'icon',
		'active_callback' => 'vw_kids_default_slider'
	)));

	$wp_customize->add_setting( 'vw_kids_slider_title_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_slider_title_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Title','vw-kids' ),
		'section' => 'vw_kids_slidersettings',
		'active_callback' => 'vw_kids_default_slider'
    )));

	$wp_customize->add_setting( 'vw_kids_slider_content_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_slider_content_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Content','vw-kids' ),
		'section' => 'vw_kids_slidersettings',
		'active_callback' => 'vw_kids_default_slider'
    )));

	//content layout
	$wp_customize->add_setting('vw_kids_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Kids_Image_Radio_Control($wp_customize, 'vw_kids_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-kids'),
        'section' => 'vw_kids_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),
    	'active_callback' => 'vw_kids_default_slider'
	)));

    //Slider content padding
    $wp_customize->add_setting('vw_kids_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','vw-kids'),
		'description'	=> __('Enter a value in %. Example:20%','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_kids_default_slider'
	));

	$wp_customize->add_setting('vw_kids_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','vw-kids'),
		'description'	=> __('Enter a value in %. Example:20%','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_kids_default_slider'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_kids_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_kids_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-kids' ),
		'section'     => 'vw_kids_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_kids_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
		'active_callback' => 'vw_kids_default_slider'
	) );

	//Slider height
	$wp_customize->add_setting('vw_kids_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_slider_height',array(
		'label'	=> __('Slider Height','vw-kids'),
		'description'	=> __('Specify the slider height (px).','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_slidersettings',
		'type'=> 'text',
		'active_callback' => 'vw_kids_default_slider'
	));

	$wp_customize->add_setting( 'vw_kids_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'vw_kids_sanitize_float'
	) );
	$wp_customize->add_control( 'vw_kids_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-kids'),
		'section' => 'vw_kids_slidersettings',
		'type'  => 'number',
		'active_callback' => 'vw_kids_default_slider'
	) );

	//Opacity
	$wp_customize->add_setting('vw_kids_slider_opacity_color',array(
      'default'              => 0.3,
      'sanitize_callback' => 'vw_kids_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_kids_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','vw-kids' ),
		'section'     => 'vw_kids_slidersettings',
		'type'        => 'select',
		'settings'    => 'vw_kids_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr(__('0','vw-kids')),
	      '0.1' =>  esc_attr(__('0.1','vw-kids')),
	      '0.2' =>  esc_attr(__('0.2','vw-kids')),
	      '0.3' =>  esc_attr(__('0.3','vw-kids')),
	      '0.4' =>  esc_attr(__('0.4','vw-kids')),
	      '0.5' =>  esc_attr(__('0.5','vw-kids')),
	      '0.6' =>  esc_attr(__('0.6','vw-kids')),
	      '0.7' =>  esc_attr(__('0.7','vw-kids')),
	      '0.8' =>  esc_attr(__('0.8','vw-kids')),
	      '0.9' =>  esc_attr(__('0.9','vw-kids'))
	),
	'active_callback' => 'vw_kids_default_slider'
	));

	$wp_customize->add_setting( 'vw_kids_slider_image_overlay',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_kids_switch_sanitization'
   	));
   	$wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_slider_image_overlay',array(
      	'label' => esc_html__( 'Show / Hide Slider Image Overlay','vw-kids' ),
      	'section' => 'vw_kids_slidersettings',
      	'active_callback' => 'vw_kids_default_slider'
   	)));

   	$wp_customize->add_setting('vw_kids_slider_image_overlay_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_kids_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'vw-kids'),
		'section'  => 'vw_kids_slidersettings',
		'active_callback' => 'vw_kids_default_slider'
	)));

	$wp_customize->add_setting( 'vw_kids_slider_arrow_hide_show',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_kids_switch_sanitization'
	));
	$wp_customize->add_control( new vw_kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_slider_arrow_hide_show',array(
		'label' => esc_html__( 'Show / Hide Slider Arrows','vw-kids' ),
		'section' => 'vw_kids_slidersettings',
		'active_callback' => 'vw_kids_default_slider'
	)));

	$wp_customize->add_setting('vw_kids_slider_prev_icon',array(
		'default'	=> 'fas fa-angle-left',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_slider_prev_icon',array(
		'label'	=> __('Add Slider Prev Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_slidersettings',
		'setting'	=> 'vw_kids_slider_prev_icon',
		'type'		=> 'icon',
		'active_callback' => 'vw_kids_default_slider'
	)));

	$wp_customize->add_setting('vw_kids_slider_next_icon',array(
		'default'	=> 'fas fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_slider_next_icon',array(
		'label'	=> __('Add Slider Next Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_slidersettings',
		'setting'	=> 'vw_kids_slider_next_icon',
		'type'		=> 'icon',
		'active_callback' => 'vw_kids_default_slider'
	)));
    
	//Popular Toys section
	$wp_customize->add_section( 'vw_kids_popular_product_section' , array(
    	'title'      => __( 'Most Popular Product', 'vw-kids' ),
    	'description' => __('For more options of products section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/kids-wordpress-theme">GET PRO</a>','vw-kids'),
		'priority'   => null,
		'panel' => 'vw_kids_homepage_panel'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_kids_popular_product', array( 
		'selector' => '#popular-toys h2', 
		'render_callback' => 'vw_kids_customize_partial_vw_kids_popular_product',
	));

	$wp_customize->add_setting( 'vw_kids_popular_product', array(
		'default'           => '',
		'sanitize_callback' => 'vw_kids_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'vw_kids_popular_product', array(
		'label'    => __( 'Select Page to show popular product', 'vw-kids' ),
		'section'  => 'vw_kids_popular_product_section',
		'type'     => 'dropdown-pages'
	) );

	//Features Section
	$wp_customize->add_section('vw_kids_features', array(
		'title'       => __('Features Section', 'vw-kids'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-kids'),
		'priority'    => null,
		'panel'       => 'vw_kids_homepage_panel',
	));

	$wp_customize->add_setting('vw_kids_features_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_features_text',array(
		'description' => __('<p>1. More options for Features section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Features section.</p>','vw-kids'),
		'section'=> 'vw_kids_features',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_kids_features_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_features_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_KIDS_GO_PRO).">More Info</a>",
		'section'=> 'vw_kids_features',
		'type'=> 'hidden'
	));

	//Toys Section
	$wp_customize->add_section('vw_kids_toys', array(
		'title'       => __('Toys Section', 'vw-kids'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-kids'),
		'priority'    => null,
		'panel'       => 'vw_kids_homepage_panel',
	));

	$wp_customize->add_setting('vw_kids_toys_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_toys_text',array(
		'description' => __('<p>1. More options for Toys section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Toys section.</p>','vw-kids'),
		'section'=> 'vw_kids_toys',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_kids_toys_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_toys_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_KIDS_GO_PRO).">More Info</a>",
		'section'=> 'vw_kids_toys',
		'type'=> 'hidden'
	));

	//Offer 1 Section
	$wp_customize->add_section('vw_kids_offer_1', array(
		'title'       => __('Offer 1 Section', 'vw-kids'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-kids'),
		'priority'    => null,
		'panel'       => 'vw_kids_homepage_panel',
	));

	$wp_customize->add_setting('vw_kids_offer_1_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_offer_1_text',array(
		'description' => __('<p>1. More options for Offer 1 section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Offer 1 section.</p>','vw-kids'),
		'section'=> 'vw_kids_offer_1',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_kids_offer_1_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_offer_1_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_KIDS_GO_PRO).">More Info</a>",
		'section'=> 'vw_kids_offer_1',
		'type'=> 'hidden'
	));

	//Trend Products Section
	$wp_customize->add_section('vw_kids_trend_products', array(
		'title'       => __('Trend Products Section', 'vw-kids'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-kids'),
		'priority'    => null,
		'panel'       => 'vw_kids_homepage_panel',
	));

	$wp_customize->add_setting('vw_kids_trend_products_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_trend_products_text',array(
		'description' => __('<p>1. More options for Trend Products section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Trend Products section.</p>','vw-kids'),
		'section'=> 'vw_kids_trend_products',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_kids_trend_products_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_trend_products_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_KIDS_GO_PRO).">More Info</a>",
		'section'=> 'vw_kids_trend_products',
		'type'=> 'hidden'
	));

	//Offers 2 Section
	$wp_customize->add_section('vw_kids_offers_ 2', array(
		'title'       => __('Offers 2 Section', 'vw-kids'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-kids'),
		'priority'    => null,
		'panel'       => 'vw_kids_homepage_panel',
	));

	$wp_customize->add_setting('vw_kids_offers_ 2_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_offers_ 2_text',array(
		'description' => __('<p>1. More options for Offers 2 section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Offers 2 section.</p>','vw-kids'),
		'section'=> 'vw_kids_offers_ 2',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_kids_offers_ 2_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_offers_ 2_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_KIDS_GO_PRO).">More Info</a>",
		'section'=> 'vw_kids_offers_ 2',
		'type'=> 'hidden'
	));

	//Testimonial Section
	$wp_customize->add_section('vw_kids_testimonial', array(
		'title'       => __('Testimonial Section', 'vw-kids'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-kids'),
		'priority'    => null,
		'panel'       => 'vw_kids_homepage_panel',
	));

	$wp_customize->add_setting('vw_kids_testimonial_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_testimonial_text',array(
		'description' => __('<p>1. More options for Testimonial section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Testimonial section.</p>','vw-kids'),
		'section'=> 'vw_kids_testimonial',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_kids_testimonial_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_testimonial_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_KIDS_GO_PRO).">More Info</a>",
		'section'=> 'vw_kids_testimonial',
		'type'=> 'hidden'
	));

	//Onsale Section
	$wp_customize->add_section('vw_kids_onsale', array(
		'title'       => __('Onsale Section', 'vw-kids'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-kids'),
		'priority'    => null,
		'panel'       => 'vw_kids_homepage_panel',
	));

	$wp_customize->add_setting('vw_kids_onsale_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_onsale_text',array(
		'description' => __('<p>1. More options for Onsale section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Onsale section.</p>','vw-kids'),
		'section'=> 'vw_kids_onsale',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_kids_onsale_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_onsale_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_KIDS_GO_PRO).">More Info</a>",
		'section'=> 'vw_kids_onsale',
		'type'=> 'hidden'
	));

	//Offers 3 Section
	$wp_customize->add_section('vw_kids_offers_3', array(
		'title'       => __('Offers 3 Section', 'vw-kids'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-kids'),
		'priority'    => null,
		'panel'       => 'vw_kids_homepage_panel',
	));

	$wp_customize->add_setting('vw_kids_offers_3_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_offers_3_text',array(
		'description' => __('<p>1. More options for Offers 3 section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Offers 3 section.</p>','vw-kids'),
		'section'=> 'vw_kids_offers_3',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_kids_offers_3_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_offers_3_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_KIDS_GO_PRO).">More Info</a>",
		'section'=> 'vw_kids_offers_3',
		'type'=> 'hidden'
	));

	//Instagram Section
	$wp_customize->add_section('vw_kids_instagram', array(
		'title'       => __('Instagram Section', 'vw-kids'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','vw-kids'),
		'priority'    => null,
		'panel'       => 'vw_kids_homepage_panel',
	));

	$wp_customize->add_setting('vw_kids_instagram_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_instagram_text',array(
		'description' => __('<p>1. More options for Instagram section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Instagram section.</p>','vw-kids'),
		'section'=> 'vw_kids_instagram',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('vw_kids_instagram_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_instagram_btn',array(
		'description' => "<a class='go-pro' target='_blank' href=".esc_url(VW_KIDS_GO_PRO).">More Info</a>",
		'section'=> 'vw_kids_instagram',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('vw_kids_footer',array(
		'title'	=> __('Footer','vw-kids'),
		'description' => __('For more options of footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/kids-wordpress-theme">GET PRO</a>','vw-kids'),
		'panel' => 'vw_kids_homepage_panel',
	));	

	$wp_customize->add_setting( 'vw_kids_footer_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_kids_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_footer_hide_show',array(
      'label' => esc_html__( 'Show / Hide Footer','vw-kids' ),
      'section' => 'vw_kids_footer'
    )));

 	// font size
	$wp_customize->add_setting('vw_kids_button_footer_font_size',array(
		'default'=> 30,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_button_footer_font_size',array(
		'label'	=> __('Footer Heading Font Size','vw-kids'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_kids_footer',
	));

	$wp_customize->add_setting('vw_kids_button_footer_heading_letter_spacing',array(
		'default'=> 1,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_button_footer_heading_letter_spacing',array(
		'label'	=> __('Heading Letter Spacing','vw-kids'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'vw_kids_footer',
	));

	// text trasform
	$wp_customize->add_setting('vw_kids_button_footer_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_button_footer_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Heading Text Transform','vw-kids'),
		'choices' => array(
      'Uppercase' => __('Uppercase','vw-kids'),
      'Capitalize' => __('Capitalize','vw-kids'),
      'Lowercase' => __('Lowercase','vw-kids'),
    ),
		'section'=> 'vw_kids_footer',
	));

	$wp_customize->add_setting('vw_kids_footer_heading_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_footer_heading_weight',array(
        'type' => 'select',
        'label' => __('Heading Font Weight','vw-kids'),
        'section' => 'vw_kids_footer',
        'choices' => array(
        	'100' => __('100','vw-kids'),
            '200' => __('200','vw-kids'),
            '300' => __('300','vw-kids'),
            '400' => __('400','vw-kids'),
            '500' => __('500','vw-kids'),
            '600' => __('600','vw-kids'),
            '700' => __('700','vw-kids'),
            '800' => __('800','vw-kids'),
            '900' => __('900','vw-kids'),
        ),
	) );

    $wp_customize->add_setting('vw_kids_footer_template',array(
      'default'	=> esc_html('vw_kids-footer-one'),
      'sanitize_callback'	=> 'vw_kids_sanitize_choices'	
  	));
  	$wp_customize->add_control('vw_kids_footer_template',array(
		'label'	=> esc_html__('Footer style','vw-kids'),
		'section'	=> 'vw_kids_footer',
		'setting'	=> 'vw_kids_footer_template',
		'type' => 'select',
		'choices' => array(
			'vw_kids-footer-one' => esc_html__('Style 1', 'vw-kids'),
			'vw_kids-footer-two' => esc_html__('Style 2', 'vw-kids'),
			'vw_kids-footer-three' => esc_html__('Style 3', 'vw-kids'),
			'vw_kids-footer-four' => esc_html__('Style 4', 'vw-kids'),
			'vw_kids-footer-five' => esc_html__('Style 5', 'vw-kids'),
	)
	  ));

	$wp_customize->add_setting('vw_kids_footer_background_color', array(
		'default'           => '#343c49',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_kids_footer_background_color', array(
		'label'    => __('Footer Background Color', 'vw-kids'),
		'section'  => 'vw_kids_footer',
	)));

	$wp_customize->add_setting('vw_kids_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_kids_footer_background_image',array(
        'label' => __('Footer Background Image','vw-kids'),
        'section' => 'vw_kids_footer'
	)));

	$wp_customize->add_setting('vw_kids_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','vw-kids'),
		'section' => 'vw_kids_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'vw-kids' ),
			'center top'   => esc_html__( 'Top', 'vw-kids' ),
			'right top'   => esc_html__( 'Top Right', 'vw-kids' ),
			'left center'   => esc_html__( 'Left', 'vw-kids' ),
			'center center'   => esc_html__( 'Center', 'vw-kids' ),
			'right center'   => esc_html__( 'Right', 'vw-kids' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'vw-kids' ),
			'center bottom'   => esc_html__( 'Bottom', 'vw-kids' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'vw-kids' ),
		),
	)); 

	// Footer
	$wp_customize->add_setting('vw_kids_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','vw-kids'),
		'choices' => array(
            'fixed' => __('fixed','vw-kids'),
            'scroll' => __('scroll','vw-kids'),
        ),
		'section'=> 'vw_kids_footer',
	));

	// footer padding
	$wp_customize->add_setting('vw_kids_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'vw-kids' ),
    ),
		'section'=> 'vw_kids_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','vw-kids'),
        'section' => 'vw_kids_footer',
        'choices' => array(
        	'Left' => __('Left','vw-kids'),
            'Center' => __('Center','vw-kids'),
            'Right' => __('Right','vw-kids')
        ),
	) );

	$wp_customize->add_setting('vw_kids_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','vw-kids'),
        'section' => 'vw_kids_footer',
        'choices' => array(
        	'Left' => __('Left','vw-kids'),
            'Center' => __('Center','vw-kids'),
            'Right' => __('Right','vw-kids')
        ),
	) );

    // footer social icon
  	$wp_customize->add_setting( 'vw_kids_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_footer_icon',array(
		'label' => esc_html__( 'Show / Hide Footer Social Icon','vw-kids' ),
		'section' => 'vw_kids_footer'
    ))); 

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_kids_footer_text', array( 
		'selector' => '#footer-2 .copyright p', 
		'render_callback' => 'vw_kids_customize_partial_vw_kids_footer_text', 
	));

	$wp_customize->add_setting( 'vw_kids_copyright_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_kids_switch_sanitization'
    ));
    $wp_customize->add_control( new vw_kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_copyright_hide_show',array(
      'label' => esc_html__( 'Show / Hide Copyright','vw-kids' ),
      'section' => 'vw_kids_footer'
    )));

	$wp_customize->add_setting('vw_kids_copyright_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_kids_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'vw-kids'),
		'section'  => 'vw_kids_footer',
	)));
	
	$wp_customize->add_setting('vw_kids_copyright_text_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_kids_copyright_text_color', array(
		'label'    => __('Copyright Text Color', 'vw-kids'),
		'section'  => 'vw_kids_footer',
	)));

	$wp_customize->add_setting('vw_kids_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_kids_footer_text',array(
		'label'	=> __('Copyright Text','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_footer',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('vw_kids_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_copyright_font_weight',array(
	  'default' => 400,
	  'transport' => 'refresh',
	  'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_copyright_font_weight',array(
	    'type' => 'select',
	    'label' => __('Copyright Font Weight','vw-kids'),
	    'section' => 'vw_kids_footer',
	    'choices' => array(
	    	'100' => __('100','vw-kids'),
	        '200' => __('200','vw-kids'),
	        '300' => __('300','vw-kids'),
	        '400' => __('400','vw-kids'),
	        '500' => __('500','vw-kids'),
	        '600' => __('600','vw-kids'),
	        '700' => __('700','vw-kids'),
	        '800' => __('800','vw-kids'),
	        '900' => __('900','vw-kids'),
    ),
	));

	$wp_customize->add_setting('vw_kids_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Kids_Image_Radio_Control($wp_customize, 'vw_kids_copyright_alignment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-kids'),
        'section' => 'vw_kids_footer',
        'settings' => 'vw_kids_copyright_alignment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'vw_kids_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_kids_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-kids' ),
      	'section' => 'vw_kids_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_kids_scroll_top_to_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_kids_customize_partial_vw_kids_scroll_top_to_icon', 
	));

    $wp_customize->add_setting('vw_kids_scroll_top_to_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_scroll_top_to_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_footer',
		'setting'	=> 'vw_kids_scroll_top_to_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_kids_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-kids'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_kids_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_kids_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-kids' ),
		'section'     => 'vw_kids_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_kids_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Kids_Image_Radio_Control($wp_customize, 'vw_kids_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-kids'),
        'section' => 'vw_kids_footer',
        'settings' => 'vw_kids_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

    $wp_customize->add_setting('vw_kids_align_footer_social_icon',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_align_footer_social_icon',array(
        'type' => 'select',
        'label' => __('Social Icon Alignment ','vw-kids'),
        'section' => 'vw_kids_footer',
        'choices' => array(
            'left' => __('Left','vw-kids'),
            'right' => __('Right','vw-kids'),
            'center' => __('Center','vw-kids'),
        ),
	) );

	$wp_customize->add_setting( 'vw_kids_copyright_sticky',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_copyright_sticky',array(
      'label' => esc_html__( 'Show / Hide Sticky Copyright','vw-kids' ),
      'section' => 'vw_kids_footer'
    )));

   $wp_customize->add_setting('vw_kids_footer_social_icons_font_size',array(
       'default'=> 16,
       'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_kids_footer_social_icons_font_size',array(
    'label' => __('Social Icon Font Size','vw-kids'),
    	'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_kids_footer',
	 ));

	//Blog Post Settings
	$wp_customize->add_panel( 'vw_kids_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'vw-kids' ),
		'panel' => 'vw_kids_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_kids_post_settings', array(
		'title' => __( 'Post Settings', 'vw-kids' ),
		'panel' => 'vw_kids_blog_post_parent_panel',
	));

	//Blog layout
    $wp_customize->add_setting('vw_kids_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Kids_Image_Radio_Control($wp_customize, 'vw_kids_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-kids'),
        'section' => 'vw_kids_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_kids_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_kids_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_kids_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-kids'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-kids'),
        'section' => 'vw_kids_post_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-kids'),
            'Right Sidebar' => __('Right Sidebar','vw-kids'),
            'One Column' => __('One Column','vw-kids'),
            'Three Columns' => __('Three Columns','vw-kids'),
            'Four Columns' => __('Four Columns','vw-kids'),
            'Grid Layout' => __('Grid Layout','vw-kids')
        ),
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_kids_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_kids_customize_partial_vw_kids_toggle_postdate', 
	));

  	$wp_customize->add_setting('vw_kids_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_post_settings',
		'setting'	=> 'vw_kids_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_kids_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_toggle_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','vw-kids' ),
        'section' => 'vw_kids_post_settings'
    )));

	$wp_customize->add_setting('vw_kids_toggle_author_icon',array(
		'default'	=> 'far fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_post_settings',
		'setting'	=> 'vw_kids_toggle_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_kids_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-kids' ),
		'section' => 'vw_kids_post_settings'
    )));

    $wp_customize->add_setting('vw_kids_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_post_settings',
		'setting'	=> 'vw_kids_toggle_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_kids_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-kids' ),
		'section' => 'vw_kids_post_settings'
    )));

  	$wp_customize->add_setting('vw_kids_toggle_time_icon',array(
		'default'	=> 'far fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_post_settings',
		'setting'	=> 'vw_kids_toggle_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_kids_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-kids' ),
		'section' => 'vw_kids_post_settings'
    )));

    $wp_customize->add_setting( 'vw_kids_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-kids' ),
		'section' => 'vw_kids_post_settings'
    )));

    $wp_customize->add_setting( 'vw_kids_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_kids_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','vw-kids' ),
		'section'     => 'vw_kids_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_kids_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_kids_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','vw-kids' ),
		'section'     => 'vw_kids_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('vw_kids_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'vw_kids_sanitize_choices'
	));
  	$wp_customize->add_control('vw_kids_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','vw-kids'),
		'section'	=> 'vw_kids_post_settings',
		'choices' => array(
		'default' => __('Default','vw-kids'),
		'custom' => __('Custom Image Size','vw-kids'),
      ),
  	));

	$wp_customize->add_setting('vw_kids_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('vw_kids_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-kids' ),),
		'section'=> 'vw_kids_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_kids_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('vw_kids_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'vw-kids' ),),
		'section'=> 'vw_kids_post_settings',
		'type'=> 'text',
		'active_callback' => 'vw_kids_blog_post_featured_image_dimension'
	));

    $wp_customize->add_setting( 'vw_kids_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_kids_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-kids' ),
		'section'     => 'vw_kids_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_kids_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_kids_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-kids'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-kids'),
		'section'=> 'vw_kids_post_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_kids_blog_page_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_blog_page_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Blog Posts','vw-kids'),
        'section' => 'vw_kids_post_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','vw-kids'),
            'Without Blocks' => __('Without Blocks','vw-kids')
        ),
	) );

    $wp_customize->add_setting('vw_kids_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-kids'),
        'section' => 'vw_kids_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-kids'),
            'Excerpt' => __('Excerpt','vw-kids'),
            'No Content' => __('No Content','vw-kids')
        ),
	) );

	$wp_customize->add_setting('vw_kids_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_kids_blog_pagination_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_kids_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_blog_pagination_hide_show',array(
      'label' => esc_html__( 'Show / Hide Blog Pagination','vw-kids' ),
      'section' => 'vw_kids_post_settings'
    )));

	$wp_customize->add_setting( 'vw_kids_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'vw_kids_sanitize_choices'
    ));
    $wp_customize->add_control( 'vw_kids_blog_pagination_type', array(
        'section' => 'vw_kids_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'vw-kids' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'vw-kids' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'vw-kids' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'vw_kids_button_settings', array(
		'title' => __( 'Button Settings', 'vw-kids' ),
		'panel' => 'vw_kids_blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_kids_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_kids_button_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_kids_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-kids' ),
		'section'     => 'vw_kids_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	// font size button
	$wp_customize->add_setting('vw_kids_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_button_font_size',array(
		'label'	=> __('Button Font Size','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-kids' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_kids_button_settings',
	));

	$wp_customize->add_setting('vw_kids_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'vw-kids' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'vw_kids_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('vw_kids_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','vw-kids'),
		'choices' => array(
            'Uppercase' => __('Uppercase','vw-kids'),
            'Capitalize' => __('Capitalize','vw-kids'),
            'Lowercase' => __('Lowercase','vw-kids'),
        ),
		'section'=> 'vw_kids_button_settings',
	));


	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_kids_button_text', array( 
		'selector' => '.post-main-box .content-bttn a', 
		'render_callback' => 'vw_kids_customize_partial_vw_kids_button_text', 
	));

	$wp_customize->add_setting('vw_kids_button_text',array(
		'default'=> esc_html__( 'Read More', 'vw-kids' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_button_text',array(
		'label'	=> __('Add Button Text','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_blog_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_blog_button_icon',array(
		'label'	=> __('Add Button Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_button_settings',
		'setting'	=> 'vw_kids_blog_button_icon',
		'type'		=> 'icon'
	)));

	// Related Post Settings
	$wp_customize->add_section( 'vw_kids_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-kids' ),
		'panel' => 'vw_kids_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_kids_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_kids_customize_partial_vw_kids_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_kids_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_related_post',array(
		'label' => esc_html__( 'Show / Hide Related Post','vw-kids' ),
		'section' => 'vw_kids_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_kids_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_kids_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_kids_sanitize_float'
	));
	$wp_customize->add_control('vw_kids_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'vw_kids_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_kids_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','vw-kids' ),
		'section'     => 'vw_kids_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'vw_kids_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_kids_related_toggle_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_kids_switch_sanitization'
  	));
  	$wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_related_toggle_postdate',array(
	    'label' => esc_html__( 'Show / Hide Post Date','vw-kids' ),
	    'section' => 'vw_kids_related_posts_settings'
  	)));

  	$wp_customize->add_setting('vw_kids_related_postdate_icon',array(
	    'default' => 'fas fa-calendar-alt',
	    'sanitize_callback' => 'sanitize_text_field'
  	));
  	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
  	$wp_customize,'vw_kids_related_postdate_icon',array(
	    'label' => __('Add Post Date Icon','vw-kids'),
	    'transport' => 'refresh',
	    'section' => 'vw_kids_related_posts_settings',
	    'setting' => 'vw_kids_related_postdate_icon',
	    'type'    => 'icon'
  	)));

	$wp_customize->add_setting( 'vw_kids_related_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
  	));
  	$wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_related_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-kids' ),
		'section' => 'vw_kids_related_posts_settings'
  	)));

  	$wp_customize->add_setting('vw_kids_related_author_icon',array(
	    'default' => 'fas fa-user',
	    'sanitize_callback' => 'sanitize_text_field'
  	));
  	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
  	$wp_customize,'vw_kids_related_author_icon',array(
	    'label' => __('Add Author Icon','vw-kids'),
	    'transport' => 'refresh',
	    'section' => 'vw_kids_related_posts_settings',
	    'setting' => 'vw_kids_related_author_icon',
	    'type'    => 'icon'
  	)));

	$wp_customize->add_setting( 'vw_kids_related_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
  	) );
  	$wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_related_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-kids' ),
		'section' => 'vw_kids_related_posts_settings'
  	)));

  	$wp_customize->add_setting('vw_kids_related_comments_icon',array(
	    'default' => 'fa fa-comments',
	    'sanitize_callback' => 'sanitize_text_field'
  	));
  	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
  	$wp_customize,'vw_kids_related_comments_icon',array(
	    'label' => __('Add Comments Icon','vw-kids'),
	    'transport' => 'refresh',
	    'section' => 'vw_kids_related_posts_settings',
	    'setting' => 'vw_kids_related_comments_icon',
	    'type'    => 'icon'
  	)));

	$wp_customize->add_setting( 'vw_kids_related_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
  	) );
  	$wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_related_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','vw-kids' ),
		'section' => 'vw_kids_related_posts_settings'
  	)));

  	$wp_customize->add_setting('vw_kids_related_time_icon',array(
	    'default' => 'fas fa-clock',
	    'sanitize_callback' => 'sanitize_text_field'
  	));
  	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
  	$wp_customize,'vw_kids_related_time_icon',array(
	    'label' => __('Add Time Icon','vw-kids'),
	    'transport' => 'refresh',
	    'section' => 'vw_kids_related_posts_settings',
	    'setting' => 'vw_kids_related_time_icon',
	    'type'    => 'icon'
  	)));

  	$wp_customize->add_setting('vw_kids_related_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_related_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-kids'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-kids'),
		'section'=> 'vw_kids_related_posts_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_kids_related_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
	));
  	$wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_related_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-kids' ),
		'section' => 'vw_kids_related_posts_settings'
  	)));

  	$wp_customize->add_setting( 'vw_kids_related_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_kids_related_image_box_shadow', array(
		'label'       => esc_html__( 'Related post Image Box Shadow','vw-kids' ),
		'section'     => 'vw_kids_related_posts_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  	$wp_customize->add_setting('vw_kids_related_button_text',array(
		'default'=> esc_html__('Read More','vw-kids'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_related_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-kids'),
		'input_attrs' => array(
      'placeholder' => esc_html__( 'Read More', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_related_posts_settings',
		'type'=> 'text'
	));

	// Single Posts Settings
	$wp_customize->add_section( 'vw_kids_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'vw-kids' ),
		'panel' => 'vw_kids_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_kids_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_single_blog_settings',
		'setting'	=> 'vw_kids_single_postdate_icon',
		'type'		=> 'icon'
	)));

 	$wp_customize->add_setting( 'vw_kids_single_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_kids_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_single_postdate',array(
	    'label' => esc_html__( 'Show / Hide Date','vw-kids' ),
	   'section' => 'vw_kids_single_blog_settings'
	)));

	$wp_customize->add_setting('vw_kids_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_single_author_icon',array(
		'label'	=> __('Add Author Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_single_blog_settings',
		'setting'	=> 'vw_kids_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_kids_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_kids_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_single_author',array(
	    'label' => esc_html__( 'Show / Hide Author','vw-kids' ),
	    'section' => 'vw_kids_single_blog_settings'
	)));

   	$wp_customize->add_setting('vw_kids_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_single_blog_settings',
		'setting'	=> 'vw_kids_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_kids_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_kids_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_single_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','vw-kids' ),
	    'section' => 'vw_kids_single_blog_settings'
	)));

  	$wp_customize->add_setting('vw_kids_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_single_time_icon',array(
		'label'	=> __('Add Time Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_single_blog_settings',
		'setting'	=> 'vw_kids_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_kids_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'vw_kids_switch_sanitization'
	) );
	$wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_single_time',array(
	    'label' => esc_html__( 'Show / Hide Time','vw-kids' ),
	    'section' => 'vw_kids_single_blog_settings'
	)));

	$wp_customize->add_setting( 'vw_kids_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','vw-kids' ),
		'section' => 'vw_kids_single_blog_settings'
    )));

    // Single Posts Category
  	$wp_customize->add_setting( 'vw_kids_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
  	$wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','vw-kids' ),
		'section' => 'vw_kids_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_kids_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','vw-kids' ),
		'section' => 'vw_kids_single_blog_settings'
    )));

	$wp_customize->add_setting( 'vw_kids_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_single_blog_post_navigation_show_hide', array(
		'label' => esc_html__( 'Show / Hide Post Navigation','vw-kids' ),
		'section' => 'vw_kids_single_blog_settings'
    )));

    $wp_customize->add_setting( 'vw_kids_singlepost_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_kids_singlepost_image_box_shadow', array(
		'label'       => esc_html__( 'Single post Image Box Shadow','vw-kids' ),
		'section'     => 'vw_kids_single_blog_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('vw_kids_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-kids'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-kids'),
		'section'=> 'vw_kids_single_blog_settings',
		'type'=> 'text'
	));

	//navigation text
	$wp_customize->add_setting('vw_kids_single_blog_prev_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'PREVIOUS', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_single_blog_next_navigation_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_kids_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_kids_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'Post Comment', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','vw-kids'),
		'description'	=> __('Enter a value in %. Example:20%','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_single_blog_settings',
		'type'=> 'text'
	));

	 // Grid layout setting
	$wp_customize->add_section( 'vw_kids_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'vw-kids' ),
		'panel' => 'vw_kids_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('vw_kids_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_grid_layout_settings',
		'setting'	=> 'vw_kids_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'vw_kids_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_grid_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','vw-kids' ),
        'section' => 'vw_kids_grid_layout_settings'
    )));

	$wp_customize->add_setting('vw_kids_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_grid_author_icon',array(
		'label'	=> __('Add Author Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_grid_layout_settings',
		'setting'	=> 'vw_kids_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_kids_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','vw-kids' ),
		'section' => 'vw_kids_grid_layout_settings'
    )));

   	$wp_customize->add_setting('vw_kids_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_grid_layout_settings',
		'setting'	=> 'vw_kids_grid_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'vw_kids_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','vw-kids' ),
		'section' => 'vw_kids_grid_layout_settings'
    )));

    $wp_customize->add_setting( 'vw_kids_grid_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
	));
  	$wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_grid_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','vw-kids' ),
		'section' => 'vw_kids_grid_layout_settings'
  	)));

	$wp_customize->add_setting('vw_kids_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-kids'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-kids'),
		'section'=> 'vw_kids_grid_layout_settings',
		'type'=> 'text'
	));

	 $wp_customize->add_setting( 'vw_kids_grid_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_kids_grid_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-kids' ),
		'section'     => 'vw_kids_grid_layout_settings',
		'type'        => 'range',
		'settings'    => 'vw_kids_grid_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('vw_kids_display_grid_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_display_grid_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Grid Posts','vw-kids'),
        'section' => 'vw_kids_grid_layout_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','vw-kids'),
            'Without Blocks' => __('Without Blocks','vw-kids')
        ),
	) );

  	$wp_customize->add_setting('vw_kids_grid_button_text',array(
		'default'=> esc_html__('Read More','vw-kids'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-kids'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_grid_layout_settings',
		'type'=> 'text'
	));

  	$wp_customize->add_setting('vw_kids_grid_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_grid_button_icon',array(
		'label'	=> __('Add Grid Button Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_grid_layout_settings',
		'setting'	=> 'vw_kids_grid_button_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_kids_grid_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_grid_layout_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('vw_kids_grid_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_grid_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Grid Post Content','vw-kids'),
        'section' => 'vw_kids_grid_layout_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','vw-kids'),
            'Excerpt' => esc_html__('Excerpt','vw-kids'),
            'No Content' => esc_html__('No Content','vw-kids')
        ),
	) );

    $wp_customize->add_setting( 'vw_kids_grid_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_kids_grid_featured_image_border_radius', array(
		'label'       => esc_html__( 'Grid Featured Image Border Radius','vw-kids' ),
		'section'     => 'vw_kids_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'vw_kids_grid_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_kids_grid_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Grid Featured Image Box Shadow','vw-kids' ),
		'section'     => 'vw_kids_grid_layout_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );
	
	//Others Settings
	$wp_customize->add_panel( 'vw_kids_others_panel', array(
		'title' => esc_html__( 'Others Settings', 'vw-kids' ),
		'panel' => 'vw_kids_panel_id',
		'priority' => 20,
	));

	// Layout
	$wp_customize->add_section( 'vw_kids_left_right', array(
    	'title' => esc_html__( 'General Settings', 'vw-kids' ),
		'panel' => 'vw_kids_others_panel'
	) );

	$wp_customize->add_setting('vw_kids_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Kids_Image_Radio_Control($wp_customize, 'vw_kids_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-kids'),
        'description' => __('Here you can change the width layout of Website.','vw-kids'),
        'section' => 'vw_kids_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vw_kids_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-kids'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-kids'),
        'section' => 'vw_kids_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-kids'),
            'Right Sidebar' => __('Right Sidebar','vw-kids'),
            'One Column' => __('One Column','vw-kids')
        ),
	) );

	$wp_customize->add_setting( 'vw_kids_single_page_breadcrumb',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_single_page_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Page Breadcrumb','vw-kids' ),
		'section' => 'vw_kids_left_right'
    )));

    $wp_customize->add_setting('vw_kids_bradcrumbs_alignment',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_bradcrumbs_alignment',array(
        'type' => 'select',
        'label' => __('Bradcrumbs Alignment','vw-kids'),
        'section' => 'vw_kids_left_right',
        'choices' => array(
            'Left' => __('Left','vw-kids'),
            'Right' => __('Right','vw-kids'),
            'Center' => __('Center','vw-kids'),
        ),
	) );

	//Wow Animation
	$wp_customize->add_setting( 'vw_kids_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_kids_switch_sanitization'
    ));
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_animation',array(
        'label' => esc_html__( 'Show / Hide Animations','vw-kids' ),
        'description' => __('Here you can disable overall site animation effect','vw-kids'),
        'section' => 'vw_kids_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_kids_loader_enable',array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_loader_enable',array(
        'label' => esc_html__( 'Show / Hide Pre-Loader','vw-kids' ),
        'section' => 'vw_kids_left_right'
    )));

	$wp_customize->add_setting('vw_kids_preloader_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_kids_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-kids'),
		'section'  => 'vw_kids_left_right',
	)));

	$wp_customize->add_setting('vw_kids_preloader_border_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_kids_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-kids'),
		'section'  => 'vw_kids_left_right',
	)));

	$wp_customize->add_setting('vw_kids_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'vw_kids_preloader_bg_img',array(
        'label' => __('Preloader Background Image','vw-kids'),
        'section' => 'vw_kids_left_right'
	)));

    //404 Page Setting
	$wp_customize->add_section('vw_kids_404_page',array(
		'title'	=> __('404 Page Settings','vw-kids'),
		'panel' => 'vw_kids_others_panel',
	));	

	$wp_customize->add_setting('vw_kids_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_kids_404_page_title',array(
		'label'	=> __('Add Title','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_kids_404_page_content',array(
		'label'	=> __('Add Text','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_404_page_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_404_page',
		'setting'	=> 'vw_kids_404_page_button_icon',
		'type'		=> 'icon'
	)));

	//No Result Page Setting
	$wp_customize->add_section('vw_kids_no_results_page',array(
		'title'	=> __('No Results Page Settings','vw-kids'),
		'panel' => 'vw_kids_others_panel',
	));	

	$wp_customize->add_setting('vw_kids_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_kids_no_results_page_title',array(
		'label'	=> __('Add Title','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_kids_no_results_page_content',array(
		'label'	=> __('Add Text','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('vw_kids_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-kids'),
		'panel' => 'vw_kids_others_panel',
	));	

	$wp_customize->add_setting('vw_kids_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_social_icon_width',array(
		'label'	=> __('Icon Width','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_social_icon_height',array(
		'label'	=> __('Icon Height','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_kids_social_icon_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_kids_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-kids' ),
		'section'     => 'vw_kids_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_kids_responsive_media',array(
		'title'	=> __('Responsive Media','vw-kids'),
		'panel' => 'vw_kids_others_panel',
	));

	$wp_customize->add_setting( 'vw_kids_resp_topbar_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_kids_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_resp_topbar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Topbar','vw-kids' ),
      'section' => 'vw_kids_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_kids_stickyheader_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_kids_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_stickyheader_hide_show',array(
      'label' => esc_html__( 'Sticky Header','vw-kids' ),
      'section' => 'vw_kids_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_kids_resp_slider_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_kids_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-kids' ),
      'section' => 'vw_kids_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_kids_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_kids_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','vw-kids' ),
      'section' => 'vw_kids_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_kids_responsive_preloader_hide',array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_responsive_preloader_hide',array(
        'label' => esc_html__( 'Show / Hide Preloader','vw-kids' ),
        'section' => 'vw_kids_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_kids_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_kids_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-kids' ),
      'section' => 'vw_kids_responsive_media'
    )));

    $wp_customize->add_setting('vw_kids_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_responsive_media',
		'setting'	=> 'vw_kids_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_kids_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Kids_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_kids_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-kids'),
		'transport' => 'refresh',
		'section'	=> 'vw_kids_responsive_media',
		'setting'	=> 'vw_kids_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_kids_resp_menu_toggle_btn_bg_color', array(
		'default'           => '#343c49',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_kids_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'vw-kids'),
		'section'  => 'vw_kids_responsive_media',
	)));

    //Woocommerce settings
	$wp_customize->add_section('vw_kids_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'vw-kids'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

 
	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_kids_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'vw_kids_customize_partial_vw_kids_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_kids_woocommerce_shop_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','vw-kids' ),
		'section' => 'vw_kids_woocommerce_section'
    )));

    $wp_customize->add_setting('vw_kids_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','vw-kids'),
        'section' => 'vw_kids_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-kids'),
            'Right Sidebar' => __('Right Sidebar','vw-kids'),
        ),
	) );

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_kids_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'vw_kids_customize_partial_vw_kids_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_kids_woocommerce_single_product_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','vw-kids' ),
		'section' => 'vw_kids_woocommerce_section'
    )));

   	$wp_customize->add_setting('vw_kids_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','vw-kids'),
        'section' => 'vw_kids_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-kids'),
            'Right Sidebar' => __('Right Sidebar','vw-kids'),
        ),
	) );

    //Products per page
    $wp_customize->add_setting('vw_kids_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'vw_kids_sanitize_float'
	));
	$wp_customize->add_control('vw_kids_products_per_page',array(
		'label'	=> __('Products Per Page','vw-kids'),
		'description' => __('Display on shop page','vw-kids'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'vw_kids_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('vw_kids_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_products_per_row',array(
		'label'	=> __('Products Per Row','vw-kids'),
		'description' => __('Display on shop page','vw-kids'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'vw_kids_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('vw_kids_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'vw_kids_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_kids_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','vw-kids' ),
		'section'     => 'vw_kids_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'vw_kids_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_kids_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','vw-kids' ),
		'section'     => 'vw_kids_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_kids_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_kids_products_button_border_radius', array(
		'default'              => '100',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_kids_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','vw-kids' ),
		'section'     => 'vw_kids_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('vw_kids_woocommerce_sale_position',array(
        'default' => 'left',
        'sanitize_callback' => 'vw_kids_sanitize_choices'
	));
	$wp_customize->add_control('vw_kids_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','vw-kids'),
        'section' => 'vw_kids_woocommerce_section',
        'choices' => array(
            'left' => __('Left','vw-kids'),
            'right' => __('Right','vw-kids'),
        ),
	) );

	$wp_customize->add_setting('vw_kids_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_kids_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_kids_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','vw-kids'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-kids'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-kids' ),
        ),
		'section'=> 'vw_kids_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_kids_woocommerce_sale_border_radius', array(
		'default'              => '100',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_kids_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_kids_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','vw-kids' ),
		'section'     => 'vw_kids_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  	// Related Product
    $wp_customize->add_setting( 'vw_kids_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_kids_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Kids_Toggle_Switch_Custom_Control( $wp_customize, 'vw_kids_related_product_show_hide',array(
        'label' => esc_html__( 'Show / Hide Related product','vw-kids' ),
        'section' => 'vw_kids_woocommerce_section'
    )));

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Kids_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Kids_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_kids_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Kids_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_kids_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Kids_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_kids_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_kids_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_kids_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Kids_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Kids_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Kids_Customize_Section_Pro($manager,'vw_kids_upgrade_pro_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW KIDS PRO', 'vw-kids' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-kids' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/products/kids-wordpress-theme'),
		)));

		// Register sections.
		$manager->add_section(new VW_Kids_Customize_Section_Pro($manager,'vw_kids_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-kids' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-kids' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-vw-kids/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-kids-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-kids-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Kids_Customize::get_instance();