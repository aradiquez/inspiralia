<?php
function services_extra_fields_box_markup($page) { ?>
 <?php wp_nonce_field( basename( __FILE__ ), 'services_extra_fields_box_nonce' ); ?>
  <div>
    <label for="services-intro" class="post-attributes-label">Introduction</label><br/>
    <textarea name="services-intro" class="thick_textarea"><?php echo get_post_meta($page->ID, "services-intro", true); ?></textarea><br/>
    <?php $image_url = (get_post_meta($page->ID, "services-intro-imagen", true )) ? get_post_meta($page->ID, "services-intro-imagen", true ) : ''; ?>
    <img src="<?php echo $image_url ?>" width="150" id="services-intro-preview"/><br/>
    <label for="accordion-box-button" class="post-attributes-label">Action Button Image</label><br/>
    <input id="services-intro-imagen" type="text" name="services-intro-imagen" value="<?php echo $image_url ?>" />
    <input id="services-intro-button" class="button" type="button" value="Upload Image" />
  </div>
  <div style="clear: both;"></div>
<?php }

function add_services_extra_fields_box() {
  global $post;
  if ( 'templates/services.php' == get_post_meta( $post->ID, '_wp_page_template', true ) && ( count(get_ancestors( $post->ID, 'page', 'post_type' ) ) > 0 ) )  {
    add_meta_box("services_extra_fields_box", "Services Extra Fields", "services_extra_fields_box_markup", "page", "normal", "high", null);
  }
}

add_action("add_meta_boxes", "add_services_extra_fields_box");


function save_services_extra_fields_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    if(isset($_POST["services-intro"])) {
        $services_intro = $_POST["services-intro"];
    }
    update_post_meta($post_id, "services-intro", $services_intro);

    if(isset($_POST["services-intro-imagen"])) {
          $services_intro_imagen = $_POST["services-intro-imagen"];
      }
    update_post_meta($post_id, "services-intro-imagen", $services_intro_imagen);
}

add_action("save_post", "save_services_extra_fields_box", 10, 3);