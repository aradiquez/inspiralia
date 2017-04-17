<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * @category Inspiralia
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

add_action( 'cmb2_admin_init', 'inspiralia_register_clients_extra_fields_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function inspiralia_register_clients_extra_fields_metabox() {
  $prefix = 'inspiralia_clients_';
  /**
   * Metabox to be displayed on a single page ID
   */
  $clients_extra_fields = new_cmb2_box( array(
    'id'           => $prefix . 'metabox',
    'title'        => esc_html__( 'Clients Extra Fields Metabox', 'cmb2' ),
    'object_types' => array( 'clients'), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true, // Show field names on the left
  ) );

  $clients_extra_fields->add_field( array(
    'name'         => esc_html__( 'Client Logo', 'cmb2' ),
    'desc'         => esc_html__( 'Upload or add multiple images/attachments.', 'cmb2' ),
    'id'           => $prefix . 'file_list',
    'type'         => 'file_list',
    #'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
  ) );

  $clients_extra_fields->add_field( array(
    'name'    => 'Aside Description',
    'desc'    => 'field description (optional)',
    'id'      => 'client_extra_fields_aside_description',
    'type'    => 'wysiwyg',
    'options' => array(),
  ) );

  $markets = array(
    'post_parent'    => get_ID_by_page_name('Markets'),
    'post_type'   => 'page',
    'posts_per_page' => -1
  );

  $clients_extra_fields->add_field( array(
    'name'             => esc_html__( 'Market Selector', 'cmb2' ),
    'desc'             => esc_html__( 'Market relation', 'cmb2' ),
    'id'               => $prefix . 'market_id',
    'type'             => 'select',
    'show_option_none' => true,
    'options'          => cmb2_get_post_options($markets),
  ) );

  $services = array(
    'post_parent'    => get_ID_by_page_name('Services'),
    'post_type'   => 'page',
    'posts_per_page' => -1
  );

  $clients_extra_fields->add_field( array(
    'name'             => esc_html__( 'Service Selector', 'cmb2' ),
    'desc'             => esc_html__( 'Service relation', 'cmb2' ),
    'id'               => $prefix . 'service_id',
    'type'             => 'select',
    'show_option_none' => true,
    'options'          => cmb2_get_post_options($services),
  ) );

  $pais = array(
    'post_type'   => 'paises',
    'posts_per_page' => -1
  );

  $clients_extra_fields->add_field( array(
    'name'             => esc_html__( 'Page Selector', 'cmb2' ),
    'desc'             => esc_html__( 'Market relation', 'cmb2' ),
    'id'               => $prefix . 'market_id',
    'type'             => 'select',
    'show_option_none' => true,
    'options'          => cmb2_get_post_options($pais),
  ) );

  return $clients_extra_fields;
}



/**
 * Gets a number of posts and displays them as options
 * @param  array $query_args Optional. Overrides defaults.
 * @return array             An array of options that matches the CMB2 options array
 */
function cmb2_get_post_options($args) {

  $posts = new WP_Query( $args );
  $post_options = array();
  if ( $posts ) {
    foreach ( $posts->posts as $post ) {
          $post_options[ $post->ID ] = $post->post_title;
    }
  }

  return $post_options;
}

?>
