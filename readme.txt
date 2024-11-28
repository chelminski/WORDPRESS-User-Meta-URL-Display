=== WordPress User Meta URL Display ===
Contributors: chelminski
Tags: user meta, URL, shortcode
Requires at least: 5.0
Tested up to: 6.7.1
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

== Description ==
A simple WordPress plugin to retrieve and display user meta data from the URL.

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

## License
This plugin is licensed under the GPLv2 or later license. See the [LICENSE](https://www.gnu.org/licenses/gpl-2.0.html) for more details.

GNU GENERAL PUBLIC LICENSE
Version 2, June 1991

Copyright (C) 2024 chelminski

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA

