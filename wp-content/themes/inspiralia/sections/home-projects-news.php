<!--==================== PROJECTS NEWS SECTION ====================-->
<div class="projects-news-header">
  <div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 text-center">
      <h3>Selected Projects and News</h3>
    </div>
  </div>
</div>

<?php if($news_background != '') { ?>
<section id="projects-news" class="inspiralia-project-news-section" style="background-image:url('<?php echo esc_url($news_background);?>');">
<?php } else { ?>
<section id="projects-news" class="inspiralia-project-news-section">
<?php } ?>
  <div class="row">
    <div class="col-lg-12">
    <?php
    $post_number = 0;
    $inspiralia_project_news_category = array(get_cat_ID('Projects'), get_cat_ID('News'));
    $inspiralia_latest_loop = new WP_Query( array( 'post_type' => 'post', 'order' => 'DESC','ignore_sticky_posts' => true, 'category__in' => $inspiralia_project_news_category, 'posts_per_page' => 5 ) ); if ( $inspiralia_latest_loop->have_posts() ) :
    while ( $inspiralia_latest_loop->have_posts() ) : $inspiralia_latest_loop->the_post();?>
      <div class="col-md-4 col-sm-6 col-lg-4 item <?php echo (($post_number % 2) != 0 ? 'projects-news-item' : '') ?>">
        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" <?php echo (($post_number % 2) == 0 ? 'class="inspiralia-project-news-post-box-link"' : '') ?>>
        <div <?php if ( has_post_thumbnail() ) : ?> class="inspiralia-project-news-post-box white" <?php else:?> class="inspiralia-project-news-post-box" <?php endif; ?>>
            <article class="large text-center center-block">
              <h4 class="inspiralia-project-news-title">
                <?php echo wp_trim_words( get_the_title(), 9, "...") ?>
              </h4>
              <?php if ( get_post_meta(get_the_ID(), "projects-box-intro", true) ) { ?>
                <?php echo wp_trim_words(get_post_meta(get_the_ID(), "projects-box-intro", true), 12, '...') ?>
              <?php } else { ?>
                <?php the_excerpt(12); ?>
              <? } ?>
            </article>
            <?php if ( has_post_thumbnail() && ($post_number % 2) == 0) { ?>
              <img src="<?php echo the_post_thumbnail_url(); ?>" clas="img-responsive" alt="" />
            <?php } ?>
          </div>
        </a>
      </div>
      <?php $post_number++ ?>
      <?php  endwhile; endif;	wp_reset_postdata(); ?>
      <div class="col-md-4 col-sm-6 col-lg-4 item-more">
        <a class="inspiralia-project-news-more" href="<?php echo get_permalink(get_page_by_title('Case Studies')->ID); ?>">More success stories</a>
      </div>
    </div>
  </div>
</section>
