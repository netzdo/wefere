<?php
if(class_exists('acf')) {
  // WPB5 option pages
  acf_add_options_page(array(
    'page_title' => __('General','wpb5'),
    'menu_title' => __('General','wpb5'),
    'menu_slug' => 'general',
    'post_id' => 'general',
    'capability' => 'edit_posts',
    'redirect' => false,
    'position' => 60,
    'icon_url' => "dashicons-layout"
    )
  );
  // WPB5 get_field() helpers
  function get_g_field($field){
    return get_field($field,'general');
  }

  // WPB5 google maps api key
  function my_acf_init() {
  	acf_update_setting('google_api_key', get_g_field('google_maps_api_key'));
  }
  add_action('acf/init', 'my_acf_init');
}else{
  add_action( 'admin_notices', 'enable_acf_notice' );
}

function enable_acf_notice(){
  echo '<div class="error notice"><p>'.__('WPB5 use Advanced Custom Fields Plugin!, please enable the plugin.','wpb5').'</p></div>';
}
