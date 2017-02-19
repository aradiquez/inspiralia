<?php
$args = array(
    'post_parent' => $post->ID,
    'post_type' => 'page',
    'orderby' => 'menu_order'
);

$child_query = new WP_Query( $args );
?>
<ul id="accordion" class="services_accordion">
    <?php while ( $child_query->have_posts() ) : $child_query->the_post(); ?>
      <li>
        <?php if (get_post_meta($post->ID, "services-intro-imagen", true)) { ?>
            <img src="<?php echo get_post_meta($post->ID, "services-intro-imagen", true); ?>" class="responsive-img" alt="<?php the_title() ?>" />
        <?php } ?>
        <h2><?php the_title() ?></h2>
        <p><?php echo get_post_meta($post->ID, "services-intro", true); ?></p>
        <a class="btn btn-lg" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">read more</a>
      </li>
    <?php endwhile; wp_reset_postdata(); ?>
</ul>