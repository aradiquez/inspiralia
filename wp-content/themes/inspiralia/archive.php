<?php
/**
 * The template for displaying archive pages.
 *
 * @package inspiralia
 */

get_header(); ?>
<!-- Breadcrumb -->
<div class="inspiralia-breadcrumb-section">
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inspiralia-breadcrumb-title">
            <?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
          </div>
			<div>
            <ul class="inspiralia-page-breadcrumb">
              <?php if (function_exists('inspiralia_custom_breadcrumbs')) inspiralia_custom_breadcrumbs();?>
            </ul>
			</div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /End Breadcrumb -->
<main id="content">
  <div class="container">
    <div class="row">
      <div class="<?php echo ( !is_active_sidebar( 'sidebar_primary' ) ? '12' :'9' ); ?> col-md-9">
        <div class="row">
			<?php
			if( have_posts() ) :
			while( have_posts() ): the_post();
			get_template_part('content','');
			endwhile; endif;
			get_template_part('content','');
			?>
          <div class="col-md-12 text-center">
			<?php
			//Previous / next page navigation
			the_posts_pagination( array(
			'prev_text'          => __( '<i class="fa fa-long-arrow-left"></i>', 'inspiralia' ),
			'next_text'          => __( '<i class="fa fa-long-arrow-right"></i>', 'inspiralia' ),
			) );
			?>
          </div>
        </div>
      </div>
	  <aside class="col-md-3">
        <?php get_sidebar(); ?>
      </aside>
    </div>
  </div>
</main>
<?php get_footer(); ?>