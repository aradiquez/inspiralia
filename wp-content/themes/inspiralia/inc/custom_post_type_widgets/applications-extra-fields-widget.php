<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * @category Inspiralia
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

add_action( 'cmb2_admin_init', 'inspiralia_register_application_metabox' );
/**
 * Hook in and add a metabox that only appears on the 'About' page
 */
function inspiralia_register_application_metabox() {
  global $post;
  $prefix = 'inspiralia_application_';
  /**
   * Metabox to be displayed on a single page ID
   */
  $cmb_about_page = new_cmb2_box( array(
    'id'           => $prefix . 'metabox',
    'title'        => esc_html__( 'application Extra Fields Metabox', 'cmb2' ),
    'object_types' => array( 'applications'), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true, // Show field names on the left
  ) );
  $cmb_about_page->add_field( array(
    'name' => esc_html__( 'Email', 'cmb2' ),
    'desc' => esc_html__( 'User email', 'cmb2' ),
    'id'   => $prefix . 'user_email',
    'type' => 'text',
  ) );

  $cmb_about_page->add_field( array(
    'name' => esc_html__( 'Phone Number', 'cmb2' ),
    'desc' => esc_html__( 'Apllication telephone ', 'cmb2' ),
    'id'   => $prefix . 'user_phone',
    'type' => 'text',
  ) );

  $cmb_about_page->add_field( array(
    'name'         => esc_html__( 'Resume File', 'cmb2' ),
    'desc'         => "Resume: " . wp_get_attachment_link( get_post_meta($_GET['post'], $prefix .'file_list', true )),
    'id'           => $prefix . 'file_list',
    'type'         => 'file_list',
    // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
  ) );

  $cmb_about_page->add_field( array(
    'name'       => esc_html__( 'Related Carreer', 'cmb2' ),
    'id'         => 'parent_post',
    'type'       => 'textarea_small',
    'save_field' => false, // Disables the saving of this field.
    'default'    => esc_attr__(show_human_name($_GET['post'])),
    'attributes' => array(
      'disabled' => 'disabled',
      'readonly' => 'readonly',
    ),
  ) );

}

function show_human_name($post_id) {
  $this_post = get_post($post_id);
  $parent = get_post($this_post->post_parent);
  if ($parent == nil ) {
    return "";
  }
  return " " . $parent->post_title . " ";
}
