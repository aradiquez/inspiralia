<div class="inspiralia-slider-section">
  <?php
    $inspiralia_top_blog_posts = new WP_Query( array( 'post_type' => 'post', 'order' => 'rand','ignore_sticky_posts' => true, 'limit' => 8) );
    if ( $inspiralia_top_blog_posts->have_posts() ) :
    while ( $inspiralia_top_blog_posts->have_posts() ) : $inspiralia_top_blog_posts->the_post(); ?>
    <?php if ( !has_post_thumbnail() ) {
      continue;
    } ?>
      <div class="col-md-4 col-sm-6 col-lg-4 item" <?php if ( has_post_thumbnail() ) : ?> style="background-image: url(<?php echo the_post_thumbnail_url(); ?>); width: 100%; height: 31.5rem; background-position: center; background-size: cover;"<?php endif ?>>
        <div class="item_overlay" style="display: none;"></div>
        <a  class="element" title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
          <h2><?php the_title(); ?></h2>
  				<p class="category">
  					<?php
  					$categories = get_the_category();
  					if ( ! empty( $categories ) ) {
  					    echo esc_html( $categories[0]->name );
  					}
  					?>
  				</p>
        </a>
      </div>
      <?php  endwhile; endif; wp_reset_postdata(); ?>
</div>
<div class="clearfix"></div>
