<?php

/* Seclek Demo Data Import Setup */
if ( !function_exists( 'seclek_import_data_setup' ) ){
    function seclek_import_data_setup( $default_settings ) {
        $default_settings['parent_slug'] = 'themes.php';
        $default_settings['page_title']  = esc_html__( 'Seclek Demo Import' , 'seclek' );
        $default_settings['menu_title']  = esc_html__( 'Import Demo Data' , 'seclek' );
        $default_settings['capability']  = 'import';
        $default_settings['menu_slug']   = 'tr-demo-import';

        return $default_settings;
    }
    add_filter( 'pt-ocdi/plugin_page_setup', 'seclek_import_data_setup' );
}

if ( !function_exists( 'seclek_import_files' ) ){

    function seclek_import_files() {
        return array(
            array(
                'import_file_name'             => 'Seclek Demo',
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'inc/demo-data/demo-data.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'inc/demo-data/widgets.wie',
                'local_import_redux'           => array(
                    array(
                      'file_path'   => trailingslashit( get_template_directory() ) . 'inc/demo-data/theme-options.json',
                      'option_name' => 'seclekOptions',
                    ),
                ),                
                'import_preview_image_url'     => get_template_directory_uri() . '/inc/demo-data/screenshot.png',
                'import_notice'                => esc_html__( 'You can find all the demo content in your theme package folder under demo-data if one click don\'t work on your server.', 'seclek' ),
                'preview_url'                  => 'https://themes.themeregion.com/seclek/',
            ),
        );
    }
    add_filter( 'pt-ocdi/import_files', 'seclek_import_files' );
}

if ( ! function_exists( 'seclek_after_content_import_execution' ) ) {
    function seclek_after_content_import_execution( $selected_import_files, $import_files, $selected_index ) {

        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Seclek Nav', 'nav_menu' );

        set_theme_mod( 'nav_menu_locations', array(
                'primary-nav'  => $main_menu->term_id,           
            )
        );

        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Home' );
        $blog_page_id  = get_page_by_title( 'Blog' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $blog_page_id->ID );

    }
    add_action('pt-ocdi/after_content_import_execution', 'seclek_after_content_import_execution', 3, 99 );
}

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );