<?php
$slider_query = new WP_Query( array( 'post__in' => $slider_post));
if( $slider_query->have_posts() ){
  while( $slider_query->have_posts() ){
    $slider_query->the_post(); ?>
    <div class="item">
      <figure>
        <?php if(has_post_thumbnail()) {
          $defalt_arg =array('class' => "img-responsive");
          the_post_thumbnail('', $defalt_arg);
          } else { ?>
          <img src="<?php print(get_template_directory_uri()); ?>/images/slide/slide.jpg" alt="<?php echo the_title(); ?>">
        <?php } ?>
      </figure>
      <div class="inspiralia-slider-inner" style="background:<?php echo esc_html($slider_overlay);?>">
        <div class="container inner-table">
          <div class="inner-table-cell">
            <div class="slide-caption">
              <h1>
                <?php the_title(); ?>
              </h1>
              <div class="description">
                <p>
                  <?php the_content(); ?>
                </p>
              </div>
           </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    }
  }
wp_reset_query();
?>