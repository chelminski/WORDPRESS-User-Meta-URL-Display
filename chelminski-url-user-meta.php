<?php
/*
Plugin Name: User Meta URL Display
Plugin URI: https://github.com/chelminski/WP-User-Meta-URL-Display
Description: A simple WordPress plugin to retrieve and display user meta data from the URL. The user is specified via the `?user=<username>` parameter, allowing you to personalize content dynamically on your site. Just use shortcode: [user_meta_url key="favorite_color" error="No favorite color set"].
Version: 1.0
Author: chelminski
Author URI: https://github.com/chelminski
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
// Shortcode function to retrieve user meta
function chelminski_user_meta_url_shortcode($atts) {
    // Default shortcode attributes
    $atts = shortcode_atts(
        [
            'error' => 'No data available',
            'key' => '',
        ],
        $atts
    );

    // Ensure nonce is set and valid
    if (isset($_GET['_wpnonce'])) {
        // Remove slashes first, then sanitize the nonce
        $nonce = wp_unslash($_GET['_wpnonce']);  // Unsplash first
        $nonce = sanitize_text_field($nonce);  // Sanitize the nonce value
        if (!wp_verify_nonce($nonce, 'user_meta_nonce_action')) {
            return esc_html('Nonce verification failed');
        }
    }

    // Get username from URL parameter
    if (isset($_GET['user'])) {
        // Unsplash and sanitize 'user' input
        $user_login = wp_unslash($_GET['user']);  // Unsplash before sanitization
        $user_login = sanitize_user($user_login, false);  // Sanitize the user login (ensure it's a valid user identifier)
    } else {
        return esc_html($atts['error']);
    }

    // Check if key and user are provided
    if (empty($atts['key']) || empty($user_login)) {
        return esc_html($atts['error']);
    }

    // Find the user by their login
    $user = get_user_by('login', $user_login);
    if (!$user) {
        return esc_html($atts['error']);
    }

    // Retrieve user meta
    $meta_value = get_user_meta($user->ID, $atts['key'], true);

    // Return meta value or error message
    return $meta_value ? esc_html($meta_value) : esc_html($atts['error']);
}
add_shortcode('user_meta_url', 'chelminski_user_meta_url_shortcode');  // Frontend shortcode

// Add nonce field to secure the user query URL
function chelminski_add_nonce_to_url($url) {
    $nonce = wp_create_nonce('user_meta_nonce_action');  // Generate nonce
    // Check if URL is valid and add nonce to it
    if (!empty($url)) {
        $url = add_query_arg('_wpnonce', wp_unslash($nonce), wp_unslash($url));  // Add unslashed nonce to the URL
    }
    return $url;
}