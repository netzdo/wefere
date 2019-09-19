<?php
show_admin_bar(false);

add_theme_support( 'title-tag' );
add_theme_support('menus');
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );

add_filter('widget_text','do_shortcode');

add_image_size('small-square', 250, 250, true);

add_action('init', 'register_menus');
function register_menus()
{
  register_nav_menus(
    array(
    'wpb5-main' => __('Main Menu', 'wpb5'),
    'wpb5-top' => __('Top Menu', 'wpb5'),
    'wpb5-footer' => __('Secondary Menu', 'wpb5'),
  ));
}

if (function_exists('register_sidebar')){
	register_sidebar(array(
		'name' => __('Sidebar', 'wpb5'),
		'description' => __('This is side widget area.', 'wpb5'),
		'id' => 'sidebar',
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
  register_sidebar(array(
		'name' => __('Archive Sidebar', 'wpb5'),
		'description' => __('This is side widget area.', 'wpb5'),
		'id' => 'archive-sidebar',
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
  register_sidebar(array(
		'name' => __('Footer Widget Area 1', 'wpb5'),
		'description' => __('This is footer widget area 1.', 'wpb5'),
		'id' => 'footer-widgets-1',
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
  register_sidebar(array(
		'name' => __('Footer Widget Area 2', 'wpb5'),
		'description' => __('This is footer widget area 2.', 'wpb5'),
		'id' => 'footer-widgets-2',
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
  register_sidebar(array(
		'name' => __('Footer Widget Area 3', 'wpb5'),
		'description' => __('This is footer widget area 3.', 'wpb5'),
		'id' => 'footer-widgets-3',
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
  register_sidebar(array(
		'name' => __('Footer Widget Area 4', 'wpb5'),
		'description' => __('This is footer widget area 4.', 'wpb5'),
		'id' => 'footer-widgets-4',
		'before_widget' => '<div id="%1$s" class="%2$s widget">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
}


function my_login_redirect($redirect_to, $request) {
  $redirect_url = get_home_url();

  return $redirect_url;
}
add_filter("login_redirect", "my_login_redirect", 10, 3);
