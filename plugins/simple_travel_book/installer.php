<?php
/**
 * @file
 * installer.php
 */

/**
 * Plugin Name: Simple Travel Book
 * Plugin URI: https://github.com/pobyzaarif
 * Description: Book button for travel site.
 * Version: 1.0
 * Author: pobyzaarif
 * Author URI: https://github.com/pobyzaarif
 */

register_activation_hook(__FILE__, 'simple_travel_book_install');

/**
 * Install Plugins.
 */
function simple_travel_book_install() {
  global $wpdb;
  $version = '1.0.0';
  $table_name = $wpdb->prefix . 'stb_booking';
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    created datetime DEFAULT NULL,
    updated datetime DEFAULT NULL,
    booking_code varchar(15) NOT NULL,
    url text NOT NULL,
    name text NOT NULL,
    email text NOT NULL,
    phone_number varchar(15) NOT NULL,
    date_plan text NOT NULL,
    person int(4) NOT NULL,
    price int(10) NOT NULL,
    email text DEFAULT NULL,
    PRIMARY KEY (id)
  ) $charset_collate;";

  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  dbDelta($sql);
  add_option('my_db_version', $version);
}

add_action('admin_menu', 'simple_travel_book_menu');

/**
 * Add admin page.
 */
function simple_travel_book_menu() {
  add_menu_page('Booking Tour Page', 'Booking Tour', 'manage_options', 'simple_travel_book_admin_tour', 'simple_travel_book_admin_tour_page');
}

/**
 * Load data from db show it.
 */
function simple_travel_book_admin_tour_page($test=NULL) {
  require_once 'inc/admin_tour.php';
  return stb_tour_admin_page();
}

add_shortcode('tour_form', 'simple_travel_book_tour_form');

/**
 * Load tour form to post/page.
 *
 * Usage write this code to your post/page : [tour_form][/tour_form].
 */
function simple_travel_book_tour_form($atts, $content = NULL) {
  if (isset($_POST['BtnSubmit']) ) {
    require_once 'inc/insert_tour.php';
    global $wp;
    $_POST['s_url'] = $wp->request;
    stb_tour_form_insert($_POST);
  }

  require_once 'inc/form_tour.php';
  return stb_tour_form();
}
