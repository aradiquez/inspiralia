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
<?php if(have_posts()) { ?>
  <section class='hero-case-studies-title'>
    <h1 class="inspiralia-case-studies-title"><?php the_title(); ?></h1>
    <span class="inspiralia-case-studies-date">
      <span><?php echo get_the_date('j F, Y'); ?>, Madrid, Spain</span>
    </span>
  </section>

  <main id="content">
    <div class="row">
      <?php while(have_posts()) { the_post(); ?>
        <div class="col-md-12 col-lg-12 col-sm-12 case_studies_post">
          <div class="row">
            <article class="col-md-9 col-lg-9 col-sm-12">
              <h2 class="header-2 ">Case Overview</h2>
              <article>
                <?php the_content(); ?>
              </article>

              <div class="services_provided">
                <h3 class="header-3">Services Provided</h3>
                <div class="row">
                  <div class="col-sm-12 col-md-6 col-lg-6 imagen">
                    <img src="" alt="" />
                    <h4>Product Development</h4>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-6 description">
                    <p>details</p>
                  </div>
                </div>
              </div>
            </article>
            <aside class="col-md-3 col-lg-3 col-sm-12">
              <div class="client_logo" style="background-image: url('somehwere');">
                &nbsp;
              </div>
              <div class="markets_relation">
                <img src="" alt="" />
                <h2>Energy and Environment</h2>
              </div>
              <div class="shared_links">
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" class="linkedin-share-button" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a><br/>
                <a href="mailto:something@somewhere.com"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <br/>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
              </div>
              <div class="newsletter">
                <span class="title">Sign up to our Newsletter</span>
                <div class="row">
                  <form method="post" action="">
                      <div class="col-sm-12 col-md-12 col-lg-12">
                        <input required type="email" name="csn-email" value="" size="40" placeholder="Email"/>
                      </div>
                      <input type="hidden" name="custom_newsletter_nonce" value="<?php wp_create_nonce('custom-newsletter-nonce') ?>"/>
                      <div class="col-sm-12 col-md-12 col-lg-12">
                        <input type="submit" name="csn-submitted" class="submit btn btn-default" value="Subscribe"/>
                      </div>
                  </form>
                </div>
              </div>
            </aside>
          </div>
          <div class="bottom_separator"></div>
          <div class="members_of">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 un">
                <img src="<?php echo get_template_directory_uri(); ?>/images/case_studies/un.png" alt="UN" />
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 seventh">
                <img src="<?php echo get_template_directory_uri(); ?>/images/case_studies/seventh.png" alt="Seventh" />
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </main>
<?php } ?>
<?php get_footer(); ?>
