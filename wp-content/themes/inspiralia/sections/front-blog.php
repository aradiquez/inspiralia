<?php  $inspiralia_news_enable = get_theme_mod('inspiralia_news_enable');
	if($inspiralia_news_enable){
	$inspiralia_total_posts = get_option('posts_per_page'); /* number of latest posts to show */
	if( !empty($inspiralia_total_posts) && ($inspiralia_total_posts > 0) ):
    $news_background = get_theme_mod('news_background','');
    $news_section_color = get_theme_mod('news_section_color',''); ?>
<!--==================== BLOG SECTION ====================-->
<?php if($news_background != '') { ?>
<section id="blog" class="inspiralia-blog-section" style="background-image:url('<?php echo esc_url($news_background);?>');">
<?php } else { ?>
<section id="blog" class="inspiralia-blog-section">
<?php } ?>
	<div class="overlay" style="background-color:<?php echo esc_html($news_section_color);?>">
    	<div class="container">
      		<div class="row">
        		<div class="col-md-12 wow fadeInDown animated padding-bottom-50 text-center">
          			<div class="inspiralia-heading">
            			<?php $inspiralia_news_title = esc_attr(get_theme_mod('inspiralia_news_title')); if( !empty($inspiralia_news_title) ): echo '<h3 class="inspiralia-heading-inner">'.$inspiralia_news_title.'</h3>'; endif; ?>
          			</div>
          			<?php $inspiralia_news_subtitle = esc_attr(get_theme_mod('inspiralia_news_subtitle'));
          			if( !empty($inspiralia_news_subtitle) ): echo '<p class="heading">'.$inspiralia_news_subtitle.'</p>'; endif; ?>
        		</div>
      		</div>
      		<div class="clear"></div>
			<div class="row">
	       		<?php $inspiralia_latest_loop = new WP_Query( array( 'post_type' => 'post', 'order' => 'DESC','ignore_sticky_posts' => true ) ); if ( $inspiralia_latest_loop->have_posts() ) :
					while ( $inspiralia_latest_loop->have_posts() ) : $inspiralia_latest_loop->the_post();?>

				<div class="col-md-4">
			        <div <?php if ( has_post_thumbnail() ) : ?> class="inspiralia-blog-post-box" style="background-image: url(<?php the_post_thumbnail_url(); ?>);" <?php else:?> class="inspiralia-blog-post-box white" <?php endif; ?>>
			        	<article class="small">
				            <span class="inspiralia-blog-date">
				          		<i class="fa fa-clock-o"></i>
				          		<span><?php echo get_the_date('j'); ?></span>
				          		<span><?php echo get_the_date('M'); ?></span>
				          	</span>
				            <h2 class="inspiralia-blog-title"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>">
							  <?php the_title(); ?>
							  </a>
							</h2>
				            <?php the_excerpt(); ?>
				            <div class="inspiralia-blog-category">
						  		<?php $cat_list = get_the_category_list();
						  		if(!empty($cat_list)) { ?>
						  		<?php the_category(', '); ?>
					   			<?php } ?>
					  			<a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>"><?php _e('by','inspiralia'); ?>
								<?php the_author(); ?>
					  			</a>
							</div>
			          	</article>
			        </div>
				</div>
			<?php  endwhile; endif;	wp_reset_postdata(); ?>
	    	</div>
  		</div>
	</div>
</section>
<?php endif; }?>