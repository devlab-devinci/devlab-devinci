<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "seclekOptions";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'seclekOptions/opt_name', $opt_name );

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'seclek' ),
        'page_title'           => esc_html__( 'Theme Options', 'seclek' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-Jalebi Menu',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        'forced_dev_mode_off'  => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'seclek-core/seclek-dashboard.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'seclek-options',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /* As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for */

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header Settings', 'seclek' ),
        'id'               => 'cr_hr_settings',
        'subsection'       => false,
        'icon'             => 'el el-wrench',
        'fields'           => array(   
            
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'seclek' ),
        'id'               => 'cr_header',
        'desc'             => esc_html__( 'Logo/Favicon settings for jelebi theme', 'seclek' ),
        'subsection'       => true,
        'icon'             => 'el el-adjust-alt',
        'fields'           => array(                 
            array(
                'id'       => 'cr_en_search',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable Search', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable Search Box in Header', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'enable'
            ),
            array(
                'id'       => 'cr_search_icon',
                'type'     => 'color',
                'title'    => esc_html__( 'Search Icon Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme.', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_search','=','enable'),
            ),
            array(
                'id'       => 'cr_search_icon_hover',
                'type'     => 'color',
                'title'    => esc_html__( 'Search Icon Hover Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme.', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_search','=','enable'),
            ),
            array(
                'id'       => 'cr_en_login',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Login/Register Switcher', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable Login/My Account opiont in Header', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'enable'
            ),
            array(
                'id'       => 'cr_en_button',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Header Right Button', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable button in Menu', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'disable'
            ),
            array(
                'id'       => 'cr_hr_btn',
                'type'     => 'text',
                'title'    => esc_html__( 'Header Button Text', 'seclek' ),
                'subtitle' => esc_html__( 'Enter Button Text Here.', 'seclek' ),
                'required'  => array('cr_en_button','=','enable'),                
            ),
            array(
                'id'       => 'cr_hr_btn_url',
                'type'     => 'text',
                'title'    => esc_html__( 'Header Right Button URL', 'seclek' ),
                'subtitle' => esc_html__( 'Enter Button Text Here.', 'seclek' ),
                'required'  => array('cr_en_button','=','enable'),
            ),
            array(
                'id'       => 'cr_hr_btn_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Background Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme.', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_button','=','enable'),
            ),
            array(
                'id'       => 'cr_hr_btn_bg_hover',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Background Hover Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme.', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_button','=','enable'),
            ),
            array(
                'id'       => 'cr_hr_btn_border',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Border Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme.', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_button','=','enable'),
            ),
            array(
                'id'       => 'cr_hr_btn_border_hover',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Border Hover Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme.', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_button','=','enable'),
            ),
            array(
                'id'       => 'cr_hr_btn_text',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Border Hover Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme.', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_button','=','enable'),
            ),
            array(
                'id'       => 'cr_hr_btn_text_hover',
                'type'     => 'color',
                'title'    => esc_html__( 'Button Border Hover Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme.', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_button','=','enable'),
            ),
            array(
                'id'       => 'cr_logo_header',
                'type'     => 'media',
                'title'    => esc_html__( 'Logo', 'seclek' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Preferred image size: 168x49', 'seclek' ),
                'default'  => array( 'url' => SECLEK_IMGDIR . 'logo.png' ),
            ),
            array(
                'id'       => 'cr_mobile_logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Mobile Logo', 'seclek' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Preferred image size: 168x49', 'seclek' ),
                'default'  => array( 'url' => SECLEK_IMGDIR . 'logo-white.png' ),
            ),
            array(
                'id'       => 'cr_favicon',
                'type'     => 'media',
                'title'    => esc_html__( 'Favicon', 'seclek' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload image size: 16x16', 'seclek' ),
                'default'  => array( 'url' => SECLEK_IMGDIR . 'ico/favicon.ico' ),
            ),
            array(
                'id'       => 'cr_apple_fav_57',
                'type'     => 'media',
                'title'    => esc_html__( 'Apple Touch Icon 57x57', 'seclek' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload image size: 57x57', 'seclek' ),
                'default'  => array( 'url' => SECLEK_IMGDIR . 'ico/apple-touch-icon-57-precomposed.png' ),
            ),
            array(
                'id'       => 'cr_apple_fav_72',
                'type'     => 'media',
                'title'    => esc_html__( 'Apple Touch Icon 72x72', 'seclek' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload image size: 72x72', 'seclek' ),
                'default'  => array( 'url' => SECLEK_IMGDIR . 'ico/apple-touch-icon-72--precomposed.png' ),
            ),
            array(
                'id'       => 'cr_apple_fav_114',
                'type'     => 'media',
                'title'    => esc_html__( 'Apple Touch Icon 114x114', 'seclek' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload image size: 114x114', 'seclek' ),
                'default'  => array( 'url' => SECLEK_IMGDIR . 'ico/apple-touch-icon-114-precomposed.png' ),
            ),
            array(
                'id'       => 'cr_apple_fav_144',
                'type'     => 'media',
                'title'    => esc_html__( 'Apple Touch Icon 144x144', 'seclek' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload image size: 144x144', 'seclek' ),
                'default'  => array( 'url' => SECLEK_IMGDIR . 'ico/apple-touch-icon-144-precomposed.png' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Topbar', 'seclek' ),
        'id'               => 'cr_topbar',
        'desc'             => esc_html__( 'topbar content of the theme!', 'seclek' ),
        'subsection'       => true,
        'icon'             => 'el el-arrow-up',
        'fields'           => array(
            array(
                'id'       => 'cr_en_topbar',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Top Bar Switching', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable Topbar section', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'disable'
            ),
            array(
                'id'       => 'cr_en_mini_cart',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable Mini Cart', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable Topbar Mini Cart', 'seclek' ),
                'required'  => array('cr_en_topbar','=','enable'),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'disable'
            ),
            array(
                'id'       => 'cr_enable_Email',
                'type'     => 'text',
                'title'    => esc_html__( 'Email Address', 'seclek' ),
                'desc'     => esc_html__( 'Leave blank to disable this field in topbar', 'seclek' ),
                'required'  => array('cr_en_topbar','=','enable'),
            ),
            array(
                'id'       => 'cr_top_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Topbar Background Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #fff).', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_topbar','=','enable'),
            ),
            array(
                'id'       => 'cr_top_icon_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Topbar Icon Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #fff).', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_topbar','=','enable'),
            ),
            array(
                'id'       => 'cr_top_content_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Topbar Content Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #fff).', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_topbar','=','enable'),
            ),
            array(
                'id'       => 'cr_enable_mobile',
                'type'     => 'text',
                'title'    => esc_html__( 'Phone Number ', 'seclek' ),
                'desc'     => esc_html__( 'Leave blank to disable this field in topbar', 'seclek' ),
                'required'  => array('cr_en_topbar','=','enable'),
            ),
            array(
                'id'       => 'cr_social_link',
                'type'     => 'button_set',
                'title'    => __( 'Enable/Disable Social Link', 'seclek' ),
                'subtitle' => __( 'Choose whether you want to enable or disable social link on top header', 'seclek' ),
                'options'  => array(
                    'on'  => 'Enable',
                    'off' => 'Disable',
                ),
                'default'  => 'on',
                'required'  => array('cr_en_topbar','=','enable'),
            ),
            array(
                'id'       => 'cr_social_label',
                'type'     => 'text',
                'title'    => esc_html__( 'Social Link Label', 'seclek' ),
                'desc'     => esc_html__( 'Leave blank to disable this field in topbar', 'seclek' ),
                'required'  => array('cr_social_link','=','on'),
            ),
            array(
                'id'        => 'cr_top_facebook',
                'type'      => 'text',
                'title'     => __( 'Facebook Url', 'seclek' ),
                'required'  => array('cr_social_link','=','on'),
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_top_twitter',
                'type'      => 'text',
                'title'     => __( 'Twiiter Url', 'seclek' ),
                'required'  => array('cr_social_link','=','on'),
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_top_gplus',
                'type'      => 'text',
                'title'     => __( 'Google Plus Url', 'seclek' ),
                'required'  => array('cr_social_link','=','on'),
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_top_pinterest',
                'type'      => 'text',
                'title'     => __( 'Pinterest Url', 'seclek' ),
                'required'  => array('cr_social_link','=','on'),
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_top_instagram',
                'type'      => 'text',
                'title'     => __( 'Instagram Url', 'seclek' ),
                'required'  => array('cr_social_link','=','on'),
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_top_linkedin',
                'type'      => 'text',
                'title'     => __( 'Linkedin Url', 'seclek' ),
                'required'  => array('cr_social_link','=','on'),
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_top_youtube',
                'type'      => 'text',
                'title'     => __( 'Youtube Url', 'seclek' ),
                'required'  => array('cr_social_link','=','on'),
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_top_behance',
                'type'      => 'text',
                'title'     => __( 'Behance Url', 'seclek' ),
                'required'  => array('cr_social_link','=','on'),
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_top_soundcloud',
                'type'      => 'text',
                'title'     => __( 'SoundCloud Url', 'seclek' ),
                'required'  => array('cr_social_link','=','on'),
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_top_github',
                'type'      => 'text',
                'title'     => __( 'Github Url', 'seclek' ),
                'required'  => array('cr_social_link','=','on'),
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_top_skype',
                'type'      => 'text',
                'title'     => __( 'Skype Url', 'seclek' ),
                'required'  => array('cr_social_link','=','on'),
                'default'   => '#'
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Styling', 'seclek' ),
        'id'               => 'cr_styling',
        'desc'             => esc_html__( 'Choose different styles to change the look of the theme!', 'seclek' ),
        'subsection'       => false,
        'icon'             => 'el el-brush',
        'fields'           => array(   
            
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Theme Accent', 'seclek' ),
        'id'               => 'cr_accent',
        'desc'             => esc_html__( 'Choose different styles to change the look of the theme!', 'seclek' ),
        'subsection'       => true,
        'icon'             => 'el el-adjust-alt',
        'fields'           => array(
            array(
                'id'       => 'cr_rtl',
                'type'     => 'button_set',
                'title'    => __( 'RTL Switcher', 'seclek' ),
                'subtitle' => __( 'Enable/Disable rtl feature of this theme', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'disable'
            ),
            array(
                'id'       => 'cr_skin',
                'type'     => 'select',
                'title'    => esc_html__( 'Select Theme Skin', 'seclek' ),
                'desc'     => esc_html__( 'Choose your preferred theme skin for styling your theme', 'seclek' ),
                'options'  => array(
                    'default'  => 'Default',
                    'custom'  => 'Custom Skin',
                ),
                'default' => 'default'
            ),
            array(
                'id'       => 'cr_custom_skin',
                'type'     => 'color',
                'title'    => esc_html__( 'Custom Skin Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #ed1c24).', 'seclek' ),
                'default'  => '#C70039',
                'validate' => 'color',
                'required' => array('cr_skin','=','custom'),
            ),
            array(
                'id'        => 'cr_skin_color_rgba',
                'type'      => 'color_rgba',
                'title'     => 'Background Overlay',
                'subtitle'  => 'Set color and alpha channel',
                'desc'      => 'Change overlay color with RGBA according to your custom skin!',
                'default'   => array(
                    'color'     => '#C70039',
                    'alpha'     => 0.8
                ),
                // These options display a fully functional color palette.  Omit this argument
                // for the minimal color picker, and change as desired.
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),
                'required' => array('cr_skin','=','custom'),
            ),
            array(
                'id'       => 'cr_pl_en',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Preloader Switching', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable Preloader', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'enable'
            ),
            array(
                'id'       => 'cr_pre_loader',
                'type'     => 'media',
                'title'    => esc_html__( 'Preloader Image', 'seclek' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Preferred gif size: 100x100', 'seclek' ),
                'default'  => array( 'url' => SECLEK_IMGDIR . 'preloader.gif' ),
                'required' => array('cr_pl_en','=','enable'),
            ),
            array(
                'id'       => 'cr_pl_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Preloader Background Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #fff).', 'seclek' ),
                'default'  => '#fff',
                'validate' => 'color',
                'required' => array('cr_pl_en','=','enable'),
            ),
            array(
                'id'       => 'cr_menu_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Main Navigation Background Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #f5f5f5).', 'seclek' ),
                'validate' => 'color',
            ),
            array(
                'id'       => 'cr_menu_nav',
                'type'     => 'color',
                'title'    => esc_html__( 'Main Menu Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #3d3a3b).', 'seclek' ),
                'validate' => 'color',
            ), 
            array(
                'id'       => 'cr_nav_active',
                'type'     => 'color',
                'title'    => esc_html__( 'Main Men Active Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #3d3a3b).', 'seclek' ),
                'validate' => 'color',
            ), 
            array(
                'id'       => 'cr_nav_hover',
                'type'     => 'color',
                'title'    => esc_html__( 'Main Men Hover Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #3d3a3b).', 'seclek' ),
                'validate' => 'color',
            ),
             array(
                'id'       => 'cr_drop_menu_bg',
                'type'     => 'color',
                'title'    => esc_html__( 'Menu Dropdown Background Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #f5f5f5).', 'seclek' ),
                'validate' => 'color',
            ),
             array(
                'id'       => 'cr_drop_nav_active',
                'type'     => 'color',
                'title'    => esc_html__( 'Dropdown Menu Active Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #3d3a3b).', 'seclek' ),
                'validate' => 'color',
            ),
             array(
                'id'       => 'cr_drop_nav_hover',
                'type'     => 'color',
                'title'    => esc_html__( 'Dropdown Menu Hover Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #3d3a3b).', 'seclek' ),
                'validate' => 'color',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Typography', 'seclek' ),
        'id'               => 'cr_typography',
        'desc'             => esc_html__( 'Choose different styles to change the look of the theme!', 'seclek' ),
        'subsection'       => true,
        'icon'             => 'el el-text-width',
        'fields'           => array(
            array(
                'id'          => 'cr_body_typo',
                'type'        => 'typography',
                'title'       => esc_html__( 'Body Typography', 'seclek' ),
                'google'      => true,
                'subsets'     => false,
                'line-height' => false,
                'text-align'  => false,
                'font-weight' => false,
                'units'       =>'px',
            ),
            array(
                'id'            => 'cr_head_typo',
                'type'          => 'typography',
                'title'         => esc_html__( 'Global Heading Typography', 'seclek' ),
                'google'        => true,
                'text-transform'=> true,
                'subsets'       => false,
                'line-height'   => false,
                'text-align'    => false,
                'font-size'     => false,
                'units'         =>'px',
            ),
            array(
                'id'            => 'cr_h1_typo',
                'type'          => 'typography',
                'title'         => esc_html__( 'H1 Typography', 'seclek' ),
                'google'        => true,
                'text-transform'=> true,
                'subsets'       => false,
                'line-height'   => false,
                'text-align'    => false,
                'font-family'   => false,
                'units'         =>'px',
            ),
            array(
                'id'            => 'cr_h2_typo',
                'type'          => 'typography',
                'title'         => esc_html__( 'H2 Typography', 'seclek' ),
                'google'        => true,
                'text-transform'=> true,
                'subsets'       => false,
                'line-height'   => false,
                'text-align'    => false,
                'font-family'   => false,
                'units'         =>'px',
            ),
            array(
                'id'            => 'cr_h3_typo',
                'type'          => 'typography',
                'title'         => esc_html__( 'H3 Typography', 'seclek' ),
                'google'        => true,
                'text-transform'=> true,
                'subsets'       => false,
                'line-height'   => false,
                'text-align'    => false,
                'font-family'   => false,
                'units'         =>'px',
            ),
            array(
                'id'            => 'cr_h4_typo',
                'type'          => 'typography',
                'title'         => esc_html__( 'H4 Typography', 'seclek' ),
                'google'        => true,
                'text-transform'=> true,
                'subsets'       => false,
                'line-height'   => false,
                'text-align'    => false,
                'font-family'   => false,
                'units'         =>'px',
            ),
            array(
                'id'            => 'cr_h5_typo',
                'type'          => 'typography',
                'title'         => esc_html__( 'H5 Typography', 'seclek' ),
                'google'        => true,
                'text-transform'=> true,
                'subsets'       => false,
                'line-height'   => false,
                'text-align'    => false,
                'font-family'   => false,
                'units'         =>'px',
            ),
            array(
                'id'            => 'cr_h6_typo',
                'type'          => 'typography',
                'title'         => esc_html__( 'H6 Typography', 'seclek' ),
                'google'        => true,
                'text-transform'=> true,
                'subsets'       => false,
                'line-height'   => false,
                'text-align'    => false,
                'font-family'   => false,
                'units'         =>'px',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Custom Code', 'seclek' ),
        'id'               => 'cr_custom_code',
        'desc'             => esc_html__( 'Advanced coding section for altering themes settings/styles!', 'seclek' ),
        'subsection'       => false,
        'icon'             => 'el el-cog',
        'fields'           => array(
            array(
                'id'       => 'cr_css_editor',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'CSS Code', 'seclek' ),
                'subtitle' => esc_html__( 'Paste your CSS code here.', 'seclek' ),
                'mode'     => 'css',
                'theme'    => 'monokai'
            ),
            array(
                'id'       => 'cr_js_editor_header',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Header Javascript Code', 'seclek' ),
                'subtitle' => esc_html__( 'Paste your js code here without script tag. This code will be placed just before head tag closed', 'seclek' ),
                'mode'     => 'js',
                'theme'    => 'monokai'
            ),
            array(
                'id'       => 'cr_js_editor_footer',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'Footer Javascript Code', 'seclek' ),
                'subtitle' => esc_html__( 'Paste your js code here without script tag. This code will be placed just before body tag closed', 'seclek' ),
                'mode'     => 'js',
                'theme'    => 'monokai'
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer', 'seclek' ),
        'id'               => 'footer_setting',
        'desc'             => esc_html__( 'Footer settings for seclek theme!', 'seclek' ),
        'subsection'       => false,
        'icon'             => 'el el-arrow-down',
        'fields'           => array(
            array(
                'id'       => 'cr_en_widget',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable Footer Widget Area', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable Widget Area for Footer', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'enable'
            ),
            array(
                'id'       => 'cr_top_footer_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Top Footer Background Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #242424).', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_widget','=','enable'),
            ),
            array(
                'id'       => 'cr_top_footer_content_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Top Footer Content Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #bababa).', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_widget','=','enable'),
            ),
            array(
                'id'       => 'cr_top_footer_widget_head',
                'type'     => 'color',
                'title'    => esc_html__( 'Top Footer Widget Head Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #fff).', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_widget','=','enable'),
            ),
            array(
                'id'       => 'cr_top_footer_anchor_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Top Footer Anchor Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #bababa).', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_widget','=','enable'),
            ),
            array(
                'id'       => 'cr_top_footer_anchor_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Top Footer Anchor Hover Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #fff).', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_widget','=','enable'),
            ),
            array(
                'id'       => 'widget_layout',
                'type'     => 'image_select',
                'title'    => esc_html__('Main Layout', 'seclek'),
                'subtitle' => esc_html__('Select main content and sidebar alignment. Choose between 1, 2 or 3 column layout.', 'seclek'),
                'options'  => array(
                    '1'      => array(
                        'alt'   => '1 Column', 
                        'img'   => SECLEK_URI.'/inc/admin/images/col-1.jpg'
                    ),
                    '2'      => array(
                        'alt'   => '2 Column Left', 
                        'img'   => SECLEK_URI.'/inc/admin/images/col-2.jpg'
                    ),
                    '3'      => array(
                        'alt'   => '2 Column Right', 
                        'img'  => SECLEK_URI.'/inc/admin/images/col-3.jpg'
                    ),
                    '4'      => array(
                        'alt'   => '3 Column Middle', 
                        'img'   => SECLEK_URI.'/inc/admin/images/col-4.jpg'
                    ),
                ),
                'default' => '4',
                'required' => array( 'cr_en_widget', '=', 'enable' ),
            ),
            array(
                'id'       => 'cr_en_copyright',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Enable Copyright Section', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable copyright section in footer', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'enable'
            ),
            array(
                'id'       => 'cr_bottomfooter_bg_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Bottom Footer Background Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #383838).', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_copyright','=','enable'),
            ),
            array(
                'id'       => 'cr_bottomfooter_content_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Bottom Footer Content Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #878787).', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_copyright','=','enable'),
            ),
            array(
                'id'       => 'cr_bottomfooter_anchor_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Bottom Footer Anchor Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #fff).', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_copyright','=','enable'),
            ),
            array(
                'id'       => 'cr_bottomfooter_anchor_hover_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Bottom Footer Anchor Hover Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the theme (default: #fff).', 'seclek' ),
                'validate' => 'color',
                'required' => array('cr_en_copyright','=','enable'),
            ),
            array(
                'id'       => 'cr_copyright',
                'title'    => esc_html__( 'Enter copyright by default or html', 'seclek' ),
                'type'     => 'editor',
                'args'     => array(
                    'teeny'            => true,
                    'textarea_rows'    => 10
                ),
                'required' => array( 'cr_en_copyright', '=', 'enable' ),
                'default'  => '<span>Copyright &copy; 2018 <a href="#">Seclek</a>.</span>
                        <span>Design By<a href="https://themeregion.com"> Theme Region</a></span>'
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Breadcrumb Settings', 'seclek' ),
        'id'               => 'breadcrumb_setting',
        'desc'             => esc_html__( 'Breadcrumb settings for seclek theme!', 'seclek' ),
        'subsection'       => false,
        'icon'             => 'el el-picture',
        'fields'           => array(
            array(
                'id'       => 'cr_blog_breadcrumb',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Blog Page Breadcrumb', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable breadcrumb for blog page', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'enable'
            ),
            array(
                'id'       => 'cr_blog_bc_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Blog Breadcrumb Background Image', 'seclek' ),
                'compiler' => 'true',
                'required' => array( 'cr_blog_breadcrumb', '=', 'enable' ),
                'desc'     => esc_html__( 'Upload image size: 1366x286', 'seclek' ),
            ),
            array(
                'id'       => 'cr_blog_bc_title',
                'title'    => esc_html__( 'Enter Title for Breadcrumb', 'seclek' ),
                'type'     => 'text',
                'required' => array( 'cr_blog_breadcrumb', '=', 'enable' ),
            ),
            array(
                'id'       => 'cr_blog_bc_subtitle',
                'title'    => esc_html__( 'Enter Subtitle for Breadcrumb', 'seclek' ),
                'type'     => 'text',
                'required' => array( 'cr_blog_breadcrumb', '=', 'enable' ),
            ),
            array(
                'id'       => 'cr_blog_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Choose Title Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the title (default: #ffffff).', 'seclek' ),
                'default'  => '#ffffff',
                'validate' => 'color',
                'required' => array( 'cr_blog_breadcrumb', '=', 'enable' ),
            ),
            array(
                'id'       => 'cr_blog_subtitle_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Choose Subtitle Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the subtitle (default: #ffffff).', 'seclek' ),
                'default'  => '#ffffff',
                'validate' => 'color',
                'required' => array( 'cr_blog_breadcrumb', '=', 'enable' ),
            ),
            array(
                'id'   => 'single_blog_bc_settings',
                'type' => 'info',
                'style'=> 'warning',
                'desc' => esc_html__('Single blog post settings!', 'seclek'),
            ),
            array(
                'id'       => 'cr_blog_details_breadcrumb',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Blog Details Breadcrumb', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable breadcrumb for blog details page', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'enable'
            ),
            array(
                'id'       => 'cr_single_blog_bc_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Blog Details Breadcrumb Background Image', 'seclek' ),
                'compiler' => 'true',
                'required' => array( 'cr_blog_details_breadcrumb', '=', 'enable' ),
                'desc'     => esc_html__( 'Upload image size: 1366x286', 'seclek' ),
            ),
            array(
                'id'       => 'cr_single_blog_bc_title',
                'title'    => esc_html__( 'Enter Title for Breadcrumb', 'seclek' ),
                'type'     => 'text',
                'required' => array( 'cr_blog_details_breadcrumb', '=', 'enable' ),
            ),
            array(
                'id'       => 'cr_single_blog_bc_subtitle',
                'title'    => esc_html__( 'Enter Subtitle for Breadcrumb', 'seclek' ),
                'type'     => 'text',
                'required' => array( 'cr_blog_details_breadcrumb', '=', 'enable' ),
            ),
            array(
                'id'       => 'cr_sc_blog_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Choose Title Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the title (default: #ffffff).', 'seclek' ),
                'default'  => '#ffffff',
                'validate' => 'color',
                'required' => array( 'cr_blog_details_breadcrumb', '=', 'enable' ),
            ),
            array(
                'id'       => 'cr_sc_blog_subtitle_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Choose Subtitle Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the subtitle (default: #ffffff).', 'seclek' ),
                'default'  => '#ffffff',
                'validate' => 'color',
                'required' => array( 'cr_blog_details_breadcrumb', '=', 'enable' ),
            ),
            array(
                'id'   => 'single_archive_bc_settings',
                'type' => 'info',
                'style'=> 'warning',
                'desc' => esc_html__('Archive/Category/Tags/Search Page Breadcrumb Settings!', 'seclek'),
            ),
            array(
                'id'       => 'cr_archive_bc_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'General Breadcrumb Background Image', 'seclek' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload image size: 1366x286', 'seclek' ),
            ),
            array(
                'id'       => 'cr_archive_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Choose Title Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the title (default: #ffffff).', 'seclek' ),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'       => 'cr_archive_subtitle_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Choose Subtitle Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the subtitle (default: #ffffff).', 'seclek' ),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
        )
    ) );
    
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'WooCommerce Settings', 'seclek' ),
        'id'               => 'woocommerce_setting',
        'desc'             => esc_html__( 'Woocommerce settings for seclek theme!', 'seclek' ),
        'subsection'       => false,
        'icon'             => 'el el-shopping-cart',
        'fields'           => array(
            array(
                'id'       => 'tr_shop_breadcrumb',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Shop Page Breadcrumb', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable breadcrumb for shop', 'seclek' ),
                'options'  => array(
                    'on'  => 'Enable',
                    'off' => 'Disable',
                ),
                'default'  => 'on'
            ),            
            array(
                'id'       => 'tr_shop_bc_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Shop Page Breadcrumb Background Image', 'seclek' ),
                'compiler' => 'true',
                'required' => array( 'tr_shop_breadcrumb', '=', 'on' ),
                'desc'     => esc_html__( 'Upload image size: 1366x286', 'seclek' ),
            ),
            array(
                'id'       => 'tr_shop_bc_title',
                'title'    => esc_html__( 'Enter Title for Breadcrumb', 'seclek' ),
                'type'     => 'text',
                'required' => array( 'tr_shop_breadcrumb', '=', 'on' ),
                'default'  => esc_html__( 'Shop', 'seclek' ),
            ),
            array(
                'id'       => 'tr_shop_bc_subtitle',
                'title'    => esc_html__( 'Enter Subtitle for Breadcrumb', 'seclek' ),
                'type'     => 'text',
                'required' => array( 'tr_shop_breadcrumb', '=', 'on' ),
                'default'  => esc_html__( 'Lorem ipsum dolor sit amet consectetur.', 'seclek' ),
            ),
            array(
                'id'       => 'tr_shop_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Choose Title Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the title (default: #ffffff).', 'seclek' ),
                'default'  => '#ffffff',
                'validate' => 'color',
                'required' => array( 'tr_shop_breadcrumb', '=', 'on' ),
            ),
            array(
                'id'       => 'tr_shop_subtitle_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Choose Subtitle Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the subtitle (default: #ffffff).', 'seclek' ),
                'default'  => '#ffffff',
                'validate' => 'color',
                'required' => array( 'tr_shop_breadcrumb', '=', 'on' ),
            ),
            array(
                'id'       => 'tr_grid_column',
                'type'     => 'select',
                'title'    => esc_html__( 'Select Column', 'seclek' ),
                'options'  => array(
                    '2' => '2 Column',
                    '3' => '3 Column',
                    '4' => '4 Column',
                ),
                'default'  => '3'
            ),
            array(
                'id'       => 'tr_shop_sidebar',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Shop Sidebar', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable sidebar for shop page', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'enable'
            ),
            array(
                'id'      => 'tr_shop_page_content_num',
                'type'    => 'text',
                'title'   => esc_html__('How Many Products?', 'seclek'),
                'subtitle' => esc_html__( 'Enter how many products to load in shop page', 'seclek' ),
                'default' => '10',
            ),
            array(
                'id'   => 'single_shop_settings',
                'type' => 'info',
                'style'=> 'warning',
                'desc' => esc_html__('Single Shop settings!', 'seclek'),
            ),
            
            array(
                'id'       => 'tr_single_shop_details_sidebar',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Single Shop Details Sidebar', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable sidebar for Single Shop details page', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'enable'
            ),
            array(
                'id'       => 'tr_single_shop_details_breadcrumb',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Single Product Details Breadcrumb', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable breadcrumb for Single Shop details page', 'seclek' ),
                'options'  => array(
                    'on'  => 'Enable',
                    'off' => 'Disable',
                ),
                'default'  => 'on'
            ),
            array(
                'id'       => 'tr_single_shop_bc_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'Single Shop Details Breadcrumb Background Image', 'seclek' ),
                'compiler' => 'true',
                'required' => array( 'tr_single_shop_details_breadcrumb', '=', 'on' ),
                'desc'     => esc_html__( 'Upload image size: 1366x286', 'seclek' ),
            ),
            array(
                'id'       => 'tr_single_shop_bc_title',
                'title'    => esc_html__( 'Enter Title for Breadcrumb', 'seclek' ),
                'type'     => 'text',
                'required' => array( 'tr_single_shop_details_breadcrumb', '=', 'on' ),
                'default'  => esc_html__( 'Product Details', 'seclek' ),
            ),
            array(
                'id'       => 'tr_single_shop_bc_subtitle',
                'title'    => esc_html__( 'Enter Subtitle for Breadcrumb', 'seclek' ),
                'type'     => 'text',
                'required' => array( 'tr_single_shop_details_breadcrumb', '=', 'on' ),
                'default'  => esc_html__( 'Lorem ipsum dolor sit amet consectetur.', 'seclek' ),
            ),
            array(
                'id'       => 'tr_sc_shop_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Choose Title Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the title (default: #ffffff).', 'seclek' ),
                'default'  => '#ffffff',
                'validate' => 'color',
                'required' => array( 'tr_single_shop_details_breadcrumb', '=', 'on' ),
            ),
            array(
                'id'       => 'tr_sc_shop_subtitle_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Choose Subtitle Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the subtitle (default: #ffffff).', 'seclek' ),
                'default'  => '#ffffff',
                'validate' => 'color',
                'required' => array( 'tr_single_shop_details_breadcrumb', '=', 'on' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( '404 Settings', 'seclek' ),
        'id'               => '404_setting',
        'desc'             => esc_html__( 'Footer settings for seclek theme!', 'seclek' ),
        'subsection'       => false,
        'icon'             => 'el el-return-key',
        'fields'           => array(
            array(
                'id'       => 'cr_404_bc_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( '404 Background Image', 'seclek' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload image size: 1366x286', 'seclek' ),            ),
            array(
                'id'       => 'cr_404_title',
                'title'    => esc_html__( 'Enter 404 title here.', 'seclek' ),
                'type'     => 'text',
                'default'  => '404 Not Found'
            ),
            array(
                'id'       => 'cr_404_content',
                'title'    => esc_html__( 'Enter 404 content by default or html', 'seclek' ),
                'type'     => 'editor',
                'args'     => array(
                    'teeny'            => true,
                    'textarea_rows'    => 10
                ),
                'default'  => 'It looks like nothing was found at this location. Maybe try one of the links below or a search?'
            ),
            array(
                'id'       => 'cr_404_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Choose Title Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the title (default: #ffffff).', 'seclek' ),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Settings', 'seclek' ),
        'id'               => 'blog_setting',
        'desc'             => esc_html__( 'Blog settings for seclek theme!', 'seclek' ),
        'subsection'       => false,
        'icon'             => 'el el-pencil',
        'fields'           => array(
            array(
                'id'       => 'tr_blog_layout',
                'type'     => 'button_set',
                'title'    => __( 'Blog Layout', 'seclek' ),
                'subtitle' => __( 'Choose layout style for blog', 'seclek' ),
                'options'  => array(
                    'list' => 'List',
                    'grid' => 'Grid',
                ),
                'default'  => 'list'
            ),
            array(
                'id'       => 'grid_column',
                'type'     => 'select',
                'title'    => __( 'Select Column', 'seclek' ),
                'required' => array( 'tr_blog_layout', '=', 'grid' ),
                'options'  => array(
                    '2' => '2 Column',
                    '3' => '3 Column',
                    '4' => '4 Column',
                ),
                'default'  => '2'
            ),
            array(
                'id'       => 'cr_blog_sidebar',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Blog Sidebar', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable sidebar for blog page', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'enable'
            ),
            array(
                'id'      => 'cr_blog_page_content_num',
                'type'    => 'text',
                'title'   => esc_html__('How Many Posts?', 'seclek'),
                'subtitle' => esc_html__( 'Enter how many posts to load in blog page', 'seclek' ),
                'default' => '10',
            ),
            array(
                'id'       => 'cr_blog_order',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Blog Post Order', 'seclek' ),
                'subtitle' => esc_html__( 'Choose whether the post load in Ascending/Descending order', 'seclek' ),
                'options'  => array(
                    'ASC'  => 'ASC',
                    'DESC' => 'DESC',
                ),
                'default'  => 'DESC'
            ),
            array(
                'id'   => 'single_blog_settings',
                'type' => 'info',
                'style'=> 'warning',
                'desc' => esc_html__('Single blog post settings!', 'seclek'),
            ),
            array(
                'id'       => 'cr_blog_details_sidebar',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Blog Details Sidebar', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable sidebar for blog details page', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'enable'
            ),
            array(
                'id'       => 'cr_blog_category',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Blog Category', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable category show in blog details page', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'enable'
            ),
            array(
                'id'       => 'cr_blog_tag',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Blog Tag', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable author information in blog details page', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'enable'
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Potfolio Settings', 'seclek' ),
        'id'               => 'folio_setting',
        'desc'             => esc_html__( 'Portfolio settings for seclek theme!', 'seclek' ),
        'subsection'       => false,
        'icon'             => 'el el-film',
        'fields'           => array(
            array(
                'id'   => 'info_normal',
                'type' => 'info',
                'style' => 'critical',
                'icon' => 'el-icon-info-sign',
                'desc' => __('After Changing the slug name please refresh your permalink form Settings->Permalink->Click Save Changes.', 'seclek')
            ),
            array(
                'id'      => 'cr_folio_slug',
                'type'    => 'text',
                'title'   => __('Change Portfolio Slug Name', 'seclek'),
                'subtitle' => esc_html__('Change slug name of portfolio. Exp: instead of folio put your_slug.','seclek'),
            ),
            array(
                'id'   => 'single_folio_bc_settings',
                'type' => 'info',
                'style'=> 'warning',
                'desc' => esc_html__('Portfolio Page Breadcrumb Settings!', 'seclek'),
            ),
            array(
                'id'       => 'cr_folio_breadcrumb',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Porfolio Single Page Breadcrumb', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable breadcrumb for portfolio single page', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'enable'
            ),
            array(
                'id'       => 'cr_folio_bc_img',
                'type'     => 'media',
                'url'      => true,
                'title'    => esc_html__( 'General Breadcrumb Background Image', 'seclek' ),
                'compiler' => 'true',
                'desc'     => esc_html__( 'Upload image size: 1366x286', 'seclek' ),
                'default'  => array( 'url' => SECLEK_IMGDIR . 'bg/banner-bg.jpg' ),
                'required' => array( 'cr_folio_breadcrumb', '=', 'enable' ),
            ),
             array(
                'id'       => 'cr_folio_bc_title',
                'title'    => esc_html__( 'Enter Title for Breadcrumb', 'seclek' ),
                'type'     => 'text',
                'required' => array( 'cr_folio_breadcrumb', '=', 'enable' ),
            ),
            array(
                'id'       => 'cr_folio_bc_subtitle',
                'title'    => esc_html__( 'Enter Subtitle for Breadcrumb', 'seclek' ),
                'type'     => 'text',
                'required' => array( 'cr_folio_breadcrumb', '=', 'enable' ),
            ),
            array(
                'id'       => 'cr_folio_title_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Choose Title Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the title (default: #ffffff).', 'seclek' ),
                'default'  => '#ffffff',
                'validate' => 'color',
                'required' => array( 'cr_folio_breadcrumb', '=', 'enable' ),
            ),
            array(
                'id'       => 'cr_folio_subtitle_color',
                'type'     => 'color',
                'title'    => esc_html__( 'Choose Subtitle Color', 'seclek'),
                'subtitle' => esc_html__( 'Pick a color for the subtitle (default: #ffffff).', 'seclek' ),
                'default'  => '#ffffff',
                'validate' => 'color',
                'required' => array( 'cr_folio_breadcrumb', '=', 'enable' ),
            ),
            array(
                'id'       => 'cr_folio_sidebar',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Sidebar', 'seclek' ),
                'subtitle' => esc_html__( 'Enable/Disable sidebar for portfolio single page', 'seclek' ),
                'options'  => array(
                    'enable'  => 'Enable',
                    'disable' => 'Disable',
                ),
                'default'  => 'enable'
            ),
        )
    ) );    
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Social Icons', 'seclek' ),
        'id'               => 'social_setting',
        'desc'             => esc_html__( 'Social icon settings for seclek theme!', 'seclek' ),
        'subsection'       => false,
        'icon'             => 'el el-share',
        'fields'           => array(   
            array(
                'id'        => 'cr_facebook',
                'type'      => 'text',
                'title'     => esc_html__( 'Facebook Url', 'seclek' ),
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_twitter',
                'type'      => 'text',
                'title'     => esc_html__( 'Twiiter Url', 'seclek' ),                
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_gplus',
                'type'      => 'text',
                'title'     => esc_html__( 'Google Plus Url', 'seclek' ),                
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_linkedin',
                'type'      => 'text',
                'title'     => esc_html__( 'Linkedin Url', 'seclek' ),                
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_pinterest',
                'type'      => 'text',
                'title'     => esc_html__( 'Pinterest Url', 'seclek' ),                
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_dribble',
                'type'      => 'text',
                'title'     => esc_html__( 'Dribbble Url', 'seclek' ),                
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_instagram',
                'type'      => 'text',
                'title'     => esc_html__( 'Instagram Url', 'seclek' ),                
                'default'   => '#'
            ),
            array(
                'id'        => 'cr_behance',
                'type'      => 'text',
                'title'     => esc_html__( 'Behance Url', 'seclek' ),
                'default'   => '#'
            ),
        )
    ) );


    function remove_seclek_menu() {
        remove_submenu_page('tools.php','redux-about');
    }
    add_action( 'admin_menu', 'remove_seclek_menu',12 );

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'seclek_validate_callback_function' ) ) {
        function seclek_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }