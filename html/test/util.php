<?php
function openDB() {
  $dsn = 'mysql:host=mysql;dbname=sample_db;';

  try {
    $db = new PDO($dsn, 'sample_user', 'sample_pass');
  } catch (Exception $e) {
    throw $e;
  }
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $db;
}
?>

