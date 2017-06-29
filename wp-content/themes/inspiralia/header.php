<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package inspiralia
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<meta property="og:url"           content="<?php echo site_url() ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Inspiralia" />
<meta property="og:description"   content="Your partner of choice for new product development" />
<meta property="og:image"         content="<?php echo(has_post_thumbnail() ? get_the_post_thumbnail_url($post, 'full') : '') ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<?php wp_head(); ?>
</head>

<body <?php body_class( ); ?> >
  <div class="wrapper">
    <a style="display:none;" class="skip-link screen-reader-text" href="#content">
      <?php esc_html_e( 'Skip to content', 'inspiralia' ); ?>
    </a>
  <!-- <?php echo (is_front_page() ? '' : 'internal') ?> -->
  <div class="navbar-background">
    &nbsp;
  </div>
  <header class="inspiralia-trhead">
    <!--==================== MAIN MENU ====================-->
    <div class="inspiralia-main-nav">
      <nav class="navbar navbar-default navbar-wp" style="z-index: 1000;">
        <div class="navbar-header col-md-4 col-sm-4 col-lg-4">
          <!-- Logo -->
          <div class="site-branding">
          	<div class="wrap">

              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home" itemprop="url">
                <span class="custom-logo" alt="<?php bloginfo( 'name' ); ?>" itemprop="logo">
                  &nbsp;
                </span>
              </a>
          		<?php #the_custom_logo(); ?>
          		<div class="site-branding-text">
          			<?php if ( is_front_page() ) : ?>
          				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          			<?php else : ?>
          				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
          			<?php endif; ?>
          		</div><!-- .site-branding-text -->

          	</div><!-- .wrap -->
          </div><!-- .site-branding -->
          <!-- Logo -->

          <!-- navbar-toggle -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-wp"> <span class="sr-only"><?php _e('Toggle Navigation','inspiralia'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <!-- /navbar-toggle -->

        <!-- Navigation <?php echo (is_front_page() ? '' : 'internal') ?> -->
        <div class="collapse navbar-collapse col-md-8 col-sm-8 col-lg-8 <?php echo (is_front_page() ? '' : 'internal')?>" id="navbar-wp">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right', 'fallback_cb' => 'inspiralia_custom_navwalker::fallback' , 'walker' => new inspiralia_custom_navwalker() ) ); ?>
        </div>
      </nav>
  </header>
