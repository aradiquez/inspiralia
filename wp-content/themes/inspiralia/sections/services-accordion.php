<ul id="accordion" class="services_accordion">
    <?php for($i = 1; $i <= 3; $i++) { ?>
      <li>
        <h2><?php echo get_post_meta(get_the_ID(), "accordion-box-title-$i", true); ?></h2>
        <p><?php echo get_post_meta(get_the_ID(), "accordion-box-description-$i", true); ?></p>
        <a href="<?php echo get_post_meta(get_the_ID(), "accordion-box-button-url-$i", true); ?>" title="<?php echo get_post_meta(get_the_ID(), "accordion-box-button-title-$i", true); ?>"><?php echo get_post_meta(get_the_ID(), "accordion-box-button-title-$i", true); ?></a>
        <img src="<?php echo get_post_meta(get_the_ID(), "accordion-box-img-$i", true); ?>" alt="<?php echo get_post_meta(get_the_ID(), "accordion-box-title-$i", true); ?>" />
      </li>
    <?php } ?>
</ul>