jQuery(document).ready(function() {
    jQuery('#details_modal').hide();

    jQuery('.clients_list').on('click', '.display_details', function(e) {
      e.preventDefault();
      jQuery('#details_modal').hide();

      var data = {
        'action': 'ajax_get_post_information',
        'post_id': (jQuery(this).data('post_id'))
      };
      var dom_data = {
        'title': '#details_modal .details_modal_content .details_modal_wrapper .details_modal_left .details_modal_title',
        'description': '#details_modal .details_modal_content .details_modal_wrapper .details_modal_left .details_modal_body',
        'img': '#details_modal .details_modal_content .details_modal_wrapper .details_modal_left img',
        'aside': '#details_modal .details_modal_content .details_modal_wrapper .details_modal_right .details_modal_body'
      }

      jQuery.ajax({
          url: clients_ajax.ajaxurl,
          type: 'post',
          data: data,
          success: function( response ) {
            response = JSON.parse(response);
            jQuery(dom_data['title']).html(response.post_title);
            jQuery(dom_data['description']).html(response.post_content);
            jQuery(dom_data['img']).attr("src", response.logo);
            jQuery(dom_data['aside']).html(response.aside);
            jQuery('#details_modal').animate({ opacity: "show" }, "slow");
          },
          error: function(error) {
            console.log("Error");
            console.debug(error);
          },
      });
    });

    jQuery('#details_modal').on('click', '.details_modal_close', function (e) {
      e.preventDefault();
      jQuery('#details_modal').animate({ opacity: "hide" }, "slow");
    });

    jQuery('.clients_select').on('change', '#filter_page_id', function(e){
      e.preventDefault();
      var all_elements = jQuery('.clients_list .item');
      var filter_item = jQuery(this);
      var current_class = (filter_item.val());
      if( current_class == 0 ) {
        jQuery(all_elements).animate({ opacity: 'show' }, 'slow');
				jQuery(all_elements).find('.content a .details').hide();
      } else {
        jQuery(all_elements).show();
        jQuery(all_elements).each(function(index, value){
          if (!jQuery(value).hasClass(current_class)) {
            jQuery(value).fadeOut();
          } else {
          	jQuery(value).find('.content a .details').show();
          }
        });
      }
    });
});
