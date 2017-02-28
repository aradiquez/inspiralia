<!--==================== OUR VALUE SECTION ====================-->
<section class="inspiralia-section inspiralia-our-value">
  <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 text-center">
      <div class="centering-text">
        <?php echo get_post_meta(get_the_ID(), "services-our-value", true); ?>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs inspiralia-icon">
      <?php $image_url = (get_post_meta(get_the_ID(), "services-intro-imagen", true ) ? get_post_meta(get_the_ID(), "services-intro-imagen", true ) : '' ); ?>
      <img src="<?php echo $image_url ?>" class="responsive-img" alt=""/>
    </div>
  </div>
</section>