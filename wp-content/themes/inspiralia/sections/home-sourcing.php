<!--==================== SOURCING SECTION ====================-->
<section class="inspiralia-section inspiralia-sourcing">
  <div class="row">
  <div class="col-md-12 text-center">
      <h3><?php echo get_post_meta(get_the_ID(), "home-sourcing-box-title", true); ?></h3>

      <a href="<?php echo get_post_meta(get_the_ID(), "home-sourcing-action-url", true); ?>" title="<?php echo get_post_meta(get_the_ID(), "home-sourcing-action", true); ?>" class="btn btn-lg"><?php echo get_post_meta(get_the_ID(), "home-sourcing-action", true); ?></a>
    </div>
  </div>
</section>