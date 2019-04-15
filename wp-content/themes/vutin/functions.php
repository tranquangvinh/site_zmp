<?php

// add tag support to pages
function tags_support_all() {
	register_taxonomy_for_object_type('post_tag', 'page');
}

// ensure all tags are included in queries
function tags_support_query($wp_query) {
	if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');

define("THEME_URL" , get_stylesheet_directory_uri() . '/');
define("THEME_PATH", __DIR__ . '/');
define("VERSION_ASSET", time());


foreach (glob(__DIR__ . "/inc/inc_*.php") as $filename) {
    include $filename;
}

include __DIR__ . '/inc/customizer-custom-controls-master/inc/custom-controls.php';
include __DIR__ . '/template_loop/boostrap_action.php';

// SETUP THEME
add_action( 'after_setup_theme',  'theme_setupt_theme::after_setup_theme');
add_action( 'widgets_init', 'theme_setupt_theme::widgets_init' );
add_action( 'wp_enqueue_scripts', 'theme_setupt_theme::enqueue_scripts' );
add_action( 'admin_enqueue_scripts', 'theme_setupt_theme::admin_enqueue_scripts' );

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}



