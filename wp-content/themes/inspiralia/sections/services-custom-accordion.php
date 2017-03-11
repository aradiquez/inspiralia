<ul id="accordion_custom" class="services_custom_accordion">
  <?php for($i=1; $i<=3; $i++) { ?>
  <li <?php echo ($i == 1 ? 'class="active"':'') ?> >
    <?php $image_url = (get_post_meta($post->ID, "accordion-box-img-$i", true ) ? get_post_meta($post->ID, "accordion-box-img-$i", true ) : '' ); ?>
    <img src="<?php echo $image_url ?>" class="responsive-img" alt="<?php echo get_post_meta($post->ID, "accordion-box-title-$i", true); ?>"/><br/>
    <h2><?php echo get_post_meta($post->ID, "accordion-box-title-$i", true); ?></h2>
    <p><?php echo get_post_meta($post->ID, "accordion-box-description-$i", true); ?></p>
    <?php $image_url = (get_post_meta($post->ID, "accordion-box-img-$i", true ) ? get_post_meta($post->ID, "accordion-box-img-$i", true ) : '' ); ?>
    <img src="<?php echo $image_url ?>" class="active_image" alt="<?php echo get_post_meta($post->ID, "accordion-box-title-$i", true); ?>"/>
  </li>
  <?php } ?>
</ul>