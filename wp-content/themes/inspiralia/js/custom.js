//------------------------------------------
    //slider
//------------------------------------------
jQuery(document).ready(function() {

  //------------------------------------------
  // carousel somewhere
  //------------------------------------------

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

  // -----------------------------------------
  // carrousel del blog
  // -----------------------------------------

  jQuery('.inspiralia-slider-section').owlCarousel({
      navigation : true, // Show next and prev buttons
      slideSpeed : 800,
      pagination : false,
      items: 4,
      autoPlay : true,
      autoWidth: true,
      navigationText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
      ]
  });


  //------------------------------------------
  // testimonial carousel
  //------------------------------------------

  jQuery("#testimonial").owlCarousel({
    navigation : true, // Show next and prev buttons
    slideSpeed : 800,
    pagination : false,
    singleItem: true,
    autoPlay : true,
    autoWidth: true,
    navigationText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
      ]
  });

  //------------------------------------------
  // home hover animation
  //------------------------------------------

  jQuery(".inspiralia-project-news-post-box-link").on('mouseover', function(){
    jQuery(this).addClass('active');
    jQuery(this).find('article').css({ 'display' : 'block' });
  }).on('mouseout', function(){
    jQuery(this).removeClass('active');
    jQuery(this).find('article').css({ 'display' : 'none' });
  });

  //------------------------------------------
  // team member stuff
  //------------------------------------------

  jQuery('#team .item').on('mouseover', function(){
    event_handler.show(this);
  }).on('mouseout', function(){
    event_handler.hide(this);
  });

  // for mobile devises
  jQuery('#team .item').on('click', function(){
    event_handler.toggle_class(this);
  });

  var event_handler = {
    show: function(item) {
      jQuery(item).find('details').show();
      jQuery('.item').css({ 'opacity' : '0.6', 'filter': 'grayscale(100%)' });
      jQuery(item).css({ 'opacity' : '1', 'filter': 'none' });
    },
    hide: function(item) {
      jQuery(item).find('details').hide();
      jQuery('.item').css({ 'opacity' : '1', 'filter': 'none' });
    },
    toggle_class: function(item) {
      jQuery(item).siblings().removeClass('active');
      if (jQuery(item).hasClass('active')) {
        this.hide(item);
        jQuery(item).removeClass('active');
      } else {
        jQuery(item).addClass('active');
        this.show(item);
      }
    }
  }

  jQuery('#team').on('click', '.filters a.menuitem', function(e){
    e.preventDefault();
    var all_elements = jQuery('.item');
    var filter_item = jQuery(this);
    var current_class = (filter_item.attr('class').replace('menuitem', '').trim());
    console.log(current_class);
    if( filter_item.hasClass('show_all_team') ) {
      jQuery(all_elements).show();
    } else {
      jQuery(all_elements).show();
      jQuery(all_elements).each(function(index, value){
        if (!jQuery(value).hasClass(current_class)) {
          jQuery(value).fadeOut();
          console.debug(value);
          console.debug(jQuery(value).hasClass(current_class));
        }
      });
    }
  });

  // jQuery('.clients_list').jscroll({
  //   loadingHtml: '<img src="images/loading.gif" alt="Loading" />',
  //   padding: 20
  // });


  jQuery('article.item').on('click', '.display_details', function(e) {
    e.preventDefault();
    jQuery('.carreers_details_modal').hide();
    jQuery(this).siblings('.carreers_details_modal').animate({ 'opacity' : 'show'}, 'normal');
  });

  jQuery('.carreers_details_modal').on('click', '.details_modal_close', function(e) {
    e.preventDefault();
    jQuery(this).parent().animate({ 'opacity' : 'hide'}, 'normal');
  });

  jQuery('.details_modal_wrapper').on('click', '.show_carreer', function(e){
    e.preventDefault();
    jQuery('#post_parent').val(jQuery(this).data('post_id'));
  });

  jQuery('.modal-body').on('click', '.box__file', function(){
    jQuery('#inspiralia_application_file_list').trigger( "click" );
  });

  jQuery('.bg-success').on('click', '.close', function(){
    e.preventDefault();
    jQuery(this).parent().remove();
  });


	jQuery('.carreers_wrapper').on('click', '.details_modal_close', function(e) {});



  var droppedFiles = false;
	form = jQuery('.carreers_wrapper');
	
	form.on('drag dragstart dragend dragover dragenter dragleave drop', '#applying_for_carreer', function(e) {
    e.preventDefault();
    e.stopPropagation();
  })
  .on('dragover dragenter', function() {
   	form.addClass('is-dragover');
  })
  .on('dragleave dragend drop', function() {
    form.removeClass('is-dragover');
  })
  .on('drop', function(e) {
    droppedFiles = e.originalEvent.dataTransfer.files;
  });
	//form.find('input[type="file"]').prop('files', droppedFiles);
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
