<?php

/*
Plugin Name: Contact Addon
Plugin URI: #
Description: Just another contact addon plugin. Simple but flexible.
Author: Umakant
Author URI: #
Text Domain: contact-form-7
Domain Path: /languages/
Version: 1.0.1
*/


add_action('wpcf7_before_send_mail','send_pdf');
function send_pdf( $cf7 ) {

	$upload_dir = wp_upload_dir();
	$target_dir = $upload_dir['basedir'].'/cfupload/';
	$submission = WPCF7_Submission :: get_instance() ;
	$submited = array();
	$submited['posted_data'] = $submission->get_posted_data();
	//var_dump($submited['posted_data']['checkbox-808']);

	if ($submited['posted_data']['checkbox-808'][0] == 'one') {
		$filename = $target_dir . 'one.pdf';
	}

	if ($submited['posted_data']['checkbox-808'][1] == 'two') {
		$filename = $target_dir . 'two.pdf';
	}

	if($cf7->id == 336 ){
		$submission = WPCF7_Submission::get_instance();
		$submission->add_uploaded_file('myfieldname', $filename);
	}

}
