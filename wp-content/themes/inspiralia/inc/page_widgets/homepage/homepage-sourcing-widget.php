<?php

function home_sourcing_meta_box_markup($page) { ?>
 <?php wp_nonce_field( basename( __FILE__ ), 'home-sourcing_meta_box_nonce' ); ?>
  <div style="display: block;">
    <label for="home-sourcing-box-title" class="post-attributes-label">Title</label><br/>
    <input name="home-sourcing-box-title" type="text" value="<?php echo get_post_meta($page->ID, "home-sourcing-box-title", true); ?>" class="thick_field">

    <label for="home-sourcing-action" class="post-attributes-label">Action Button Label</label><br/>
    <input name="home-sourcing-action" class="thick_field" type="text" value="<?php echo get_post_meta($page->ID, "home-sourcing-action", true); ?>">
    <label for="home-sourcing-action-url" class="post-attributes-label">Action Button URL</label><br/>
    <input name="home-sourcing-action-url" class="thick_field" type="text" value="<?php echo get_post_meta($page->ID, "home-sourcing-action-url", true); ?>">
  </div>
  <div style="clear: both;"></div>
<?php }

function add_home_sourcing_meta_box() {
  global $post;
  if ( 'templates/home.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
    add_meta_box("home_sourcing_meta_box", "Sourcing Information Box", "home_sourcing_meta_box_markup", "page", "normal", "high", null);
  }
}

add_action("add_meta_boxes", "add_home_sourcing_meta_box");


function save_home_sourcing_meta_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    if(isset($_POST["home-sourcing-box-title"])) {
        $meta_box_title_value = $_POST["home-sourcing-box-title"];
    }
    update_post_meta($post_id, "home-sourcing-box-title", $meta_box_title_value);

    if(isset($_POST["home-sourcing-action"])) {
        $meta_box_title_action = $_POST["home-sourcing-action"];
    }
    update_post_meta($post_id, "home-sourcing-action", $meta_box_title_action);
    if(isset($_POST["home-sourcing-action-url"])) {
        $meta_box_title_action_url = $_POST["home-sourcing-action-url"];
    }
    update_post_meta($post_id, "home-sourcing-action-url", $meta_box_title_action_url);
}

add_action("save_post", "save_home_sourcing_meta_box", 10, 3);

?>
