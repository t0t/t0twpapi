<?php

function main_css() {
  wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css');
}
add_action( 'wp_enqueue_scripts', 'main_css' );

function main_js() {
  wp_enqueue_script('main_js', get_template_directory_uri() . '/main.js', '', '', true );
}
add_action( 'wp_enqueue_scripts', 'main_js');

// Remove Emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );


// Cleanup
add_action('after_setup_theme','start_cleanup');

function start_cleanup() {
  // Initialize the cleanup
  add_action('init', 'cleanup_head');
}

// WordPress cleanup function
function cleanup_head() {

  // EditURI link
  remove_action( 'wp_head', 'rsd_link' );

  // Category feed links
  remove_action( 'wp_head', 'feed_links_extra', 3 );

  // Post and comment feed links
  remove_action( 'wp_head', 'feed_links', 2 );

  // Windows Live Writer
  remove_action( 'wp_head', 'wlwmanifest_link' );

  // Index link
  // remove_action( 'wp_head', 'index_rel_link' );

  // Previous link
  // remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );

  // Start link
  // remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );

  // Canonical
  remove_action('wp_head', 'rel_canonical', 10, 0 );

  // Shortlink
  remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );

  // Links for adjacent posts
  // remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

  // WP version
  remove_action( 'wp_head', 'wp_generator' );

}
