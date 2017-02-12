<?php

/**
 * Template Name: Home Page
 */
     get_header();

    //=========== Get Home Slider | main picture ===========//
    $inspiralia_slider_enable = get_theme_mod('inspiralia_slider_enable');
    if($inspiralia_slider_enable){
      get_template_part('sections/home','hero');
    } else {  # this is when there is no slider enable
      get_template_part('index','banner');
    }
    //=========== Get Index needs ===========//
    get_template_part('sections/home', 'needs');
    //=========== Get Index sourcing ===========//
    get_template_part('sections/home', 'sourcing');
    //=========== Get Index Video ===========//
    get_template_part('sections/home', 'video');
    //=========== Get Index News ===========//
    get_template_part('sections/home', 'blog');
    //=========== Get Index Map information ===========//
    get_template_part('sections/home', 'map-information');

get_footer();
?>