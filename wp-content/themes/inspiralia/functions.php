<?php
/**
 * inspiralia functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package inspiralia
 */


if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
  require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
  require_once dirname( __FILE__ ) . '/CMB2/init.php';
}


	$inspiralia_theme_path = get_template_directory() . '/inc/ansar/';
	$inspiralia_theme_custom_widgets_path = get_template_directory() . '/inc/page_widgets/';
	$inspiralia_theme_custom_post_type_widgets_path = get_template_directory() . '/inc/custom_post_type_widgets/';

	require( $inspiralia_theme_path . '/inspiralia-custom-navwalker.php' );
	require( $inspiralia_theme_path . '/font/font.php');

	/*-----------------------------------------------------------------------------------*/
	/*	Enqueue scripts and styles.
	/*-----------------------------------------------------------------------------------*/
	require( $inspiralia_theme_path .'/enqueue.php');
	/* ----------------------------------------------------------------------------------- */
	/* Customizer */
	/* ----------------------------------------------------------------------------------- */

	// require( $inspiralia_theme_path . '/customize/ta_customize_copyright.php');
	// require( $inspiralia_theme_path . '/customize/ta_customize_homepage.php');
	// require( $inspiralia_theme_path . '/customize/ta_customize_pro.php');

	/* ----------------------------------------------------------------------------------- */
	/* Custom Widgets  */
	/* ----------------------------------------------------------------------------------- */
	require( $inspiralia_theme_custom_widgets_path . 'subtitle-widget.php');
	require( $inspiralia_theme_custom_widgets_path . 'testimonial-extra-fields-widget.php');
	require( $inspiralia_theme_custom_widgets_path . 'projects-extra-fields-widget.php');
	require( $inspiralia_theme_custom_widgets_path . 'page-related-widget.php');

	// HOMEPAGE
	require( $inspiralia_theme_custom_widgets_path . 'homepage/homepage-custom-widget.php');
	require( $inspiralia_theme_custom_widgets_path . 'homepage/homepage-sourcing-widget.php');
	require( $inspiralia_theme_custom_widgets_path . 'homepage/homepage-video-widget.php');
	require( $inspiralia_theme_custom_widgets_path . 'homepage/homepage-map-image-widget.php');

	// SERVICES
	require( $inspiralia_theme_custom_widgets_path . 'services/services-accordion-widget.php');
	require( $inspiralia_theme_custom_widgets_path . 'services/services-extra-fields-widget.php');
	require( $inspiralia_theme_custom_widgets_path . 'services/services-leading-markets-widget.php');
	require( $inspiralia_theme_custom_widgets_path . 'services/services-our-value-widget.php');

	// MARKETS
	require( $inspiralia_theme_custom_widgets_path . 'markets/markets-extra-fields-widget.php');
	require( $inspiralia_theme_custom_widgets_path . 'markets/markets-related-widget.php');
	require( $inspiralia_theme_custom_widgets_path . 'markets/markets-parent-related-widget.php');

	// CASE STUDIES
	require( $inspiralia_theme_custom_widgets_path . 'case_studies/case-studies-related-widget.php');

	// ========================================================================================/
	require( $inspiralia_theme_custom_post_type_widgets_path . 'testimonial-extra-fields-widget.php');

	// ========================================================================================/
	require( $inspiralia_theme_custom_post_type_widgets_path . 'clients-extra-fields-widget.php');
	// ========================================================================================/
	require( $inspiralia_theme_custom_post_type_widgets_path . 'carreers-extra-fields-widget.php');
	// ========================================================================================/
	require( $inspiralia_theme_custom_post_type_widgets_path . 'applications-extra-fields-widget.php');

if ( ! function_exists( 'inspiralia_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function inspiralia_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on inspiralia, use a find and replace
	 * to change 'inspiralia' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'inspiralia', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary menu', 'inspiralia' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 150,
		'height'      => 35,
		'flex-width'  => false,
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'inspiralia_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    // Set up the woocommerce feature.
    add_theme_support( 'woocommerce');

}
endif;
add_action( 'after_setup_theme', 'inspiralia_setup' );

add_action( 'admin_enqueue_scripts', 'wptuts_add_color_picker' );

function wptuts_add_color_picker( $hook ) {
	if( is_admin() ) {
    // Add the color picker css file
    wp_enqueue_style( 'wp-color-picker' );
    // Include our custom jQuery file with WordPress Color Picker dependency
    wp_enqueue_script( 'custom-script-handle', plugins_url( 'custom-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
	}
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function inspiralia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'inspiralia_content_width', 640 );
}
add_action( 'after_setup_theme', 'inspiralia_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function inspiralia_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'inspiralia' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="inspiralia-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area Menu', 'inspiralia' ),
		'id'            => 'footer_widget_area_menu',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="col-xs-12 col-sm-6 col-md-2 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area Contact Information', 'inspiralia' ),
		'id'            => 'footer_widget_area_contact_information',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="col-xs-12 col-sm-6 col-md-3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

	create_function('', 'return register_widget("Footer_Area_Menu_Widget");');
}
add_action( 'widgets_init', 'inspiralia_widgets_init' );

function inspiralia_enqueue_customizer_controls_styles() {
  wp_register_style( 'inspiralia-customizer-controls', get_template_directory_uri() . '/css/customizer-controls.css', NULL, NULL, 'all' );
  wp_enqueue_style( 'inspiralia-customizer-controls');
  }
add_action( 'customize_controls_print_styles', 'inspiralia_enqueue_customizer_controls_styles' );

/* Implement the Custom Header feature. */


/* Custom template tags for this theme. */
require get_template_directory() . '/inc/ansar/template-tags.php';

// custom header


		register_default_headers( array(
			'mypic' => array(
			'url'   => get_template_directory_uri() . '/images/page-header-bg.jpg',
			'thumbnail_url' => get_template_directory_uri() . '/images/breadcrumb/background.png',
			'description'   => _x( 'headerPic', 'header image description', 'inspiralia' )),
		));

//Read more Button on slider & Post
function inspiralia_read_more() {

	global $post;

	$readbtnurl = '<a class="btn btn-tislider-two" href="' . get_permalink() . '">'.__( 'Read More' , 'inspiralia' ).'</a>';

    return $readbtnurl;
}
add_filter( 'the_content_more_link', 'inspiralia_read_more' );


class Footer_Area_Menu_Widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname' => 'footer_area_menu_widget',
			'description' => 'Footer Address Information',
		);
		parent::__construct( 'footer_area_menu_widget', 'Footer Address Information', $widget_ops );
	}
}

function add_background_when_need($prefix) {
		global $post;
		if (get_post_meta($post->ID, $prefix . "-imagen", true )) {
			return "background-image: url(".get_post_meta($post->ID, $prefix . "-imagen", true )."); background-repeat: no-repeat;";
		} else {
			if(get_post_meta($post->ID, $prefix . "-background-color", true )) {
				return "background-color: ".get_post_meta($post->ID, $prefix . "-background-color", true ).";";
			}
		}
}

function get_ID_by_page_name($page_name) {
   global $wpdb;
   $page_name_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$page_name."' AND post_type = 'page'");
   return $page_name_id;
}


add_action( 'wp_ajax_ajax_get_post_information', 'ajax_get_post_information' );
add_action( 'wp_ajax_nopriv_ajax_get_post_information', 'ajax_get_post_information' );

function ajax_get_post_information() {
	if( !empty( $_POST['post_id'] ) ) {
		$information = (array) get_post($_POST['post_id']);
		$information['logo'] = array_values(get_post_meta($_POST['post_id'], 'inspiralia_clients_file_list', true));
		$information['logo'] = $information['logo'][0];
		$information['aside'] = get_post_meta( $_POST['post_id'], 'client_extra_fields_aside_description', true );
		echo json_encode($information);
	}
	die();
}


