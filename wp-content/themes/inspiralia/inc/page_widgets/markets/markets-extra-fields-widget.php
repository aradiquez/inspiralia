<?php
function markets_extra_fields_box_markup($page) { ?>
 <?php wp_nonce_field( basename( __FILE__ ), 'markets_extra_fields_box_nonce' ); ?>
  <div>
    <label for="markets-intro" class="post-attributes-label">Introduction</label><br/>
    <textarea name="markets-intro" class="thick_textarea"><?php echo get_post_meta($page->ID, "markets-intro", true); ?></textarea><br/><br/>
    <?php $image_url = (get_post_meta($page->ID, "markets-intro-imagen", true )) ? get_post_meta($page->ID, "markets-intro-imagen", true ) : ''; ?>
    <img src="<?php echo $image_url ?>" width="150" id="markets-intro-preview"/><br/>
    <label for="accordion-box-button" class="post-attributes-label">Image</label><br/>
    <input id="markets-intro-imagen" type="text" name="markets-intro-imagen" value="<?php echo $image_url ?>" />
    <input id="markets-intro-button" class="button" type="button" value="Upload Image" /><br/>
    <label for="markets-intro-text" class="post-attributes-label">Aditional Text</label><br/>
    <?php wp_editor( get_post_meta($page->ID, "markets-intro-text", true), 'markets-intro-text', array() ); ?> <br/>
  </div>
  <div style="clear: both;"></div>
<?php }

function add_markets_extra_fields_box() {
  global $post;
  if ( 'templates/markets.php' == get_post_meta( $post->ID, '_wp_page_template', true ) && ( count(get_ancestors( $post->ID, 'page', 'post_type' ) ) > 0 ) )  {
    add_meta_box("markets_extra_fields_box", "markets Extra Fields", "markets_extra_fields_box_markup", "page", "normal", "high", null);
  }
}

add_action("add_meta_boxes", "add_markets_extra_fields_box");


function save_markets_extra_fields_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    if(isset($_POST["markets-intro"])) {
        $markets_intro = $_POST["markets-intro"];
    }
    update_post_meta($post_id, "markets-intro", $markets_intro);

    if(isset($_POST["markets-intro-imagen"])) {
          $markets_intro_imagen = $_POST["markets-intro-imagen"];
      }
    update_post_meta($post_id, "markets-intro-imagen", $markets_intro_imagen);

    if(isset($_POST["markets-intro-title"])) {
          $markets_intro_title = $_POST["markets-intro-title"];
      }
    update_post_meta($post_id, "markets-intro-title", $markets_intro_title);

    if(isset($_POST["markets-intro-text"])) {
          $markets_intro_text = $_POST["markets-intro-text"];
      }
    update_post_meta($post_id, "markets-intro-text", $markets_intro_text);
}

add_action("save_post", "save_markets_extra_fields_box", 10, 3);