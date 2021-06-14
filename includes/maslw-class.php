<?php

/**
* Adds Foo_Widget widget.
	*/
class MASLW_Widget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'maslw_widget', // Base ID
			esc_html__( 'Mobile App Store Links', 'maslw_domain' ), // Name
			array( 'description' => esc_html__( 'A widget that displays your mobile app store links', 'maslw_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		echo esc_html__( $instance['description'], 'maslw_domain' );
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Mobile App Store Links', 'maslw_domain' );
		$description = ! empty( $instance['description'] ) ? $instance['description'] : esc_html__( '', 'maslw_domain' );
		$iosLink = ! empty( $instance['iosLink'] ) ? $instance['iosLink'] : esc_url( '', 'maslw_domain' );
		$androidLink = ! empty( $instance['androidLink'] ) ? $instance['androidLink'] : esc_url( '', 'maslw_domain' );
		?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'maslw_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_attr_e( 'Description:', 'maslw_domain' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>"><?php echo esc_attr( $description ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'iosLink' ) ); ?>"><?php esc_attr_e( 'App Store Link:', 'maslw_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'iosLink' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'iosLink' ) ); ?>" type="url" value="<?php echo esc_attr( $iosLink ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'androidLink' ) ); ?>"><?php esc_attr_e( 'Google Play Link:', 'maslw_domain' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'androidLink' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'androidLink' ) ); ?>" type="url" value="<?php echo esc_attr( $androidLink ); ?>">
		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['description'] = ( ! empty( $new_instance['description'] ) ) ? sanitize_text_field( $new_instance['description'] ) : '';
		$instance['iosLink'] = ( ! empty( $new_instance['iosLink'] ) ) ? esc_url_raw( $new_instance['iosLink'] ) : '';
		$instance['androidLink'] = ( ! empty( $new_instance['androidLink'] ) ) ? esc_url_raw( $new_instance['androidLink'] ) : '';

		return $instance;
	}
} // class Foo_Widget
