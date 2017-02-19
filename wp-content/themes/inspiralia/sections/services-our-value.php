<!--==================== OUR VALUE SECTION ====================-->
<section class="inspiralia-section inspiralia-our-value">
  <div class="row">
    <div class="col-md-8 col-sm-12 text-center">
      <div class="centering-text">
        <?php echo get_post_meta(get_the_ID(), "services-our-value", true); ?>
      </div>
    </div>
    <div class="col-md-4 col-sm-12 inspiralia-icon">
      <?php $image_url = (get_post_meta(get_the_ID(), "services-intro-imagen", true ) ? get_post_meta(get_the_ID(), "services-intro-imagen", true ) : '' ); ?>
      <img src="<?php echo $image_url ?>" class="responsive-img" alt="<?php echo get_post_meta(get_the_ID(), "services-our-value", true); ?>"/>
    </div>
  </div>
</section>