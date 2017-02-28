<!--==================== TESTIMONIAL SECTION ====================-->
<?php if($testimonials_background != '') { ?>
<section class="inspiralia-testimonial-section" style="background-image:url('<?php echo esc_url($testimonials_background);?>');">
<?php } else { ?>
<section class="inspiralia-testimonial-section">
<?php } ?>
  <div id="testimonial" class="container">
    <?php
    $inspiralia_latest_loop = new WP_Query( array( 'post_type' => 'testimonials', 'order' => 'DESC') );
    if ( $inspiralia_latest_loop->have_posts() ) :
    while ( $inspiralia_latest_loop->have_posts() ) : $inspiralia_latest_loop->the_post();?>
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 item">
          <div <?php if ( has_post_thumbnail() ) : ?> class="inspiralia-testimonial-post-box" style="background-image: url(<?php the_post_thumbnail_url(); ?>);" <?php else:?> class="inspiralia-testimonial-post-box white" <?php endif; ?>>
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
        </div>
      </div>
    <?php endwhile; endif;	wp_reset_postdata(); ?>
  </div>
</section>
<div class="clearfix"></div>