//------------------------------------------
    //slider
//------------------------------------------
jQuery(document).ready(function() {

  //------------------------------------------
  // navegator
  //------------------------------------------

    jQuery('.inspiralia-breadcrumb-section')
      .height('510px')
      .scrollie({
        scrollOffset : 0,
        scrollingInView : function(elem) {
          jQuery('.internal ul#menu-main li.menu-item a').css('color', 'white');
        },
        scrolledOutOfView : function(elem){
          jQuery('.internal ul#menu-main li.menu-item a').css('color', '#77828c');
        }
      });

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
  // blog slider
  //------------------------------------------
  jQuery('.inspiralia-slider-section .item').hover(
    function() {
    jQuery(this).addClass('active');
    jQuery(this).find('.item_overlay').show();
  }, function() {
    jQuery('.inspiralia-slider-section .item').removeClass('active');
    jQuery('.inspiralia-slider-section .item .item_overlay').hide();
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

  jQuery('#team_search').on('keyup', '#search_team', function(e){
    e.preventDefault();
    var serch_criteria = jQuery(this);
    var all_elements = jQuery('.item');
    jQuery(all_elements).each(function(index, element){
      var search_element = new RegExp(serch_criteria.val(), 'i');
      if(jQuery(element.children[1]).find('summary h3').html().search(search_element) == -1) { // too tricky need to find a better way
        jQuery(element).hide();
      } else {
        jQuery(element).show();
      }

    });
  });

  // jQuery('.clients_list').jscroll({
  //   loadingHtml: '<img src="images/loading.gif" alt="Loading" />',
  //   padding: 20
  // });

// ================================================================================================

  jQuery('article.item').on('click', '.display_details', function(e) {
    e.preventDefault();
    jQuery('.carreers_details_modal').hide();
    jQuery(this).siblings('.carreers_details_modal').animate({ 'opacity' : 'show'}, 'normal');
    jQuery('#inspiralia_application_related').val(this.title);
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
form = jQuery('#applying_for_carree');
boxFile = jQuery('.box__file');

form.on('drag dragstart dragend dragover dragenter dragleave drop', '.modal-body', function(e) {
    e.preventDefault();
    e.stopPropagation();
})
.on('dragover dragenter', function() {
    boxFile.removeClass('dragover');
})
.on('dragleave dragend drop', function() {
    boxFile.addClass('dragover');
})
.on('drop', function(e) {
    droppedFiles = e.originalEvent.dataTransfer.files;
});
form.find('input[type="file"]').prop('files', droppedFiles);

  jQuery('#apply').on('change', '#inspiralia_application_file_list', function() {
    var file_size = (this.files[0].size / 1048576).toFixed(2);
    if (file_size >= 5) {
      jQuery('.box__file').before('<span class="red">File too big</span>');
      jQuery(this).val('');
    } else {
      jQuery('span.red').remove();
    }
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
