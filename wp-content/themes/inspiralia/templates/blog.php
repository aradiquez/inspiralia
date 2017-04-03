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
<main id="content" class="blog_content">
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
        <div class="clearfix"></div>
        </main>
        <!-- #main -->
      </div>
    </div>
  </div>
</main>
<div class="blog_content newsletter">
  <span class="title">Sign up to receive our Newsletter</span>
  <?php echo do_shortcode('[cp_simple_newsletter]' ); ?>
  <div class="clearfix"></div>
</div>
<?php
get_footer();
