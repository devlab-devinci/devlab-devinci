<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Seclek
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php do_action('seclek_favicon'); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php do_action('seclek_preloader'); ?>
	<?php get_template_part( 'inc/header/content', 'topbar' ); ?>
    <?php get_template_part( 'inc/header/content', 'header' ); ?>
	
	<!-- Breadcrumb -->
    <?php 
    if( !is_404() ): 
		do_action('seclek_breadcrumb'); 
	endif;	
    ?>

	<?php 
	$pageClass = '';
    if ( is_single() ) $pageClass = 'main-content blog-details ';
    elseif ( is_home() || ( is_home() && is_frontpage() ) ) $pageClass = 'main-content seclek-home';
    elseif ( is_page_template() == 'tpl-fullwidth.php' ) $pageClass = 'cr-fw-page ';
    elseif ( is_404() ) $pageClass = 'seclek-404';
	else $pageClass = 'main-content ';
	?>

	<div id="seclek-content" class="<?php echo esc_attr( $pageClass ); ?>">
