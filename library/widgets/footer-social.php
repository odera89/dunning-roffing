<?php
/**
* Plugin Name: Footer Social - Truthwebdesign
* Plugin URI: http://hunor.me/
* Description: Custom footer social plugin for authentix
* Version: 1.0
* Author: Hunor Madaras
* Author URI: http://hunor.me/
**/

if ( ! class_exists( 'TRUTH_Footer_Social' ) ) {

	// Load and Register widget
	add_action('widgets_init', create_function('', 'return register_widget("TRUTH_Footer_Social");'));

	class TRUTH_Footer_Social extends WP_Widget {

		// constructor
	  function __construct() {
			parent::WP_Widget(false, $name = __('Footer Social - Truthweb', 'truth_footer_social') );
	  }

	  // widget form creation
	  public function form($instance) {
	  	$facebook_link = isset($instance['facebook_link']) ? $instance['facebook_link'] : '';
	  	$twitter_link = isset($instance['twitter_link']) ? $instance['twitter_link'] : '';
	  	$youtube_link = isset($instance['youtube_link']) ? $instance['youtube_link'] : '';
	  	$linkedin_link = isset($instance['linkedin_link']) ? $instance['linkedin_link'] : '';
	  	$instagram_link = isset($instance['instagram_link']) ? $instance['instagram_link'] : '';
	  	$googleplus_link = isset($instance['googleplus_link']) ? $instance['googleplus_link'] : '';
	  	?>

	  	<p>
	  		<label for""><?php _e('Facebook Link:', 'truth_footer_social'); ?></label>
	  		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'facebook_link' ); ?>" name="<?php echo $this->get_field_name( 'facebook_link' ); ?>" value="<?php echo esc_url( $facebook_link ); ?>"/>
	  	</p>

	  	<p>
	  		<label for""><?php _e('Twitter Link:', 'truth_footer_social'); ?></label>
	  		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'twitter_link' ); ?>" name="<?php echo $this->get_field_name( 'twitter_link' ); ?>" value="<?php echo esc_url( $twitter_link ); ?>"/>
	  	</p>

	  	<p>
	  		<label for""><?php _e('Youtube Link:', 'truth_footer_social'); ?></label>
	  		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'youtube_link' ); ?>" name="<?php echo $this->get_field_name( 'youtube_link' ); ?>" value="<?php echo esc_url( $youtube_link ); ?>"/>
	  	</p>

	  	<p>
	  		<label for""><?php _e('Linkedin Link:', 'truth_footer_social'); ?></label>
	  		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'linkedin_link' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_link' ); ?>" value="<?php echo esc_url( $linkedin_link ); ?>"/>
	  	</p>

	  	<p>
	  		<label for""><?php _e('Instagram Link:', 'truth_footer_social'); ?></label>
	  		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'instagram_link' ); ?>" name="<?php echo $this->get_field_name( 'instagram_link' ); ?>" value="<?php echo esc_url( $instagram_link ); ?>"/>
	  	</p>

	  	<p>
	  		<label for""><?php _e('Google+ Link:', 'truth_footer_social'); ?></label>
	  		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'googleplus_link' ); ?>" name="<?php echo $this->get_field_name( 'googleplus_link' ); ?>" value="<?php echo esc_url( $googleplus_link ); ?>"/>
	  	</p>

	    <?php 
	  }

	  // widget update
	  public function update($new_instance, $old_instance) {
	  	$instance['facebook_link'] = esc_html($new_instance['facebook_link']);
	  	$instance['twitter_link'] = esc_html($new_instance['twitter_link']);
	  	$instance['youtube_link'] = esc_html($new_instance['youtube_link']);
	  	$instance['linkedin_link'] = esc_html($new_instance['linkedin_link']);
	  	$instance['instagram_link'] = esc_html($new_instance['instagram_link']);
	    $instance['googleplus_link'] = esc_html($new_instance['googleplus_link']);

	    return $instance;
	  }

	  // widget display
		public function widget($args, $instance) {

			echo $before_widget;

			echo '<div class="medium-4 columns widget widget_footer_social">';

			if(!empty($instance['facebook_link']) || !empty($instance['twitter_link']) || !empty($instance['youtube_link']) || !empty($instance['linkedin_link'])) {
				echo '<div class="footer_social">';
				echo '<ul class="no-bullet">';
				if(!empty($instance['facebook_link'])) {
				echo '<li><a href="'.$instance['facebook_link'].'"><i class="fa fa-facebook"></i></a></li>';
				}
				if(!empty($instance['twitter_link'])) {
				echo '<li><a href="'.$instance['twitter_link'].'"><i class="fa fa-twitter"></i></a></li>';
				}
				if(!empty($instance['youtube_link'])) {
				echo '<li><a href="'.$instance['youtube_link'].'"><i class="fa fa-youtube"></i></a></li>';
				}
				if(!empty($instance['linkedin_link'])) {
				echo '<li><a href="'.$instance['linkedin_link'].'"><i class="fa fa-linkedin"></i></a></li>';
				}
				if(!empty($instance['instagram_link'])) {
				echo '<li><a href="'.$instance['instagram_link'].'"><i class="fa fa-instagram"></i></a></li>';
				}
				if(!empty($instance['googleplus_link'])) {
				echo '<li><a href="'.$instance['googleplus_link'].'"><i class="fa fa-google-plus"></i></a></li>';
				}
				echo '</ul>';
				echo '</div>';
			}

			echo '</div>';
			
			echo $after_widget;
		
		}

	}

}