<?php
/*
* Plugin Name: Post Words Count By Rez
<!-- * Plugin URI:        https://example.com/plugins/the-basics/ -->
* Description: Count your Wordpress post words.
* Version: 1.0.
* Requires at least: 5.2
* Requires PHP: 7.2
* Author: Rezwanul Haque
<!-- * Author URI:        https://author.example.com/ -->
<!-- * License: GPL v2 or later -->
<!-- * License URI:       https://www.gnu.org/licenses/gpl-2.0.html -->
<!-- * Update URI:        https://example.com/my-plugin/ -->
* Text Domain: pwc-by-rez
* Domain Path: /languages
*/
add_action('wp_head', 'welcome_message_word_count');
function welcome_message_word_count()
{
   echo '<p>Hello,Count your wordpress words with this plugin</p>';
}
