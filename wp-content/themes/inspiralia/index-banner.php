<div class="inspiralia-breadcrumb-section" style="<?php echo( has_header_image() ? "background: url(".get_header_image()." repeat fixed center 0;" : '')?>">
  <div class="overlay"> <!-- get_theme_support( 'custom-header', 'default-image' ) -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inspiralia-breadcrumb-title">
            <h1>
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
</div>
<div class="clearfix"></div>
