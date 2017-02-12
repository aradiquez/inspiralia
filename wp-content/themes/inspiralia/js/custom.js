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
