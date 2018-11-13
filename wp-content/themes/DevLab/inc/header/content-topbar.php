<?php global $seclekOptions; $page_meta_data = get_post_meta(get_the_ID(), '_page_information', true ); ?>
<?php if( isset( $seclekOptions['cr_en_topbar'] ) && $seclekOptions['cr_en_topbar'] == 'enable' ): ?>
<div class="tr-topbar">
    <div class="topbar-content clearfix">
        <div class="container">
            <div class="left-content">
                <ul class="global-list">
                <?php if( isset( $seclekOptions['cr_enable_Email'] ) && $seclekOptions['cr_enable_Email'] != '' ): ?>
                    <li><i class="fa fa-envelope-open-o" aria-hidden="true"></i><a href="mailto:<?php echo esc_html( $seclekOptions['cr_enable_Email'] ); ?>"><?php echo esc_html( $seclekOptions['cr_enable_Email'] ); ?></a></li>
                <?php endif; ?>
                <?php if( isset( $seclekOptions['cr_enable_mobile'] ) && $seclekOptions['cr_enable_mobile'] != '' ): ?>
                    <li><i class="fa fa-volume-control-phone" aria-hidden="true"></i><a href="tel:<?php echo esc_html( $seclekOptions['cr_enable_mobile'] ); ?>"><?php echo esc_html( $seclekOptions['cr_enable_mobile'] ); ?></a></li>
                <?php endif; ?>                
                </ul>
            </div>
            <div class="right-content">                
                <?php if( isset( $seclekOptions['cr_social_link'] ) && $seclekOptions['cr_social_link'] == 'on' ) : ?>
                <ul class="global-list">
                    <?php if( isset( $seclekOptions['cr_social_label'] ) && $seclekOptions['cr_social_label'] != '' ): ?>
                    <li><?php echo esc_html( $seclekOptions['cr_social_label'] ); ?></li>
                    <?php endif; ?>
                    <?php if( isset( $seclekOptions['cr_top_facebook'] ) && $seclekOptions['cr_top_facebook'] != '' ): ?>
                        <li><a href="<?php echo esc_html( $seclekOptions['cr_top_facebook'] ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if( isset( $seclekOptions['cr_top_twitter'] ) && $seclekOptions['cr_top_twitter'] != '' ): ?>
                        <li><a href="<?php echo esc_html( $seclekOptions['cr_top_twitter'] ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if( isset( $seclekOptions['cr_top_gplus'] ) && $seclekOptions['cr_top_gplus'] != '' ): ?>
                        <li><a href="<?php echo esc_html( $seclekOptions['cr_top_gplus'] ); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if( isset( $seclekOptions['cr_top_instagram'] ) && $seclekOptions['cr_top_instagram'] != '' ): ?>
                        <li><a href="<?php echo esc_html( $seclekOptions['cr_top_instagram'] ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if( isset( $seclekOptions['cr_top_pinterest'] ) && $seclekOptions['cr_top_pinterest'] != '' ): ?>
                        <li><a href="<?php echo esc_html( $seclekOptions['cr_top_pinterest'] ); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if( isset( $seclekOptions['cr_top_linkedin'] ) && $seclekOptions['cr_top_linkedin'] != '' ): ?>
                        <li><a href="<?php echo esc_html( $seclekOptions['cr_top_linkedin'] ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if( isset( $seclekOptions['cr_top_youtube'] ) && $seclekOptions['cr_top_youtube'] != '' ): ?>
                        <li><a href="<?php echo esc_html( $seclekOptions['cr_top_youtube'] ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if( isset( $seclekOptions['cr_top_behance'] ) && $seclekOptions['cr_top_behance'] != '' ): ?>
                        <li><a href="<?php echo esc_html( $seclekOptions['cr_top_behance'] ); ?>"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if( isset( $seclekOptions['cr_top_soundcloud'] ) && $seclekOptions['cr_top_soundcloud'] != '' ): ?>
                        <li><a href="<?php echo esc_html( $seclekOptions['cr_top_soundcloud'] ); ?>"><i class="fa fa-soundcloud" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if( isset( $seclekOptions['cr_top_github'] ) && $seclekOptions['cr_top_github'] != '' ): ?>
                        <li><a href="<?php echo esc_html( $seclekOptions['cr_top_github'] ); ?>"><i class="fa fa-github" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                    <?php if( isset( $seclekOptions['cr_top_skype'] ) && $seclekOptions['cr_top_skype'] != '' ): ?>
                        <li><a href="<?php echo esc_html( $seclekOptions['cr_top_skype'] ); ?>"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                    <?php endif; ?>
                </ul>
                <?php endif; ?>
                <?php if (  is_array( $page_meta_data ) && isset( $page_meta_data['sk_btn_mini'] ) &&  $page_meta_data['sk_btn_mini'] != 'mini-cart' ) : ?>
                    <?php if ( class_exists('WooCommerce') && isset($seclekOptions['cr_en_mini_cart']) && $seclekOptions['cr_en_mini_cart'] == 'enable' ) : ?>
                        <?php echo seclek_woocommerce_header_cart(); ?>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ( isset($seclekOptions['cr_en_login']) && $seclekOptions['cr_en_login'] == 'enable' ) : ?>
                    <?php if ( is_user_logged_in() ) { ?>
                        <a class="woo-account" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','seclek'); ?>"><i class="fa fa-user"></i> <?php echo esc_html__( 'My Account', 'seclek' ); ?></a>
                     <?php } 
                     else { ?>
                        <a class="woo-signin" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login / Register','seclek'); ?>"><i class="fa fa-user"></i> <?php echo esc_html__( 'Login/Register', 'seclek' ); ?></a>
                    <?php } ?>
                <?php endif; ?>
            </div>
        </div><!-- /.container -->                
    </div><!-- /.topbar-content -->
</div><!-- /.tr-topbar -->
<?php endif; ?>