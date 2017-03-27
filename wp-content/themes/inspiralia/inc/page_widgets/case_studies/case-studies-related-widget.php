<?php
function case_studies_intro_meta_box_markup($post) { ?>
 <?php wp_nonce_field( basename( __FILE__ ), 'case_studies_intro_meta_box_nonce' );
  $args = array(
      'depth'                 => 2,
      // 'child_of'              => $post->post_parent,
      'selected'              => get_post_meta($post->ID, "case-studies-intro-meta-page_id", true),
      'name'                  => 'case-studies-intro-meta-page_id'
  );
 ?>
  <div style="display: block;">
    <?php $image_url = (get_post_meta($post->ID, "case-studies-intro-imagen", true )) ? get_post_meta($post->ID, "case-studies-intro-imagen", true ) : ''; ?>
    <img src="<?php echo $image_url ?>" width="150" id="case-studies-intro-imagen-preview"/><br/>
    <label for="case-studies-intro-image" class="post-attributes-label">Image</label><br/>
    <input id="case-studies-intro-imagen" type="text" name="case-studies-intro-imagen" value="<?php echo $image_url ?>" />
    <input id="case-studies-intro-imagen-button" class="button" type="button" value="Upload Image" /><br/>

    <?php $logo_url = (get_post_meta($post->ID, "case-studies-intro-logo", true )) ? get_post_meta($post->ID, "case-studies-intro-logo", true ) : ''; ?>
    <img src="<?php echo $logo_url ?>" width="150" id="case-studies-intro-logo-preview"/><br/>
    <label for="case-studies-intro-logo" class="post-attributes-label">Logo</label><br/>
    <input id="case-studies-intro-logo" type="text" name="case-studies-intro-logo" value="<?php echo $logo_url ?>" />
    <input id="case-studies-intro-logo-button" class="button" type="button" value="Upload Image" /><br/>

    <?php $pdf_url = (get_post_meta($post->ID, "case-studies-intro-pdf", true )) ? get_post_meta($post->ID, "case-studies-intro-pdf", true ) : ''; ?>
    <label for="case-studies-intro-pdf" class="post-attributes-label">PDF</label><br/>
    <input id="case-studies-intro-pdf" type="text" name="case-studies-intro-pdf" value="<?php echo $pdf_url ?>" />
    <input id="case-studies-intro-pdf-button" class="button" type="button" value="Upload PDF" /><br/>


    <label for="case-studies-intro-title" class="post_attributes_label">Title</label><br/>
    <input name="case-studies-intro-title" class="thick_field" type="text" value="<?php echo get_post_meta($post->ID, "case-studies-intro-title", true); ?>"><br/>
    <label for="case-studies-intro" class="post_attributes_label">Introduction</label><br/>
    <input name="case-studies-intro" class="thick_field" type="text" value="<?php echo get_post_meta($post->ID, "case-studies-intro", true); ?>"><br/>
    <fieldset>
      <legend>Services</legend>
      <?php echo show_page_selects('case_studies_intro_services', 2); ?>
    </fieldset>
    <fieldset>
      <legend>Markets</legend>
      <?php echo show_page_selects('case_studies_intro_markets', 2); ?>
    </fieldset>
  </div>
  <div style="clear: both;"></div>
<?php }

function show_page_selects($name, $elements) {
  global $post;
  $args = array();
  for($i=0; $i<=$elements; $i++) {
    $args = array(
      'depth'                 => 2,
      'selected'              => get_post_meta($post->ID, $name .'_'. $i . "_page_id", true),
      'name'                  => $name .'_'. $i . "_page_id",
      'show_option_none'      => '(no parent)'
    ); ?>
    <label for="<?php echo $name .'_'. $i ?>_page_id" class="post_attributes_related">Related to:</label><br/>
    <?php wp_dropdown_pages($args); ?><br/>
  <? }
}

function add_case_studies_intro_meta_box() {
  global $post;
    if ( 'templates/case_studies.php' == get_post_meta( $post->ID, '_wp_page_template', true ) && ( count(get_ancestors( $post->ID, 'page', 'post_type' ) ) > 0 ) )  {
    add_meta_box("case_studies_intro_meta_box", "Case Studies Related Element Box", "case_studies_intro_meta_box_markup", "page", "normal", "high", null);
  }
}

  add_action("add_meta_boxes", "add_case_studies_intro_meta_box");

function save_page_selects($name, $elements, $post_id) {
  for($i=0; $i<=$elements; $i++) {
    if(isset($_POST[$name .'_'. $i . "_page_id"])) {
        $related_items = $_POST[$name .'_'. $i . "_page_id"];
    }
    update_post_meta($post_id, $name .'_'. $i . "_page_id", $related_items);
  }
}


function save_case_studies_intro_meta_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "page";
    if($slug != $post->post_type)
        return $post_id;

    save_page_selects('case_studies_intro_services', 2, $post_id);
    save_page_selects('case_studies_intro_markets', 2, $post_id);

    if(isset($_POST["case-studies-intro-imagen"])) {
        $market_meta_background_image= $_POST["case-studies-intro-imagen"];
    }
    update_post_meta($post_id, "case-studies-intro-imagen", $market_meta_background_image);

    if(isset($_POST["case-studies-intro-logo"])) {
        $market_meta_logo= $_POST["case-studies-intro-logo"];
    }
    update_post_meta($post_id, "case-studies-intro-logo", $market_meta_logo);

    if(isset($_POST["case-studies-intro-pdf"])) {
        $market_meta_pdf= $_POST["case-studies-intro-pdf"];
    }
    update_post_meta($post_id, "case-studies-intro-pdf", $market_meta_pdf);

    if(isset($_POST["case-studies-intro-title"])) {
        $meta_box_title_value = $_POST["case-studies-intro-title"];
    }
    update_post_meta($post_id, "case-studies-intro-title", $meta_box_title_value);

    if(isset($_POST["case-studies-intro"])) {
        $meta_box_title_value = $_POST["case-studies-intro"];
    }
    update_post_meta($post_id, "case-studies-intro", $meta_box_title_value);
}


add_action("save_post", "save_case_studies_intro_meta_box", 10, 3);
