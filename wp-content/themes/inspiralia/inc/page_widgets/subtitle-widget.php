<?php

function subtitle_meta_box_markup($page) { ?>
 <?php wp_nonce_field( basename( __FILE__ ), 'subtitle_meta_box_nonce' ); ?>
  <div style="display: block;">
    <label for="subtitle-box-title" class="post-attributes-label">Subtitle</label><br/>
    <input name="subtitle-box-title" class="thick_field" type="text" value="<?php echo get_post_meta($page->ID, "subtitle-box-title", true); ?>">
  </div>
  <div style="clear: both;"></div>
<?php }

function add_subtitle_meta_box() {
  add_meta_box("subtitle_meta_box", "Hero Title Box", "subtitle_meta_box_markup", "page", "normal", "high", null);
}
  add_action("add_meta_boxes", "add_subtitle_meta_box");


function save_subtitle_meta_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    if(isset($_POST["subtitle-box-title"])) {
        $meta_box_title_value = $_POST["subtitle-box-title"];
    }
    update_post_meta($post_id, "subtitle-box-title", $meta_box_title_value);
}

add_action("save_post", "save_subtitle_meta_box", 10, 3);

?>
