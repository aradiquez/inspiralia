<?php

function accordion_meta_box_markup($page) { ?>
 <?php wp_nonce_field( basename( __FILE__ ), 'accordion_meta_box_nonce' ); ?>
 <?php for($i=1; $i<=3; $i++) { ?>
  <div style="float: left; width: 33.3%; display: block;">
    <label for="accordion-box-title-<?php echo $i ?>" class="post-attributes-label">Title</label><br/>
    <input name="accordion-box-title-<?php echo $i ?>" class="thick_field" type="text" value="<?php echo get_post_meta($page->ID, "accordion-box-title-$i", true); ?>">
    <br />
    <label for="accordion-box-description-<?php echo $i ?>" class="post-attributes-label">Description</label><br/>
    <textarea name="accordion-box-description-<?php echo $i ?>" class="thick_field" rows='3' cols="20" class="e"><?php echo get_post_meta($page->ID, "accordion-box-description-$i", true); ?></textarea>
    <br />
    <?php $image_url = (get_post_meta($page->ID, "accordion-box-img-$i", true )) ? get_post_meta($page->ID, "accordion-box-img-$i", true ) : ''; ?>
    <img src="<?php echo $image_url ?>" width="150" id="accordion-box-img-preview-<?php echo $i ?>"/><br/>
    <label for="accordion-box-button-<?php echo $i ?>" class="post-attributes-label">Action Button Image</label><br/>
    <input id="accordion-box-img-<?php echo $i ?>" type="text" name="accordion-box-img-<?php echo $i ?>" value="<?php echo $image_url ?>" />
    <input id="accordion-box-img-<?php echo $i ?>-button" class="button" type="button" value="Upload Image" />
  </div>
  <?php } ?>
  <div style="clear: both;"></div>
<?php }

function add_accordion_meta_box() {
  global $post;
  print_r($post->post_parent );
  if ( 'templates/services.php' == get_post_meta( $post->ID, '_wp_page_template', true ) && ( $post->post_parent != 0 ) ) {
    add_meta_box("accordion_meta_box", "Accordion Box", "accordion_meta_box_markup", "page", "normal", "high", null);
  }
}
  add_action("add_meta_boxes", "add_accordion_meta_box");


function save_accordion_meta_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    for($i = 1; $i <= 3; $i++) {
      if(isset($_POST["accordion-box-title-$i"])) {
          $meta_box_title_value = $_POST["accordion-box-title-$i"];
      }
      update_post_meta($post_id, "accordion-box-title-$i", $meta_box_title_value);

      if(isset($_POST["accordion-box-description-$i"])) {
          $meta_box_description_value = $_POST["accordion-box-description-$i"];
      }
      update_post_meta($post_id, "accordion-box-description-$i", $meta_box_description_value);

      if(isset($_POST["accordion-box-img-$i"])) {
          $meta_box_action_img_value = $_POST["accordion-box-img-$i"];
      }
      update_post_meta($post_id, "accordion-box-img-$i", $meta_box_action_img_value);
    }
}

add_action("save_post", "save_accordion_meta_box", 10, 3);

?>
