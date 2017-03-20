<div class="inspiralia-breadcrumb-section" style="width: 100%;<?php echo(has_post_thumbnail() ? "background-image: url(".get_the_post_thumbnail_url($post, 'full').");" : ( has_header_image() ? "background-image: url(".get_header_image().");" : '')) ?> z-index: 700; ">
  <?php echo (is_front_page() ? '' : '<div class="overlay"></div>') ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="inspiralia-breadcrumb-title <?php echo get_post_meta( $post->ID, '_wp_page_template', true ) == 'templates/contact.php' ? 'contact' : '' ?>">
          <h1 <?php echo (is_front_page() ? 'style="color: #00b1dd;"' : ''); ?>>
            <?php #the_title(); ?>
            <?php echo get_post_meta($post->ID, "subtitle-box-title", true); ?>
          </h1>
        </div>
      </div>
      <div class="col-md-12">
        <ul class="inspiralia-page-breadcrumb">
          <?php if (function_exists('inspiralia_custom_breadcrumbs')) inspiralia_custom_breadcrumbs();?>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
