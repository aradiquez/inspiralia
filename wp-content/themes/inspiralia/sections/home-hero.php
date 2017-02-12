
  <!--==================== SLIDER ====================-->
  <section class="inspiralia-slider-warraper">
    <div id="inspiralia-slider" class="owl-carousel">
  	<!--Slider-one-->
  	<?php
    $slider_post_one = array(get_theme_mod('slider_post_one'));
    $slider_post = $slider_post_one;
  	if($slider_post){
      get_template_part('sections/home','slider_item');
    }
  	echo "<!-- Slider Two -->"
    $slider_post_two = array(get_theme_mod('slider_post_two'));
    $slider_post = $slider_post_two
    if($slider_post) {
      get_template_part('sections/home','slider_item');
    }
  	echo "<!-- Slider Three-->"
    $slider_post_three = array(get_theme_mod('slider_post_three'));
    $slider_post = $slider_post_three;
  	if($slider_post) {
      get_template_part('sections/home','slider_item');
  	}?>
    </div>
  </section>
  <div class="clearfix"></div>