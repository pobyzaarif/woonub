<?php
/**
 * @file
 * download.php
 */

session_start();
if (isset($_REQUEST["f"])) {
  $file = base64_decode($_REQUEST["f"]);
  header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Content-Disposition: attachment; filename="' . basename($file) . '"');
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Content-Length: ' . filesize($file));
  flush();
  readfile($file);
}
