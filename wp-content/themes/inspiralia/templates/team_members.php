<?php
/**
 * Template Name: Team Members Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package inspiralia
 */
get_header();
get_template_part('index','banner'); ?>
<main id="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- ############################################################################### -->
        <section id="team" class="team-section">
          <header class="container filters">
            <menu class="row">
              <menuitem class="col-xs-4 col-sm-3 col-md-3 col-lg-3"><a href="#" class="menuitem show_all_team">All</a></menuitem>
              <?php $taxonomy = 'departments';
              $tax_terms = get_terms($taxonomy, array('hide_empty' => true));
              foreach($tax_terms as $term_single) { ?>
                <menuitem class="col-xs-6 col-sm-4 col-md-3 col-lg-3"><a href="#" class="menuitem show_<?php echo $term_single->slug; ?>"><?php echo $term_single->name; ?></a></menuitem>
              <?php } ?>
            </menu>
          </header>

          <main class="container row">
          <?php
            $args = array( 'post_type' => 'team_member', 'posts_per_page' => 10 );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); ?>

    					<div class="<?php
                $categories = get_the_terms( get_the_ID(), 'departments' );
                foreach( $categories as $category ) { ?>show_<?php echo $category->slug; ?> <?php } ?> item col-xs-6 col-sm-4 col-md-3 col-lg-3">
                <picture>
    						<?php if(has_post_thumbnail()): ?>
    						  <?php $defalt_arg =array('class' => "img-responsive"); ?>
    						  <?php the_post_thumbnail('', $defalt_arg); ?>
    						<?php endif; ?>
                </picture>
                <details>
                  <summary>
                    <h3><?php the_title() ?></h3>
                    <?php the_content(); ?>
                  </summary>
                </details>
              </div>

            <?php endwhile; // End of the loop. ?>

            <div class="item_join_us col-xs-6 col-sm-4 col-md-3 col-lg-3">
              <?php $page_careers = get_page_by_title('Careers'); ?>
              <a href="<?php echo get_permalink($page_careers); ?>">
                <header>
                  <h3>Join us!</h3>
                </header>
                <section>
                  &nbsp;
                </section>
              </a>
            </div>
          </main>
        </section>
        <!-- ############################################################################### -->
      </div>
    </div>
  </div>
</main>
<?php
get_footer();
