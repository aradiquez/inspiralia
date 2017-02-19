jQuery(document).ready(function(){
  activeItem = jQuery("#accordion li:first-child");
  allItems = jQuery("#accordion li");
  jQuery(allItems).css({'width': '20%' });
  jQuery(allItems).find('a').hide();
  jQuery(allItems).find('p').hide();
  jQuery(activeItem).addClass('active').css({'width': '60%' }).find('img').hide();
  jQuery(activeItem).find('p').show();
  jQuery(activeItem).find('a').show();


  jQuery("#accordion li").on('click', function(){
    jQuery(activeItem).animate({width: "20%"}, {duration: 300, queue: false });
    jQuery(activeItem).find('p').hide();
    jQuery(activeItem).find('a').hide();
    jQuery(activeItem).find('img').show();
    jQuery(this).animate({width: "60%"}, {duration: 300, queue: false });
    jQuery(this).find('img').hide();
    jQuery(this).find('p').show();
    jQuery(activeItem).removeClass('active');
    jQuery(this).addClass('active');
    jQuery(this).find('a').show();
    activeItem = this;
  });

  // ============================ INTERNAL ACCORDION ===================================
  activeCustomItem = jQuery("#accordion_custom li:first-child");
  allCustomItems = jQuery("#accordion_custom li");
  jQuery(allCustomItems).css({'width': '20%' });
  jQuery(allCustomItems).find('p').hide();
  jQuery(activeCustomItem).addClass('active').css({'width': '60%' })
  jQuery(activeCustomItem).find('.responsive-img').hide();
  jQuery(activeCustomItem).find('.active_image').css({ 'width' : '10%', 'margin' : '5% auto'})
  jQuery(activeCustomItem).find('p').show();

  jQuery("#accordion_custom li").on('click', function(){
    jQuery(allCustomItems).animate({width: "20%"}, {duration: 300, queue: false });
    jQuery(allCustomItems).find('p').hide();
    jQuery(allCustomItems).find('.responsive-img').show();
    jQuery(allCustomItems).find('.active_image').hide();
    jQuery(allCustomItems).removeClass('active');
    jQuery(this).animate({width: "60%"}, {duration: 300, queue: false });
    jQuery(this).find('.responsive-img').hide();
    jQuery(this).find('.active_image').css({ 'width' : '10%', 'margin' : '5% auto', 'display' : 'block'});
    jQuery(this).find('p').show();
    jQuery(this).addClass('active');
    activeCustomItem = this;
  });
});