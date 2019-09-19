<?php
add_action('init', 'create_custom_post_type');
function create_custom_post_type(){
  $cpts = array(
    'calendar' =>array(
      'singular'=>'calendario',
      'plural'=>'calendarios',
      'icon' => 'dashicons-calendar-alt'
    ),
  );
  if(!empty($cpts)):
    foreach ($cpts as $slug => $cpt):
      $singular = $cpt['singular'];
      $plural = $cpt['plural'];

      register_post_type($slug,
        array(
        'labels' => array(
          'name' => __(ucfirst($plural) , 'wpblank'),
          'singular_name' => __(ucfirst($singular), 'wpblank'),
          'add_new' => __('Add new', 'wpblank'),
          'add_new_item' => __('Add new '.$singular, 'wpblank'),
          'edit' => __('Edit', 'wpblank'),
          'edit_item' => __('Edit '.$singular, 'wpblank'),
          'new_item' => __('New '.$singular, 'wpblank'),
          'view' => __('View', 'wpblank'),
          'view_item' => __('View '.$singular, 'wpblank'),
          'search_items' => __('Search '.$singular, 'wpblank'),
          'not_found' => __('No '.$plural.' found', 'wpblank'),
          'not_found_in_trash' => __('No '.$plural.' found in trash', 'wpblank')
        ),
        'public' => true,
        'hierarchical' => true,
        'has_archive' => false,
        'menu_icon' => $cpt['icon'],
        'query_var' => true,
        'supports' => array(
          'title',
          'editor',
          'excerpt',
          'thumbnail',
          'comments'
        ),
        'can_export' => true,
        'taxonomies' => array(
          'post_tag'=>false,
          'category'=>false
        )
      ));
    endforeach;
  endif;
}
