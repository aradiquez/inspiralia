<!--==================== NEEDS SECTION ====================-->
<section id="product" class="inspiralia-section inspiralia-products">
  <div class="row">
    <div class="col-md-12">
      <?php for($i = 1; $i <= 3; $i++) { ?>
          <div class="col-lg-4 col-md-4 col-sm-12 need-item needs-section-arrow need-arrow-<?php echo $i ?> visible-md-block visible-lg-block">&nbsp;</div>
          <div class="col-lg-4 col-md-4 col-sm-12 need-item need-information">
            <div class="need-information-content">
              <h2 class="h2-header"><?php echo get_post_meta(get_the_ID(), "meta-box-title-$i", true); ?></h2>
              <p class="content"><?php echo wp_trim_words(get_post_meta(get_the_ID(), "meta-box-description-$i", true), 23, '...'); ?></p>
            </div>
            <a class="button btn btn-lg" href="<?php echo get_page_link(get_post_meta(get_the_ID(), "meta-box-button-url-$i", true)); ?>" title="<?php echo get_post_meta(get_the_ID(), "meta-box-button-title-$i", true); ?>"><?php echo get_post_meta(get_the_ID(), "meta-box-button-title-$i", true); ?></a>
          </div>
      <?php } ?>
    </div>
  </div>
</section>
