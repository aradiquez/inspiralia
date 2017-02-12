<?php

function video_meta_box_markup($page) { ?>
 <?php wp_nonce_field( basename( __FILE__ ), 'video_meta_box_nonce' ); ?>
  <div style="display: block;">
    <label for="video-box" class="post-attributes-label">Title</label><br/>
    <textarea class="thick_textarea" name="video-box"><?php echo get_post_meta($page->ID, "video-box", true); ?></textarea>
  </div>
  <div style="clear: both;"></div>
<?php }

function add_video_meta_box() {
  global $post;
  if ( 'templates/home.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
    add_meta_box("video_meta_box", "Video Box", "video_meta_box_markup", "page", "normal", "high", null);
  }
}

add_action("add_meta_boxes", "add_video_meta_box");


function save_video_meta_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    if(isset($_POST["video-box"])) {
        $meta_box_value = $_POST["video-box"];
    }
    update_post_meta($post_id, "video-box", $meta_box_value);
}

add_action("save_post", "save_video_meta_box", 10, 3);

?>
