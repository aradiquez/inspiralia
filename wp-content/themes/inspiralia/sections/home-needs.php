<!--==================== NEEDS SECTION ====================-->
<section id="product" class="inspiralia-section inspiralia-products">
  <div class="row">
    <div class="col-md-12 wow animated text-center">
      <?php for($i = 1; $i <= 3; $i++) { ?>
          <div class="col-lg-4 col-md-4 col-sm-12 need-item needs-section-arrow need-arrow-<?php echo $i ?>">&nbsp;</div>
          <div class="col-lg-4 col-md-4 col-sm-12 need-item">
            <h2><?php echo get_post_meta(get_the_ID(), "meta-box-title-$i", true); ?></h2>
            <p><?php echo get_post_meta(get_the_ID(), "meta-box-description-$i", true); ?></p>
            <a href="<?php echo get_post_meta(get_the_ID(), "meta-box-button-url-$i", true); ?>" title="<?php echo get_post_meta(get_the_ID(), "meta-box-button-title-$i", true); ?>"><?php echo get_post_meta(get_the_ID(), "meta-box-button-title-$i", true); ?></a>
          </div>
      <?php } ?>
    </div>
  </div>
</section>