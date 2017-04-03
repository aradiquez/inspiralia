<!--==================== SPECIALIZATION AREA SECTION ====================-->
<section class="inspiralia-section inspiralia-specialization">
  <div class="row">
    <div class="col-md-8 col-sm-12 text-center">
      <div class="centering-text">
        <?php echo get_post_meta(get_the_ID(), "markets-intro-text", true); ?>
      </div>
    </div>
    <div class="col-md-4 hidden-sm inspiralia-icon">
      <?php $image_url = (get_post_meta(get_the_ID(), "markets-intro-imagen", true ) ? get_post_meta(get_the_ID(), "markets-intro-imagen", true ) : '' ); ?>
      <img src="<?php echo $image_url ?>" class="responsive-img" alt="<?php echo get_post_meta(get_the_ID(), "markets-intro-title", true); ?>"/>
    </div>
  </div>
</section>