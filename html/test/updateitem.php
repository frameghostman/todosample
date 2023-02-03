<?php
require "util.php";

if (isset($_GET["id"])) {
  $id = (int) $_GET["id"];
  $val = (int) $_GET["val"];

  try {
    $db = openDB();
    $sql = "UPDATE sample_table SET status = :val WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([":id" => $id, ":val" => $val]);
  } catch (Exception $e) {
    header("Content-Type: text/plain; charset=UTF-8", true, 500);
    exit();
  }
}
$host = $_SERVER["HTTP_HOST"];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = "showdb.php";
header("Location: http://$host$uri/$extra");
exit();
?>
