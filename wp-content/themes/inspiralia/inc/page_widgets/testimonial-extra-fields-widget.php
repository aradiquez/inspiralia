<?php

function testimonials_meta_box_markup($page) { ?>
 <?php wp_nonce_field( basename( __FILE__ ), 'testimonials_meta_box_nonce' ); ?>
  <div>
    <label for="testimonials-box-company-name" class="post-attributes-label">Company Name</label><br/>
    <input name="testimonials-box-company-name" class="thick_field" type="text" value="<?php echo get_post_meta($page->ID, "testimonials-box-company-name", true); ?>">
    <br />
    <label for="testimonials-box-company-url" class="post-attributes-label">URL</label><br/>
    <input name="testimonials-box-company-url" class="thick_field" type="text" placeholder="http://" value="<?php echo get_post_meta($page->ID, "testimonials-box-company-url", true); ?>">
  </div>
  <div style="clear: both;"></div>
<?php }

function add_testimonials_meta_box() {
  if (in_category('Testimonials')) {
    add_meta_box("testimonials_meta_box", "Testimonials Extra Fields", "testimonials_meta_box_markup", "post", "normal", "high", null);
  }
}

add_action("add_meta_boxes", "add_testimonials_meta_box");


function save_testimonials_meta_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
        return $post_id;

    for($i = 1; $i <= 3; $i++) {
      if(isset($_POST["testimonials-box-company-name"])) {
          $testimonials_box_company_name = $_POST["testimonials-box-company-name"];
      }
      update_post_meta($post_id, "testimonials-box-company-name", $testimonials_box_company_name);

      if(isset($_POST["testimonials-box-company-url"])) {
          $testimonials_box_company_url = $_POST["testimonials-box-company-url"];
      }
      update_post_meta($post_id, "testimonials-box-company-url", $testimonials_box_company_url);
    }
}

add_action("save_post", "save_testimonials_meta_box", 10, 3);

?>
