<?php
function inspiralia_scripts() {

	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');

	wp_enqueue_style( 'inspiralia-style', get_stylesheet_uri() );

	wp_enqueue_style('inspiralia_color', get_template_directory_uri() . '/css/colors/default.css');

	wp_enqueue_style('smartmenus',get_template_directory_uri().'/css/jquery.smartmenus.bootstrap.css');

  wp_enqueue_style('font-awesome-min',get_template_directory_uri().'/css/font-awesome.min.css');

  wp_enqueue_style('font-debby',get_template_directory_uri().'/css/font-debby.css');

	wp_enqueue_style('carousel',get_template_directory_uri().'/css/owl.carousel.css');

  wp_enqueue_style('owl_transitions',get_template_directory_uri().'/css/owl.transitions.css');

	wp_enqueue_style('animate',get_template_directory_uri().'/css/animate.css');



	/* Js script */

	wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'));

	wp_enqueue_script( 'inspiralia-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'));

	wp_enqueue_script('smartmenus-js', get_template_directory_uri() . '/js/jquery.smartmenus.js' , array('jquery'));

  wp_enqueue_script('smartmenus_bootstrap', get_template_directory_uri() . '/js/jquery.smartmenus.bootstrap.js' , array('jquery'));

  wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'));

  wp_enqueue_script('smoot-accordion', get_template_directory_uri() . '/js/accordion.js', array('jquery'));

	wp_enqueue_script('inspiralia_custom', get_template_directory_uri() . '/js/custom.js' , array('jquery'));

  wp_enqueue_script('inspiralia_drag_and_drop', get_template_directory_uri() . '/js/drag_and_drop.js' , array('jquery'));

  wp_enqueue_script('inspiralia_scrollie', get_template_directory_uri() . '/js/jquery.scrollie.min.js' , array('jquery'));


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'inspiralia_scripts');

################################### CLIENTS #########################################
function add_frontend_ajax_javascript_file()
{
    wp_enqueue_script( 'ajax_clients_script', get_template_directory_uri() . '/js/clients_script.js', array('jquery') );
    wp_localize_script( 'ajax_clients_script', 'clients_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
    wp_enqueue_script('inspiralia_scroll', get_template_directory_uri() . '/js/jquery.jscroll.min.js' , array('jquery'));

    wp_localize_script( 'ajax_clients_script', 'carreers_ajax', array( 'ajaxurl' => get_template_directory_uri() . '/inc/carreers/carreers_apply.php'));
}
add_action( 'wp_enqueue_scripts', 'add_frontend_ajax_javascript_file' );
################################### ADMIN ###########################################

function load_admin_styles() {
  wp_enqueue_style( 'admin_css_custom', get_template_directory_uri() . '/css/admin/custom.css', false, '1.0.0' );
}

add_action( 'admin_enqueue_scripts', 'load_admin_styles' );


function load_admin_scripts() {
    wp_enqueue_script( 'admin_js_custom', get_template_directory_uri() . '/js/admin/custom.js' );
}

add_action('admin_enqueue_scripts', 'load_admin_scripts');
?>
