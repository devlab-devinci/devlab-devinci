<?php
add_action( 'widgets_init', function(){
    register_widget( 'Seclek_Social' );
});

class Seclek_Social extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'cr_social',
            'description' => 'Set your timings for your office/restaurant etc.',
        );

        parent::__construct( 'seclek_social', 'Seclek: Social', $widget_ops );
    }


    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {

        global $seclekOptions;
        // outputs the content of the widget
        printf ( '%s', $args['before_widget'] );
        extract( $instance );
        if ( ! empty( $instance['title'] ) ) {
            printf( '%s', $args['before_title'] );
            echo apply_filters( 'widget_title', $instance['title'] );
            printf( '%s', $args['after_title'] );
        }
        echo '<div class="footer-social">
                <ul class="global-list">'; ?>
        <?php if( $seclekOptions['cr_facebook'] !='' ): ?>
            <li><a href="<?php echo esc_url( $seclekOptions['cr_facebook'] ); ?>"><i class="fa fa-facebook"  aria-hidden="true"></i></a></li>
        <?php endif; ?>
        <?php if( $seclekOptions['cr_twitter'] !='' ) : ?>
            <li><a href="<?php echo esc_url( $seclekOptions['cr_twitter'] ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <?php endif; ?>
        <?php if( $seclekOptions['cr_gplus'] !='' ) : ?>
            <li><a href="<?php echo esc_url( $seclekOptions['cr_gplus'] ); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        <?php endif; ?>
        <?php if( $seclekOptions['cr_linkedin'] !='' ) : ?>
            <li><a href="<?php echo esc_url( $seclekOptions['cr_linkedin'] ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
        <?php endif; ?>
        <?php if( $seclekOptions['cr_pinterest'] !='' ) : ?>
            <li><a href="<?php echo esc_url( $seclekOptions['cr_pinterest'] ); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
        <?php endif; ?>
        <?php if( $seclekOptions['cr_dribble'] !='' ) : ?>
            <li><a href="<?php echo esc_url( $seclekOptions['cr_dribble'] ); ?>"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
        <?php endif; ?>
        <?php if( $seclekOptions['cr_instagram'] !='' ) : ?>
            <li><a href="<?php echo esc_url( $seclekOptions['cr_instagram'] ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        <?php endif; ?>
        <?php if( $seclekOptions['cr_behance'] !='' ) : ?>
            <li><a href="<?php echo esc_url( $seclekOptions['cr_behance'] ); ?>"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
        <?php endif;
        echo '</ul></div>';
        printf ( '%s', $args['after_widget'] );
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';        
        ?>
            <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'seclek' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>
        <?php
    }


    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        foreach( $new_instance as $key => $value )
        {
            $updated_instance[$key] = sanitize_text_field($value);
        }

        return $updated_instance;
    }
}