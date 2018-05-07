<?php
/**
 * Recent posts widget
 * Get recent posts and display in widget
 *
 * @package GreenTech Lite
 */

/**
 * Recent posts class.
 */
class Greentech_Lite_Recent_Posts_Widget extends WP_Widget {
	/**
	 * Default widget options.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Widget setup.
	 */
	public function __construct() {
		$this->defaults = array(
			'title'     => esc_html__( 'Recent Posts', 'greentech-lite' ),
			'number'    => 3,
			'show_date' => true,
		);
		parent::__construct(
			'greentech-lite-recent-posts',
			esc_html__( 'Greentech Lite: Recent Posts', 'greentech-lite' ),
			array(
				'description' => esc_html__( 'A widget that displays your recent posts from all categories or a category', 'greentech-lite' ),
			)
		);
	}

	/**
	 * How to display the widget on the screen.
	 *
	 * @param array $args     Widget parameters.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		$query    = new WP_Query( array(
			'posts_per_page' => absint( $instance['number'] ),
		) );
		if ( ! $query->have_posts() ) {
			return;
		}

		echo $args['before_widget']; // WPCS: XSS OK.

		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		if ( $title ) {
			echo $args['before_title'], $title , $args['after_title']; // WPCS: XSS OK.
		}
		?>
		<div class="widget-content">
			<?php
			$i = 1;
			$date_format = get_option( 'date_format' );
			if ( empty( $date_format ) ) {
				$date_format = 'j F Y';
			}
			while ( $query->have_posts() ) : $query->the_post(); ?>
				<?php
				if ( $i > absint( $instance['number'] ) ) {
					break;
				}
				?>
				<article class="aside-post">
					<?php if ( has_post_thumbnail() ) : ?>
						<a class="image" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'greentech-lite-recent-posts' ); ?></a>
					<?php endif; ?>
					<div class="info">
						<h5 class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<time class="time" datetime="<?php echo esc_attr( get_the_time( $date_format ) ); ?>"><?php echo esc_attr( get_the_time( $date_format ) ); ?></time>
					</div>
				</article>

			<?php
			$i++;
			endwhile;
			?>
		</div>
		<?php
		wp_reset_postdata();

		echo $args['after_widget']; // WPCS: XSS OK.
	}

	/**
	 * Update the widget settings.
	 *
	 * @param array $new_instance New widget instance.
	 * @param array $old_instance Old widget instance.
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title']  = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = absint( $new_instance['number'] );

		return $instance;
	}

	/**
	 * Widget form.
	 *
	 * @param array $instance Widget instance.
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'greentech-lite' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show:', 'greentech-lite' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" value="<?php echo absint( $instance['number'] ); ?>" size="3">
		</p>
		<?php
	}
}
