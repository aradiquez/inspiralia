<?php
session_start();
/**
 * Template Name: Carreers Page
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
<?php get_header();
get_template_part('index','banner'); ?>
<!-- =========================
     Page Content Section
============================== -->
<main id="content">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <?php
				if ($_SESSION['apply']) {
          if ($_SESSION['apply']['success']!= "") {
              echo '<p class="bg-success">'.$_SESSION['apply']['success'].'<a href="" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a></p>';
              $_SESSION['apply']['success'] = "";
          }
          if ($_SESSION['apply']['error'] != "") {
              echo '<p class="bg-danger">'.$_SESSION['apply']['error'].'<a href="" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a></p>';
              $_SESSION['apply']['error'] = "";
          }
				}
        ?>
        <?php
        while ( have_posts() ) : the_post(); ?>
          <section class="description carreers">
            <?php the_content(); ?>
          </section>
        <?php
        endwhile; // End of the loop.
        ?>
    </div>
  </div>
</main>
<?php get_template_part('sections/carreers', 'grid'); ?>
<div class="clearfix"></div>
<?php get_footer(); ?>
