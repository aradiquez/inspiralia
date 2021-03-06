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
              <?php
              $taxonomy = 'departments';
              $tax_terms = get_terms($taxonomy, array('hide_empty' => true));
              $items_count = floor(12/(count($tax_terms)+2));
              ?>
              <menuitem class="col-sm-<?php echo $items_count ?> col-md-<?php echo $items_count ?> col-lg-<?php echo $items_count ?>">
                <form id="team_search" role="search">
                  <div class="form-group">
                    <input type="text" class="form-control" id="search_team" placeholder="Search">
                    <label for="search-input"><i class="fa fa-search" aria-hidden="true"></i></label>
                  </div>
                </form>
              </menuitem>
              <menuitem class="col-sm-<?php echo $items_count ?> col-md-<?php echo $items_count ?> col-lg-<?php echo $items_count ?>"><a href="#" class="menuitem show_all_team">All</a></menuitem>
              <?php
              foreach($tax_terms as $term_single) { ?>
                <menuitem class="col-sm-<?php echo $items_count ?> col-md-<?php echo $items_count ?> col-lg-<?php echo $items_count ?>"><a href="#" class="menuitem show_<?php echo $term_single->slug; ?>"><?php echo $term_single->name; ?></a></menuitem>
              <?php } ?>
            </menu>
          </header>

          <main class="container row">
            <div class="item_join_us col-xs-12 col-sm-4 col-md-3 col-lg-3">
              <a href="<?php echo get_permalink(get_ID_by_page_name('Careers')); ?>">
                <header>
                  <h3>Join us!</h3>
                </header>
                <section>
                  &nbsp;
                </section>
              </a>
            </div>

          <?php
            $args = array( 'post_type' => 'team_member', 'posts_per_page' => 100 );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post(); ?>

    					<div class="<?php
                $categories = get_the_terms( get_the_ID(), 'departments' );
                foreach( $categories as $category ) { ?>show_<?php echo $category->slug; ?> <?php } ?> item col-xs-12 col-sm-4 col-md-3 col-lg-3">
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
         </main>
        </section>
        <!-- ############################################################################### -->
      </div>
    </div>
  </div>
</main>
<?php
get_footer();
