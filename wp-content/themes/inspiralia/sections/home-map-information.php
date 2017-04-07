<section class="map-information">
  <div class="row">
    <div class="col-md-12 text-center">
      <h3 class="title-information"><?php echo get_post_meta(get_the_ID(), "home-map-box-title", true); ?></h3>
      <div class="map-image">&nbsp;</div>
      <a class="button-information btn btn-lg" href="<?php echo get_page_link(get_post_meta(get_the_ID(), "home-map-box-button-url", true)); ?>" title="<?php echo get_post_meta(get_the_ID(), "home-map-box-button-title", true); ?>"><?php echo get_post_meta(get_the_ID(), "home-map-box-button-title", true); ?></a>
    </div>
  </div>
</section>
