<?php
function inspiralia_homepage_setting( $wp_customize ) {


	/* Option list of all post */
    $options_posts = array();
    $options_posts_obj = get_posts('posts_per_page=-1');
    $options_posts[''] = __( 'Choose Post', 'inspiralia' );
    foreach ( $options_posts_obj as $posts ) {
    	$options_posts[$posts->ID] = $posts->post_title;
    }

	class inspiralia_Theme_Support_testi extends WP_Customize_Control {
        public function render_content() {

			echo __('Check out the','inspiralia');
		?>
           <a href="<?php echo esc_url( __('http://themeansar.com/themes/inspiralia', 'inspiralia')); ?>" target="_blank" ><?php _e( 'PRO version','inspiralia' ); ?></a><?php
		 echo __(' Want to Display Testimonials section!','inspiralia');

        }
    }



    class inspiralia_Theme_Support_news extends WP_Customize_Control {
        public function render_content() {

		   echo __('Check out the','inspiralia');
		?>
           <a href="<?php echo esc_url( __('http://themeansar.com/themes/inspiralia', 'inspiralia')); ?>" target="_blank" ><?php _e( 'PRO version','inspiralia' ); ?></a><?php
		 echo __(' Want to display News & Event With Categorization','inspiralia');


        }
    }
		$wp_customize->add_panel( 'homepage_setting', array(
                'priority'       => 500,
                'capability'     => 'edit_theme_options',
                'title'      => __('Home Sections Settings', 'inspiralia'),
            ) );

            /* --------------------------------------
            =========================================
            Slider Section
            =========================================
            -----------------------------------------*/
            $wp_customize->add_section(
                'inspiralia_slider_section_settings', array(
                'title' => __('Slider Setting','inspiralia'),
				'panel'  => 'homepage_setting',
            ) );

			//Enable slider
			$wp_customize->add_setting(
		    	'inspiralia_slider_enable', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'inspiralia_homepage_sanitize_checkbox',
		    ) );
		    $wp_customize->add_control(
		    	'inspiralia_slider_enable', array(
		    	'label'   => __('Enable Slider Section','inspiralia'),
		    	'section' => 'inspiralia_slider_section_settings',
		    	'type' => 'checkbox',
		    ) );


			//Select Post One
			$wp_customize->add_setting('slider_post_one',array(
				'capability'=>'edit_theme_options',
				'sanitize_callback'=>'sanitize_text_field',
			));

			$wp_customize->add_control('slider_post_one',array(
				'label' => __('Select Post One','inspiralia'),
				'section'=>'inspiralia_slider_section_settings',
				'type'=>'select',
				'choices'=>$options_posts,
			));

			//Select Post Two
			$wp_customize->add_setting('slider_post_two',array(
				'capability'=>'edit_theme_options',
				'sanitize_callback'=>'sanitize_text_field',
			));

			$wp_customize->add_control('slider_post_two',array(
				'label' => __('Select Post Two','inspiralia'),
				'section'=>'inspiralia_slider_section_settings',
				'type'=>'select',
				'choices'=>$options_posts,
			));

			//Select Post Three
			$wp_customize->add_setting('slider_post_three',array(
				'capability'=>'edit_theme_options',
				'sanitize_callback'=>'sanitize_text_field',
			));

			$wp_customize->add_control('slider_post_three',array(
				'label' => __('Select Post Three','inspiralia'),
				'section'=>'inspiralia_slider_section_settings',
				'type'=>'select',
				'choices'=>$options_posts,
			));

		    /* --------------------------------------
		    =========================================
		    product Section
		    =========================================
		    -----------------------------------------*/
		    // add section to manage
		    $wp_customize->add_section(
		    	'inspiralia_product_section_settings', array(
		        'title' => __('Product Setting','inspiralia'),
		        'panel'  => 'homepage_setting',
		    ) );

		    //Enable product
			$wp_customize->add_setting(
		    	'inspiralia_product_enable', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'inspiralia_homepage_sanitize_checkbox',
		    ) );
		    $wp_customize->add_control(
		    	'inspiralia_product_enable', array(
		    	'label'   => __('Enable Product Section','inspiralia'),
		    	'section' => 'inspiralia_product_section_settings',
		    	'type' => 'checkbox',
		    ) );

            //product Title setting
            $wp_customize->add_setting(
                'inspiralia_product_title', array(
				'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'inspiralia_homepage_title_sanitize_text',
            ) );
            $wp_customize->add_control(
            	'inspiralia_product_title', array(
                'label'   => __('Product Title','inspiralia'),
                'section' => 'inspiralia_product_section_settings',
                'type' => 'text',
            ) );

            //product Subtitle setting
            $wp_customize->add_setting(
                'inspiralia_product_subtitle', array(
                'capability'     => 'edit_theme_options',
                'sanitize_callback' => 'inspiralia_homepage_title_sanitize_text',
            ) );
            $wp_customize->add_control( 'inspiralia_product_subtitle',array(
                'label'   => __('Product Subtitle','inspiralia'),
                'section' => 'inspiralia_product_section_settings',
                'type' => 'textarea',)  );

		    /* --------------------------------------
		    =========================================
		    Latest News Section
		    =========================================
		    -----------------------------------------*/
		    // add section to manage Latest News
		    $wp_customize->add_section(
		    	'news_section_settings', array(
		        'title' => __('News & Events Setting','inspiralia'),
				'panel'  => 'homepage_setting'
		    ) );

		    //Enable News
			$wp_customize->add_setting(
		    	'inspiralia_news_enable', array(
		        'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'inspiralia_homepage_sanitize_checkbox',
		    ) );
		    $wp_customize->add_control(
		    	'inspiralia_news_enable', array(
		    	'label'   => __('Enable News Section','inspiralia'),
		    	'section' => 'news_section_settings',
		    	'type' => 'checkbox',
		    ) );

		    //Latest News Background Image
		    $wp_customize->add_setting(
		    	'news_background', array(
		    	'sanitize_callback' => 'inspiralia_sanitize_image',
		    ) );
		    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,
		    	'news_background', array(
		    	'label'    => __( 'Choose Background Image', 'inspiralia' ),
		    	'section'  => 'news_section_settings',
		    	'settings' => 'news_background', )
		    ) );

		    // hide meta content
            $wp_customize->add_setting(
                'disable_news_meta', array(
                'default' => 'false',
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ) );
            $wp_customize->add_control(
                'disable_news_meta', array(
                'label' => __('Hide/Show Blog Meta:- Like author name,categories', 'inspiralia'),
                'description'   => __('Hide / Show Blog Meta:- Like author name,categories', 'inspiralia'),
                'section' => 'news_section_settings',
                'type' => 'radio',
                'choices' => array('true'=>__('On','inspiralia'),'false'=>__('Off','inspiralia')),
            ) );

		    // Latest News Title Setting
		    $wp_customize->add_setting(
		    	'inspiralia_news_title', array(
				'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'inspiralia_homepage_title_sanitize_text',
		    ) );
		    $wp_customize->add_control(
		    	'inspiralia_news_title',array(
		    	'label'   => __('Latest News Title','inspiralia'),
		    	'section' => 'news_section_settings',
		    	'type' => 'text',
		    ) );

		    // Latest News Subtitle Setting
		    $wp_customize->add_setting(
		    	'inspiralia_news_subtitle', array(
				'capability'     => 'edit_theme_options',
		        'sanitize_callback' => 'inspiralia_homepage_title_sanitize_text',
		    ) );
		    $wp_customize->add_control(
		    	'inspiralia_news_subtitle',array(
		    	'label'   => __('Latest News Subtitle','inspiralia'),
		    	'section' => 'news_section_settings',
		    	'type' => 'textarea',
		    ) );

		    $wp_customize->add_setting( 'inspiralia_news_section', array(
                'sanitize_callback' => 'inspiralia_pro_version_sanitize_text'
            ) );

            $wp_customize->add_control( new inspiralia_Theme_Support_news( $wp_customize, 'inspiralia_news_section', array(
                'section' => 'news_section_settings',)
            ) );

            /* --------------------------------------
            =========================================
            Testimonials Section
            =========================================
            -----------------------------------------*/
            // add section to manage Testimonials
            $wp_customize->add_section(
                'inspiralia_testimonials_section_settings', array(
                'title' => __('Testimonials Setting','inspiralia'),
                'panel' => 'homepage_setting',
            ) );

            $wp_customize->add_setting( 'inspiralia_testimonials_section', array(
                'sanitize_callback' => 'inspiralia_pro_version_sanitize_text'
            ) );

            $wp_customize->add_control( new inspiralia_Theme_Support_testi( $wp_customize, 'inspiralia_testimonials_section', array(
                'section' => 'inspiralia_testimonials_section',)
            ) );

			function inspiralia_pro_version_sanitize_text( $input ) {

			return wp_kses_post( force_balance_tags( $input ) );

			}


			function inspiralia_homepage_title_sanitize_text ( $input ) {

			return wp_kses_post( force_balance_tags( $input ) );

			}

			function inspiralia_homepage_sanitize_checkbox( $input ) {
			// Boolean check
			return ( ( isset( $input ) && true == $input ) ? true : false );
			}


			function inspiralia_sanitize_image( $image, $setting ) {
			/*
			 * Array of valid image file types.
			 *
			 * The array includes image mime types that are included in wp_get_mime_types()
			 */
			$mimes = array(
				'jpg|jpeg|jpe' => 'image/jpeg',
				'gif'          => 'image/gif',
				'png'          => 'image/png',
				'bmp'          => 'image/bmp',
				'tif|tiff'     => 'image/tiff',
				'ico'          => 'image/x-icon'
			);
			// Return an array with file extension and mime_type.
			$file = wp_check_filetype( $image, $mimes );
			// If $image has a valid mime_type, return it; otherwise, return the default.
			return ( $file['ext'] ? $image : $setting->default );
}
}

add_action( 'customize_register', 'inspiralia_homepage_setting' );
?>