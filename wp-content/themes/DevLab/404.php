<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Seclek
 */

get_header();
global $seclekOptions;

$bcImg              = '';
$bcTitle            = '';
$postTitle          = '';
$bcContent         = '';
$bcTitleColor       = '#fff';

if ( isset( $seclekOptions['cr_404_bc_img']['url'] ) && !empty( $seclekOptions['cr_404_bc_img']['url'] ) ) :
    $bcImg = "background-image:url('".$seclekOptions['cr_404_bc_img']['url']."')";
else : 
    $bcImg = "";
endif;

if ( isset( $seclekOptions['cr_404_content'] ) && !empty( $seclekOptions['cr_404_content'] ) ) :
    $bcContent = $seclekOptions['cr_404_content'];
else : 
    $bcContent = "";
endif;

if ( isset( $seclekOptions['cr_404_title'] ) && !empty( $seclekOptions['cr_404_title'] ) ) :
    $bcTitle = $seclekOptions['cr_404_title'];
else : 
    $bcTitle = "";
endif; 

if ( isset( $seclekOptions['cr_404_title_color'] ) && !empty( $seclekOptions['cr_404_title_color'] ) ) :
    $bcTitleColor = $seclekOptions['cr_404_title_color'];
else : 
    $bcTitleColor = "#ffffff";
endif; 
?>

<div class="tr-breadcrumb">
    <div class="breadcrumb-content section-before text-center bg-image" style="<?php echo wp_specialchars_decode( esc_html( $bcImg ) ); ?>">
         <div class="error-404 not-found">
            <div class="page-content">
                <h1><?php echo esc_html__( '404', 'seclek' ); ?></h1>
                <h2><?php echo wp_specialchars_decode( esc_html( $bcTitle ) ); ?></h2>
                <?php if( $bcContent != '' ): ?>
                    <?php echo wp_specialchars_decode( esc_html( $bcContent ), ENT_QUOTES ); ?>
				<?php else: ?>
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'seclek' ); ?></p>
				<?php endif; ?>
				<?php get_search_form(); ?>
				<a class="btn btn-primary" href="<?php echo esc_url( home_url('/') ); ?>"><?php esc_html_e( 'Return to Home' , 'seclek' ); ?></a>
            </div><!-- .page-content -->
        </div><!-- /.not-found --> 
    </div><!-- /.breadcrumb-content -->
</div><!-- /.tr-breadcrumb --> 

<?php
get_footer();
