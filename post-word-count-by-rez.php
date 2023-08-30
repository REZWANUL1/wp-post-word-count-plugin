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
if (!defined('ABSPATH')) {
   exit;
}
add_action('plugin_loaded', 'pwcbr_loadtextdomain');
function pwcbr_loadtextdomain()
{
   load_plugin_textdomain('pwc-by-rez', false, dirname(__FILE__) . "/languages");
}

//? getting the words and counting them
add_filter('the_content', 'pwcbr_count_words');
function pwcbr_count_words($content)
{

   $stripped_content = strip_tags($content);
   $words = str_word_count($stripped_content);
   $label = __('Total number of words', 'pwc-by-rez');
   $label = apply_filters('word_count_heading', $label);
   $tag = apply_filters('word_count_tag', 'h2');
   $content .= sprintf('<%s>%s: %s</#>', $tag, $label, $words, $tag);
   return $content;
}

//? find post word reading time
add_filter('the_content', 'pwcbr_count_words_timing');
function pwcbr_count_words_timing($content)
{
   $stripped_content = strip_tags($content);
   $words = str_word_count($stripped_content);
   $reading_minute = floor($words / 200);
   $reading_seconds = floor($words % 200 / (200 / 60));
   $is_visible = apply_filters('wordcuont_display_readingtime', 1);
   if ($is_visible) {
      $label = __('Total reading time', 'pwc-by-rez');
      $label = apply_filters('word_count_time', $label);
      $tag = apply_filters('word_count_time_tag', 'h4');


      $content .= sprintf('<%s>%s: %s minutes %s seconds</#>', $tag, $label, $reading_minute, $reading_seconds, $tag);
      return $content;
   }
   return $content;
}
