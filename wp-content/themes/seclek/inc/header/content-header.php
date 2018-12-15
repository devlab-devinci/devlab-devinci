<?php 
global $seclekOptions; $page_meta_data = get_post_meta(get_the_ID(), '_page_information', true ); ?>
<?php $noBtn = ( !isset( $seclekOptions['cr_en_button'] ) || ( isset( $seclekOptions['cr_en_button'] ) &&  $seclekOptions['cr_en_button'] == 'disable' ) ) ? 'no-btn' : ''; ?>
<div class="tr-menu <?php echo esc_attr( $noBtn ); ?>">
    <nav class="navbar navbar-expand-lg">
        <div class="container">                       
            <?php if ( !empty( $seclekOptions['cr_logo_header']['url'] ) ) : ?>
                <a class="navbar-brand external" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img class="img-fluid" src="<?php echo esc_url( $seclekOptions['cr_logo_header']['url'] ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                </a>        
            <?php else : ?>
                <a class="navbar-brand external" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php
                    if ( is_front_page() && is_home() ) : ?>
                        <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                    <?php else : ?>
                        <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                    <?php
                    endif;
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                        <p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
                    <?php
                    endif; ?>
                </a>
            <?php endif; ?>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-align-justify"></i></span>
            </button> 
            <?php if ( !is_array( $page_meta_data ) && has_nav_menu( 'primary-nav' ) ) : ?>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'primary-nav',
                        'container'         => '',
                        'menu_class'        => 'navbar-nav',
                        'walker'            => new wp_bootstrap_navwalker()
                    ) );
                ?>                
            </div><!-- #site-navigation -->
            <?php elseif ( is_array( $page_meta_data ) && isset( $page_meta_data['sk_menu_id'] ) && $page_meta_data['sk_menu_id'] != '' ) : ?>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <?php
                    wp_nav_menu( array(
                        'menu'           => $page_meta_data['sk_menu_id'],
                        'container'         => '',
                        'menu_class'        => 'navbar-nav',
                        'walker'            => new wp_bootstrap_navwalker()
                    ) );
                ?>                
            </div><!-- #site-navigation -->
            <?php else : ?>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <?php
                        wp_nav_menu( array(                            
                            'theme_location'    => 'primary-nav',
                            'container'         => '',
                            'menu_class'        => 'navbar-nav',
                            'walker'            => new wp_bootstrap_navwalker()
                        ) );
                    ?>                
                </div><!-- #site-navigation -->
            <?php endif; ?>

        </div><!-- /.container -->
    </nav>                                       
</div><!-- /.tr-menu -->