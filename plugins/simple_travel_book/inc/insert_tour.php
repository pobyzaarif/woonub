<?php
/**
 * @file
 * insert_tour.php
 */

/**
 * Insert tour booking.
 */
function stb_tour_form_insert($data) {
  global $wpdb;
  require_once ABSPATH . 'wp-load.php';
  $table_name = $wpdb->prefix . 'stb_booking';
  $date = date("Y-m-d H:i:s");
  $wpdb->insert(
    $table_name, array(
      'created' => $date,
      'updated' => $date,
      'booking_code' => stb_booking_code_generator("A"),
      'url' => $data['s_url'],
      'name' => $data['s_name'],
      'email' => $data['s_email'],
      'phone_number' => $data['s_phone'],
      'date_plan' => $data['s_date'],
      'person' => $data['s_ppl'],
      'price' => '2',
    )
  );
  // if ($wpdb->rows_affected) {
  //   echo "<center>Thank You</center>";
  //   exit();
  // }
}

function stb_booking_code_generator($booking_code = "01") {
  $rand = $booking_code . time();
  return $rand;
}
