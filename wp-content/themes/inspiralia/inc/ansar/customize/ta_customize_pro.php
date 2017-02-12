<?php
//Pro Button

function inspiralia_pro_customizer( $wp_customize ) {
    class WP_Pro_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */

    public function render_content() {
    ?>
     <div class="ta-pro-box">
       <a href="<?php echo esc_url( __('https://themeansar.com/themes/inspiralia/', 'inspiralia'));?>" target="_blank" class="upgrade" id="review_pro"> <?php _e( 'Upgrade To Pro','inspiralia' ); ?></a>

    </div>
    <?php
    }
}
    $wp_customize->add_section( 'inspiralia_pro_section' , array(
		'title' => __('Themeansar Store', 'inspiralia'),
		'priority' => 2100,
   	) );

    $wp_customize->add_setting('upgrade_pro', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new WP_Pro_Customize_Control( $wp_customize, 'upgrade_pro', array(
		'label' => __('Discover inspiralia Pro','inspiralia'),
        'section' => 'inspiralia_pro_section',
		'setting' => 'upgrade_pro',)
    ) );

class WP_inspiralia_review_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	<div class="ta-pro-box">
        <a href="<?php echo esc_url( __('https://wordpress.org/support/view/theme-reviews/inspiralia#postform/', 'inspiralia'));?>" target="_blank" class="review" id="review_pro"><?php _e( 'Support Forum','inspiralia' ); ?></a>
	</div>
    <?php
    }
}

    $wp_customize->add_setting( 'pro_Review', array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new WP_inspiralia_Review_Customize_Control( $wp_customize, 'pro_Review', array(
		'label' => __('Discover inspiralia Pro','inspiralia'),
        'section' => 'inspiralia_pro_section',
		'setting' => 'pro_Review',)
    ) );

class WP_inspiralia_document_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="ta-pro-box">
	 <a href="<?php echo esc_url( __('http://docs.themeansar.com/inspiralia-lite/', 'inspiralia'));?>" target="_blank" class="document" id="review_pro"><?php _e( 'Online Documenation','inspiralia' ); ?></a>

	 <div>
    <?php
    }
}

    class WP_inspiralia_tastore_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
      <div class="ta-pro-box">
     <a href="<?php echo esc_url( __('https://themeansar.com/themes/', 'inspiralia'));?>" target="_blank" class="tistore" id="ti_store"><?php _e( 'Explore Our Themes','inspiralia' ); ?></a>

     <div>
    <?php
    }
}



    $wp_customize->add_setting( 'doc_Review', array(
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new WP_inspiralia_document_Customize_Control( $wp_customize, 'doc_Review', array(
		'label' => __('Discover inspiralia Pro','inspiralia'),
        'section' => 'inspiralia_pro_section',
		'setting' => 'doc_Review',)
    ) );

    $wp_customize->add_setting( 'ti_store', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( new WP_inspiralia_tastore_Customize_Control( $wp_customize, 'ti_store', array(
        'label' => __('Discover inspiralia Pro','inspiralia'),
        'section' => 'inspiralia_pro_section',
        'setting' => 'ti_store',)
    ) );
}
add_action( 'customize_register', 'inspiralia_pro_customizer' );
?>