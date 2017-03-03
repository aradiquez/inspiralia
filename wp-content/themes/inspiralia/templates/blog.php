<?php
/**
 * Template Name: Blog Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package inspiralia
 */
get_header('blog');
get_template_part('index','blog'); ?>
<main id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <main id="main" class="site-main" role="main">
          <?php
          while ( have_posts() ) : the_post(); ?>
            <div class="col-md-12">
                <?php the_content(); ?>
            </div>
          <?php
          endwhile; // End of the loop.
          ?>
        </main>
        <!-- #main -->
      </div>
    </div>
</main>
<?php
get_footer();