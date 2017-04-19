<!-- =========================
     Page Breadcrumb
============================== -->
<?php get_header();
get_template_part('index','banner'); ?>
<!-- =========================
     Page Content Section
============================== -->
<?php if(have_posts()) { ?>
  <section class='hero-blog-title'>
    <h2 class="inspiralia-blog-title"><?php the_title(); ?></h2>
  </section>

  <main id="content">
    <div class="row">
      <?php while(have_posts()) { the_post(); ?>
        <div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 col-sm-12 blog_post">
          <aside class="share_links">
            <a class="twitter-share-button" href="https://twitter.com/share" data-size="large" data-text="Shared from: <?php the_permalink(); ?>" data-url="https://dev.twitter.com/web/tweet-button" data-via="twitterdev" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <br/>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" class="linkedin-share-button" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            <br/>

            <div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
          </aside>
          <article>
            <div class="introduction">
              <?php echo get_post_meta(get_the_ID(), "projects-box-intro", true) ?>
            </div>
            <div class="small">
              <span class="inspiralia-blog-date">
                <span><?php echo get_the_date('j F, Y'); ?>, Madrid, Spain</span>
              </span>
            </div>
            <?php the_content(); ?>
          </article>

          <div class="newsletter">
            <span class="title">Want to receive more information?</span>
            <div class="row">
              <form method="post" action="">
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <input required type="text" name="csn-fname" pattern="[a-zA-Z0-9 ]+" value="" size="40" placeholder="First Name" />
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <input required type="email" name="csn-email" value="" size="40" placeholder="Email"/>
                  </div>
                  <input type="hidden" name="custom_newsletter_nonce" value="<?php wp_create_nonce('custom-newsletter-nonce') ?>"/>
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <input type="submit" name="csn-submitted" class="submit btn btn-default" value="Submit"/>
                  </div>
              </form>
            </div>
          </div>

          <div class="bottom_separator"></div>
        </div>
      <?php } ?>
    </div>
  </main>
<?php } ?>
<?php get_footer(); ?>
