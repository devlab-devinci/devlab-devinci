<?php
header("Content-type: text/css; charset: UTF-8");
global $seclekOptions;
?>
<?php if( !empty( $seclekOptions['cr_custom_skin'] ) ) : ?>
a:hover, a:focus,
.topbar-content .left-content ul li a:hover,
.tr-menu .navbar-nav li.active>.nav-link, .tr-menu .navbar-nav .nav-link:hover, 
.tr-menu .tr-dropdown.active>.icon, .tr-menu .tr-dropdown:hover>.icon,
.btn.btn-primary:hover, .section-before .btn.btn-primary:hover,
.service a, .video-link, .portfolio h2 a:hover, .entry-title a:hover,
.fun-facts span, .pricing-content .price h1, .pricing-content .price .btn.btn-primary:hover,
.pricing-content .price.active .btn.btn-primary:hover, .brand-slider .slick-arrow:hover, 
.tr-search .search-icon:hover,.close-search:hover, .tr-search button:hover,
.entry-content blockquote, .blog-two .entry-content .read-more,
.navbar-nav li.current>.nav-link, .navbar-toggler-icon,
.wpcf7 .wpcf7-form-control.wpcf7-submit:hover,

.lost_password a:hover,
.woocommerce nav.woocommerce-pagination ul li a, 
.woocommerce nav.woocommerce-pagination ul li span,
.woocommerce #respond input#submit.alt:hover, 
.woocommerce a.button.alt:hover, 
.woocommerce button.button.alt:hover, 
.woocommerce input.button.alt:hover,
.woocommerce-account .woocommerce-MyAccount-navigation ul li.is-active a,
.woocommerce-account .woocommerce-MyAccount-navigation ul li a:hover,
.wpcf7 .wpcf7-form-control.wpcf7-submit:hover,
.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, 
.woocommerce button.button:hover, .woocommerce input.button:hover,
.woocommerce ul.products li.product a.button,
.comment-form-rating a, .woocommerce-message::before,
.woocommerce-info::before, .icheckbox_minimal.checked:before,
.woocommerce-info a, .woocommerce ul.products li.product a.button:hover,
body.page-template-default .woo-login-popup-sc-modal .woocommerce-Button:hover,
body .woo-login-popup-sc-modal .woocommerce-LostPassword a:hover, 
body .woo-login-popup-sc-modal .woocommerce-plogin a:hover,
.product_meta a:hover,
.woocommerce ul.products li.product .added_to_cart:hover,
.tr-topbar .cart-content .tr-dropdown-menu li a.remove:hover,
.woocommerce-mini-cart__buttons .button:hover,
.tr-menu .tr-dropdown:hover>.nav-link,
.woocommerce .woocommerce-widget-layered-nav-list li a:hover, 
.woocommerce ul.product_list_widget li a:hover  {
	color: <?php echo esc_html( $seclekOptions['cr_custom_skin'] ); ?>;
}



.btn.btn-primary, .slick-dots li:hover button:before, 
.slick-dots li.slick-active button:before,
.video-link:hover, .experience-info .experience:hover,
.post-time, .post-time span:after, .subscribe-content,
.pricing-content .price.active .btn.btn-primary,
.widget_search .search-submit, .pagination li a:hover, 
.pagination li.active a, .pagination li.active span, .not-found .search-submit,
.blog-two .entry-content .read-more:hover, .wpcf7 .wpcf7-form-control.wpcf7-submit,
.mc4wp-form-fields input[type="submit"],

.woocommerce nav.woocommerce-pagination ul li a:focus, 
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span.current,
.woocommerce #respond input#submit, 
.woocommerce a.button, 
.woocommerce button.button, 
.woocommerce input.button,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce span.onsale,
.woocommerce div.product .woocommerce-tabs ul.tabs li:hover a,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce .psingle_add_to_cart_button,
.woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover,
body.page-template-default .woo-login-popup-sc-modal .woo-login-popup-sc-close a:hover:before,
body.page-template-default .woo-login-popup-sc-modal .woo-login-popup-sc-close a:hover:after,
.woocommerce a.remove:hover, .woocommerce #respond input#submit.alt, 
.woocommerce a.button.alt, .woocommerce button.button.alt, 
.woocommerce input.button.alt, .woocommerce-product-search button,
.woocommerce ul.products li.product .added_to_cart,
.woocommerce ul.product_list_widget li a.remove:hover,
.woocommerce-mini-cart__buttons .button,
.tr-menu .cart-content.tr-dropdown .cr_cart {
	background-color: <?php echo esc_html( $seclekOptions['cr_custom_skin'] ); ?>;
}


.btn.btn-primary, .widget_search .search-field:focus,
.form-control:focus, .blog-two .entry-content .read-more,
.wpcf7 .wpcf7-form-control:focus, .wpcf7 .wpcf7-form-control.wpcf7-submit, 
.wpcf7 .wpcf7-form-control.wpcf7-submit:hover,
.woocommerce form .form-row input.input-text:focus,
.woocommerce-page #content table.cart td.actions .input-text:focus, 
.woocommerce-page table.cart td.actions .input-text:focus,
.wpcf7 .wpcf7-form-control:focus,
.wpcf7 .wpcf7-form-control.wpcf7-submit:hover,
.woocommerce-product-search input[type="search"]:focus,
.woocommerce form .form-row textarea:focus,
.woocommerce #review_form #respond textarea:focus,
.woocommerce-message, .woocommerce-info,
.woocommerce form .form-row .input-text:focus, 
.woocommerce-page form .form-row .input-text:focus,
body.page-template-default .woo-login-popup-sc-modal .woocommerce-Button,
.woocommerce #respond input#submit.alt, 
.woocommerce a.button.alt, 
.woocommerce button.button.alt, 
.woocommerce input.button.alt,
.woocommerce ul.products li.product .added_to_cart,
.woocommerce #respond input#submit, 
.woocommerce a.button, 
.woocommerce button.button, 
.woocommerce input.button,
.woocommerce-mini-cart__buttons .button,
.onsale:before,
.onsale:after {
	border-color: <?php echo esc_html( $seclekOptions['cr_custom_skin'] ); ?>;
}

.navbar-toggler, .mc4wp-form-fields input[type="submit"] { 
	border: 1px solid <?php echo esc_html( $seclekOptions['cr_custom_skin'] ); ?>; 
}

.tr-search input:focus {
	border-bottom-color: <?php echo esc_html( $seclekOptions['cr_custom_skin'] ); ?>;
}

.section-before:before,
.contact-content.section-before:before {
	background-color: <?php echo esc_html( $seclekOptions['cr_skin_color_rgba']['rgba'] ); ?>
}

.page-content .search-form .search-submit { background-color: <?php echo esc_html( $seclekOptions['cr_custom_skin'] ); ?>; }
.page-content .search-form .search-field:focus { border-color: <?php echo esc_html( $seclekOptions['cr_custom_skin'] ); ?>; }
.page-content .search-form .search-field { border: 1px solid <?php echo esc_html( $seclekOptions['cr_custom_skin'] ); ?>; }

.onsale:before{
	border-color: transparent transparent <?php echo esc_html( $seclekOptions['cr_custom_skin'] ); ?> <?php echo esc_html( $seclekOptions['cr_custom_skin'] ); ?>;
}

.onsale:after{
	border-color: <?php echo esc_html( $seclekOptions['cr_custom_skin'] ); ?> transparent transparent <?php echo esc_html( $seclekOptions['cr_custom_skin'] ); ?>;
}

<?php endif; ?>
