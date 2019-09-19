<?php
  add_action( 'wp_ajax_wp_services', 'wp_services' );
  add_action( 'wp_ajax_nopriv_wp_services', 'wp_services' );

  function wp_services(){
  	switch ($_REQUEST['service']) {
  		default:
  			dynamic_search();
  		break;
  	}
  	die();
  }
