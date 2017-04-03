<?php


function save_markets_extra_fields_box($post_id, $post, $update)
{
    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    $slug = "applications";
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
