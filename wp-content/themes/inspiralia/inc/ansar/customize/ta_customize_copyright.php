<?php
// Footer copyright section
function inspiralia_footer_copyright( $wp_customize ) {
	$wp_customize->add_panel('inspiralia_copyright', array(
		'priority' => 455,
		'capability' => 'edit_theme_options',
		'title' => __('Footer Settings', 'inspiralia'),
	) );

	$wp_customize->add_section('copyright_section_one', array(
        'title' => __('Footer Copyright Settings','inspiralia'),
        'description' => __('This is a Footer section.','inspiralia'),
        'priority' => 35,
		'panel' => 'inspiralia_copyright',
    ) );

    // hide meta content
    $wp_customize->add_setting( 'hide_copyright',array(
        'default' => 'true',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control('hide_copyright', array(
        'label' => __('Hide/Show Copyright Text','inspiralia'),
        'description'   => __('Hide/Show Footer Copyright Text', 'inspiralia'),
        'section' => 'copyright_section_one',
        'type' => 'radio',
        'choices' => array('true'=>__('On','inspiralia'),'false'=>__('Off','inspiralia')),
    ) );

	$wp_customize->add_setting('inspiralia_footer_copyright_setting', array(
		'sanitize_callback' => 'inspiralia_footer_copyright_sanitize_text',

    ) );
    $wp_customize->add_control('inspiralia_footer_copyright_setting', array(
        'label' => __('Copyright text','inspiralia'),
        'section' => 'copyright_section_one',
        'type' => 'textarea',
    ) );


	//Footer social link
	$wp_customize->add_section('copyright_social_icon', array(
        'title' => __('Social Link','inspiralia'),
        'priority' => 45,
		'panel' => 'inspiralia_copyright',
    ) );

	//Hide Footer Social Icons
	$wp_customize->add_setting('hide_footer_icon', array(
        'default' => 'true',
		'sanitize_callback' => 'sanitize_text_field',
    ) );
	$wp_customize->add_control('hide_footer_icon', array(
        'label' => __('Hide/Show Social Icons','inspiralia'),
        'description' => __('Hide/Show Footer Social Icons', 'inspiralia'),
        'section' => 'copyright_social_icon',
        'type' => 'radio',
        'choices' => array('true'=>__('On','inspiralia'),'false'=>__('Off','inspiralia')),
    ) );

	// Facebook link
	$wp_customize->add_setting('social_link_facebook', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
	$wp_customize->add_control('social_link_facebook', array(
        'label' => __('Facebook URL','inspiralia'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting(
        'Social_link_facebook_tab',array(
        'sanitize_callback' => 'inspiralia_copyright_sanitize_checkbox',
	));
	$wp_customize->add_control('Social_link_facebook_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','inspiralia'),
        'section' => 'copyright_social_icon',
    ) );

	//Twitter link
	$wp_customize->add_setting( 'social_link_twitter', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
	$wp_customize->add_control( 'social_link_twitter', array(
        'label' => __('Twitter URL','inspiralia'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting( 'Social_link_twitter_tab',array(
	   'sanitize_callback' => 'inspiralia_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'Social_link_twitter_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','inspiralia'),
        'section' => 'copyright_social_icon',
    ) );

	//Linkdin link
	$wp_customize->add_setting( 'social_link_linkedin', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
	$wp_customize->add_control( 'social_link_linkedin', array(
        'label' => __('Linkedin URL','inspiralia'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting(
        'Social_link_linkedin_tab',array(
        'sanitize_callback' => 'inspiralia_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'Social_link_linkedin_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','inspiralia'),
        'section' => 'copyright_social_icon',
    ) );

	//Google-plus link
	$wp_customize->add_setting('social_link_google', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
	$wp_customize->add_control('social_link_google', array(
        'label' => __('Google-plus URL','inspiralia'),
        'section' => 'copyright_social_icon',
        'type' => 'text',
    ) );

	$wp_customize->add_setting(
        'Social_link_google_tab',array(
        'sanitize_callback' => 'inspiralia_copyright_sanitize_checkbox',
	) );

	$wp_customize->add_control('Social_link_google_tab', array(
        'type' => 'checkbox',
        'label' => __('Open Link New tab/window','inspiralia'),
        'section' => 'copyright_social_icon',
    ) );


	function inspiralia_footer_copyright_sanitize_text( $input ) {

    return wp_kses_post( force_balance_tags( $input ) );

	}

	function inspiralia_copyright_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

}
add_action( 'customize_register', 'inspiralia_footer_copyright' );
?>