<div class="map-information">
  <h3 class="title-information"><?php echo get_post_meta(get_the_ID(), "home-map-box-title", true); ?></h3>
  <img class="map-image" src="<?php echo get_post_meta(get_the_ID(), "home-map-box-img", true); ?>" alt="<?php echo get_post_meta(get_the_ID(), "home-map-box-title", true); ?>" />
  <a class="button-information btn btn-lg" href="<?php echo get_post_meta(get_the_ID(), "home-map-box-button-url", true); ?>" title="<?php echo get_post_meta(get_the_ID(), "home-map-box-button-title", true); ?>"><?php echo get_post_meta(get_the_ID(), "home-map-box-button-title", true); ?></a>
</ul>