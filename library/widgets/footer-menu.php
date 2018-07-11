<?php
/**
* Plugin Name: Footer Menu - Truthwebdesign
* Plugin URI: http://hunor.me/
* Description: Custom footer menu plugin for authentix
* Version: 1.0
* Author: Hunor Madaras
* Author URI: http://hunor.me/
**/

if ( ! class_exists( 'Ax_Footer_Menu' ) ) {

	// Load and Register widget
	add_action('widgets_init', create_function('', 'return register_widget("Ax_Footer_Menu");'));

	class Ax_Footer_Menu extends WP_Widget {

		// constructor
	  function __construct() {
			parent::WP_Widget(false, $name = __('Footer Menu - Truthweb', 'ax_footer_menu') );
	  }

	  // widget form creation
	  public function form($instance) {
	  	$nav_menu = isset($instance['nav_menu']) ? $instance['nav_menu'] : '';
	  	$nav_menu_class = isset( $instance['nav_menu_class'] ) ? $instance['nav_menu_class'] : 'sub-menu';
	  	$copyright = isset($instance['copyright']) ? $instance['copyright'] : '';

	  	// Get menus list
			$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );

			// If no menu exists, direct the user to create some.
			if ( ! $menus ) {
				echo '<p>' . sprintf( __( 'No menus have been created yet. <a href="%s">Create some</a>.', 'ax_footer_menu' ), admin_url( 'nav-menus.php' ) ) . '</p>';

				return;
			}
	  	?>
	    <p>
	    	<label for="<?php echo $this->get_field_id( 'nav_menu' ); ?>"><?php _e( 'Select Menu:', 'ax_footer_menu' ); ?></label>
				<select id="<?php echo $this->get_field_id( 'nav_menu' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu' ); ?>">
					<?php foreach ( $menus as $menu ) {
						$selected = $nav_menu == $menu->term_id ? ' selected="selected"' : '';
							echo '<option' . $selected . ' value="' . $menu->term_id . '">' . $menu->name . '</option>';
						} ?>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'nav_menu_class' ); ?>"><?php _e( 'Menu Class:', 'ax_footer_menu' ) ?>
				</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'nav_menu_class' ); ?>" name="<?php echo $this->get_field_name( 'nav_menu_class' ); ?>" value="<?php echo esc_attr( $nav_menu_class ); ?>"/>
				<small><?php _e( 'CSS classes to use for the ul menu element. Separate classes by a space.', 'ax_footer_menu' ); ?></small>
			</p>

			<p>
				<label for="<?php echo $this->get_field_id( 'copyright' ); ?>"><?php _e( 'Copyright Text:', 'ax_footer_menu' ) ?></label>
				<textarea class="widefat" id="<?php echo $this->get_field_id('copyright'); ?>" name="<?php echo $this->get_field_name('copyright'); ?>" rows="7" cols="20" ><?php echo $copyright; ?></textarea>
			</p>
	    <?php 
	  }

	  // widget update
	  public function update($new_instance, $old_instance) {
	    $instance['nav_menu'] = (int)$new_instance['nav_menu'];
	    $instance['nav_menu_class'] = $this->update_classes( $new_instance );
	    $instance['copyright'] = $new_instance['copyright'];

	    return $instance;
	  }

	  /**
		 *
		 * Update classes.
		 *
		 * Update menu classes and sanitizes them.
		 *
		 * @since 1.5
		 * @link https://wordpress.org/support/topic/multiple-css-classes?replies=7#post-7319138
		 *
		 * @param $new_instance
		 *
		 * @return string
		 *
		 */

		public function update_classes( $new_instance ) {
			$output  = '';
			$classes = explode( " ", preg_replace( '/\s\s+/', ' ', $new_instance['nav_menu_class'] ) );
			foreach ( $classes as $class ) {
				$output .= sanitize_html_class( $class ) . ' ';
			}
			// In some cases an extra space can occur if a bad style is stripped out by sanitize_html_class
			$output                 = trim( preg_replace( '/\s\s+/', ' ', $output ), ' ' );
			$instance['nav_menu_class'] = $output;

			return $output;
		}

	  // widget display
		public function widget($args, $instance) {
			// extract( $args );

			$nav_menu = wp_get_nav_menu_object($instance['nav_menu']);

			if (!$nav_menu) {
				return;
			}

			echo $before_widget;

			echo '<div class="medium-12 columns widget widget_footer_menu text-center">';

			// Display the widget
			echo '<div class="footer-menu">';

			wp_nav_menu( array(
				'fallback_cb' => '',
				'menu'        => $nav_menu,
				'menu_class'  => esc_attr( $instance['nav_menu_class'] ),
				'container'   => false
			) );

			echo '</div>';

			if(!empty($instance['copyright'])) {
				echo '<div class="copyright">';
				echo '<p>'.$instance['copyright'].'</p>';
				echo '</div>';
			}

			echo '</div>';
			
			echo $after_widget;
		
		}

	}

}