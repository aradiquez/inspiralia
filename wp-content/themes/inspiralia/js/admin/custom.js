jQuery(document).ready(function(jQuery) {

  //##############################################################################################

  var image_custom_uploader_1, image_custom_uploader_2, image_custom_uploader_3, home_image_map, services_intro_image, leading_markets_image;

  jQuery('#accordion-box-img-1-button').on('click', function(e) {
    e.preventDefault();
    //If the uploader object has already been created, reopen the dialog
    if (image_custom_uploader_1) {
      image_custom_uploader_1.open();
      return;
    }

    //Extend the wp.media object
    image_custom_uploader_1 = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
        text: 'Choose Image'
      },
      multiple: false
    });

    //When a file is selected, grab the URL and set it as the text field's value
    image_custom_uploader_1.on('select', function() {
      attachment = image_custom_uploader_1.state().get('selection').first().toJSON();
      var url = '';
      url = attachment['url'];
      jQuery('#accordion-box-img-1').val(url);
      jQuery('#accordion-box-img-preview-1').attr("src",url);
    });

    //Open the uploader dialog
    image_custom_uploader_1.open();
  });

  //##############################################################################################

  jQuery('#accordion-box-img-2-button').on('click', function(e) {
    e.preventDefault();
    //If the uploader object has already been created, reopen the dialog
    if (image_custom_uploader_2) {
      image_custom_uploader_2.open();
      return;
    }

    //Extend the wp.media object
    image_custom_uploader_2 = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
        text: 'Choose Image'
      },
      multiple: false
    });

    //When a file is selected, grab the URL and set it as the text field's value
    image_custom_uploader_2.on('select', function() {
      attachment = image_custom_uploader_2.state().get('selection').first().toJSON();
      var url = '';
      url = attachment['url'];
      jQuery('#accordion-box-img-2').val(url);
      jQuery('#accordion-box-img-preview-2').attr("src",url);
    });

    //Open the uploader dialog
    image_custom_uploader_2.open();
  });

  //##############################################################################################

  jQuery('#accordion-box-img-3-button').on('click', function(e) {
    e.preventDefault();
    //If the uploader object has already been created, reopen the dialog
    if (image_custom_uploader_3) {
      image_custom_uploader_3.open();
      return;
    }

    //Extend the wp.media object
    image_custom_uploader_3 = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
        text: 'Choose Image'
      },
      multiple: false
    });

    //When a file is selected, grab the URL and set it as the text field's value
    image_custom_uploader_3.on('select', function() {
      attachment = image_custom_uploader_3.state().get('selection').first().toJSON();
      var url = '';
      url = attachment['url'];
      jQuery('#accordion-box-img-3').val(url);
      jQuery('#accordion-box-img-preview-3').attr("src",url);
    });

    //Open the uploader dialog
    image_custom_uploader_3.open();
  });

  //##############################################################################################
  jQuery('#home-map-box-img-button').on('click', function(e) {
    e.preventDefault();
    //If the uploader object has already been created, reopen the dialog
    if (home_image_map) {
      home_image_map.open();
      return;
    }

    //Extend the wp.media object
    home_image_map = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
        text: 'Choose Image'
      },
      multiple: false
    });

    //When a file is selected, grab the URL and set it as the text field's value
    home_image_map.on('select', function() {
      attachment = home_image_map.state().get('selection').first().toJSON();
      var url = '';
      url = attachment['url'];
      jQuery('#home-map-box-img').val(url);
      jQuery('#home-map-box-img-preview').attr("src",url);
    });

    //Open the uploader dialog
    home_image_map.open();
  });


  jQuery('#services-intro-button').on('click', function(e) {
    e.preventDefault();
    //If the uploader object has already been created, reopen the dialog
    if (services_intro_image) {
      services_intro_image.open();
      return;
    }

    //Extend the wp.media object
    services_intro_image = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
        text: 'Choose Image'
      },
      multiple: false
    });

    //When a file is selected, grab the URL and set it as the text field's value
    services_intro_image.on('select', function() {
      attachment = services_intro_image.state().get('selection').first().toJSON();
      var url = '';
      url = attachment['url'];
      jQuery('#services-intro-imagen').val(url);
      jQuery('#services-intro-preview').attr("src",url);
    });
    //Open the uploader dialog
    services_intro_image.open();
  });

  jQuery('.color-field').wpColorPicker();

  jQuery('#leading-markets-button').on('click', function(e) {
    e.preventDefault();
    //If the uploader object has already been created, reopen the dialog
    if (leading_markets_image) {
      leading_markets_image.open();
      return;
    }

    //Extend the wp.media object
    leading_markets_image = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
        text: 'Choose Image'
      },
      multiple: false
    });

    //When a file is selected, grab the URL and set it as the text field's value
    leading_markets_image.on('select', function() {
      attachment = leading_markets_image.state().get('selection').first().toJSON();
      var url = '';
      url = attachment['url'];
      jQuery('#leading-markets-imagen').val(url);
      jQuery('#leading-markets-preview').attr("src",url);
    });
    //Open the uploader dialog
    leading_markets_image.open();
  });

});