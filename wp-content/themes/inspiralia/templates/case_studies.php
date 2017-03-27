<?php
/**
 * Template Name: Case Studies Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package inspiralia
 */
 ?>
<!-- =========================
     Page Breadcrumb
============================== -->
<?php get_header('case_studies');
get_template_part('index','banner'); ?>
<!-- =========================
     Page Content Section
============================== -->

<?php if( is_page() && $post->post_parent == 0 ) { # parent ?>
  <?php get_template_part('sections/case-studies', 'grid'); ?>
  <div class="clearfix"></div>
  <?php get_template_part('sections/case-studies', 'bottom-element'); ?>
<?php } else { ?>
  <?php get_template_part('sections/case-studies', 'details'); ?>
<?php } ?>
<?php get_footer(); ?>
