<div class="services_provided">
  <h3 class="header-3">Services Provided</h3>
  <?php
  global $post;
  $case_studies_intro_services = array();
  for ( $i=0; $i<=2; $i++ ) {
    $case_studies_intro_services_related = get_post_meta($post->ID, 'case_studies_intro_services_' . $i .'_page_id' , true);
    if ($case_studies_intro_services_related == 0) {
      continue;
    }
    $case_studies_intro_services = get_page($case_studies_intro_services_related);
  ?>
  <div class="row">
    <div class="col-md-4 col-lg-3 hidden-sm hidden-xs imagen">
      <?php $image_url = (get_post_meta($case_studies_intro_services->ID, "services-intro-imagen", true ) ? get_post_meta($case_studies_intro_services->ID, "services-intro-imagen", true ) : '' ); ?>
      <img src="<?php echo $image_url ?>" class="responsive-img" alt=""/>
      <h4><?php echo $case_studies_intro_services->post_title ?></h4>
    </div>
    <div class="col-sm-12 col-md-10 col-lg-9 description">
      <div class="centering-text">
          <?php echo get_post_meta($case_studies_intro_services->ID, "services-our-value", true); ?>
      </div>
    </div>
  </div>
  <? } ?>
</div>
