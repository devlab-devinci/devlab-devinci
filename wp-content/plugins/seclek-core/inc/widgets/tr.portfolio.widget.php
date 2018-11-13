<?php
class Seclek_Recent_Posts_Widget extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'recent-post', 'description' => '');
        $control_ops = array('id_base' => 'seclek_recent_posts_widget');
        parent::__construct('seclek_recent_posts_widget', 'Seclek: Recent Posts', $widget_ops, $control_ops);
    }

    function widget( $args, $instance ){
        extract($args);
        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts', 'seclek' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $post_type = $instance['post_type'];
        $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : -1;
        if ( ! $number )
            $number = -1;
        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
        
        $args = array(
            'post_type'              => array( $post_type ),
            'post_status'            => array( 'publish' ),
            'ignore_sticky_posts'    => true,
            'posts_per_page'         => $number,
        );
        $r = new WP_Query( $args );
        if( $r->have_posts() ) :
            printf ( '%s', $before_widget );
            ?>
            <?php if ( $title ) : printf("%s %s %s",$before_title, $title, $after_title); endif;?>
            <ul class="tr-list">
                <?php while ( $r->have_posts() ) : $r->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
                    <?php if ( $show_date ) : ?>
                        <span class="tr-widget-post-date"><?php echo get_the_date(); ?></span>
                    <?php endif; ?>
                    </li>
                <?php endwhile; ?>
            </ul>
            
            <?php
            printf ( '%s', $after_widget );
            wp_reset_postdata();
        endif;
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['post_type'] = $new_instance['post_type'];
        $instance['number'] = (int) $new_instance['number'];
        $instance['show_date'] = (bool) $new_instance['show_date'];

        return $instance;
    }

    function form( $instance ) {
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $post_type = isset( $instance['post_type'] ) ? esc_attr( $instance['post_type'] ) : '';
        $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
        $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
        ?>

        <p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'seclek' ); ?></label>
        <input class="widefat" id="<<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_html( $title ); ?>" /></p>

        <p><label for="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>"><?php _e( 'Post Type:', 'seclek' ); ?></label>
        <select name="<?php echo esc_attr( $this->get_field_name( 'post_type' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'post_type' ) ); ?>">
            <option value="post" <?php echo ($post_type == 'post') ? 'selected' : '' ?>>Post</option>
            <option value="folio" <?php echo ($post_type == 'folio') ? 'selected' : '' ?>>Seclek Portfolio</option>
        </select>

        <p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Number of posts to show:', 'seclek' ); ?></label>
        <input id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_html( $number ); ?>" size="3" /></p>

        <p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" />
        <label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php _e( 'Display post date?', 'seclek' ); ?></label></p>  
        
    <?php
    }
}


function seclek_recent_posts() {
    register_widget('seclek_recent_posts_widget');
}
add_action('widgets_init', 'seclek_recent_posts');