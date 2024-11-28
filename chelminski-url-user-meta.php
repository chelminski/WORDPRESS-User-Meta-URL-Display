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

    // Get username from URL parameter
    $user_login = isset($_GET['user']) ? sanitize_text_field($_GET['user']) : '';

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