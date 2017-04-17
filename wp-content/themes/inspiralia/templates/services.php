<?php
/**
 * Template Name: Services Page
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
        <div id="primary" class="content-area">
          <main id="main" class="site-main" role="main">
            <?php
      			while ( have_posts() ) : the_post(); ?>
    					<div class="col-md-12">
                <section class="description">
                  <?php if( $post->post_parent != 0 ) { ?>
                    <h2><?php the_title(); ?></h2>
                  <?php  } ?>
    						  <?php the_content(); ?>
                </section>
              </div>
            <?php
      			endwhile; // End of the loop.
      			?>
          </main>
          <!-- #main -->
        </div>
        <!-- #primary -->
      </div>
    </div>
  </div>
  <?php if( is_page() && $post->post_parent == 0 ) { # parent ?>

    <?php get_template_part('sections/services', 'accordion'); ?>
    <div class="clearfix"></div>
    <?php get_template_part('sections/services', 'leading-markets'); ?>
    <div class="clearfix"></div>
    <?php get_template_part('sections/services', 'testimonials'); ?>

  <?php } else { #childs ?>

    <?php get_template_part('sections/services', 'custom-accordion'); ?>
    <div class="clearfix"></div>
    <?php get_template_part('sections/services', 'our-value'); ?>
    <div class="clearfix"></div>
    <?php get_template_part('sections/services', 'leading-markets'); ?>

  <?php } ?>

</main>
<?php
get_footer();
