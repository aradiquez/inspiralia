<?php
/**
 * The template for displaying search results pages.
 *
 * @package inspiralia
 */
get_header();
get_template_part('index','banner');
?>
<!--==================== Breadcrumb ====================-->
<div class="clearfix"></div>
<main id="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row">
          <?php
		global $i;
		if ( have_posts() ) : ?>
		<h2><?php printf( __( "Search Results for: %s", 'inspiralia' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
		<?php while ( have_posts() ) : the_post();
		 get_template_part('content','');
		 endwhile; else : ?>
		<h2><?php _e('Not Found','inspiralia'); ?></h2>
		<div class="">
		<p><?php _e( "Sorry, Do Not match.","inspiralia"); ?>
		</p>
		<?php get_search_form(); ?>
		</div><!-- .blog_con_mn -->
		<?php endif; ?>
         </div>
      </div>
    </div>
  </div>
</main>
<?php
get_footer();
?>
