<?php
$args = array(
    'post_parent' => $post->ID,
    'post_type' => 'page',
    'orderby' => 'title',
    'order' => 'ASC'
);

$child_query = new WP_Query( $args );
$post_count = 1;
?>

<div class="case_studies_filter">
    <span class="label">Sort By:</span>
    <div class="filters">
        <div class="single_filter">
            <span class="label">Markets:</span>
            <div class="case_studies_select">
                <?php
                $args = array(
                      'depth'                 => 2,
                      'child_of'              => get_ID_by_page_name('Markets'),
                      'selected'              => 0,
                      'name'                  => 'markets_filter_page_id',
                      'class'                 => 'markets'
                  );
                    wp_dropdown_pages($args);
                 ?>
            </div>
        </div>

        <div class="single_filter">
            <span class="label">Services:</span>
            <div class="case_studies_select">
                <?php
                $args = array(
                      'depth'                 => 2,
                      'child_of'              => get_ID_by_page_name('Services'),
                      'selected'              => 0,
                      'name'                  => 'services_filter_page_id'
                  );
                    wp_dropdown_pages($args);
                 ?>
            </div>
        </div>

        <div class="single_filter">
            <span class="label">Country:</span>
            <div class="case_studies_select">
                 <?php $args = array(
                                    'show_option_all'    => '',
                                    'hide_empty'         => 0,
                                    'name'               => 'country_filter_page_id',
                                    'id'                 => '',
                                    'depth'              => 2,
                                    'taxonomy'           => 'country'
                                ); ?>
            <?php wp_dropdown_categories( $args ); ?>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>


<div class="cases_studies_list row">
    <?php while ( $child_query->have_posts() ) : $child_query->the_post(); ?>
      <article class="col-lg-4 col-md-4 col-sm-6 item">
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <div class="post_image" style="background-image: url(<?php echo get_post_meta($post->ID, 'case-studies-intro-imagen', true); ?>);">&nbsp;</div>
            <span class="information">
                <h2><?php echo get_post_meta($post->ID, "case-studies-intro-title", true); ?></h2>
                <p><?php echo get_post_meta($post->ID, "case-studies-intro", true); ?></p>
            </span>
        </a>
      </article>
      <?php $post_count++; ?>
    <?php endwhile; wp_reset_postdata(); ?>
</div>
