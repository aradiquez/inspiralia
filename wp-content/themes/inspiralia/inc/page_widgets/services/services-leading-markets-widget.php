<?php

function services_leading_markets_meta_box_markup($page) { ?>
 <?php wp_nonce_field( basename( __FILE__ ), 'leading_markets_meta_box_nonce' ); ?>
  <div style="display: block;">
    <label for="leading-markets-box-title" class="post-attributes-label">Title</label><br/>
    <input name="leading-markets-box-title" type="text" value="<?php echo get_post_meta($page->ID, "leading-markets-box-title", true); ?>" class="thick_field"><br/>

    <fieldset class="background">

        <?php $image_url = (get_post_meta($page->ID, "leading-markets-imagen", true )) ? get_post_meta($page->ID, "leading-markets-imagen", true ) : ''; ?>
        <img src="<?php echo $image_url ?>" width="150" id="leading-markets-preview"/><br/>
        <label for="leading-markets-imagen" class="post-attributes-label">Background Image</label><br/>
        <input id="leading-markets-imagen" type="text" name="leading-markets-imagen" value="<?php echo $image_url ?>" />
        <input id="leading-markets-button" class="button" type="button" value="Upload Image" />
        <br/>
        <label for="leading-markets-color" class="post-attributes-label">Background Color</label><br/>
        <input id="leading-markets-background-color" class="color-field" type="text" name="leading-markets-color" value="<?php echo get_post_meta($page->ID, "leading-markets-background-color", true); ?>" />

    </fieldset>

    <label for="leading-markets-action" class="post-attributes-label">Action Button Label</label><br/>
    <input name="leading-markets-action" class="thick_field" type="text" value="<?php echo get_post_meta($page->ID, "leading-markets-action", true); ?>"><br/>
    <label for="leading-markets-action-url" class="post-attributes-label">Action Button URL</label><br/>
    <input name="leading-markets-action-url" class="thick_field" type="text" value="<?php echo get_post_meta($page->ID, "leading-markets-action-url", true); ?>">
  </div>
  <div style="clear: both;"></div>
<?php }

function add_services_leading_markets_meta_box() {
  global $post;
  if ( 'templates/services.php' == get_post_meta( $post->ID, '_wp_page_template', true ) ) {
    add_meta_box("services_leading_markets_meta_box", "Leading Markets Information Box", "services_leading_markets_meta_box_markup", "page", "normal", "high", null);
  }
}

add_action("add_meta_boxes", "add_services_leading_markets_meta_box");


function save_services_leading_markets_meta_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    if(isset($_POST["leading-markets-box-title"])) {
        $meta_box_title_value = $_POST["leading-markets-box-title"];
    }
    update_post_meta($post_id, "leading-markets-box-title", $meta_box_title_value);

    if(isset($_POST["leading-markets-action"])) {
        $meta_box_title_action = $_POST["leading-markets-action"];
    }
    update_post_meta($post_id, "leading-markets-action", $meta_box_title_action);
    if(isset($_POST["leading-markets-action-url"])) {
        $meta_box_title_action_url = $_POST["leading-markets-action-url"];
    }
    update_post_meta($post_id, "leading-markets-action-url", $meta_box_title_action_url);

    if(isset($_POST["leading-markets-imagen"])) {
          $services_intro_imagen = $_POST["leading-markets-imagen"];
      }
    update_post_meta($post_id, "leading-markets-imagen", $services_intro_imagen);

    if(isset($_POST["leading-markets-background-color"])) {
          $services_intro_color = $_POST["leading-markets-background-color"];
      }
    update_post_meta($post_id, "leading-markets-background-color", $services_intro_color);

}

add_action("save_post", "save_services_leading_markets_meta_box", 10, 3);

?>
