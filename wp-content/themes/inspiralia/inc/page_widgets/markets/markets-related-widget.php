<?php
function market_intro_meta_box_markup($post) { ?>
 <?php wp_nonce_field( basename( __FILE__ ), 'market_intro_meta_box_nonce' );
  $args = array(
      'depth'                 => 2,
      'child_of'              => $post->post_parent,
      'selected'              => get_post_meta($post->ID, "markets-intro-meta-page_id", true),
      'name'                  => 'markets-intro-meta-page_id'
  );
 ?>
  <div style="display: block;">
    <?php $image_url = (get_post_meta($post->ID, "markets-intro-background-imagen", true )) ? get_post_meta($post->ID, "markets-intro-background-imagen", true ) : ''; ?>
    <img src="<?php echo $image_url ?>" width="150" id="markets-intro-background-preview"/><br/>
    <label for="markets-intro-background-image" class="post-attributes-label">Image</label><br/>
    <input id="markets-intro-background-imagen" type="text" name="markets-intro-background-imagen" value="<?php echo $image_url ?>" />
    <input id="markets-intro-background-imagen-button" class="button" type="button" value="Upload Image" /><br/>
    <label for="markets-intro-title" class="post_attributes_label">Title</label><br/>
    <input name="markets-intro-title" class="thick_field" type="text" value="<?php echo get_post_meta($post->ID, "markets-intro-title", true); ?>"><br/>
    <label for="markets-intro-name" class="post_attributes_label">Button Name</label><br/>
    <input name="markets-intro-name" class="thick_field" type="text" value="<?php echo get_post_meta($post->ID, "markets-intro-name", true); ?>"><br/>
    <label for="markets-intro-related" class="post_attributes_related">Related to</label><br/>
    <?php wp_dropdown_pages($args); ?>
  </div>
  <div style="clear: both;"></div>
<?php }

function add_market_intro_meta_box() {
  global $post;
    if ( 'templates/markets.php' == get_post_meta( $post->ID, '_wp_page_template', true ) && ( count(get_ancestors( $post->ID, 'page', 'post_type' ) ) > 0 ) )  {
    add_meta_box("market_intro_meta_box", "Markets Related Element Box", "market_intro_meta_box_markup", "page", "normal", "high", null);
  }
}

  add_action("add_meta_boxes", "add_market_intro_meta_box");


function save_market_intro_meta_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    if(isset($_POST["markets-intro-background-imagen"])) {
        $market_meta_background_image= $_POST["markets-intro-background-imagen"];
    }
    update_post_meta($post_id, "markets-intro-background-imagen", $market_meta_background_image);

    if(isset($_POST["markets-intro-title"])) {
        $meta_box_title_value = $_POST["markets-intro-title"];
    }
    update_post_meta($post_id, "markets-intro-title", $meta_box_title_value);

    if(isset($_POST["markets-intro-name"])) {
        $meta_box_title_value = $_POST["markets-intro-name"];
    }
    update_post_meta($post_id, "markets-intro-name", $meta_box_title_value);

    if(isset($_POST["markets-intro-meta-page_id"])) {
        $linked_intro_meta_page= $_POST["markets-intro-meta-page_id"];
    }
    update_post_meta($post_id, "markets-intro-meta-page_id", $linked_intro_meta_page);
}

add_action("save_post", "save_market_intro_meta_box", 10, 3);

?>
