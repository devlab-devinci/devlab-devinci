<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Seclek
 */

if ( ! is_active_sidebar( 'default-sidebar' ) ) { 
	return;
}
if ( class_exists('WooCommerce') ) :
	if ( is_shop() || is_product() || is_product_category() || is_product_tag() ){
		if ( ! is_active_sidebar( 'sidebar-shop' ) ) {
			return;
		}	
	}
endif;
?>

<div class="tr-sidebar">
	<div class="widget-area">
		<?php
		if ( class_exists('WooCommerce') && ( is_shop() || is_product() || is_product_category() || is_product_tag() ) )  dynamic_sidebar( 'sidebar-shop' );
		else dynamic_sidebar( 'default-sidebar' );
		?>
	</div>
</div>
