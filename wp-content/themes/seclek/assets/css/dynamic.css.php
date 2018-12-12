<?php
header("Content-type: text/css; charset: UTF-8");
global $seclekOptions;

echo esc_html( $seclekOptions['cr_css_editor'] );
?>
body{
    <?php if( !empty( $seclekOptions['cr_body_typo']['font-family'] ) ) : ?>
	font-family: '<?php echo esc_html( $seclekOptions['cr_body_typo']['font-family'] ); ?>';
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_body_typo']['font-size'] ) ) : ?>
	font-size: <?php echo esc_html( $seclekOptions['cr_body_typo']['font-size'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_body_typo']['font-weight'] ) ) : ?>
	font-weight: <?php echo esc_html( $seclekOptions['cr_body_typo']['font-weight'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_body_typo']['color'] ) ) : ?>
	color: <?php echo esc_html( $seclekOptions['cr_body_typo']['color'] ); ?>;
    <?php endif; ?>
}
h1, h2, h3, h4, h5, h6 {
    <?php if( !empty( $seclekOptions['cr_head_typo']['font-family'] ) ) : ?>
	font-family: '<?php echo esc_html( $seclekOptions['cr_head_typo']['font-family'] ); ?>';
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_head_typo']['font-weight'] ) ) : ?>
	font-weight: <?php echo esc_html( $seclekOptions['cr_head_typo']['font-weight'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_head_typo']['color'] ) ) : ?>
	color: <?php echo esc_html( $seclekOptions['cr_head_typo']['color'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_head_typo']['text-transform'] ) ) : ?>
    text-transform: <?php echo esc_html( $seclekOptions['cr_head_typo']['text-transform'] ); ?>;
    <?php endif; ?>
}
h1 {
    <?php if( !empty( $seclekOptions['cr_h1_typo']['font-size'] ) ) : ?>
	font-size: <?php echo esc_html( $seclekOptions['cr_h1_typo']['font-size'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_h1_typo']['color'] ) ) : ?>
	color: <?php echo esc_html( $seclekOptions['cr_h1_typo']['color'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_h1_typo']['text-transform'] ) ) : ?>
    text-transform: <?php echo esc_html( $seclekOptions['cr_h1_typo']['text-transform'] ); ?>;
    <?php endif; ?>
}
h2 {
    <?php if( !empty( $seclekOptions['cr_h2_typo']['font-size'] ) ) : ?>
	font-size: <?php echo esc_html( $seclekOptions['cr_h2_typo']['font-size'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_h2_typo']['color'] ) ) : ?>
	color: <?php echo esc_html( $seclekOptions['cr_h2_typo']['color'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_h2_typo']['text-transform'] ) ) : ?>
    text-transform: <?php echo esc_html( $seclekOptions['cr_h2_typo']['text-transform'] ); ?>;
    <?php endif; ?>
}
h3 {
    <?php if( !empty( $seclekOptions['cr_h3_typo']['font-size'] ) ) : ?>
	font-size: <?php echo esc_html( $seclekOptions['cr_h3_typo']['font-size'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_h3_typo']['color'] ) ) : ?>
	color: <?php echo esc_html( $seclekOptions['cr_h3_typo']['color'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_h3_typo']['text-transform'] ) ) : ?>
    text-transform: <?php echo esc_html( $seclekOptions['cr_h3_typo']['text-transform'] ); ?>;
    <?php endif; ?>
}
h4 {
    <?php if( !empty( $seclekOptions['cr_h4_typo']['font-size'] ) ) : ?>
	font-size: <?php echo esc_html( $seclekOptions['cr_h4_typo']['font-size'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_h4_typo']['color'] ) ) : ?>
	color: <?php echo esc_html( $seclekOptions['cr_h4_typo']['color'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_h4_typo']['text-transform'] ) ) : ?>
    text-transform: <?php echo esc_html( $seclekOptions['cr_h4_typo']['text-transform'] ); ?>;
    <?php endif; ?>
}
h5 {
    <?php if( !empty( $seclekOptions['cr_h5_typo']['font-size'] ) ) : ?>
	font-size: <?php echo esc_html( $seclekOptions['cr_h5_typo']['font-size'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_h5_typo']['color'] ) ) : ?>
	color: <?php echo esc_html( $seclekOptions['cr_h5_typo']['color'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_h5_typo']['text-transform'] ) ) : ?>
    text-transform: <?php echo esc_html( $seclekOptions['cr_h5_typo']['text-transform'] ); ?>;
    <?php endif; ?>
}
h6 {
    <?php if( !empty( $seclekOptions['cr_h6_typo']['font-size'] ) ) : ?>
	font-size: <?php echo esc_html( $seclekOptions['cr_h6_typo']['font-size'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_h6_typo']['color'] ) ) : ?>
	color: <?php echo esc_html( $seclekOptions['cr_h6_typo']['color'] ); ?>;
    <?php endif; ?>
    <?php if( !empty( $seclekOptions['cr_h6_typo']['text-transform'] ) ) : ?>
    text-transform: <?php echo esc_html( $seclekOptions['cr_h6_typo']['text-transform'] ); ?>;
    <?php endif; ?>
}
div#preloader { 
    background-color: <?php echo esc_html( $seclekOptions['cr_pl_bg'] ); ?>;
}

.tr-menu , .tr-menu .navbar-nav { 
    background-color: <?php echo esc_html( $seclekOptions['cr_menu_bg'] ); ?>;
}
.tr-dropdown-menu { 
    background-color: <?php echo esc_html( $seclekOptions['cr_drop_menu_bg'] ); ?>;
}

.tr-menu .navbar-nav>li>.nav-link { 
    color: <?php echo esc_html( $seclekOptions['cr_menu_nav'] ); ?>;
}
.navbar-nav li.current>.nav-link, 
.tr-menu .navbar-nav li.active>.nav-link,  
.tr-menu .tr-dropdown.active>.icon { 
    color: <?php echo esc_html( $seclekOptions['cr_nav_active'] ); ?>;
}
.tr-menu .navbar-nav .nav-link:hover { 
    color: <?php echo esc_html( $seclekOptions['cr_nav_hover'] ); ?>;
}
.tr-menu .navbar-nav .tr-dropdown-menu li.active .nav-link { 
    color: <?php echo esc_html( $seclekOptions['cr_drop_nav_active'] ); ?>;
}
.tr-menu .navbar-nav .tr-dropdown-menu .nav-link:hover { 
    color: <?php echo esc_html( $seclekOptions['cr_drop_nav_hover'] ); ?>;
}
.topbar-content { 
    background-color: <?php echo esc_html( $seclekOptions['cr_top_bg'] ); ?>;
}
.topbar-content .left-content ul li a, .topbar-content .right-content li { 
    color: <?php echo esc_html( $seclekOptions['cr_top_content_color'] ); ?>;
}
.topbar-content .left-content ul li I, .topbar-content .right-content li a { 
	color: <?php echo esc_html( $seclekOptions['cr_top_icon_color'] ); ?>;
}
.tr-menu .btn.btn-primary {
    border-color: <?php echo esc_html( $seclekOptions['cr_hr_btn_border'] ); ?>;
    background-color: <?php echo esc_html( $seclekOptions['cr_hr_btn_bg'] ); ?>;
    color: <?php echo esc_html( $seclekOptions['cr_hr_btn_text'] ); ?>;
}

.tr-menu .btn.btn-primary:hover {
    color: <?php echo esc_html( $seclekOptions['cr_hr_btn_text_hover'] ); ?>;
    background-color: <?php echo esc_html( $seclekOptions['cr_hr_btn_bg_hover'] ); ?>;
    border-color: <?php echo esc_html( $seclekOptions['cr_hr_btn_border_hover'] ); ?>;
}

.tr-menu .btn.btn-primary:before {
    background-color: <?php echo esc_html( $seclekOptions['cr_hr_btn_bg_hover'] ); ?>;
}

.tr-menu .tr-search .search-icon {
    color: <?php echo esc_html( $seclekOptions['cr_search_icon'] ); ?>;
}
.tr-menu .tr-search .search-icon:hover {
    color: <?php echo esc_html( $seclekOptions['cr_search_icon_hover'] ); ?>;
}
.footer-bottom {
    color: <?php echo esc_html( $seclekOptions['cr_bottomfooter_content_color'] ); ?>;
    background-color: <?php echo esc_html( $seclekOptions['cr_bottomfooter_bg_color'] ); ?>;
}
.footer-bottom a {
    color: <?php echo esc_html( $seclekOptions['cr_bottomfooter_anchor_color'] ); ?>;
}
.footer-bottom a:hover {
    color: <?php echo esc_html( $seclekOptions['cr_bottomfooter_anchor_hover_color'] ); ?>;
}
.footer-top{
    color: <?php echo esc_html( $seclekOptions['cr_top_footer_content_color'] ); ?>;
    background-color: <?php echo esc_html( $seclekOptions['cr_top_footer_bg_color'] ); ?>;    
}
.footer-top .footer-widget h3{
    color: <?php echo esc_html( $seclekOptions['cr_top_footer_widget_head'] ); ?>;
}
.footer-top a, .footer-social li a{
    color: <?php echo esc_html( $seclekOptions['cr_top_footer_anchor_color'] ); ?>;
}
.footer-top a:hover{
    color: <?php echo esc_html( $seclekOptions['cr_top_footer_anchor_hover_color'] ); ?>;
}