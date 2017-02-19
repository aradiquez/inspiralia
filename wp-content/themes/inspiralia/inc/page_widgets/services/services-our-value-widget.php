<?php
function service_our_value_box_markup($page) { ?>
 <?php wp_nonce_field( basename( __FILE__ ), 'service_our_value_box_nonce' ); ?>
  <div>
    <label for="services-our-value" class="post-attributes-label">Text</label><br/>
    <?php wp_editor( get_post_meta($page->ID, "services-our-value", true), 'services-our-value', array() ); ?> <br/>
  </div>
  <div style="clear: both;"></div>
<?php }

function add_service_our_value_box() {
  global $post;
  if ( 'templates/services.php' == get_post_meta( $post->ID, '_wp_page_template', true ) && ( count(get_ancestors( $post->ID, 'page', 'post_type' ) ) > 0 ) )  {
    add_meta_box("service_our_value_box", "Services Our Value Fields", "service_our_value_box_markup", "page", "normal", "high", null);
  }
}

add_action("add_meta_boxes", "add_service_our_value_box");


function save_service_our_value_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    if(isset($_POST["services-our-value"])) {
        $services_intro = $_POST["services-our-value"];
    }
    update_post_meta($post_id, "services-our-value", $services_intro);
}

add_action("save_post", "save_service_our_value_box", 10, 3);