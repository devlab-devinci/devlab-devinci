<?php
/**
 * Template Name: Fullwidth Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package seclek
 */

get_header(); ?>
<?php
	while ( have_posts() ) : the_post();
		the_content();
	endwhile; // End of the loop.
	?>
<?php
get_footer();
