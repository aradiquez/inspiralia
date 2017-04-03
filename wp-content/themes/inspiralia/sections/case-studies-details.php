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
					<div class="container">
	          <div class="row">
	            <article class="col-md-9 col-lg-9 col-sm-12">
	              <h2 class="header-2 ">Case Overview</h2>
	              <article>
	                <?php the_content(); ?>
	              </article>

	              <?php get_template_part('sections/case-studies', 'details-services-provided'); ?>
	            </article>
	            <aside class="col-md-3 col-lg-3 col-sm-12">
	              <div class="client_logo" style="background: url(<?php echo get_post_meta(get_the_ID(), 'case-studies-intro-logo', true ) ?>) no-repeat; background-position: center; ">
	                &nbsp;
	              </div>

	              <?php get_template_part('sections/case-studies', 'details-markets'); ?>
	              <div class="shared_links">
	                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" class="linkedin-share-button" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a><br/>
	                <a href="mailto:something@somewhere.com"><i class="fa fa-envelope" aria-hidden="true"></i></a><br/>
	                <a href="<?php echo get_post_meta($post->ID, 'case-studies-intro-pdf', true ) ?>" target="_blank" class="pdf">PDF</a><br/>
	                <br/>
	              </div>
	              <div class="newsletter">
	                <span class="title">Sign up to our Newsletter</span>
	                <?php echo do_shortcode('[cp_simple_newsletter]' ); ?>
	                <div class="clearfix"></div>
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
        </div>
      <?php } ?>
    </div>
  </main>
<?php } ?>
