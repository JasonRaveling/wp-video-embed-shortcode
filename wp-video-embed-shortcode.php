<?php
/*
Plugin Name:  Video Embed Shortcodes
Description:  Adds [youtube] and [vimeo] shortcodes. Also adds buttons to editor that automatically places the shortcodes.
Plugin URI:   https://github.com/webunraveling/wp-video-embed-shortcode
Version:      0.2
Author:       Jason Raveling
Author URI:   https://webunraveling.com
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html

/*
WP Video Embed Shortcode
Copyright (C) 2016 Jason Raveling

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/

// the functionality
include_once('video-sources/youtube.php');
include_once('video-sources/vimeo.php');
// include_once('video-sources/pbs.php');

// the style
add_action('wp_enqueue_scripts', 'wunrav_youtube_style');
function wunrav_youtube_style() {
  wp_enqueue_style( 'wunrav-youtube-style', plugin_dir_url(__FILE__) . 'styles/css/wunrav-video-shortcode-style.css', '', '1.0' );
}

/******************************************************************
 AD BUTTONS TO THE VISUAL EDITOR
******************************************************************/
add_action('init', 'wunrav_video_shorctode_buttons');
function wunrav_video_shorctode_buttons(){

  if ( current_user_can('edit_posts') || current_user_can('edit_pages') ) {
    add_filter('mce_external_plugins', 'wunrav_add_shortcode_script');
    add_filter('mce_buttons', 'wunrav_register_shortcode_button');
  }
}

function wunrav_register_shortcode_button($buttons){
  if ( current_user_can('edit_posts') ||  current_user_can('edit_pages') ) {
    array_push($buttons, "vimeo", "youtube", "separator");
  }

  return $buttons;
}

function wunrav_add_shortcode_script($plugin_array) {
   $plugin_array['youtube'] = dirname(__file__) . '/include/javascript/youtube.js';
   $plugin_array['vimeo'] = dirname(__file__) . '/include/javascript/vimeo.js';
   return $plugin_array;
}
