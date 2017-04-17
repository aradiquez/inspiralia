<?php
/**
 * Template Name: Markets Page
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
      <div class="col-md-12">

          <main id="main" class="site-main" role="main">
            <?php
      			while ( have_posts() ) : the_post(); ?>
    					<div class="col-md-12">
                <section class="description">
                  <h2><?php the_title() ?></h2>
					        <?php the_content(); ?>
				        </section>
              </div>
            <?php
      			endwhile; // End of the loop.
      			?>
          </main>
          <!-- #main -->
      </div>
    </div>
  </div>
  <?php if( is_page() && $post->post_parent == 0 ) { # parent ?>

    <?php get_template_part('sections/markets', 'markets_list'); ?>
    <div class="clearfix"></div>
    <?php get_template_part('sections/markets', 'random_page'); ?>
    <div class="clearfix"></div>
    <?php get_template_part('sections/markets', 'testimonials'); ?>

  <?php } else { #childs ?>

    <?php get_template_part('sections/markets', 'specialization_area'); ?>
    <div class="clearfix"></div>
    <?php get_template_part('sections/markets', 'random_market'); ?>

  <?php } ?>

</main>
<?php
get_footer();
