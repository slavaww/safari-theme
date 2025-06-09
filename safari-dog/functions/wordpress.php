<?php

/**
 * Remove WP defaults
 *
 * @package safari-dog theme
 */

// remove_action( 'wp_head', 'wp_shortlink_wp_head' );
// remove_action( 'wp_head', 'wp_generator' );
// remove_action( 'wp_head', 'rsd_link' );
// remove_action( 'wp_head', 'wlwmanifest_link' );
// remove_action( 'wp_head', 'start_post_rel_link' );
// remove_action( 'wp_head', 'index_rel_link' );
// remove_action( 'wp_head', 'adjacent_posts_rel_link' );
// remove_action( 'wp_head', 'feed_links', 2 );
// remove_action( 'wp_head', 'feed_links_extra', 3 );
// remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head' );
// remove_action( 'wp_head', 'wp_resource_hints', 2);
// remove_action( 'wp_head', 'rest_output_link_wp_head');
// remove_action( 'wp_head', 'wp_oembed_add_discovery_links');
//remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
// remove_action( 'admin_print_styles', 'print_emoji_styles' );
// remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
// remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
// remove_action( 'wp_print_styles', 'print_emoji_styles' );
// remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
// remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
// remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
// remove_filter( 'the_content', 'wpautop' );

//фильтр добавляет теги <P> вместо переносов в админке при визуальном редактировании
//add_filter('wp_insert_post_data', function ($data, $postarr) { $data['post_content'] = wpautop($data['post_content']); return $data; }, 10, 2); 

/**
 * Security fixes
 */
// add_filter( 'xmlrpc_enabled', '__return_false' );
// add_filter( 'pre_option_enable_xmlrpc', '__return_false' );
// add_action( 'xmlrpc_call', '__return_false' );
// add_filter( 'excerpt_length', function(){ return 30; } );

// add_filter( 'wp_headers', 'disable_x_pingback' );
// function disable_x_pingback( $headers )
// {
//     unset( $headers['X-Pingback'] );
//     return $headers;
// }

// add_filter( 'xmlrpc_methods', 'shapeSpace_disable_xmlrpc_multicall' );
// function shapeSpace_disable_xmlrpc_multicall($methods)
// {
//     unset($methods['system.multicall']);
//     return $methods;
// }

//Remove Gutenberg Block Library CSS from loading on the frontend
// function smartwp_remove_wp_block_library_css(){
//  wp_dequeue_style( 'wp-block-library' );
//  wp_dequeue_style( 'wp-block-library-theme' );
//  wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
// } 
// add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

/**
 * RSS Feed
 */
//function itsme_disable_feed() {
//    wp_die( __( 'No feed available, please visit the' ) );
//}

//add_action('do_feed', 'itsme_disable_feed', 1);
//add_action('do_feed_rdf', 'itsme_disable_feed', 1);
//add_action('do_feed_rss', 'itsme_disable_feed', 1);
//add_action('do_feed_rss2', 'itsme_disable_feed', 1);
//add_action('do_feed_atom', 'itsme_disable_feed', 1);
//add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
//add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);

/**
 * wp-json
 */

//add_filter('rest_enabled', '__return_false');
//remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
//remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
//remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
//remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
//remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
//remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
//remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );
//remove_action( 'init', 'rest_api_init' );
//remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
//remove_action( 'parse_request', 'rest_api_loaded' );
//remove_action( 'rest_api_init', 'wp_oembed_register_route');
//remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );
