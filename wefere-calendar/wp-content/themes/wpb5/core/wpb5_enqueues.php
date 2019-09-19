<?php
//Load CSS on header
add_action('wp_enqueue_scripts', 'wpb5_load_styles');
function wpb5_load_styles(){

  // Google Fonts
  $google_fonts = array(
    'Quicksand' => '400,500,600,700,900',
  );
  foreach ($google_fonts as $name => $weight) {
    if($weight != ''){
      $font = $name.':'.$weight;
    }else{
      $font = $name;
    }
    wp_register_style(strtolower($name), 'https://fonts.googleapis.com/css?family='.$font, array(), '', 'all');
  	wp_enqueue_style(strtolower($name));
  }

  // Bootstrap 4
  wp_register_style('bootstrap', WPB5_ASSETS . '/css/bootstrap.min.css', array(), '4.3.1', 'all');
  wp_enqueue_style('bootstrap');

  // Font Awesome 5 Free
  wp_register_style('fa-free', WPB5_ASSETS . '/css/all.min.css', array(), '5.7.2', 'all');
  wp_enqueue_style('fa-free');

  // Owl Carousel 2
  wp_register_style('owl-carousel-2', WPB5_ASSETS . '/css/owl.carousel.min.css', array(), '2.3.4', 'all');
  wp_enqueue_style('owl-carousel-2');

  // Animate CSS
  wp_register_style('animate', WPB5_ASSETS . '/css/animate.min.css', array(), '3.7.0', 'all');
  wp_enqueue_style('animate');

  wp_register_style('lightbox', WPB5_ASSETS . '/css/lightbox.min.css', array(), '3.7.0', 'all');
  wp_enqueue_style('lightbox');

  // WPB5 css
  wp_register_style('general', WPB5_ASSETS . '/css/general.min.css', array(), '1.0', 'all');
  wp_enqueue_style('general');

}

//Load JS
add_action('init', 'wpb5_load_scripts');
function wpb5_load_scripts(){
	if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    // Move JQuery to footer (improve google page speed)
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
    wp_enqueue_script( 'jquery' );

    // Bootstrap 4
		wp_register_script('bootstrap', WPB5_ASSETS . '/js/bootstrap.bundle.min.js', array('jquery'), '4.3.1',true);
		wp_enqueue_script('bootstrap');

    // Wow JS
    wp_register_script('wow', WPB5_ASSETS . '/js/wow.min.js', array('jquery'), '1.3.0',true);
		wp_enqueue_script('wow');

    // Owl Carousel 2
    wp_register_script('owl-carousel-2', WPB5_ASSETS . '/js/owl.carousel.min.js', array('jquery'), '2.3.4',true);
		wp_enqueue_script('owl-carousel-2');

    wp_register_script('lightbox', WPB5_ASSETS . '/js/lightbox.min.js', array('jquery'), '1.0',true);
		wp_enqueue_script('lightbox');

    wp_register_script('CalendarAPI', '//:apis.google.com/js/api.js?onload=handleClientLoad', array('jquery'), '1.0',true);
		wp_enqueue_script('CalendarAPI');

    //App JShttps://
		wp_register_script('app', WPB5_ASSETS. '/js/app.js', array('jquery'), '1.0',true);
		wp_enqueue_script('app');

	}
}
