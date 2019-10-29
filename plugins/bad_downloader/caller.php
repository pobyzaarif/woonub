<?php
/**
 * @file
 * caller.php
 */

/**
 * Plugin Name: Bad Downloader
 * Plugin URI: https://github.com/pobyzaarif
 * Description: This plugins contains LFI vulnerability, for education or research only.
 * Version: 1.0
 * Author: pobyzaarif
 * Author URI: https://github.com/pobyzaarif
 */

add_shortcode('bad_downloader', 'get_file_everything');

/**
 * Get_file_everything.
 */
function get_file_everything($atts, $content = NULL) {
  $base = plugin_dir_url(__FILE__);
  $output = '<center>
              <a href="' . $base . 'download.php?f=' . base64_encode('sample/' . $content) . '">
              <img src="' . $base . 'img/' . $atts["button"] . '" />
              </a>
            <center>';

  return $output;
}
