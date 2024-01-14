<?php
/**
 * Cricket Tournament: Customizer
 *
 * @package Cricket Tournament
 * @subpackage cricket_tournament
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cricket_tournament_customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
		$wp_customize->register_control_type( 'Cricket_Tournament_Toggle_Control' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'Cricket_Tournament_Control_Sortable' );

	//add home page setting pannel
	$wp_customize->add_panel( 'cricket_tournament_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home Page', 'cricket-tournament' ),
	    'description' => __( 'Description of what this panel does.', 'cricket-tournament' ),
	) );

	//TP General Option
	$wp_customize->add_section('cricket_tournament_tp_general_settings',array(
        'title' => __('TP General Option', 'cricket-tournament'),
        'panel' => 'cricket_tournament_panel_id',
        'priority' => 1,
    ) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('cricket_tournament_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'cricket_tournament_sanitize_choices'
	));
	$wp_customize->add_control('cricket_tournament_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Sidebar Position', 'cricket-tournament'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'cricket-tournament'),
        'section' => 'cricket_tournament_tp_general_settings',
        'choices' => array(
            'full' => __('Full','cricket-tournament'),
            'left' => __('Left','cricket-tournament'),
            'right' => __('Right','cricket-tournament'),
            'three-column' => __('Three Columns','cricket-tournament'),
            'four-column' => __('Four Columns','cricket-tournament'),
            'grid' => __('Grid Layout','cricket-tournament')
        ),
	) );

	$wp_customize->add_setting('cricket_tournament_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'cricket_tournament_sanitize_choices'
	));
	$wp_customize->add_control('cricket_tournament_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'cricket-tournament'),
        'description'   => __('This option work for single blog page', 'cricket-tournament'),
        'section' => 'cricket_tournament_tp_general_settings',
        'choices' => array(
            'full' => __('Full','cricket-tournament'),
            'left' => __('Left','cricket-tournament'),
            'right' => __('Right','cricket-tournament'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('cricket_tournament_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'cricket_tournament_sanitize_choices'
	));
	$wp_customize->add_control('cricket_tournament_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'cricket-tournament'),
        'description'   => __('This option work for pages.', 'cricket-tournament'),
        'section' => 'cricket_tournament_tp_general_settings',
        'choices' => array(
            'full' => __('Full','cricket-tournament'),
            'left' => __('Left','cricket-tournament'),
            'right' => __('Right','cricket-tournament')
        ),
	) );



	$wp_customize->add_setting( 'cricket_tournament_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_sticky', array(
		'label'       => esc_html__( 'Show Sticky Header', 'cricket-tournament' ),
		'section'     => 'cricket_tournament_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'cricket_tournament_sticky',
	) ) );

	//Mobile Seetings
	$wp_customize->add_section('cricket_tournament_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'cricket-tournament'),
		'priority' => 11,
		'panel' => 'cricket_tournament_panel_id'
	) );

	$wp_customize->add_setting( 'cricket_tournament_return_to_header_mob', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'cricket-tournament' ),
		'section'     => 'cricket_tournament_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'cricket_tournament_return_to_header_mob',
	) ) );

	$wp_customize->add_setting( 'cricket_tournament_slider_buttom_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'cricket-tournament' ),
		'section'     => 'cricket_tournament_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'cricket_tournament_slider_buttom_mob',
	) ) );

	

  	//TP Preloader Option
	$wp_customize->add_section('cricket_tournament_prealoader_option',array(
		'title' => __('TP Preloader Option', 'cricket-tournament'),
		'panel' => 'cricket_tournament_panel_id',
		'priority' => 3,
 	) );

	$wp_customize->add_setting( 'cricket_tournament_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'cricket-tournament' ),
		'section'     => 'cricket_tournament_prealoader_option',
		'type'        => 'toggle',
		'settings'    => 'cricket_tournament_preloader_show_hide',
		) ) );

  	$wp_customize->add_setting( 'cricket_tournament_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cricket_tournament_tp_preloader_color1_option', array(
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'cricket-tournament'),
	    'section' => 'cricket_tournament_prealoader_option',
	    'settings' => 'cricket_tournament_tp_preloader_color1_option',
  	)));

  	$wp_customize->add_setting( 'cricket_tournament_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cricket_tournament_tp_preloader_color2_option', array(
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'cricket-tournament'),
	    'section' => 'cricket_tournament_prealoader_option',
	    'settings' => 'cricket_tournament_tp_preloader_color2_option',
  	)));

  	$wp_customize->add_setting( 'cricket_tournament_tp_preloader_bg_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cricket_tournament_tp_preloader_bg_option', array(
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'cricket-tournament'),
	    'section' => 'cricket_tournament_prealoader_option',
	    'settings' => 'cricket_tournament_tp_preloader_bg_option',
  	)));

  	//MENU TYPOGRAPHY
	$wp_customize->add_section( 'cricket_tournament_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'cricket-tournament' ),
    	'priority' => 5,
		'panel' => 'cricket_tournament_panel_id'
	) );

	$wp_customize->add_setting('cricket_tournament_menu_text_tranform',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'cricket_tournament_sanitize_choices'
 	));
 	$wp_customize->add_control('cricket_tournament_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','cricket-tournament'),
		'section' => 'cricket_tournament_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','cricket-tournament'),
		   'Lowercase' => __('Lowercase','cricket-tournament'),
		   'Capitalize' => __('Capitalize','cricket-tournament'),
		),
	) );


	$wp_customize->add_setting('cricket_tournament_menu_font_size', array(
	'default' => 15,
    'sanitize_callback' => 'cricket_tournament_sanitize_number_range',
	));

	$wp_customize->add_control(new Cricket_Tournament_Range_Slider($wp_customize, 'cricket_tournament_menu_font_size', array(
    'section' => 'cricket_tournament_menu_typography',
    'label' => esc_html__('Font Size', 'cricket-tournament'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 20,
        'step' => 1
    )
	)));

	//TP Blog Option
	$wp_customize->add_section('cricket_tournament_blog_option',array(
        'title' => __('TP Blog Option', 'cricket-tournament'),
        'panel' => 'cricket_tournament_panel_id',
        'priority' => 4,
    ) );

	/** Meta Order */
    $wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment','category'),
        'sanitize_callback' => 'cricket_tournament_sanitize_sortable',
    ));
    $wp_customize->add_control(new Cricket_Tournament_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'cricket-tournament'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'cricket-tournament') ,
        'section' => 'cricket_tournament_blog_option',
        'choices' => array(
            'date' => __('date', 'cricket-tournament') ,
            'author' => __('author', 'cricket-tournament') ,
            'comment' => __('comment', 'cricket-tournament') ,
            'category' => __('category', 'cricket-tournament') ,
        ) ,
    )));

    $wp_customize->add_setting('cricket_tournament_read_more_text',array(
		'default'=> __('Read More','cricket-tournament'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cricket_tournament_read_more_text',array(
		'label'	=> __('Edit Button Text','cricket-tournament'),
		'section'=> 'cricket_tournament_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'cricket_tournament_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'cricket_tournament_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'cricket_tournament_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','cricket-tournament' ),
		'section'     => 'cricket_tournament_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

 	$wp_customize->add_setting( 'cricket_tournament_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
	) );
	 $wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'cricket-tournament' ),
		'section'     => 'cricket_tournament_blog_option',
		'type'        => 'toggle',
		'settings'    => 'cricket_tournament_remove_read_button',
	) ) );

	$wp_customize->add_setting( 'cricket_tournament_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'cricket-tournament' ),
		'section'     => 'cricket_tournament_blog_option',
		'type'        => 'toggle',
		'settings'    => 'cricket_tournament_remove_tags',
	) ) );
	$wp_customize->add_setting( 'cricket_tournament_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'cricket-tournament' ),
		'section'     => 'cricket_tournament_blog_option',
		'type'        => 'toggle',
		'settings'    => 'cricket_tournament_remove_category',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'cricket_tournament_remove_category', array(
		'selector' => '.box-content a[rel="category"]',
		'render_callback' => 'cricket_tournament_customize_partial_cricket_tournament_remove_category',
	));
	$wp_customize->add_setting( 'cricket_tournament_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'cricket-tournament' ),
	 'section'     => 'cricket_tournament_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'cricket_tournament_remove_comment',
	) ) );

	$wp_customize->add_setting( 'cricket_tournament_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'cricket-tournament' ),
	 'section'     => 'cricket_tournament_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'cricket_tournament_remove_related_post',
	) ) );
	// Top bar Section
	$wp_customize->add_section( 'cricket_tournament_topbar', array(
    	'title'      => __( 'Header Details', 'cricket-tournament' ),
    	'description' => __( 'Add your contact details', 'cricket-tournament' ),
		'panel' => 'cricket_tournament_panel_id',
      'priority' => 6,
	) );

	$wp_customize->add_setting('cricket_tournament_header_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cricket_tournament_header_button',array(
		'label'	=> __('Add Button Text','cricket-tournament'),
		'section'=> 'cricket_tournament_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('cricket_tournament_header_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('cricket_tournament_header_button_link',array(
		'label'	=> __('Add Button URL','cricket-tournament'),
		'section'=> 'cricket_tournament_topbar',
		'type'=> 'url'
	));


	//home page slider
	$wp_customize->add_section( 'cricket_tournament_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'cricket-tournament' ),
		'panel' => 'cricket_tournament_panel_id',
      'priority' => 7,
	) );

	$wp_customize->add_setting( 'cricket_tournament_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'cricket-tournament' ),
		'section'     => 'cricket_tournament_slider_section',
		'type'        => 'toggle',
		'settings'    => 'cricket_tournament_slider_arrows',
	) ) );

	for ( $cricket_tournament_count = 1; $cricket_tournament_count <= 4; $cricket_tournament_count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'cricket_tournament_slider_page' . $cricket_tournament_count, array(
			'default'           => '',
			'sanitize_callback' => 'cricket_tournament_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'cricket_tournament_slider_page' . $cricket_tournament_count, array(
			'label'    => __( 'Select Slide Image Page', 'cricket-tournament' ),
			'section'  => 'cricket_tournament_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting( 'cricket_tournament_slider_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_slider_button', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'cricket-tournament' ),
		'section'     => 'cricket_tournament_slider_section',
		'type'        => 'toggle',
		'settings'    => 'cricket_tournament_slider_button',
	) ) );

	$wp_customize->add_setting('cricket_tournament_slider_content_layout',array(
        'default' => 'CENTER-ALIGN',
        'sanitize_callback' => 'cricket_tournament_sanitize_choices'
	));
	$wp_customize->add_control('cricket_tournament_slider_content_layout',array(
        'type' => 'radio',
        'label'     => __('Slider Content Layout', 'cricket-tournament'),
        'section' => 'cricket_tournament_slider_section',
        'choices' => array(
            'CENTER-ALIGN' => __('CENTER-ALIGN','cricket-tournament'),
            'LEFT-ALIGN' => __('LEFT-ALIGN','cricket-tournament'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','cricket-tournament'),
        ),
	) );

	// fixtures
	$wp_customize->add_section('cricket_tournament_fixture_section',array(
		'title'	=> __('Fixture Section','cricket-tournament'),
		'panel' => 'cricket_tournament_panel_id',
			'priority' => 8,
	));
	$wp_customize->add_setting( 'cricket_tournament_fixture_show_hide', array(
		'default'           => False,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_fixture_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Fixture Option', 'cricket-tournament' ),
		'section'     => 'cricket_tournament_fixture_section',
		'type'        => 'toggle',
		'settings'    => 'cricket_tournament_fixture_show_hide',
		) ) );

	$wp_customize->add_setting('cricket_tournament_fixture_shortcode',array(
      'default' => '',
      'sanitize_callback' => 'sanitize_text_field'
  ));
    $wp_customize->add_control('cricket_tournament_fixture_shortcode',array(
      'label' => __('Fixture Shortcode','cricket-tournament'),
      'section' => 'cricket_tournament_fixture_section',
      'setting' => 'cricket_tournament_fixture_shortcode',
      'type'    => 'text'
  ));

	//From Our Blog
	$wp_customize->add_section('cricket_tournament_static_blog_section',array(
		'title'	=> __('Blog Section','cricket-tournament'),
		'panel' => 'cricket_tournament_panel_id',
      'priority' => 9,
	));
    $wp_customize->add_setting( 'cricket_tournament_blog_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_blog_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Blog Option', 'cricket-tournament' ),
		'section'     => 'cricket_tournament_static_blog_section',
		'type'        => 'toggle',
		'settings'    => 'cricket_tournament_blog_show_hide',
		) ) );
		$cricket_tournament_args = array('numberposts' => -1);
		$post_list = get_posts($cricket_tournament_args);
		$i = 0;
		$pst[]='Select';
		foreach($post_list as $post){
			$pst[$post->post_title] = $post->post_title;
		}

		$wp_customize->add_setting('cricket_tournament_static_blog_1',array(
			'sanitize_callback' => 'cricket_tournament_sanitize_choices',
		));
		$wp_customize->add_control('cricket_tournament_static_blog_1',array(
			'type'    => 'select',
			'choices' => $pst,
			'label' => __('Select post','cricket-tournament'),
			'section' => 'cricket_tournament_static_blog_section',
		));

		$cricket_tournament_categories = get_categories();
			$cats = array();
			$i = 0;
			$cricket_tournament_offer_cat[]= 'select';
			foreach($cricket_tournament_categories as $category){
				if($i==0){
					$default = $category->slug;
					$i++;
				}
				$cricket_tournament_offer_cat[$category->slug] = $category->name;
			}

			$wp_customize->add_setting('cricket_tournament_capture_photograph_section_category',array(
				'default'	=> 'select',
				'sanitize_callback' => 'cricket_tournament_sanitize_choices',
			));
			$wp_customize->add_control('cricket_tournament_capture_photograph_section_category',array(
				'type'    => 'select',
				'choices' => $cricket_tournament_offer_cat,
				'label' => __('Select Category','cricket-tournament'),
				'section' => 'cricket_tournament_static_blog_section',
			));

	//footer
	$wp_customize->add_section('cricket_tournament_footer_section',array(
		'title'	=> __('Footer Text','cricket-tournament'),
		'description'	=> __('Add copyright text.','cricket-tournament'),
		'panel' => 'cricket_tournament_panel_id',
		'priority' => 10,
	));

	$wp_customize->add_setting('cricket_tournament_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('cricket_tournament_footer_text',array(
		'label'	=> __('Copyright Text','cricket-tournament'),
		'section'	=> 'cricket_tournament_footer_section',
		'type'		=> 'text'
	));

    // footer columns
	$wp_customize->add_setting('cricket_tournament_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'cricket_tournament_sanitize_number_absint'
	));
	$wp_customize->add_control('cricket_tournament_footer_columns',array(
		'label'	=> __('Footer Widget Columns','cricket-tournament'),
		'section'	=> 'cricket_tournament_footer_section',
		'setting'	=> 'cricket_tournament_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
		$wp_customize->add_setting( 'cricket_tournament_tp_footer_bg_color_option', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cricket_tournament_tp_footer_bg_color_option', array(
			'label'     => __('Footer Widget Background Color', 'cricket-tournament'),
			'description' => __('It will change the complete footer widget backgorund color.', 'cricket-tournament'),
			'section' => 'cricket_tournament_footer_section',
			'settings' => 'cricket_tournament_tp_footer_bg_color_option',
	)));

	$wp_customize->add_setting('cricket_tournament_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'cricket_tournament_footer_widget_image',array(
    'label' => __('Footer Widget Background Image','cricket-tournament'),
    'section' => 'cricket_tournament_footer_section'
	)));

	$wp_customize->add_setting( 'cricket_tournament_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'cricket-tournament' ),
		'section'     => 'cricket_tournament_footer_section',
		'type'        => 'toggle',
		'settings'    => 'cricket_tournament_return_to_header',
	) ) );

	   // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('cricket_tournament_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'cricket_tournament_sanitize_choices'
	));
	$wp_customize->add_control('cricket_tournament_scroll_top_position',array(
     'type' => 'radio',
     'label'     => __('Scroll to top Position', 'cricket-tournament'),
     'description'   => __('This option work for scroll to top', 'cricket-tournament'),
     'section' => 'cricket_tournament_footer_section',
     'choices' => array(
         'Right' => __('Right','cricket-tournament'),
         'Left' => __('Left','cricket-tournament'),
         'Center' => __('Center','cricket-tournament')
     ),
	) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';


	$wp_customize->add_setting( 'cricket_tournament_site_title_text', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_site_title_text', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'cricket-tournament' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'cricket_tournament_site_title_text',
	) ) );

		//  site title size
		$wp_customize->add_setting('cricket_tournament_site_title_font_size',array(
			'default'	=> 20,
			'sanitize_callback'	=> 'cricket_tournament_sanitize_number_absint'
		));
		$wp_customize->add_control('cricket_tournament_site_title_font_size',array(
			'label'	=> __('Site Title Font Size in PX','cricket-tournament'),
			'section'	=> 'title_tagline',
			'setting'	=> 'cricket_tournament_site_title_font_size',
			'type'	=> 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 50,
			),
		));

	$wp_customize->add_setting( 'cricket_tournament_site_tagline_text', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_site_tagline_text', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'cricket-tournament' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'cricket_tournament_site_tagline_text',
	) ) );

	// site tagline size
		$wp_customize->add_setting('cricket_tournament_site_tagline_font_size',array(
			'default'	=> 15,
			'sanitize_callback'	=> 'cricket_tournament_sanitize_number_absint'
		));
		$wp_customize->add_control('cricket_tournament_site_tagline_font_size',array(
			'label'	=> __('Site Tagline Font Size in PX','cricket-tournament'),
			'section'	=> 'title_tagline',
			'setting'	=> 'cricket_tournament_site_tagline_font_size',
			'type'	=> 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 50,
			),
		));


    $wp_customize->add_setting('cricket_tournament_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'cricket_tournament_sanitize_number_absint'
	));
	 $wp_customize->add_control('cricket_tournament_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','cricket-tournament'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('cricket_tournament_logo_settings',array(
        'default' => 'Different Line',
        'sanitize_callback' => 'cricket_tournament_sanitize_choices'
	));
   $wp_customize->add_control('cricket_tournament_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'cricket-tournament'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'cricket-tournament'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','cricket-tournament'),
            'Same Line' => __('Same Line','cricket-tournament')
        ),
	) );

	$wp_customize->add_setting('cricket_tournament_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'cricket_tournament_sanitize_number_absint'
	));
	$wp_customize->add_control('cricket_tournament_per_columns',array(
		'label'	=> __('Product Per Row','cricket-tournament'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('cricket_tournament_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'cricket_tournament_sanitize_number_absint'
	));
	$wp_customize->add_control('cricket_tournament_product_per_page',array(
		'label'	=> __('Product Per Page','cricket-tournament'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

   		 $wp_customize->add_setting( 'cricket_tournament_product_sidebar', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_product_sidebar', array(
			'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'cricket-tournament' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'cricket_tournament_product_sidebar',
		) ) );

		$wp_customize->add_setting( 'cricket_tournament_single_product_sidebar', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_single_product_sidebar', array(
			'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'cricket-tournament' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'cricket_tournament_single_product_sidebar',
		) ) );

		$wp_customize->add_setting( 'cricket_tournament_related_product', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'cricket_tournament_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Cricket_Tournament_Toggle_Control( $wp_customize, 'cricket_tournament_related_product', array(
			'label'       => esc_html__( 'Show / Hide related product', 'cricket-tournament' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'cricket_tournament_related_product',
		) ) );
}
add_action( 'customize_register', 'cricket_tournament_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Cricket Tournament 1.0
 * @see cricket_tournament_customize_register()
 *
 * @return void
 */
function cricket_tournament_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Cricket Tournament 1.0
 * @see cricket_tournament_customize_register()
 *
 * @return void
 */
function cricket_tournament_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'CRICKET_TOURNAMENT_PRO_THEME_NAME' ) ) {
	define( 'CRICKET_TOURNAMENT_PRO_THEME_NAME', esc_html__( 'Cricket Pro Theme', 'cricket-tournament' ));
}
if ( ! defined( 'CRICKET_TOURNAMENT_PRO_THEME_URL' ) ) {
	define( 'CRICKET_TOURNAMENT_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/tournament-wordpress-theme/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Cricket_Tournament_Customize {

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
		$manager->register_section_type( 'Cricket_Tournament_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Cricket_Tournament_Customize_Section_Pro(
				$manager,
				'cricket_tournament_section_pro',
				array(
					'priority'   => 9,
					'title'    => CRICKET_TOURNAMENT_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'cricket-tournament' ),
					'pro_url'  => esc_url( CRICKET_TOURNAMENT_PRO_THEME_URL, 'cricket-tournament' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new Cricket_Tournament_Customize_Section_Pro(
				$manager,
				'cricket_tournament_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'cricket-tournament' ),
					'pro_text' => esc_html__( 'Click Here', 'cricket-tournament' ),
					'pro_url'  => esc_url( CRICKET_TOURNAMENT_DOCS_URL, 'cricket-tournament'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'cricket-tournament-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'cricket-tournament-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Cricket_Tournament_Customize::get_instance();
