<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package inspiralia
 */

get_header();
get_template_part('index','banner'); ?>
<main id="content">
    <div class="container">
      <div class="row">
		<!-- Blog Area -->
			<div class="col-md-12" >
			<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; else : endif; ?>
			<!--Sidebar Area-->
			</div>
		</div>
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
</main>
<?php
get_footer();

/*


<div class="col-md-9 col-sm-8">
<?php #if( have_posts()) :  the_post(); ?>
<?php #the_content(); ?>
<?php #endif; ?>
<?php #comments_template( '', true ); // show comments ?>
<!-- /Blog Area -->
</div>
<!--Sidebar Area-->
<aside class="col-md-3 col-sm-4">
<?php #get_sidebar(); ?>
</aside>
<?php #} ?>
*/
