<?php
class seclek_image_title extends WP_Widget {

	function __construct()
	{
		$widget_ops = array('classname' => 'seclek_image_title', 'description' => '');

		$control_ops = array('id_base' => 'seclek_image_title-widget');

		parent::__construct('seclek_image_title-widget', 'Seclek: Image with title', $widget_ops, $control_ops);
	}

	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		printf( "%s", $args['before_widget'] );
		?>
        <div class="convenience">
            <div class="icon">
            	<?php if(isset($instance['img_url']) && $instance['img_url']): ?>
					<img src="<?php echo esc_url( $instance['img_url'] ); ?>" class="img-fluid" alt="Icon"/>
				<?php endif; ?>
            </div>
            <span><?php if($title) { echo esc_html( $title ); } ?></span>
        </div>
		<?php
		printf( "%s", $args['after_widget'] );
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['img_url'] = $new_instance['img_url'];
		
		

		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => '', 'img_url' => '', 'info' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php _e( 'Title:', 'seclek' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" value="<?php echo esc_html( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id('img_url')); ?>"><?php _e( 'Image URL:', 'seclek' ); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_id('img_url') ); ?>" name="<?php echo esc_attr( $this->get_field_name('img_url')); ?>" value="<?php echo esc_html( $instance['img_url'] ); ?>" />
		</p>		
	<?php
	}
}


function seclek_image_title_load_widgets()
{
	register_widget('seclek_image_title');
}
add_action('widgets_init', 'seclek_image_title_load_widgets');
?>