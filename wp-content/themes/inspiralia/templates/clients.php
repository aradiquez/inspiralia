<?php
/**
 * Template Name: Clientes Page
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
<?php get_template_part('sections/clients', 'grid'); ?>
<div class="clearfix"></div>
<?php get_footer(); ?>
