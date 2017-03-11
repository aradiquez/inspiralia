jQuery(document).ready(function(){
  activeItem = jQuery("#accordion li:first-child");
  allItems = jQuery("#accordion li");
  jQuery("#accordion li").on('click', function(){
    if (this == activeItem) {
       return null;
    }
    jQuery(activeItem).removeClass('active');
    jQuery(this).addClass('active');
    activeItem = this;
  });

  // ============================ INTERNAL ACCORDION ===================================

  jQuery("#accordion_custom li").on('click', function(){
    activeCustomItem = jQuery("#accordion_custom li:first-child");
    allCustomItems = jQuery("#accordion_custom li");
    if (this == activeCustomItem) {
       return null;
    }
    jQuery(allCustomItems).removeClass('active');
    jQuery(this).addClass('active');
    activeCustomItem = this;
  });
});