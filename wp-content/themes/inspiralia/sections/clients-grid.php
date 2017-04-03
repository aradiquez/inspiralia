<?php
$args = array(
    'post_type' => 'inspiralia_clients',
    'orderby' => 'title',
    'order' => 'ASC',
    'posts_per_page' => -1
);

$loop = new WP_Query( $args );
?>

<div class="clients_wrapper">
    <!-- Modal -->
    <div id="details_modal" class="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <a href="#" class="details_modal_close" aria-label="Close"><span aria-hidden="true">&times;</span></a>
        <div class="clearfix"></div>
        <div class="details_modal_content">
            <div class="details_modal_wrapper">
                <div class="details_modal_left">
                    <img src="" alt="" />
                    <h4 class="details_modal_title"></h4>
                    <div class="details_modal_body"></div>
                </div>
                <div class="details_modal_right">
                    <div class="details_modal_body"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- /.modal -->

    <div class="clients_filter">
        <span class="label">Sort By:</span>
        <div class="clients_select">
            <?php
            $args = array(
                  'depth'                 => 2,
                  'child_of'              => get_ID_by_page_name('Markets'),
                  'selected'              => 0,
                  'name'                  => 'filter_page_id'
              );
                wp_dropdown_pages($args);
             ?>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="clients_list row">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <article class="col-lg-4 col-md-4 col-sm-6 item <?php echo get_post_meta(get_the_ID(), 'inspiralia_clients_market_id', true ) ?>">
						<div class="content">
		            <a href="#" title="<?php the_title(); ?>" data-post_id="<?php the_ID() ?>" class="display_details">
		                <?php the_title(); ?>
										<div class="details"><?php echo wp_trim_words( get_the_content(), 15, '...' ); ?></div>
		            </a>
						</div>
          </article>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</div>
