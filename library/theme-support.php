<?php
/**
 * Register theme support for languages, menus, post-thumbnails, post-formats etc.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_theme_support' ) ) :
function foundationpress_theme_support() {
	// Add language support
	load_theme_textdomain( 'foundationpress', get_template_directory() . '/languages' );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add menu support
	add_theme_support( 'menus' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
	add_theme_support( 'post-thumbnails' );

	// RSS thingy
	add_theme_support( 'automatic-feed-links' );

	// Add post formats support: http://codex.wordpress.org/Post_Formats
	// add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat') );

	// Declare WooCommerce support per http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
	add_theme_support( 'woocommerce' );

	// Add foundation.css as editor style https://codex.wordpress.org/Editor_Style
	add_editor_style( 'assets/stylesheets/foundation.css' );
}

add_action( 'after_setup_theme', 'foundationpress_theme_support' );
endif;

// ACF options page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();	
}

add_filter('acf/settings/google_api_key', function () {
    return 'AIzaSyDUg0PbTmF1GGA80nkyQXI747sxikuHL8Y';
});

//Fix Contact Form 7 Submit Button
remove_action( 'wpcf7_init', 'wpcf7_add_form_tag_submit' );
add_action( 'wpcf7_init', 'wpcf7_add_shortcode_submit_button' );

function wpcf7_add_shortcode_submit_button() {
	wpcf7_add_form_tag( 'submit', 'wpcf7_submit_button_shortcode_handler', 10 );
}

function wpcf7_submit_button_shortcode_handler( $tag ) {
	$tag = new WPCF7_FormTag( $tag );

	$class = wpcf7_form_controls_class( $tag->type );

	$atts = array();

	$atts['class'] = $tag->get_class_option( $class );
	$atts['id'] = $tag->get_id_option();
	$atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );

	$value = isset( $tag->values[0] ) ? $tag->values[0] : '';

	if ( empty( $value ) ) {
		$value = __( 'Send', 'contact-form-7' );
	}

	$atts['type'] = 'submit';
	$atts['value'] = $value;

	$atts = wpcf7_format_atts( $atts );

	// $html = sprintf( '<input %1$s />', $atts );
	$html = sprintf( '<button %1$s data-text="%2$s"><span>%2$s</span><i></i></button>', $atts, $value );

	return $html;
}

// Allow SVG files to upload
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');