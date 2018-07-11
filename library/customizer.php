<?php

add_action( 'customize_register', 'custom_theme_options' );

function custom_theme_options( $wp_customize ) {

	$wp_customize->add_setting('theme_logo');
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'theme_logo',
		array(
			'label' => 'Upload Logo',
			'section' => 'title_tagline',
			'settings' => 'theme_logo',
		) 
	));
}