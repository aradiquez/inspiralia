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
          <aside>
            <a class="twitter-share-button" href="https://twitter.com/share" data-size="large" data-text="custom share text" data-url="https://dev.twitter.com/web/tweet-button" data-hashtags="example,demo" data-via="twitterdev" data-related="twitterapi,twitter"> Tweet</a>
            <br/>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=http://developer.linkedin.com&title=LinkedIn%20Developer%20Network
  &summary=My%20favorite%20developer%20program&source=LinkedIn" class="linkedin-share-button">LinkedIn</a>
            <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Compartir</a></div>
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
        </div>
      <?php } ?>
    </div>
  </main>
<?php } ?>
<?php get_footer(); ?>
