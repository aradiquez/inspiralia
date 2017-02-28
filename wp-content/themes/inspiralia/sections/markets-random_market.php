<!--==================== LEADING MARKETS SECTION ====================-->
<section class="inspiralia-section inspiralia-leading-market <?php echo ( count(get_ancestors( get_the_ID(), 'post', 'post_type' ) ) > 0 ? 'inspiralia-internal' : '' ) ?>" style="<?php echo add_background_when_need("leading-markets") ?>">
  <div class="row">
  <div class="col-md-12 text-center">
      <h3><?php echo get_post_meta(get_the_ID(), "leading-markets-box-title", true); ?></h3>

      <a href="<?php echo get_post_meta(get_the_ID(), "leading-markets-action-url", true); ?>" title="<?php echo get_post_meta(get_the_ID(), "leading-markets-action", true); ?>" class="btn btn-lg"><?php echo get_post_meta(get_the_ID(), "leading-markets-action", true); ?></a>
    </div>
  </div>
</section>