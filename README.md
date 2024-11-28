# User Meta URL Display

**A lightweight WordPress plugin that allows you to retrieve and display user meta data dynamically based on a URL parameter.**

## Features
- Display any WordPress user meta field using a customizable shortcode.
- Specify the user via the `?user=<username>` parameter in the URL.
- Ideal for creating personalized user profile pages, membership systems, or content that adjusts dynamically based on the user.
- Provides customizable error messages for missing data.

## Installation
1. Download the plugin ZIP file or clone it from the repository.
2. Upload the plugin folder to the `wp-content/plugins` directory of your WordPress site.
3. Activate the plugin in the **Plugins** menu in the WordPress admin panel.

## Usage
1. Add the `?user=<username>` parameter to the URL to specify the user. Example: `https://yourwebsite.com/page?user=john_doe`

2. Use the shortcode `[user_meta_url]` in a post, page, or widget to display user meta data.

### Shortcode Attributes
- `key`: The meta key you want to display.
- `error` (optional): The error message to display if the meta key is missing or the user is not found. Default is `No data available`.

### Example
Display the meta key `favorite_color` for the user `john_doe`: 
`[user_meta_url key="favorite_color"]`

Customize the error message: 
`[user_meta_url key="favorite_color" error="No favorite color set"]`

Developed by chelminski
