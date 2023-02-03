<?php
require "util.php";

try {
    $db = openDB();
    $sql = "SELECT * FROM sample_table";
    $stmt = $db->query($sql);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>List</title>
</head>
<body>
  <h1>DB List</h1>
  <ul>
    <?php foreach ($stmt as $row) {?>
      <li>
        <?=htmlspecialchars($row["name"], ENT_QUOTES)?>
        <a href="deleteitem.php?id=<?=$row['id']?>">DELETE</a>
      </li>
    <?php  }?>
    <?php
    $stmt = null;
    $pdo = null;
    ?>
  </ul>
  <p>register DB item</p>
  <form action="additem.php" method="post">
    item:
    <input name="item"><br>
    <input type="submit" name="submit">
  </form>
</body>
</html>
