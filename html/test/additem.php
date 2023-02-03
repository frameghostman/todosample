<?php
if (isset($_POST["submit"])) {
  try {
    $dsn = 'mysql:host=mysql;dbname=sample_db;';
    $db = new PDO($dsn, 'sample_user', 'sample_pass');//connect MySQL
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//PDO error report

    // SQL INSERT
    $sql = "INSERT INTO sample_table (name) VALUES (:name)";

    // SQL PREPARE
    $stmt = $db->prepare($sql);

    // SET VARIABLES
    $name = $_POST["item"];   
    $comment = $_POST["comment"];
    $params = array(':name' => $name);
    
    // EXECUTE
    $stmt->execute($params);
  } catch (Exception $e) {
    header("Content-Type: text/plain; charset=UTF-8", true, 500);
    exit();
  }
}
header("Location: showdb.php");
exit();
?>
