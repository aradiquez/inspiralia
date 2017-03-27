<?php
/**
 * Template Name: Full Width Page
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
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
      <div class="container">
          <?php
          while ( have_posts() ) : the_post(); ?>
            <section class="description">
              <?php the_content(); ?>
            </section>
          <?php
          endwhile; // End of the loop.
          ?>
      </div>
    </div>
  </div>
</main>
<?php
get_footer();
