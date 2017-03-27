
  <?php
  global $post;
  $case_studies_intro_markets = array();
  $image_url = '';
  for ( $i=0; $i<=2; $i++ ) {
    $case_studies_intro_markets_related = get_post_meta($post->ID, 'case_studies_intro_markets_' . $i .'_page_id' , true);
    if ($case_studies_intro_markets_related == 0) {
      continue;
    }
    $case_studies_intro_markets = get_page($case_studies_intro_markets_related);
  ?>
    <div class="markets_relation">
      <?php $image_url = (get_post_meta($case_studies_intro_markets->ID, "markets-intro-imagen", true ) ? get_post_meta($case_studies_intro_markets->ID, "markets-intro-imagen", true ) : '' ); ?>
        <img src="<?php echo $image_url ?>" class="responsive-img" alt=""/>
        <h2><?php echo $case_studies_intro_markets->post_title ?></h2>
    </div>
  <? } ?>
