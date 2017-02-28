<?php
$args = array(
    'post_parent' => $post->ID,
    'post_type' => 'page',
    'orderby' => 'menu_order'
);

$child_query = new WP_Query( $args );
$post_count = 1;
?>
<div class="markets_list">
    <?php while ( $child_query->have_posts() ) : $child_query->the_post(); ?>
      <article class="col-lg-12 col-md-12 col-sm-12 <?php echo(($post_count % 2) == 0 ? 'left' : 'right') ?>">
        <?php if (has_post_thumbnail()) { ?>
            <div class="post_image">
                <img src="<?php echo the_post_thumbnail_url(); ?>" class="responsive-img" alt="<?php the_title() ?>" />
            </div>
        <?php } ?>
        <span class="information">
            <h3><?php the_title() ?></h3>
            <p><?php echo get_post_meta($post->ID, "markets-intro", true); ?></p>
            <a class="btn btn-lg" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">read more</a>
        </span>
      </article>
      <?php $post_count++; ?>
    <?php endwhile; wp_reset_postdata(); ?>
</div>