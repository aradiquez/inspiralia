<?php
/**
 * Template Name: Sitemap Page
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
          <div class="row">
            <?php get_template_part('sections/sitemap', 'sub-elements'); ?>
          </div>
        </div>
        <!-- #primary -->
      </div>
    </div>
</main>
<?php
get_footer();
