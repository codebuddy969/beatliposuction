<?php
/**
 * Customizer functionality
 *
 * @package kale
 */
?>
<?php 
/*------------------------------
 Panels and Sections
 ------------------------------*/

function kale_customizer_panels_sections( $wp_customize ) {
    
    #kale_section_general_settings
    $wp_customize->add_section( 'kale_section_theme_info', array(
        'title'       => esc_html__( 'Kale Pro - Info', 'kale' ),
        'priority'    => 0
    ) );
    
    #kale_section_general_settings
    $wp_customize->add_section( 'kale_section_general_settings', array(
        'title'       => esc_html__( 'General Settings', 'kale' ),
        'priority'    => 10
    ) );
    
    #kale_panel_frontpage
    $wp_customize->add_panel( 'kale_panel_frontpage', array(
        'priority'    => 61,
        'title'       => esc_html__( 'Front Page', 'kale' ),
    ) );
    $wp_customize->add_section( 'kale_section_frontpage_banner', array(
        'title'       => esc_html__( 'Banner / Slider', 'kale' ),
        'priority'    => 61,
        'panel'       => 'kale_panel_frontpage',
    ) );
    $wp_customize->add_section( 'kale_section_frontpage_featured_posts', array(
        'title'       => esc_html__( 'Featured Posts / Pages', 'kale' ),
        'priority'    => 62,
        'panel'       => 'kale_panel_frontpage',
    ) );
    $wp_customize->add_section( 'kale_section_frontpage_large_post', array(
        'title'       => esc_html__( 'Large / Highlight Post', 'kale' ),
        'priority'    => 64,
        'panel'       => 'kale_panel_frontpage',
    ) );
    $wp_customize->add_section( 'kale_section_frontpage_vertical', array(
        'title'       => esc_html__( 'Vertical Content / Posts', 'kale' ),
        'priority'    => 65,
        'panel'       => 'kale_panel_frontpage',
    ) );
    $wp_customize->add_section( 'kale_section_frontpage_slider_settings', array(
        'title'       => esc_html__( 'Slider Settings', 'kale' ),
        'priority'    => 66,
        'panel'       => 'kale_panel_frontpage',
    ) );
    $wp_customize->add_section( 'kale_section_frontpage_order', array(
        'title'       => esc_html__( 'Order of Sections', 'kale' ),
        'priority'    => 67,
        'panel'       => 'kale_panel_frontpage',
    ) );
    
    #kale_section_blog_feed
    $wp_customize->add_section( 'kale_section_blog_feed', array(
        'title'       => esc_html__( 'Blog Feed', 'kale' ),
        'priority'    => 70
    ) );
    
    #kale_section_posts
    $wp_customize->add_section( 'kale_section_posts', array(
        'title'       => esc_html__( 'Posts', 'kale' ),
        'priority'    => 71,
    ) );
   
    #kale_section_pages
    $wp_customize->add_section( 'kale_section_pages', array(
        'title'       => esc_html__( 'Pages', 'kale' ),
        'priority'    => 72,
    ) );
    
    #kale_section_typography
    $wp_customize->add_section( 'kale_section_typography', array(
        'title'       => esc_html__( 'Custom Fonts', 'kale' ),
        'priority'    => 74,
    ) );
    
    #kale_section_ads
    $wp_customize->add_section( 'kale_section_ads', array(
        'title'       => esc_html__( 'Ad Options', 'kale' ),
        'priority'    => 89,
    ) );
    
    if ( class_exists( 'WooCommerce' ) ) {
	#kale_section_woocommerce
    $wp_customize->add_section( 'kale_section_woocommerce', array(
        'title'       => esc_html__( 'Kale Options', 'kale' ),
        'priority'    => 90,
        'panel'       => 'woocommerce',
    ) );
    }
	
    #kale_section_advanced
    $wp_customize->add_section( 'kale_section_advanced', array(
        'title'       => esc_html__( 'Advanced', 'kale' ),
        'priority'    => 91,
    ) );
    
    #kale_section_slider
    $wp_customize->add_section( 'kale_section_slider', array(
        'title'       => esc_html__( 'Slider Settings', 'kale' ),
        'priority'    => 92,
    ) );
    
    #kale_section_menu
    $wp_customize->add_section( 'kale_section_menu', array(
        'title'       => esc_html__( 'Kale Menu Settings', 'kale' ),
        'priority'    => 30,
        'panel'       => 'nav_menus',
    ) );
}

add_action( 'customize_register', 'kale_customizer_panels_sections' );


/*------------------------------
 Fields
 ------------------------------*/
 
function kale_customizer_fields( $fields ) {
    
    global $kale_defaults;
    
    #kale_section_theme_info
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'kale_theme_info',
        'label'       => esc_html__( 'KALE PRO', 'kale' ),
        'description' => __( '
        <h3>Demo Site</h3>
        <p>Head on over to the <a href="http://www.lyrathemes.com/preview/?theme=kale-pro" target="_blank">Kale Pro demo</a> to see what you can accomplish with this theme!</p>
        <h3>Documentation</h3>
        <p>Detailed information on theme setup and customization.</p>
        <p><a class="button" href="https://help.lyrathemes.com/#collection-181" target="_blank">Kale Pro Documentation</a></p>
        <h3>One Click Demo Import</h3>
        <p>You can import the demo data by installing the <a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">One Click Demo Data</a> plugin, and then going to Appearance > Import Demo Data.</p>
        <h3>Sample Data</h3>
        <p>Alternatively, you can manually install the content and settings shown on our demo site by importing this sample data.</p>
        <p><a class="button" href="https://www.lyrathemes.com/sample-data/kale-pro-sample-data.zip" target="_blank">Kale Pro Sample Data</a></p>
        <h3>Feedback and Support</h3>
        <p>For feedback and support, please contact us and we would be happy to assist!</p>
        <p><a class="button" href="https://www.lyrathemes.com/support" target="_blank">Kale Pro Support</a></p>
        ', 'kale' ),
        'section'     => 'kale_section_theme_info',
        'priority'    => 1,
    );
    
    #kale_section_general_settings
    #-----------------------------------------
    
    
    $fields[] = array(
        'type'        => 'textarea',
        'settings'     => 'kale_footer_copyright',
        'label'       => esc_html__( 'Copyright Text', 'kale' ),
        'description' => esc_html__( 'Accepts HTML.', 'kale' ),
        'section'     => 'kale_section_general_settings',
        'priority'    => 2,
        'default'     => $kale_defaults['kale_footer_copyright'],
        'sanitize_callback' => 'force_balance_tags',
    );
    
    $fields[] = array(
        'type'        => 'toggle',
        'settings'     => 'kale_enable_fancy_scrollbar',
        'label'       => esc_html__( 'Enable Fancy Scrollbar?', 'kale' ),
        'description' => esc_html__( 'Whether to replace the default page scrollbar with a fancy scrollbar.', 'kale' ),
        'section'     => 'kale_section_general_settings',
        'priority'    => 4,
        'default'     => $kale_defaults['kale_enable_fancy_scrollbar']
    );
	$fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_example_content',
        'label'       => esc_html__( 'Show Example Content?', 'kale' ),
        'description' => esc_html__( 'Turning this off will disable all default/sample images for posts. ', 'kale' ),
        'section'     => 'kale_section_general_settings',
        'priority'    => 5,
        'default'     => $kale_defaults['kale_example_content']
    );
	$fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_override_jetpack_share_styling',
        'label'       => esc_html__( 'Override Jetpack Sharing Style', 'kale' ),
        'description' => esc_html__( 'Turning this on will override the default styling of the Jetpack Share icons (if enabled). Instead, they will be shown matching the Kale Pro theme/colors.', 'kale' ),
        'section'     => 'kale_section_general_settings',
        'priority'    => 6,
        'default'     => $kale_defaults['kale_override_jetpack_share_styling']
    );
    $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'kale_sidebar_size',
        'label'       => esc_html__( 'Choose the sidebar size.', 'kale' ),
        'description' => esc_html__( 'Default is 1/3. For a more compact (1/4) size, choose COMPACT.', 'kale' ),
        'section'     => 'kale_section_general_settings',
        'priority'    => 7,
        'default'     => $kale_defaults['kale_sidebar_size'],
        'choices'     => array( 'on'  => esc_attr__( 'COMPACT', 'kale' ), 'off' => esc_attr__( 'DEFAULT', 'kale' ) ),
    );
    
    
    #title_tagline
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'switch',
        'settings'     => 'kale_image_logo_show',
        'label'       => esc_html__( 'Show Image Logo?', 'kale' ),
        'description' => esc_html__( 'Choose whether to display the image logo.', 'kale' ),
        'section'     => 'title_tagline',
        'priority'    => 1,
        'default'     => $kale_defaults['kale_image_logo_show'],
        'choices'     => array( 'on'  => esc_attr__( 'SHOW', 'kale' ), 'off' => esc_attr__( 'HIDE', 'kale' ) ),
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'     => 'kale_text_logo',
        'label'       => esc_html__( 'Text Logo', 'kale' ),
        'description' => esc_html__( 'Displayed when `Show Image Logo?` is set to `Show` or if there is no logo image uploaded.', 'kale' ),
        'section'     => 'title_tagline',
        'priority'    => 2,
        'default'     => $kale_defaults['kale_text_logo'],
        'active_callback'  => array( array( 'setting'  => 'kale_image_logo_show', 'operator' => '==', 'value'    => false ) ),
        'sanitize_callback'=> 'sanitize_text_field'
    );
    
    $fields[] = array(
        'type'        => 'custom',
        'settings'     => 'kale_text_logo_sep1',
        'label'       => '<hr />', 
        'section'     => 'title_tagline',
        'priority'    => 3
    );
    
    #kale_section_colors
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'switch',
        'settings'     => 'kale_custom_colors',
        'label'       => esc_html__( 'Default or Custom Colors?', 'kale' ),
        'section'     => 'colors',
        'priority'    => 1,
        'default'     => $kale_defaults['kale_custom_colors'],
        'choices' => array( 'on'  => esc_attr__( 'CUSTOM', 'kale' ), 'off' => esc_attr__( 'DEFAULT', 'kale' ) )
    ); 
    $fields[] = array(
        'type'        => 'custom',
        'settings'     => 'kale_custom_colors_sep1',
        'label'       => '<hr />', 
        'section'     => 'colors',
        'priority'    => 2,
        'active_callback'  => array( array( 'setting'  => 'kale_custom_colors', 'operator' => '==', 'value'    => true ) )
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'kale_custom_colors_body',
        'label'       => esc_html__( 'Body/Text Color', 'kale' ),
        'section'     => 'colors',
        'priority'    => 3,
        'default'     => $kale_defaults['kale_custom_colors_body'],
        'active_callback'  => array( array( 'setting'  => 'kale_custom_colors', 'operator' => '==', 'value'    => true ) )
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'kale_custom_colors_accent',
        'label'       => esc_html__( 'Accent Color', 'kale' ),
        'section'     => 'colors',
        'priority'    => 4,
        'default'     => $kale_defaults['kale_custom_colors_accent'],
        'active_callback'  => array( array( 'setting'  => 'kale_custom_colors', 'operator' => '==', 'value'    => true ) )
    );
    
    #kale_section_typography
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'kale_custom_typography',
        'label'       => esc_html__( 'Default or Custom Typography?', 'kale' ),
        'section'     => 'kale_section_typography',
        'priority'    => 1,
        'default'     => $kale_defaults['kale_custom_typography'],
        'choices' => array( 'on'  => esc_attr__( 'CUSTOM', 'kale' ), 'off' => esc_attr__( 'DEFAULT', 'kale' ) )
    ); 
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'kale_custom_typography_sep1',
        'label'       => '<hr />', 
        'section'     => 'kale_section_typography',
        'priority'    => 2,
        'active_callback'  => array( array( 'setting'  => 'kale_custom_typography', 'operator' => '==', 'value'    => true ) )
    );
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'kale_custom_typography_body_font',
        'label'       => esc_html__( 'Body Font', 'kale' ),
        'section'     => 'kale_section_typography',
        'priority'    => 3,
        'default'     => $kale_defaults['kale_custom_typography_body_font'],
        'active_callback'  => array( array( 'setting'  => 'kale_custom_typography', 'operator' => '==', 'value'    => true ) )
    ); 
	
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'kale_custom_typography_logo_font',
        'label'       => esc_html__( 'Logo Font', 'kale' ),
        'section'     => 'kale_section_typography',
        'priority'    => 5,
        'default'     => $kale_defaults['kale_custom_typography_logo_font'],
        'active_callback'  => array( array( 'setting'  => 'kale_custom_typography', 'operator' => '==', 'value'    => true ) )
    ); 
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'kale_custom_typography_tagline_font',
        'label'       => esc_html__( 'Tagline Font', 'kale' ),
        'section'     => 'kale_section_typography',
        'priority'    => 6,
        'default'     => $kale_defaults['kale_custom_typography_tagline_font'],
        'active_callback'  => array( array( 'setting'  => 'kale_custom_typography', 'operator' => '==', 'value'    => true ) )
    ); 
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'kale_custom_typography_heading_font',
        'label'       => esc_html__( 'Headings', 'kale' ),
        'section'     => 'kale_section_typography',
        'priority'    => 7,
        'default'     => $kale_defaults['kale_custom_typography_heading_font'],
        'active_callback'  => array( array( 'setting'  => 'kale_custom_typography', 'operator' => '==', 'value'    => true ) )
    ); 
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'kale_custom_typography_h1_font',
        'label'       => esc_html__( 'Heading 1 (H1)', 'kale' ),
        'section'     => 'kale_section_typography',
        'priority'    => 8,
        'default'     => $kale_defaults['kale_custom_typography_h1_font'],
        'active_callback'  => array( array( 'setting'  => 'kale_custom_typography', 'operator' => '==', 'value'    => true ) )
    ); 
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'kale_custom_typography_h2_font',
        'label'       => esc_html__( 'Heading 2 (H2)', 'kale' ),
        'section'     => 'kale_section_typography',
        'priority'    => 9,
        'default'     => $kale_defaults['kale_custom_typography_h2_font'],
        'active_callback'  => array( array( 'setting'  => 'kale_custom_typography', 'operator' => '==', 'value'    => true ) )
    ); 
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'kale_custom_typography_h3_font',
        'label'       => esc_html__( 'Heading 3 (H3)', 'kale' ),
        'section'     => 'kale_section_typography',
        'priority'    => 10,
        'default'     => $kale_defaults['kale_custom_typography_h3_font'],
        'active_callback'  => array( array( 'setting'  => 'kale_custom_typography', 'operator' => '==', 'value'    => true ) )
    ); 
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'kale_custom_typography_h3_font',
        'label'       => esc_html__( 'Heading 4 (H4)', 'kale' ),
        'section'     => 'kale_section_typography',
        'priority'    => 11,
        'default'     => $kale_defaults['kale_custom_typography_h4_font'],
        'active_callback'  => array( array( 'setting'  => 'kale_custom_typography', 'operator' => '==', 'value'    => true ) )
    ); 
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'kale_custom_typography_h5_font',
        'label'       => esc_html__( 'Heading 5 (H5)', 'kale' ),
        'section'     => 'kale_section_typography',
        'priority'    => 12,
        'default'     => $kale_defaults['kale_custom_typography_h5_font'],
        'active_callback'  => array( array( 'setting'  => 'kale_custom_typography', 'operator' => '==', 'value'    => true ) )
    ); 
    $fields[] = array(
        'type'        => 'typography',
        'settings'    => 'kale_custom_typography_h6_font',
        'label'       => esc_html__( 'Heading 6 (H6)', 'kale' ),
        'section'     => 'kale_section_typography',
        'priority'    => 13,
        'default'     => $kale_defaults['kale_custom_typography_h6_font'],
        'active_callback'  => array( array( 'setting'  => 'kale_custom_typography', 'operator' => '==', 'value'    => true ) )
    ); 
    
    #header_image
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'kale_banner_heading',
        'label'       => esc_html__( 'Caption Heading', 'kale' ),
        'section'     => 'header_image',
        'priority'    => 10,
        'default'     => $kale_defaults['kale_banner_heading'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type'        => 'textarea',
        'settings'    => 'kale_banner_description',
        'label'       => esc_html__( 'Caption Description', 'kale' ),
        'section'     => 'header_image',
        'priority'    => 11,
        'default'     => $kale_defaults['kale_banner_description'],
        'sanitize_callback' => 'force_balance_tags'
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'kale_banner_url',
        'label'       => esc_html__( 'Caption URL', 'kale' ),
        'section'     => 'header_image',
        'priority'    => 12,
        'default'     => $kale_defaults['kale_banner_url'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    
    #kale_section_frontpage_banner
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'radio',
        'settings'    => 'kale_frontpage_banner',
        'label'       => esc_html__( 'Frontpage Banner / Slider', 'kale' ),
        'section'     => 'kale_section_frontpage_banner',
        'priority'    => 1,
        'default'     => $kale_defaults['kale_frontpage_banner'],
        'choices'     => array(
                            'Banner'   => array(
                                esc_attr__( 'Banner', 'kale' ),
                                esc_attr__( 'Shows a banner with an optional caption. Set up the banner and the caption under `Header Image`.', 'kale' ),
                            ),
                            'Posts' => array(
                                esc_attr__( 'Posts Slider', 'kale' ),
                                esc_attr__( 'Select a category to show posts from in the slider. When you select this a new section will appear here with more options.', 'kale' ),
                            ),
                            'Custom'  => array(
                                esc_attr__( 'Custom Slider', 'kale' ),
                                esc_attr__( 'A custom slider where you can upload images and specify the links.', 'kale' ),
                            ),
                        ),
    );    
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'kale_frontpage_posts_slider_desc',
        'label'       => __( '<hr />Posts Slider', 'kale' ),
        'description' => esc_html__( 'Select a category to show posts from in the slider. Also enter the number of posts to show from that category.', 'kale' ),
        'section'     => 'kale_section_frontpage_banner',
        'priority'    => 2,
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_banner', 'operator' => 'contains', 'value'    => 'Posts' ) )
    );    
    $fields[] = array(
        'type'        => 'select',
        'settings'    => 'kale_frontpage_posts_slider_category',
        'label'       => esc_html__( 'Posts Slider - Category', 'kale' ),
        'section'     => 'kale_section_frontpage_banner',
        'priority'    => 3,
        'default'     => $kale_defaults['kale_frontpage_posts_slider_category'],
        'choices'     => Kirki_Helper::get_terms( 'category' ),
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_banner', 'operator' => 'contains', 'value'    => 'Posts' ) )
    );
    $fields[] = array(
        'type'        => 'select',
        'settings'    => 'kale_frontpage_posts_slider_number',
        'label'       => esc_html__( 'Posts Slider - Number of Slides/Posts', 'kale' ),
		'description' => esc_html__( 'There should be at least three posts in the chosen category for the slider to show up.', 'kale' ),
        'section'     => 'kale_section_frontpage_banner',
        'priority'    => 4,
        'default'     => $kale_defaults['kale_frontpage_posts_slider_number'],
        'choices'     => array('3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'),
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_banner', 'operator' => 'contains', 'value'    => 'Posts' ) )
        
    );    
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'kale_frontpage_custom_slider_desc',
        'label'       => __( '<hr />Custom Slider', 'kale' ),
        'description' => esc_html__( 'Upload slide images and specify captions.', 'kale' ),
        'section'     => 'kale_section_frontpage_banner',
        'priority'    => 5,
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_banner', 'operator' => 'contains', 'value'    => 'Custom', ), )
    );    
    $fields[] = array(
        'type'        => 'repeater',
        'settings'    => 'kale_frontpage_custom_slider_item',
        'label'       => esc_html__( 'Custom Slider - Items', 'kale' ),
		'description' => esc_html__( 'The slider requires at least three slides.', 'kale' ),
        'section'     => 'kale_section_frontpage_banner',
        'priority'    => 6,
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_banner', 'operator' => 'contains', 'value'    => 'Custom', ), ),
        'row_label' => array(
                'type' => 'text',
                'value' => esc_attr__( 'Slide', 'kale' ),
		),
        'fields' => array(
            'kale_frontpage_custom_slider_item_heading' => array(
                'type'        => 'text',
                'label'       => esc_attr__( 'Heading', 'kale' ),
                'sanitize_callback' => 'sanitize_text_field',
            ),
            'kale_frontpage_custom_slider_item_desc' => array(
                'type'        => 'textarea',
                'label'       => esc_attr__( 'Description', 'kale' ),
                'sanitize_callback' => 'force_balance_tags',
            ),
            'kale_frontpage_custom_slider_item_url' => array(
                'type'        => 'text',
                'label'       => esc_attr__( 'Absolute URL', 'kale' ),
                'sanitize_callback' => 'sanitize_text_field',
            ),
            'kale_frontpage_custom_slider_item_icon' => array(
                'type'        => 'text',
                'label'       => esc_attr__( 'Font Awesome Icon', 'kale' ),
                'sanitize_callback'=>'sanitize_html_class',
            ),
            'kale_frontpage_custom_slider_item_image' => array(
                'type'        => 'image',
                'label'       => esc_attr__( 'Upload Image', 'kale' ),
            ),
        )
    );
	$fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_frontpage_custom_slider_flexible',
        'label'       => esc_html__('Use Full Image Size?', 'kale' ),
		'description' => esc_html__('By default, the slider resizes all photos to 1200x550. If you want to use your own custom image sizes, turn this on. Make sure all the slides are the same size. This only applies to the custom slider.', 'kale' ),
        'section'     => 'kale_section_frontpage_banner',
        'priority'    => 7,
        'default'     => $kale_defaults['kale_frontpage_custom_slider_flexible'],
		'active_callback'  => array( array( 'setting'  => 'kale_frontpage_banner', 'operator' => 'contains', 'value'    => 'Custom', ), ),
    );
	
	
	$fields[] = array(
        'type'        => 'custom',
        'settings'    => 'kale_hr_1',
        'label'       => '',
        'description' => wp_kses_post('<hr />'),
        'section'     => 'kale_section_frontpage_banner',
        'priority'    => 8,
	);
	
	$fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_frontpage_banner_link_images',
        'label'       => esc_html__('Hide Captions, Link Images?', 'kale' ),
		'description' => esc_html__('If this option is turned on, the headings, descriptions, and icons for the slides/banner will be hidden and the image will be linked directly to the URLs provided.', 'kale'),
        'section'     => 'kale_section_frontpage_banner',
        'priority'    => 9,
        'default'     => $kale_defaults['kale_frontpage_banner_link_images'],
    );
	
	$fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_frontpage_banner_overlay_show',
        'label'       => esc_html__('Show Color Overlay/Filter?', 'kale' ),
        'section'     => 'kale_section_frontpage_banner',
        'priority'    => 10,
        'default'     => $kale_defaults['kale_frontpage_banner_overlay_show'],
		'active_callback'  => array( array( 'setting'  => 'kale_frontpage_banner_link_images', 'operator' => '==', 'value'    => '0', ),)
    );
	
	$fields[] = array(
        'type'        => 'color',
        'settings'    => 'kale_frontpage_banner_overlay_color',
        'label'       => esc_html__( 'Select Color', 'kale' ),
        'section'     => 'kale_section_frontpage_banner',
        'priority'    => 11,
        'default'     => $kale_defaults['kale_frontpage_banner_overlay_color'],
        'sanitize_callback' => 'sanitize_hex_color',
		'active_callback'  => array( array( 'setting'  => 'kale_frontpage_banner_overlay_show', 'operator' => '==', 'value'    => '1', ),
									 array( 'setting'  => 'kale_frontpage_banner_link_images', 'operator' => '==', 'value'    => '0', ),)
    );
	
	
    
    #kale_section_frontpage_featured_posts
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'kale_frontpage_featured_posts_show',
        'label'       => esc_html__( 'Show Featured Posts/Pages?', 'kale' ),
        'description' => esc_html__( 'Choose whether to display the featured posts or pages under the banner/slider.', 'kale' ),
        'section'     => 'kale_section_frontpage_featured_posts',
        'priority'    => 1,
        'default'     => $kale_defaults['kale_frontpage_featured_posts_show'],
        'choices'     => array( 'on'  => esc_attr__( 'SHOW', 'kale' ), 'off' => esc_attr__( 'HIDE', 'kale' ), )
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'kale_frontpage_featured_posts_sep1',
        'label'       => '<hr />', 
        'section'     => 'kale_section_frontpage_featured_posts',
        'priority'    => 2,
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_featured_posts_show', 'operator' => '==', 'value'    => true, ), )
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'kale_frontpage_featured_posts_heading',
        'label'       => esc_html__( 'Heading', 'kale' ),
        'section'     => 'kale_section_frontpage_featured_posts',
        'priority'    => 3,
        'default'     => $kale_defaults['kale_frontpage_featured_posts_heading'],
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_featured_posts_show', 'operator' => '==', 'value'    => true, ), )
    );
	$fields[] = array(
        'type'        => 'radio-buttonset',
        'settings'    => 'kale_frontpage_featured_posts_type',
        'label'       => esc_html__( 'Use Posts or Pages?', 'kale' ),
        'description' => esc_html__( 'Choose whether to display the posts or pages here.', 'kale' ),
        'section'     => 'kale_section_frontpage_featured_posts',
        'priority'    => 4,
        'default'     => $kale_defaults['kale_frontpage_featured_posts_type'],
        'choices'     => array( 'Posts'  => esc_attr__( 'POSTS', 'kale' ), 'Pages' => esc_attr__( 'PAGES', 'kale' ), ),
		'active_callback'  => array( array( 'setting'  => 'kale_frontpage_featured_posts_show', 'operator' => '==', 'value'    => true, ), )
    );
	$fields[] = array(
        'type'        => 'custom',
        'settings'    => 'kale_frontpage_featured_posts_sep2',
        'label'       => '<hr />', 
        'section'     => 'kale_section_frontpage_featured_posts',
        'priority'    => 5,
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_featured_posts_show', 'operator' => '==', 'value'    => true, ), )
    );
    $fields[] = array(
        'type'        => 'select',
        'settings'    => 'kale_frontpage_featured_posts_post_1',
        'label'       => esc_html__( 'Post 1', 'kale' ),
        'section'     => 'kale_section_frontpage_featured_posts',
        'priority'    => 6,
        'default'     => $kale_defaults['kale_frontpage_featured_posts_post_1'],
        'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1 ) ),
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_featured_posts_show', 'operator' => '==', 'value'    => true, ),
									 array( 'setting'  => 'kale_frontpage_featured_posts_type', 'operator' => '==', 'value'    => 'Posts', ),)
    );
    $fields[] = array(
        'type'        => 'select',
        'settings'    => 'kale_frontpage_featured_posts_post_2',
        'label'       => esc_html__( 'Post 2', 'kale' ),
        'section'     => 'kale_section_frontpage_featured_posts',
        'priority'    => 7,
        'default'     => $kale_defaults['kale_frontpage_featured_posts_post_2'],
        'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1 ) ),
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_featured_posts_show', 'operator' => '==', 'value'    => true, ),
									 array( 'setting'  => 'kale_frontpage_featured_posts_type', 'operator' => '==', 'value'    => 'Posts', ),)
    );
    $fields[] = array(
        'type'        => 'select',
        'settings'    => 'kale_frontpage_featured_posts_post_3',
        'label'       => esc_html__( 'Post 3', 'kale' ),
        'section'     => 'kale_section_frontpage_featured_posts',
        'priority'    => 8,
        'default'     => $kale_defaults['kale_frontpage_featured_posts_post_3'],
        'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1 ) ),
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_featured_posts_show', 'operator' => '==', 'value'    => true, ),
									 array( 'setting'  => 'kale_frontpage_featured_posts_type', 'operator' => '==', 'value'    => 'Posts', ),)
    );
	
	$fields[] = array(
        'type'        => 'dropdown-pages',
        'settings'    => 'kale_frontpage_featured_posts_page_1',
        'label'       => esc_html__( 'Page 1', 'kale' ),
        'section'     => 'kale_section_frontpage_featured_posts',
        'priority'    => 9,
        'default'     => $kale_defaults['kale_frontpage_featured_posts_page_1'],
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_featured_posts_show', 'operator' => '==', 'value'    => true, ),
									 array( 'setting'  => 'kale_frontpage_featured_posts_type', 'operator' => '==', 'value'    => 'Pages', ),)
    );
    $fields[] = array(
        'type'        => 'dropdown-pages',
        'settings'    => 'kale_frontpage_featured_posts_page_2',
        'label'       => esc_html__( 'Page 2', 'kale' ),
        'section'     => 'kale_section_frontpage_featured_posts',
        'priority'    => 10,
        'default'     => $kale_defaults['kale_frontpage_featured_posts_page_2'],
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_featured_posts_show', 'operator' => '==', 'value'    => true, ),
									 array( 'setting'  => 'kale_frontpage_featured_posts_type', 'operator' => '==', 'value'    => 'Pages', ),)
    );
    $fields[] = array(
        'type'        => 'dropdown-pages',
        'settings'    => 'kale_frontpage_featured_posts_page_3',
        'label'       => esc_html__( 'Page 3', 'kale' ),
        'section'     => 'kale_section_frontpage_featured_posts',
        'priority'    => 11,
        'default'     => $kale_defaults['kale_frontpage_featured_posts_page_3'],
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_featured_posts_show', 'operator' => '==', 'value'    => true, ),
									 array( 'setting'  => 'kale_frontpage_featured_posts_type', 'operator' => '==', 'value'    => 'Pages', ),)
    );
    
    /* kale_section_frontpage_large_post */
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'kale_frontpage_large_post_show',
        'label'       => esc_html__( 'Show Large / Highlight Post?', 'kale' ),
        'description' => esc_html__( 'Choose whether to display the large post under the blog feed.', 'kale' ),
        'section'     => 'kale_section_frontpage_large_post',
        'priority'    => 1,
        'default'     => $kale_defaults['kale_frontpage_large_post_show'],
        'choices' => array( 'on'  => esc_attr__( 'SHOW', 'kale' ), 'off' => esc_attr__( 'HIDE', 'kale' ), )
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'kale_frontpage_large_post_sep1',
        'label'       => '<hr />',
        'section'     => 'kale_section_frontpage_large_post',
        'priority'    => 2,
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_large_post_show', 'operator' => '==', 'value'    => true, ), )
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'kale_frontpage_large_post_heading',
        'label'       => esc_html__( 'Heading', 'kale' ),
        'section'     => 'kale_section_frontpage_large_post',
        'priority'    => 3,
        'default'     => $kale_defaults['kale_frontpage_large_post_heading'],
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_large_post_show', 'operator' => '==', 'value'    => true, ), )
    );
    $fields[] = array(
        'type'        => 'select',
        'settings'    => 'kale_frontpage_large_post',
        'label'       => esc_html__( 'Select Large / Highlight Post', 'kale' ),
        'section'     => 'kale_section_frontpage_large_post',
        'priority'    => 3,
        'default'     => $kale_defaults['kale_frontpage_large_post'],
        'choices'     => Kirki_Helper::get_posts( array( 'numberposts' => -1 ) ),
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_large_post_show', 'operator' => '==', 'value'    => true, ), )
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_frontpage_large_post_share_show',
        'label'       => esc_html__( 'Show Share Links?', 'kale' ),
        'section'     => 'kale_section_frontpage_large_post',
        'priority'    => 4,
        'default'     => $kale_defaults['kale_frontpage_large_post_share_show'],
        'description' => wp_kses_post(__('This works with the Jetpack (Sharing) plugin. Please refer to the <a href="https://help.lyrathemes.com/#collection-181" target="_blank">documentation</a> for more details.', 'kale')),
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_large_post_show', 'operator' => '==', 'value'    => true, ), )
    );
    
    /* kale_section_frontpage_vertical */
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'kale_frontpage_vertical_show',
        'label'       => esc_html__( 'Show Vertical Content / Posts?', 'kale' ),
        'description' => esc_html__( 'Choose whether to display the 5 vertically formatted posts just above the footer area.', 'kale' ),
        'section'     => 'kale_section_frontpage_vertical',
        'priority'    => 1,
        'default'     => $kale_defaults['kale_frontpage_vertical_show'],
        'choices' => array('on'  => esc_attr__( 'SHOW', 'kale' ),  'off' => esc_attr__( 'HIDE', 'kale' ), )
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'kale_frontpage_vertical_sep1',
        'label'       => '<hr />',
        'section'     => 'kale_section_frontpage_vertical',
        'priority'    => 2,
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_vertical_show', 'operator' => '==', 'value'    => true, ), )
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'kale_frontpage_vertical_heading',
        'label'       => esc_html__( 'Heading', 'kale' ),
        'section'     => 'kale_section_frontpage_vertical',
        'priority'    => 3,
        'default'     => $kale_defaults['kale_frontpage_vertical_heading'],
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_vertical_show', 'operator' => '==', 'value'    => true, ), )        
    );
    $fields[] = array(
        'type'        => 'select',
        'settings'    => 'kale_frontpage_vertical_category',
        'label'       => esc_html__( 'Category', 'kale' ),
        'section'     => 'kale_section_frontpage_vertical',
        'priority'    => 4,
        'choices'     => Kirki_Helper::get_terms( 'category' ),
        'default'     => $kale_defaults['kale_frontpage_vertical_category'],
        'active_callback'  => array( array( 'setting'  => 'kale_frontpage_vertical_show', 'operator' => '==', 'value'    => true, ), )        
    );
    
    /* kale_section_frontpage_slider_settings */
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_slider_auto_play',
        'label'       => esc_html__( 'Auto Play Front Page Slider?', 'kale' ),
        'description' => esc_html__( 'Turn this on to auto play the slider on the home page.', 'kale' ),
        'section'     => 'kale_section_frontpage_slider_settings',
        'priority'    => 1,
        'default'     => $kale_defaults['kale_slider_auto_play']
    );
    $fields[] = array(
        'type'        => 'number',
        'settings'    => 'kale_slider_auto_play_speed',
        'label'       => esc_html__( 'Auto Play Speed', 'kale' ),
        'description' => esc_html__( 'Speed in milliseconds. Default is 5000.', 'kale' ),
        'section'     => 'kale_section_frontpage_slider_settings',
        'priority'    => 2,
        'default'     => $kale_defaults['kale_slider_auto_play_speed'],
        'active_callback'  => array( array( 'setting'  => 'kale_slider_auto_play', 'operator' => '==', 'value'    => '1' ) ),
        'choices'     => array('step' => 1000,),
        'sanitize_callback'=> 'sanitize_text_field'
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_slider_enable_fade',
        'label'       => esc_html__( 'Enable Fade Effect?', 'kale' ),
        'description' => esc_html__( 'By default, the slide fades into the next one. If the fading effect is turned off, the items would "slide" into the next one.', 'kale' ),
        'section'     => 'kale_section_frontpage_slider_settings',
        'priority'    => 3,
        'default'     => $kale_defaults['kale_slider_enable_fade']
    );
    
    /* kale_section_frontpage_order */
    #-----------------------------------------

    $fields[] = array(
        'type'        => 'sortable',
        'settings'    => 'kale_frontpage_order',
        'label'       => esc_html__( 'Order of Frontpage Sections', 'kale' ),
        'description' => esc_html__( 'Rearrange the front page sections by dragging/dropping them in the order you prefer. Please note: If you disable or hide a section here by using the `eye` icon, then the individual section setting will be overidden. So, for example, if you have enabled the Large/Highlight Post in its own section but it is disabled/hidden here, it will not be shown on the front page.', 'kale' ),
        'section'     => 'kale_section_frontpage_order',
        'priority'    => 1,
        'default'     => $kale_defaults['kale_frontpage_order'],
        'choices'     => array(
                                'kale_frontpage_order_banner' => esc_attr__( 'Banner', 'kale' ),
                                'kale_frontpage_order_featured_posts' => esc_attr__( 'Featured Posts', 'kale' ),
                                'kale_frontpage_order_feed' => esc_attr__( 'Blog Feed / Page Content', 'kale' ),
                                'kale_frontpage_order_large' => esc_attr__( 'Large / Highlight Post', 'kale' ),
                                'kale_frontpage_order_vertical' => esc_attr__( 'Vertical Content / Posts', 'kale' ),
                            ),
    );
    
    
    /* kale_section_blog_feed */
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'kale_blog_feed_meta_show',
        'label'       => esc_html__( 'Show Meta?', 'kale' ),
        'description' => esc_html__( 'Choose whether to display date, category, author, tags for posts in the blog feed. This applies to all blog feeds on all pages, including the front page.', 'kale' ),
        'section'     => 'kale_section_blog_feed',
        'priority'    => 1,
        'default'     => $kale_defaults['kale_blog_feed_meta_show'],
        'choices' => array( 'on'  => esc_attr__( 'SHOW', 'kale' ), 'off' => esc_attr__( 'HIDE', 'kale' ), )
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_blog_feed_date_show',
        'label'       => esc_html__( 'Show Date?', 'kale' ),
        'section'     => 'kale_section_blog_feed',
        'priority'    => 2,
        'default'     => $kale_defaults['kale_blog_feed_date_show'],
        'active_callback'  => array( array( 'setting'  => 'kale_blog_feed_meta_show', 'operator' => '==', 'value'    => true, ),)
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_blog_feed_category_show',
        'label'       => esc_html__( 'Show Category?', 'kale' ),
        'section'     => 'kale_section_blog_feed',
        'priority'    => 3,
        'default'     => $kale_defaults['kale_blog_feed_category_show'],
        'active_callback'  => array( array( 'setting'  => 'kale_blog_feed_meta_show', 'operator' => '==', 'value'    => true, ),)
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_blog_feed_author_show',
        'label'       => esc_html__( 'Show Author?', 'kale' ),
        'section'     => 'kale_section_blog_feed',
        'priority'    => 4,
        'default'     => $kale_defaults['kale_blog_feed_author_show'],
        'active_callback'  => array( array( 'setting'  => 'kale_blog_feed_meta_show', 'operator' => '==', 'value'    => true, ),)
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_blog_feed_comments_show',
        'label'       => esc_html__( 'Show Comments?', 'kale' ),
        'section'     => 'kale_section_blog_feed',
        'priority'    => 5,
        'default'     => $kale_defaults['kale_blog_feed_comments_show'],
        'active_callback'  => array( array( 'setting'  => 'kale_blog_feed_meta_show', 'operator' => '==', 'value'    => true, ),)
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'kale_blog_feed_sep1',
        'label'       => '<hr />',
        'section'     => 'kale_section_blog_feed',
        'priority'    => 5
    );
    $fields[] = array(
        'type'        => 'radio',
        'settings'    => 'kale_blog_feed_post_format',
        'label'       => esc_html__( 'Post Display Format (With Sidebar)', 'kale' ),
		'description' => esc_html__('This setting will be ignored if the sidebar is turned off.', 'kale'),
        'section'     => 'kale_section_blog_feed',
        'priority'    => 7,
        'default'     => $kale_defaults['kale_blog_feed_post_format'],
        'choices'     => array(
                            'Mixed'  => array(
                                esc_attr__( 'Mixed: 2 Small Posts, Followed by 1 Full', 'kale' ),
                            ),
                            'Full'   => array(
                                esc_attr__( 'Full: Large Image Top, Full Content Below', 'kale' ),
                            ),
                            'Small' => array(
                                esc_attr__( 'Small/Grid: Small Image and Excerpt, 2 in a Row', 'kale' ),
                            ),                            
                        ),
    );
    
    $fields[] = array(
        'type'        => 'text',
        'settings'     => 'kale_blog_feed_label',
        'label'       => esc_html__( 'Heading for Blog Feed on Home Page', 'kale' ),
        'description' => esc_html__( 'The `Recent Posts` label on the home page.', 'kale' ),
        'section'     => 'kale_section_blog_feed',
        'priority'    => 9,
        'default'     => $kale_defaults['kale_blog_feed_label'],
        'sanitize_callback'=> 'sanitize_text_field'
    );
	$fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_blog_feed_sidebar_show',
        'label'       => esc_html__( 'Show Sidebar on Blog Feed?', 'kale' ),
        'section'     => 'kale_section_blog_feed',
        'priority'    => 10,
        'description' => esc_html__('By default, the blog feed shows in the format chosen above, with a sidebar on the right. If you choose to hide the sidebar, the above post display format will be ignored and the posts will be shown 3 in a row.', 'kale'),
        'default'     => $kale_defaults['kale_blog_feed_sidebar_show'],
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_blog_feed_category_sidebar_show',
        'label'       => esc_html__( 'Show Sidebar on Category Pages?', 'kale' ),
        'section'     => 'kale_section_blog_feed',
        'priority'    => 11,
        'description' => esc_html__('By default, the category pages show posts 3 in a row, with no sidebar. Toggle this on to show a sidebar.', 'kale'),
        'default'     => $kale_defaults['kale_blog_feed_category_sidebar_show'],
    );
	$fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_blog_feed_share_show',
        'label'       => esc_html__( 'Show Share For Full Posts?', 'kale' ),
        'section'     => 'kale_section_blog_feed',
        'priority'    => 12,
        'description' => wp_kses_post(__('Show or hide the social sharing options for the full format posts (if using the Mixed or the Full blog feed formats). This works with the Jetpack (Sharing) plugin. Please refer to the <a href="https://help.lyrathemes.com/#collection-181" target="_blank">documentation</a> for more details.', 'kale')),
        'default'     => $kale_defaults['kale_blog_feed_share_show'],
    );
	
    
    /* kale_section_posts */
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'kale_posts_meta_show',
        'label'       => esc_html__( 'Show Meta?', 'kale' ),
        'description' => esc_html__( 'Choose whether to display date, category, author, tags for posts on the post page.', 'kale' ),
        'section'     => 'kale_section_posts',
        'priority'    => 1,
        'default'     => $kale_defaults['kale_posts_meta_show'],
        'choices' => array( 'on'  => esc_attr__( 'SHOW', 'kale' ), 'off' => esc_attr__( 'HIDE', 'kale' ), )
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_posts_date_show',
        'label'       => esc_html__( 'Show Date?', 'kale' ),
        'section'     => 'kale_section_posts',
        'priority'    => 2,
        'default'     => $kale_defaults['kale_posts_date_show'],
        'active_callback'  => array( array( 'setting'  => 'kale_posts_meta_show', 'operator' => '==', 'value'    => true, ), )
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_posts_category_show',
        'label'       => esc_html__( 'Show Category?', 'kale' ),
        'section'     => 'kale_section_posts',
        'priority'    => 3,
        'default'     => $kale_defaults['kale_posts_category_show'],
        'active_callback'  => array( array( 'setting'  => 'kale_posts_meta_show', 'operator' => '==', 'value'    => true, ), )
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_posts_author_show',
        'label'       => esc_html__( 'Show Author?', 'kale' ),
        'section'     => 'kale_section_posts',
        'priority'    => 4,
        'default'     => $kale_defaults['kale_posts_author_show'],
        'active_callback'  => array( array( 'setting'  => 'kale_posts_meta_show', 'operator' => '==', 'value'    => true, ), )
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_posts_tags_show',
        'label'       => esc_html__( 'Show Tags?', 'kale' ),
        'section'     => 'kale_section_posts',
        'priority'    => 5,
        'default'     => $kale_defaults['kale_posts_tags_show'],
        'active_callback'  => array( array( 'setting'  => 'kale_posts_meta_show', 'operator' => '==', 'value'    => true, ), )
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'kale_posts_sep1',
        'label'       => '<hr />',
        'section'     => 'kale_section_posts',
        'priority'    => 6
    );
    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'kale_posts_sidebar',
        'label'       => esc_html__( 'Layout', 'kale' ),
        'description' => esc_html__( 'Choose whether to display the sidebar.', 'kale' ),
        'section'     => 'kale_section_posts',
        'default'     => $kale_defaults['kale_posts_sidebar'],
        'priority'    => 7,
        'choices'     => array( '0' => trailingslashit( get_template_directory_uri() ) . 'customize/images/full.png',
                                '1' => trailingslashit( get_template_directory_uri() ) . 'customize/images/sidebar.png', ),
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_posts_featured_image_show',
        'label'       => esc_html__( 'Show Featured Image ?', 'kale' ),
        'description' => esc_html__( 'Whether to show featured image at the beginning of the post.', 'kale' ),
        'section'     => 'kale_section_posts',
        'priority'    => 8,
        'default'     => $kale_defaults['kale_posts_featured_image_show']
    );
    
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_posts_posts_nav_show',
        'label'       => esc_html__( 'Show Prev/Next Posts?', 'kale' ),
        'description' => esc_html__( 'Whether to show the previous and next post links after the post content.', 'kale' ),
        'section'     => 'kale_section_posts',
        'priority'    => 9,
        'default'     => $kale_defaults['kale_posts_posts_nav_show']
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_posts_related_show',
        'label'       => esc_html__( 'Show Related posts?', 'kale' ),
        'description' => esc_html__( 'Whether to show built-in related posts after the post.', 'kale' ),
        'section'     => 'kale_section_posts',
        'priority'    => 10,
        'default'     => $kale_defaults['kale_posts_related_show']
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'kale_posts_sep2',
        'label'       => '<hr />',
        'section'     => 'kale_section_posts',
        'priority'    => 11,
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_jump_to_recipe_link_show',
        'label'       => esc_html__( 'Show `Jump to Recipe` Link on Posts Including Recipes?', 'kale' ),
        'section'     => 'kale_section_posts',
        'priority'    => 12,
        'default'     => $kale_defaults['kale_jump_to_recipe_link_show']
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'     => 'kale_jump_to_recipe_link_label',
        'label'       => esc_html__( 'Label for `Jump to Recipe` Link', 'kale' ),
        'section'     => 'kale_section_posts',
        'priority'    => 13,
        'default'     => $kale_defaults['kale_jump_to_recipe_link_label'],
        'sanitize_callback'=> 'sanitize_text_field',
        'active_callback'  => array( array( 'setting'  => 'kale_jump_to_recipe_link_show', 'operator' => '==', 'value'    => '1', ), )    
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'kale_posts_sep3',
        'label'       => '<hr />',
        'section'     => 'kale_section_posts',
        'priority'    => 14,
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_posts_share_top_show',
        'label'       => esc_html__( 'Share Links at the Top?', 'kale' ),
        'section'     => 'kale_section_posts',
        'priority'    => 15,
        'description' => 'This works with the Jetpack (Sharing) plugin. Please refer to the <a href="https://help.lyrathemes.com/#collection-181" target="_blank">documentation</a> for more details.',
        'default'     => $kale_defaults['kale_posts_share_top_show']
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_posts_share_bottom_show',
        'label'       => esc_html__( 'Share Links at the Bottom?', 'kale' ),
        'section'     => 'kale_section_posts',
        'priority'    => 16,
        'description' => 'This works with the Jetpack (Sharing) plugin. Please refer to the <a href="https://help.lyrathemes.com/#collection-181" target="_blank">documentation</a> for more details.',
        'default'     => $kale_defaults['kale_posts_share_bottom_show']
    );
    
    
    /* kale_section_pages */
    #-----------------------------------------
    
   $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'kale_pages_sidebar',
        'label'       => esc_html__( 'Layout', 'kale' ),
        'description' => esc_html__( 'Choose whether to display the sidebar.', 'kale' ),
        'section'     => 'kale_section_pages',
        'default'     => $kale_defaults['kale_pages_sidebar'],
        'priority'    => 1,
        'choices'     => array( '0' => trailingslashit( get_template_directory_uri() ) . 'customize/images/full.png',
                                '1' => trailingslashit( get_template_directory_uri() ) . 'customize/images/sidebar.png', ),
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_pages_featured_image_show',
        'label'       => esc_html__( 'Show Featured Image ?', 'kale' ),
        'description' => esc_html__( 'Whether to show featured image at the beginning of the page.', 'kale' ),
        'section'     => 'kale_section_pages',
        'priority'    => 2,
        'default'     => $kale_defaults['kale_pages_featured_image_show']
    );
    
    #kale_section_ads
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'kale_enable_ads',
        'label'       => esc_html__( 'Enable Blog Feed Ads', 'kale' ),
        'section'     => 'kale_section_ads',
        'priority'    => 1,
        'description' => 'When enabled, these ads will show up after every second post on the blog feed. Please note: If your posts are set to display as `2 Small Posts, Followed by 1 Full`, then the ad will be shown after every 2 small posts.',
        'default'     => $kale_defaults['kale_enable_ads'],
        'choices' => array( 'on'  => esc_attr__( 'ENABLE', 'kale' ), 'off' => esc_attr__( 'DISABLE', 'kale' ) )
    ); 
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'kale_ads_sep1',
        'label'       => '<hr />',
        'section'     => 'kale_section_ads',
        'priority'    => 2,
        'active_callback'  => array( array( 'setting'  => 'kale_enable_ads', 'operator' => '==', 'value'    => true ) )
    );
    $fields[] = array(
        'type'        => 'repeater',
        'settings'    => 'kale_ads',
        'label'       => esc_html__( 'Create Ad', 'kale' ),
        'section'     => 'kale_section_ads',
		'description' => esc_html__( 'Enter a URL and upload an image, or paste in the ad code. If both the image and code have been added, the ad code will be ignored.', 'kale'),
        'priority'    => 3,
        'active_callback'  => array( array( 'setting'  => 'kale_enable_ads', 'operator' => '==', 'value'    => true ) ),
        'row_label' => array(
                'type' => 'text',
                'value' => esc_attr__( 'Ad', 'kale' ),
		),
        'fields' => array(
            'kale_ad_url' => array(
                'type'        => 'text',
                'label'       => esc_attr__( 'URL', 'kale' ),
                'sanitize_callback' => 'sanitize_text_field',
            ),
            'kale_ad_image' => array(
                'type'        => 'image',
                'label'       => esc_attr__( 'Image', 'kale' ),
            ),
			'kale_ad_code' => array(
                'type'        => 'textarea',
                'label'       => esc_attr__( 'Ad Code', 'kale' ),
				'sanitize_callback' => 'kale_sanitize_ad_code'
            ),
        )
    );
    
	if ( class_exists( 'WooCommerce' ) ) {

	/* kale_section_woocommerce */
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'kale_woocommerce_sidebar',
        'label'       => esc_html__('Layout', 'kale' ),
        'description' => esc_html__('Choose whether to display the sidebar on the WooCommerce pages. Please note: If you choose a sidebar here, but there are no widgets assigned - then the page will display without the sidebar column.', 'kale' ),
        'section'     => 'kale_section_woocommerce',
        'default'     => $kale_defaults['kale_woocommerce_sidebar'],
        'priority'    => 1,
        'choices'     => array( '0' => trailingslashit( get_template_directory_uri() ) . 'customize/images/full.png',
                                '1' => trailingslashit( get_template_directory_uri() ) . 'customize/images/sidebar.png', ),
    );

	}
   
    /* kale_section_advanced */
    #-----------------------------------------
   
    if(kale_show_custom_css_field()) {
       $fields[] = array(
            'type'        => 'code',
            'settings'    => 'kale_advanced_css',
            'label'       => esc_html__( 'Custom CSS', 'kale' ),
            'description' => esc_html__( 'Custom CSS code to modify styling.', 'kale' ),
            'section'     => 'kale_section_advanced',
            'priority'    => 1,
            'choices'     => array( 'language' => 'css'),
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        );
    }
    $fields[] = array(
        'type'        => 'code',
        'settings'    => 'kale_advanced_analytics',
        'label'       => esc_html__( 'Google Analytics Code', 'kale' ),
        'description' => esc_html__( 'Copy and paste your Google Analytics code here.', 'kale' ),
        'section'     => 'kale_section_advanced',
        'priority'    => 2,
        'choices'     => array( 'language' => 'javascript'),
    );    
    
    /* kale_section_menu */
    #-----------------------------------------

	$fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_nav_search_icon',
        'label'       => esc_html__( 'Search Icon in Main Nav?', 'kale' ),
        'description' => esc_html__( 'Add the search icon in the main top navigation.', 'kale' ),
        'section'     => 'kale_section_menu',
        'priority'    => 1,
        'default'     => $kale_defaults['kale_nav_search_icon']
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_stick_nav_to_top',
        'label'       => esc_html__( 'Enable Fixed Main Nav?', 'kale' ),
        'description' => esc_html__( 'Stick the main navigation to the top on scroll.', 'kale' ),
        'section'     => 'kale_section_menu',
        'priority'    => 2,
        'default'     => $kale_defaults['kale_stick_nav_to_top']
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_dropdown_node_enable',
        'label'       => esc_html__( 'Enable Dropdown Menu Parent Nodes', 'kale' ),
        'description' => esc_html__( 'The menu item that is clicked to drop down sub menus is not assigned a URL by default (it is set to #). If you would like to enable links for the parent nodes, you can do so here.', 'kale' ),
        'section'     => 'kale_section_menu',
        'priority'    => 3,
        'default'     => $kale_defaults['kale_dropdown_node_enable']
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'kale_dropdown_smartmenus_enable',
        'label'       => esc_html__( 'Enable Dropdown Menu On Hover', 'kale' ),
        'description' => esc_html__( 'By default, the dropdown menus open on hover. You can turn this off so that they will open on click. Please note - this will also turn off any menu levels deeper than parent and sub menu (so there will be no additional levels after the main dropdown menu).', 'kale' ),
        'section'     => 'kale_section_menu',
        'priority'    => 4,
        'default'     => $kale_defaults['kale_dropdown_smartmenus_enable']
    );
    
	return $fields;
}

add_filter( 'kirki/fields', 'kale_customizer_fields' );

function kale_sanitize_ad_code($input){
	return $input;
}
?>