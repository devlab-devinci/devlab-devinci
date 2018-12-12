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

            <div class="right-content">
                <?php if( !is_array( $page_meta_data ) && isset( $seclekOptions['cr_en_button'] ) &&  $seclekOptions['cr_en_button'] == 'enable' ) : ?>
                    <?php if( isset( $seclekOptions['cr_hr_btn'] ) &&  $seclekOptions['cr_hr_btn'] != '' ) : 
                            $btn_text = $seclekOptions['cr_hr_btn'];
                        endif; 
                        $btn_url = ( isset( $seclekOptions['cr_hr_btn_url'] ) &&  $seclekOptions['cr_hr_btn_url'] != '' ) ? $seclekOptions['cr_hr_btn_url'] : '#';
                    ?>
                    <span>
                        <a href="<?php echo esc_url( $btn_url ); ?>" class="btn btn-primary"><?php echo esc_html( $btn_text ); ?></a>
                    </span>
                    <?php elseif( is_array( $page_meta_data ) && isset( $page_meta_data['sk_btn_mini'] ) && $page_meta_data['sk_btn_mini'] == 'button' ) : ?>
                        <?php if( isset( $seclekOptions['cr_hr_btn'] ) &&  $seclekOptions['cr_hr_btn'] != '' ) : 
                                $btn_text = $seclekOptions['cr_hr_btn'];
                            endif; 
                            $btn_url = ( isset( $seclekOptions['cr_hr_btn_url'] ) &&  $seclekOptions['cr_hr_btn_url'] != '' ) ? $seclekOptions['cr_hr_btn_url'] : '#';
                        ?>
                        <span>
                            <a href="<?php echo esc_url( $btn_url ); ?>" class="btn btn-primary"><?php echo esc_html( $btn_text ); ?></a>
                        </span>
                    <?php elseif( is_array( $page_meta_data ) && isset( $page_meta_data['sk_btn_mini'] ) &&  $page_meta_data['sk_btn_mini'] == 'mini-cart' ) : ?>
                        <?php if ( class_exists('WooCommerce') ) : ?>
                            <?php echo seclek_woocommerce_header_cart(); ?>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php if( isset( $seclekOptions['cr_en_button'] ) &&  $seclekOptions['cr_en_button'] == 'enable' ) : ?>
                            <?php if( isset( $seclekOptions['cr_hr_btn'] ) &&  $seclekOptions['cr_hr_btn'] != '' ) : 
                                    $btn_text = $seclekOptions['cr_hr_btn'];
                                endif; 
                                $btn_url = ( isset( $seclekOptions['cr_hr_btn_url'] ) &&  $seclekOptions['cr_hr_btn_url'] != '' ) ? $seclekOptions['cr_hr_btn_url'] : '#';
                            ?>
                            <span>
                                <a href="<?php echo esc_url( $btn_url ); ?>" class="btn btn-primary"><?php echo esc_html( $btn_text ); ?></a>
                            </span>
                    <?php endif; ?>            
                <?php endif; ?>            
                <?php if( isset( $seclekOptions['cr_en_search'] ) &&  $seclekOptions['cr_en_search'] == 'enable' ) : ?>  
                    <div class="tr-search">
                        <div class="search-icon">
                            <i class="fa fa-search"></i>
                        </div>
                        <div class="search-form text-center open-search">
                            <div class="close-search">
                                <span><i class="fa fa-times-circle" aria-hidden="true"></i></span>
                            </div>
                            <form role="search" method="get" id="search" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <input type="search" class="form-control" autocomplete="off" name="s" placeholder="<?php echo __( 'Search&#46;&#46;&#46;', 'seclek' ); ?>" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>">
                                <button type="submit" ><i class="fa fa-search"></i></button>
                            </form>
                        </div><!-- /s form -->                    
                    </div><!-- /.tr-search -->
                <?php endif; ?> 
            </div><!-- /.find-option -->

        </div><!-- /.container -->
    </nav>                                       
</div><!-- /.tr-menu -->