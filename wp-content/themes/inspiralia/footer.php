<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package inspiralia
 */
?>
  <!--==================== inspiralia-FOOTER AREA ====================-->

  <footer>
    <div class="inspiralia-footer-widget-area">
      <div class="container">
        <div class="row">
          <div class="inspiralia-widget">
            <!--Start inspiralia-footer-widget-area-->
            <?php if ( is_active_sidebar( 'footer_widget_area_contact_information' ) ) { ?>
              <?php  dynamic_sidebar( 'footer_widget_area_contact_information' ); ?>
            <?php } ?>

            <?php if ( is_active_sidebar( 'footer_widget_area_menu' ) ) { ?>
              <?php  dynamic_sidebar( 'footer_widget_area_menu' ); ?>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
      <!--Scroll To Top-->
    <a href="#" class="inspiralia_scroll bounceInRight  animated"><i class="fa fa-level-up"></i></a>
    <!--/Scroll To Top-->
    <?php wp_footer(); ?>

    <?php if( get_theme_mod( 'hide_copyright' ) != 'false') { ?>
      <?php echo esc_html(get_theme_mod( 'inspiralia_footer_copyright_setting'));?>
    <?php } ?>
  </footer>

  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>