<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * @category Inspiralia
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

add_action( 'cmb2_admin_init', 'inspiralia_register_carreers_extra_fields_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function inspiralia_register_carreers_extra_fields_metabox() {
  $prefix = 'inspiralia_carreers_';
  /**
   * Metabox to be displayed on a single page ID
   */
  $cmb_about_page = new_cmb2_box( array(
    'id'           => $prefix . 'metabox',
    'title'        => esc_html__( 'Carreers Extra Fields Metabox', 'cmb2' ),
    'object_types' => array( 'carreers'), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true, // Show field names on the left
  ) );

  $cmb_about_page->add_field( array(
    'name'    => 'Aside Description',
    'desc'    => 'field description (optional)',
    'id'      => 'client_extra_fields_aside_description',
    'type'    => 'wysiwyg',
    'options' => array(),
  ) );
}
?>
