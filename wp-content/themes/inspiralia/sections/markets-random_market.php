<!--==================== LEADING MARKETS SECTION ====================-->
<?php
  $market_id = get_the_ID();
  $background = add_background_when_need("markets-intro-background");
  $no_background = true;
?>
<section class="inspiralia-section inspiralia-markets-intro" style="<?php echo $background ?>">
  <? if ( !empty( $background ) ) { $no_background = false; ?>
    <div class="inspiralia-section-background">
      &nbsp;
    </div>
  <?php } ?>
  <div class="row">
  <div class="col-md-12 text-center <?php echo $no_background ? 'market-without-background' : ''?>">
      <h3><?php echo get_post_meta($market_id, "markets-intro-title", true); ?></h3>

      <a href="<?php echo get_page_link(get_post_meta($market_id, "markets-intro-meta-page_id", true)); ?>" title="<?php echo get_post_meta($market_id, "markets-intro-name", true); ?>" class="btn btn-lg"><?php echo get_post_meta($market_id, "markets-intro-name", true); ?></a>
    </div>
  </div>
</section>
