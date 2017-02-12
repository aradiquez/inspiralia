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
<?php wp_head(); ?>
</head>

<body <?php body_class( ); ?> >
  <div class="wrapper">
    <a style="display:none;" class="skip-link screen-reader-text" href="#content">
      <?php esc_html_e( 'Skip to content', 'inspiralia' ); ?>
    </a>

  <header class="inspiralia-trhead">
    <!--==================== MAIN MENU ====================-->
    <div class="inspiralia-main-nav">
      <nav class="navbar navbar-default navbar-wp">
        <div class="container">
          <div class="navbar-header col-md-2">
            <!-- Logo -->
            <div class="site-branding">
            	<div class="wrap">

            		<?php the_custom_logo(); ?>
            		<div class="site-branding-text">
            			<?php if ( is_front_page() ) : ?>
            				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            			<?php else : ?>
            				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            			<?php endif; ?>

            			<?php $description = get_bloginfo( 'description', 'display' );
            				if ( $description || is_customize_preview() ) : ?>
            					<p class="site-description"><?php echo $description; ?></p>
            				<?php endif; ?>
            		</div><!-- .site-branding-text -->

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
        </div>
      </nav>
  </header>