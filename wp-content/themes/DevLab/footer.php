<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Seclek
 */
global $seclekOptions;
$footerColClass = '';
$footerWieEnabler = $footerWieEnabler1 = $footerWieEnabler2 = $footerWieEnabler3 = $footerWieEnabler4 = false;
$footerCol = ( isset( $seclekOptions['widget_layout'] ) && !empty( $seclekOptions['widget_layout'] ) ) ? $seclekOptions['widget_layout'] : 4;
if ( $footerCol == 4 ) $footerColClass = 'col-lg-3 col-md-3';
if ( $footerCol == 3 ) $footerColClass = 'col-lg-4 col-md-4';
if ( $footerCol == 2 ) $footerColClass = 'col-lg-6 col-md-6';
if ( $footerCol == 1 ) $footerColClass = 'col-lg-12 col-md-12';

$footerWieEnabler1 = ( !is_active_sidebar( 'footer-widget-area-1' ) != 1 ) ? true : false;
$footerWieEnabler2 = ( !is_active_sidebar( 'footer-widget-area-2' ) != 1 ) ? true : false;
$footerWieEnabler3 = ( !is_active_sidebar( 'footer-widget-area-3' ) != 1 ) ? true : false;
$footerWieEnabler4 = ( !is_active_sidebar( 'footer-widget-area-4' ) != 1 ) ? true : false;

$footerWieEnabler = ( $footerWieEnabler1 == true || $footerWieEnabler2 == true || $footerWieEnabler3 == true || $footerWieEnabler4 == true ) ? true : false;
?>
	</div><!-- #content -->
    <div class="tr-footer">
        <div class="footer-content">
            <?php if( isset( $seclekOptions['cr_en_widget'] ) && $seclekOptions['cr_en_widget'] == 'enable' && $footerWieEnabler == true ) : ?>
            <div class="footer-top section-padding">
                <div class="container">
                    <div class="row">
                    <?php for ( $i=1; $i<=$footerCol; $i++ ) : ?>
                        <div class="footer-widget <?php echo esc_attr( $footerColClass ); ?>">
                            <?php 
                                $widgetArea = 'footer-widget-area-'. $i;
                                if ( is_active_sidebar( $widgetArea ) ) {
                                    dynamic_sidebar( $widgetArea );
                                }
                            ?>
                        </div>
                    <?php endfor; ?>
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.footer-top -->
            <?php endif; ?>
            <?php if( isset( $seclekOptions['cr_en_copyright'] ) && $seclekOptions['cr_en_copyright'] == 'enable' ) : ?>
            <div class="footer-bottom text-center">
                <div class="container">
                    <?php if( isset( $seclekOptions['cr_copyright'] ) ) : ?>
                        <span><?php echo wp_specialchars_decode( esc_html( $seclekOptions['cr_copyright'] ), ENT_QUOTES ); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

<?php wp_footer(); ?>

</body>
</html>
