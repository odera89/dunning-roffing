<?php
/**
 * Register widget areas
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_sidebar_widgets' ) ) :
function foundationpress_sidebar_widgets() {
	register_sidebar(array(
		'id' => 'sidebar-widgets',
		'name' => __( 'Sidebar widgets', 'foundationpress' ),
		'description' => __( 'Drag widgets to this sidebar container.', 'foundationpress' ),
		'before_widget' => '<article id="%1$s" class="widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

	register_sidebar(array(
		'id' => 'before-footer-widgets',
		'name' => __( 'Before Footer widgets', 'foundationpress' ),
		'description' => __( 'Drag widgets to this footer container', 'foundationpress' ),
		'before_widget' => '<article id="%1$s" class="medium-12 columns widget %2$s text-center">',
		'after_widget' => '</article>',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
	));

	register_sidebar(array(
		'id' => 'footer-widgets',
		'name' => __( 'Footer widgets', 'foundationpress' ),
		'description' => __( 'Drag widgets to this footer container', 'foundationpress' ),
		'before_widget' => '<article id="%1$s" class="medium-12 columns widget %2$s text-center">',
		'after_widget' => '</article>',
		'before_title' => '<h6>',
		'after_title' => '</h6>',
	));
}

add_action( 'widgets_init', 'foundationpress_sidebar_widgets' );
endif;
