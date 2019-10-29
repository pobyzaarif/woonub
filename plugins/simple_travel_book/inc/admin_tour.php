<?php
/**
 * @file
 * booking_tour_page.php
 */

/**
 * Invoke admin tour page.
 */
function stb_tour_admin_page() {
  global $wpdb;
  $table_name = $wpdb->prefix . 'stb_booking';

  // Default query.
  $lastmonth = date("Y-m-d", strtotime("last month")) . " 00:00:00";
  $data = $wpdb->get_results("SELECT * FROM $table_name");
  echo "<center><br /><h2>Data from " . $lastmonth . "</h2></center><br />";

  if (count($data) > 0) {
    echo "<center><div style=\"overflow:auto;height:512px;\"><table border='2'>
    <tr>
    <th>No</th>
    <th>Created</th>
    <th>Updated</th>
    <th>Booking Code</th>
    <th>URL</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone Number</th>
    <th>Date</th>
    <th>Person</th>
    <th>Price</th>
    </tr>";
    foreach ($data as $k => $v) {
      $td = "<td>";
      if ($k % 2 != 0) {
        $td = "<td bgcolor=\"Gainsboro\">";
      }
      echo "<tr>";
      echo $td . $v->id . "</td>";
      echo $td . $v->created . "</td>";
      echo $td . $v->updated . "</td>";
      echo $td . $v->booking_code . "</td>";
      echo $td . $v->url . "</td>";
      echo $td . $v->name . "</td>";
      echo $td . $v->email . "</td>";
      echo $td . $v->phone_number . "</td>";
      echo $td . $v->date_plan . "</td>";
      echo $td . $v->person . "</td>";
      echo $td . $v->price . "</td>";
    }
    echo "</table></center></div>";
  } else {
    echo "<center><h2>Empty Data</h2></center>";
  }
}
