<?php

function home_map_meta_box_markup($page) { ?>
 <?php wp_nonce_field( basename( __FILE__ ), 'home-map_meta_box_nonce' ); ?>
  <div style="display: block;">
    <label for="home-map-box-title" class="post-attributes-label">Title</label><br/>
    <input name="home-map-box-title" type="text" value="<?php echo get_post_meta($page->ID, "home-map-box-title", true); ?>" class="thick_field">

    <?php $image_url = (get_post_meta($page->ID, "home-map-box-img", true )) ? get_post_meta($page->ID, "home-map-box-img", true ) : ''; ?>
    <img src="<?php echo $image_url ?>" width="150" id="home-map-box-img-preview"/><br/>
    <label for="home-map-box-button" class="post-attributes-label">Image</label><br/>
    <input id="home-map-box-img" type="text" name="home-map-box-img" value="<?php echo $image_url ?>" />
    <input id="home-map-box-img-button" class="button" type="button" value="Upload Image" />

    <br />
    <label for="home-map-box-button-title" class="post-attributes-label">Action Button Title</label><br/>
    <input name="home-map-box-button-title" class="thick_field" type="text" value="<?php echo get_post_meta($page->ID, "home-map-box-button-title", true); ?>">
    <br />
    <label for="home-map-box-button-url" class="post-attributes-label">Action Button URL</label><br/>
    <input name="home-map-box-button-url" class="thick_field" type="text" value="<?php echo get_post_meta($page->ID, "home-map-box-button-url", true); ?>">
  </div>
  <div style="clear: both;"></div>
<?php }

function add_home_map_meta_box() {
  global $post;
  if ( 'templates/home.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
    add_meta_box("home_map_meta_box", "map Information Box", "home_map_meta_box_markup", "page", "normal", "high", null);
  }
}

add_action("add_meta_boxes", "add_home_map_meta_box");


function save_home_map_meta_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    if(isset($_POST["home-map-box-title"])) {
        $meta_box_title_value = $_POST["home-map-box-title"];
    }
    update_post_meta($post_id, "home-map-box-title", $meta_box_title_value);

    if(isset($_POST["home-map-box-img"])) {
        $meta_box_map_img = $_POST["home-map-box-img"];
    }
    update_post_meta($post_id, "home-map-box-img", $meta_box_map_img);

    if(isset($_POST["home-map-box-button-title"])) {
        $meta_box_map_button_title = $_POST["home-map-box-button-title"];
    }
    update_post_meta($post_id, "home-map-box-button-title", $meta_box_map_button_title);

    if(isset($_POST["home-map-box-button-url"])) {
        $meta_box_map_button_url = $_POST["home-map-box-button-url"];
    }
    update_post_meta($post_id, "home-map-box-button-url", $meta_box_map_button_url);
}

add_action("save_post", "save_home_map_meta_box", 10, 3);

?>
