<!--==================== LEADING MARKETS SECTION ====================-->
<?php
  $market_id = get_the_ID();
?>
<section class="inspiralia-section inspiralia-markets-intro" style="<?php echo add_background_when_need("markets-intro-background") ?>">
  <div class="row">
  <div class="col-md-12 text-center">
      <h3><?php echo get_post_meta($market_id, "markets-intro-title", true); ?></h3>

      <a href="<?php echo get_page_link(get_post_meta($market_id, "markets-intro-meta-page_id", true)); ?>" title="<?php echo get_post_meta($market_id, "markets-intro-name", true); ?>" class="btn btn-lg"><?php echo get_post_meta($market_id, "markets-intro-name", true); ?></a>
    </div>
  </div>
</section>