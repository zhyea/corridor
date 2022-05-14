<?php

function corridor_customize_settings( $wp_customize ) {

	// Add Sections for Post Settings.
	$wp_customize->add_section( 'corridor_section', array(
		'title'    => esc_html__( 'Blog Settings', 'corridor' ),
		'priority' => 360,
	) );

	// Add Setting and Control for Excerpt Length.
	$wp_customize->add_setting( 'corridor_options[excerpt_length]', array(
		'default'           => 25,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'corridor_options[excerpt_length]', array(
		'label'    => esc_html__( 'Excerpt Length', 'corridor' ),
		'section'  => 'corridor_section',
		'settings' => 'corridor_options[excerpt_length]',
		'type'     => 'text',
		'priority' => 180,
	) );

}

add_action( 'customize_register', 'corridor_customize_settings' );