//------------------------------------------
    //slider
//------------------------------------------
jQuery(document).ready(function() {

  jQuery("#inspiralia-slider").owlCarousel({
      navigation : true, // Show next and prev buttons
      slideSpeed : 200,
      pagination : true,
      paginationSpeed : 400,
      singleItem:true,
      video:true,
      autoPlay : true,
      transitionStyle : "fade",
      navigationText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
      ]
    });

  jQuery("#testimonial").owlCarousel({
    navigation : false, // Show next and prev buttons
    slideSpeed : 400,
    pagination : false,
    singleItem: true,
    video:true,
    autoPlay : true,
    transitionStyle : "fade",
  });

  jQuery(".inspiralia-project-news-post-box-link").on('mouseover', function(){
    jQuery(this).find('img').css({ 'opacity': '1' }).css({ 'z-index' : '100' });
  }).on('mouseout', function(){
    jQuery(this).find('img').css({ 'opacity': '0.6' }).css({ 'z-index' : '0' });
  });

});


//------------------------------------------
    //scroll-top
//------------------------------------------
  jQuery(".inspiralia_scroll").hide();
    jQuery(function () {
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 500) {
                jQuery('.inspiralia_scroll').fadeIn();
            } else {
                jQuery('.inspiralia_scroll').fadeOut();
            }
        });
        jQuery('a.inspiralia_scroll').click(function () {
            jQuery('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
