<?php
require "util.php";

if (isset($_GET["id"])) {
  $id = (int) $_GET["id"];

  try {
    $db = openDB();
    $sql = "DELETE FROM sample_table WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([":id" => $id]);
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
