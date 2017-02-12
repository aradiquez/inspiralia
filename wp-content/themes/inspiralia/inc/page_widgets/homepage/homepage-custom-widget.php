<?php

function needs_meta_box_markup($page) { ?>
 <?php wp_nonce_field( basename( __FILE__ ), 'needs_meta_box_nonce' ); ?>
 <?php for($i=1; $i<=3; $i++) { ?>
  <div style="float: left; width: 33.3%; display: block;">
    <label for="meta-box-title-<?php echo $i ?>" class="post-attributes-label">Title</label><br/>
    <input name="meta-box-title-<?php echo $i ?>" class="thick_field" type="text" value="<?php echo get_post_meta($page->ID, "meta-box-title-$i", true); ?>">
    <br />
    <label for="meta-box-description-<?php echo $i ?>" class="post-attributes-label">Description</label><br/>
    <textarea name="meta-box-description-<?php echo $i ?>" class="thick_textarea" rows='3' cols="20" class="e"><?php echo get_post_meta($page->ID, "meta-box-description-$i", true); ?></textarea>
    <br />
    <label for="meta-box-button-title-<?php echo $i ?>" class="post-attributes-label">Action Button Title</label><br/>
    <input name="meta-box-button-title-<?php echo $i ?>" class="thick_small" type="text" value="<?php echo get_post_meta($page->ID, "meta-box-button-title-$i", true); ?>">
    <br />
    <label for="meta-box-button-url-<?php echo $i ?>" class="post-attributes-label">Action Button URL</label><br/>
    <input name="meta-box-button-url-<?php echo $i ?>" class="thick_small" type="text" value="<?php echo get_post_meta($page->ID, "meta-box-button-url-$i", true); ?>">
  </div>
  <?php } ?>
  <div style="clear: both;"></div>
<?php }

function add_needs_meta_box() {
  global $post;
  if ( 'templates/home.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
    add_meta_box("needs_meta_box", "Needs Box", "needs_meta_box_markup", "page", "normal", "high", null);
  }
}
  add_action("add_meta_boxes", "add_needs_meta_box");


function save_needs_meta_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    for($i = 1; $i <= 3; $i++) {
      if(isset($_POST["meta-box-title-$i"])) {
          $meta_box_title_value = $_POST["meta-box-title-$i"];
      }
      update_post_meta($post_id, "meta-box-title-$i", $meta_box_title_value);

      if(isset($_POST["meta-box-description-$i"])) {
          $meta_box_description_value = $_POST["meta-box-description-$i"];
      }
      update_post_meta($post_id, "meta-box-description-$i", $meta_box_description_value);

      if(isset($_POST["meta-box-button-title-$i"])) {
          $meta_box_action_button_title_value = $_POST["meta-box-button-title-$i"];
      }
      update_post_meta($post_id, "meta-box-button-title-$i", $meta_box_action_button_title_value);

      if(isset($_POST["meta-box-button-url-$i"])) {
          $meta_box_action_button_url_value = $_POST["meta-box-button-url-$i"];
      }
      update_post_meta($post_id, "meta-box-button-url-$i", $meta_box_action_button_url_value);
    }
}

add_action("save_post", "save_needs_meta_box", 10, 3);

?>
