<?php

function projects_meta_box_markup($page) { ?>
 <?php wp_nonce_field( basename( __FILE__ ), 'projects_meta_box_nonce' ); ?>
  <div>
    <label for="projects-box-intro" class="post-attributes-label">Introduction</label><br/>
    <textarea name="projects-box-intro" class="thick_textarea"><?php echo get_post_meta($page->ID, "projects-box-intro", true); ?></textarea>
  </div>
  <div style="clear: both;"></div>
<?php }

function add_projects_meta_box() {
  if (in_category('projects') || in_category('news')) {
    add_meta_box("projects_meta_box", "Projects & News Extra Fields", "projects_meta_box_markup", "post", "normal", "high", null);
  }
}

add_action("add_meta_boxes", "add_projects_meta_box");


function save_projects_meta_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
        return $post_id;

    if(isset($_POST["projects-box-intro"])) {
        $projects_box_company_url = $_POST["projects-box-intro"];
    }
    update_post_meta($post_id, "projects-box-intro", $projects_box_company_url);
}

add_action("save_post", "save_projects_meta_box", 10, 3);