<?php

function market_page_meta_box_markup($post) { ?>
 <?php wp_nonce_field( basename( __FILE__ ), 'market_page_meta_box_nonce' );
  $args = array(
      'depth'                 => 2,
      'child_of'              => $post->post_parent,
      'selected'              => get_post_meta($post->ID, "linked_page_meta_page_id", true),
      'name'                  => 'linked_page_meta_page_id'
  );
 ?>
  <div style="display: block;">
    <label for="linked_page_box_title" class="post_attributes_label">Title</label><br/>
    <input name="linked_page_box_title" class="thick_field" type="text" value="<?php echo get_post_meta($post->ID, "linked_page_box_title", true); ?>"><br/>
    <label for="linked_page_box_name" class="post_attributes_label">Button Name</label><br/>
    <input name="linked_page_box_name" class="thick_field" type="text" value="<?php echo get_post_meta($post->ID, "linked_page_box_name", true); ?>"><br/>
    <label for="linked_page_box_related" class="post_attributes_related">Related to</label><br/>
    <?php wp_dropdown_pages($args); ?>
  </div>
  <div style="clear: both;"></div>
<?php }

function add_market_page_meta_box() {
  global $post;
  if (  'templates/markets.php' != get_post_meta( $post->ID, '_wp_page_template', true ) && 'post' != get_post_type() )  {
    add_meta_box("market_page_meta_box", "Hero Related Element Box", "market_page_meta_box_markup", "page", "normal", "high", null);
  }
}

  add_action("add_meta_boxes", "add_market_page_meta_box");


function save_market_page_meta_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    if(isset($_POST["linked_page_box_title"])) {
        $meta_box_title_value = $_POST["linked_page_box_title"];
    }
    update_post_meta($post_id, "linked_page_box_title", $meta_box_title_value);

    if(isset($_POST["linked_page_box_name"])) {
        $meta_box_title_value = $_POST["linked_page_box_name"];
    }
    update_post_meta($post_id, "linked_page_box_name", $meta_box_title_value);

    if(isset($_POST["linked_page_meta_page_id"])) {
        $linked_page_meta_page= $_POST["linked_page_meta_page_id"];
    }
    update_post_meta($post_id, "linked_page_meta_page_id", $linked_page_meta_page);
}

add_action("save_post", "save_market_page_meta_box", 10, 3);

?>
