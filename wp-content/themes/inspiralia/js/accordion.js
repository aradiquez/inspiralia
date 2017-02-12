jQuery(document).ready(function(){
  activeItem = jQuery("#accordion li:first");
  allItems = jQuery("#accordion li");
  jQuery(allItems).css({'width': '20%' });
  jQuery(activeItem).addClass('active').css({'width': '60%' });

  jQuery("#accordion li").on('click', function(){
    jQuery(activeItem).animate({width: "20%"}, {duration: 300, queue: false });
    jQuery(this).animate({width: "60%"}, {duration: 300, queue: false });
    activeItem = this;
  });
});