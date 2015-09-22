<?php
/*
Plugin Name: One Theme Company
Plugin URI: http://www.onethemecompany.com/
Description: Adds Functionality to One Theme Websites
Author: David Sudarma
Version: 1
Author URI: http://www.onethemecompany.com/
*/


class OneImageShare extends WP_Widget {
	function OneImageShare()	{
		$widget_ops = array('classname' => 'OneImageShare', 'description' => 'Displays most recent image post format with share.' );
		$this->WP_Widget('OneImageShare', 'One Image Share', $widget_ops);
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
		$title = $instance['title'];
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
			</label>
		</p>
	<?php
	}

	function update($new_instance, $old_instance) {	
		$instance = $old_instance;
		$instance['title'] = $new_instance['title'];
		return $instance;
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;
		$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

		if (!empty($title))
			echo $before_title . $title . $after_title;;

		// WIDGET CODE GOES HERE
		$OneImageQuery = new WP_Query(
			array(
				'post_type' => 'post',
				'posts_per_page' => 1,
				'tax_query' => array(
					array(
						'taxonomy' => 'post_format',
						'field'    => 'slug',
						'terms'    => array( 'post-format-image' ),
					),
				),
			)
		);

		// The Loop
		if ( $OneImageQuery->have_posts() ) {
			while ( $OneImageQuery->have_posts() ) {
				$OneImageQuery->the_post();
				if (has_post_thumbnail()) {
					echo '
					<div class="one-recent-image-wrap">
						<a href="#one-share-popup" class="one-share-image">';
							the_post_thumbnail('quote-widget');
					echo '<span class="one-share-trigger">Share This</span></a>
					</div>
					';

					echo '
					<div id="one-share-popup" style="display: none;">';
						the_post_thumbnail('large');
						one_sharing_all();
					'</div>';
				}
			}
		} else {
			// no posts found
		}
		/* Restore original Post Data */
		wp_reset_postdata();

		echo $after_widget;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("OneImageShare");') );?>