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
<meta property="og:title"         content="<?php the_title(); ?>" />
<meta property="og:description"   content="<?php echo get_post_meta(get_the_ID(), "projects-box-intro", true) ?>" />
<meta property="og:image"         content="<?php echo(has_post_thumbnail() ? get_the_post_thumbnail_url($post, 'full') : '') ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<?php wp_head(); ?>
</head>

<body <?php body_class( ); ?> >
  <div class="wrapper">
    <a style="display:none;" class="skip-link screen-reader-text" href="#content">
      <?php esc_html_e( 'Skip to content', 'inspiralia' ); ?>
    </a>
    <div class="navbar-background blog">
      &nbsp;
    </div>

	  <header class="inspiralia-trhead blog-header">
	    <!--==================== MAIN MENU ====================-->
	    <div class="inspiralia-main-nav">
	    	<nav class="navbar navbar-default navbar-wp" style="z-index: 1000;">

          <div class="navbar-header">
            <!-- Logo -->
            <div class="site-branding">
            	<div class="wrap">

            		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home" itemprop="url">
                  <span class="custom-logo" alt="<?php bloginfo( 'name' ); ?>" itemprop="logo">
                    &nbsp;
                  </span>
                </a>
                <?php #the_custom_logo(); ?>
                <h1 class="blog">Blog</h1>

            	</div><!-- .wrap -->
            </div><!-- .site-branding -->
            <!-- Logo -->

            <!-- navbar-toggle -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-wp"> <span class="sr-only"><?php _e('Toggle Navigation','inspiralia'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <!-- /navbar-toggle -->

          <!-- Navigation -->
          <div class="collapse navbar-collapse" id="navbar-wp">
              <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav navbar-right', 'fallback_cb' => 'inspiralia_custom_navwalker::fallback' , 'walker' => new inspiralia_custom_navwalker() ) ); ?>
          </div>

	      </nav>
			</div>
	  </header>
