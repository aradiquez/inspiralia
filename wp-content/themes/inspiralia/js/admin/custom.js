jQuery(document).ready(function(jQuery) {
  var image_custom_uploader_1, image_custom_uploader_2, image_custom_uploader_3;

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
});