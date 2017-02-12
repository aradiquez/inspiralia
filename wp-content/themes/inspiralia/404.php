<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package inspiralia
 */

get_header(); ?>
<!--==================== ti breadcrumb section ====================-->
<div class="inspiralia-breadcrumb-section" >
  <div class="overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="inspiralia-page-breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i></a></li>
            <li class="active"><a href="#"><?php __('404','inspiralia'); ?></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--==================== ti breadcrumb section end ====================-->
<main id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center inspiralia-section">
        <div id="primary" class="content-area">
          <main id="main" class="site-main" role="main">
            <div class="inspiralia-error-404">
              <h1><?php _e('4','inspiralia'); ?><i class="fa fa-times-circle-o"></i><?php _e('4','inspiralia'); ?></h1>
              <h4>
                <?php esc_html_e( 'Oops! That page can&rsquo;t be found.','inspiralia' ); ?>
              </h4>
              <p>
                <?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'inspiralia' ); ?>
              </p>
              <a href="#" onClick="history.back();" class="btn btn-theme"><?php _e('Go Back','inspiralia'); ?></a> </div>
            <section class="error-404 not-found">
              <header class="page-header">
                <h1 class="page-title"></h1>
              </header>
              <!-- .page-header -->

              <div class="page-content">
                <div class="col-md-4 col-md-offset-4">
                  <div class="inspiralia-sidebar">
                    <?php
						get_search_form();
					?>
                  </div>
                </div>
              </div>
              <!-- .page-content -->
            </section>
            <!-- .error-404 -->

          </main>
          <!-- #main -->
        </div>
        <!-- #primary -->
      </div>
    </div>
  </div>
</main>
<?php
get_footer();