<!--==================== TESTIMONIAL SECTION ====================-->
<section class="inspiralia-testimonial-section">
  <div id="testimonial">
    <?php
    $inspiralia_latest_loop = new WP_Query( array( 'post_type' => 'testimonials', 'tax_query' => array(
        array (
            'taxonomy' => 'visibility',
            'field' => 'slug',
            'terms' => 'markets',
        )
    ), 'order' => 'rand') );
 if ( $inspiralia_latest_loop->have_posts() ) :
    while ( $inspiralia_latest_loop->have_posts() ) : $inspiralia_latest_loop->the_post();?>
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 item">
          <div class="inspiralia-testimonial-post-box">
            <article class="large">
              <div class="post_content <?php echo ( has_post_thumbnail() ) ? "image" : '' ?>">
                <?php the_content(); ?>
              </div>
              <div class="inspiralia-testimonial-contact">
                <h4 class="inspiralia-testimonial-title">
                  <?php the_title(); ?>
                </h4>
                <h5 class="inspiralia-testimonial-company-name">
                  <?php echo get_post_meta(get_the_ID(), "inspiralia_testimonial_company_name", true); ?><br/>
                </h5>
                <a href="http://<?php echo get_post_meta(get_the_ID(), "inspiralia_testimonial_company_url", true); ?>" target="_blank"><?php echo get_post_meta(get_the_ID(), "inspiralia_testimonial_company_url", true); ?>
                </a>
              </div>
            </article>
            <div class="clearfix"></div>
          </div>
          <div class="inspiralia-testimonial-post-image" <?php if ( has_post_thumbnail() ) : ?> style="background-image: url(<?php the_post_thumbnail_url(); ?>);" <?php else:?><?php endif; ?>>&nbsp;</div>
        </div>
      </div>
    <?php endwhile; endif;  wp_reset_postdata(); ?>
  </div>
</section>
<div class="clearfix"></div>
