<!--==================== LEADING MARKETS SECTION ====================-->
<?php
  global $post;
  $post_image = get_the_post_thumbnail_url(get_post_meta($post->ID, "linked_page_meta_page_id", true))
?>
<section class="inspiralia-section inspiralia-leading-market <?php echo ( count(get_ancestors( $post->ID, 'post', 'post_type' ) ) > 0 ? 'inspiralia-internal' : '' ) ?>" style="<?php echo ($post->post_parent != 0 && $post_image ? "background: url(".$post_image.") repeat fixed center 0;  filter: grayscale(100%);" : '')?>">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="middle_box">
        <h3><?php echo get_post_meta($post->ID, "linked_page_box_title", true); ?></h3>
        <?=get_post_meta($post->ID, "linked_page_box_related", true)?>
        <a href="<?php echo get_page_link(get_post_meta($post->ID, "linked_page_meta_page_id", true)); ?>" title="<?php echo get_post_meta($post->ID, "leading-markets-action", true); ?>" class="btn btn-lg"><?php echo get_post_meta($post->ID, "linked_page_box_name", true); ?></a>
      </div>
    </div>
  </div>
</section>