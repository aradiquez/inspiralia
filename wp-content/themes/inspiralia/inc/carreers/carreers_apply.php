<?php

#require $_SERVER['DOCUMENT_ROOT'] . "/inspiralia/wp-load.php";
require_once ($_SERVER['DOCUMENT_ROOT'] . "/wordpress/wp-load.php"); #LOCAL
session_start();
$_SESSION['apply'] = [];
if( 'POST' == $_SERVER['REQUEST_METHOD'] && $_POST['post_type'] == 'applications') {

    // Do some minor form validation to make sure there is content
    if (isset ($_POST['email'])) {
        $email =  $_POST['email'];
    } else {
        echo 'Please enter a title';
    }
    if (isset ($_POST['phone'])) {
        $phone = $_POST['phone'];
    } else {
        echo 'Please enter the phone';
    }
    $inspiralia_application_related = $_POST['inspiralia_application_related'];

    // Add the content of the form to $post as an array
    $post = array(
        'post_status'   => 'publish',           // Choose: publish, preview, future, etc.
        'post_title'    => $email,
        'post_type'     => $_POST['post_type'],
        'post_parent'   => $_POST['post_parent']
    );

    if (!function_exists('wp_generate_attachment_metadata')){
        require_once(ABSPATH . "wp-admin" . '/includes/image.php');
        require_once(ABSPATH . "wp-admin" . '/includes/file.php');
        require_once(ABSPATH . "wp-admin" . '/includes/media.php');
    }

    $new_post = wp_insert_post($post);  // Pass  the value of $post to WordPress the insert function

    if ( isset($_FILES['inspiralia_application_file_list']) ) {
        if ($_FILES['inspiralia_application_file_list']['error'] != 4) { # this is not found, not bad :)
            foreach ($_FILES as $file => $array) {
                if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
                    error_redirect();
                }
                $attachment_id = media_handle_upload( $file, $new_post );
            }
        }
    }
    // http://codex.wordpress.org/Function_Reference/wp_insert_post

    update_post_meta($new_post,'inspiralia_application_user_email',$email);
    update_post_meta($new_post,'inspiralia_application_user_phone',$phone);

    if ($attachment_id > 0){
        //and if you want to set that image as Post  then use:
        update_post_meta($new_post,'inspiralia_application_file_list',$attachment_id);
        $attachments = array( get_post_meta($new_post, "inspiralia_application_file_list", true ) );
    }

    $to = get_bloginfo( 'admin_email' );
    $subject = 'New Application for: '.$inspiralia_application_related;
    $body = inspiralia_email_body($inspiralia_application_related, $email, $phone);
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $headers[] = 'From: Inspiralia Application <'.$email.'>';

    wp_mail( $to, $subject, $body, $headers, $attachments );

    success_redirect();
} // end IF

function success_redirect() {
    $_SESSION['apply']['success']  = "Thanks for applying to this Career, we will be contacting you very soon!";
    wp_redirect( get_permalink(get_ID_by_page_name('Careers')) );
}

function error_redirect(){
    $_SESSION['apply']['error'] = "Error uploading the file, please contact the Administrator: ";
    wp_redirect( get_permalink(get_ID_by_page_name('Careers')) );
}

function inspiralia_email_body($inspiralia_application_related, $email, $phone) {
    $body_inspiralia = "<p>You have received a new application for the position: ".$inspiralia_application_related."</p>";
    $body_inspiralia .= "<p>Email: ".$email."<br/>";
    $body_inspiralia .= "Phone: ".$phone."<br/>";
    $body_inspiralia .= "CV: attachment </p>";
    return $body_inspiralia;
}


// Do the wp_insert_post action to insert it
do_action('wp_insert_post', 'wp_insert_post');
