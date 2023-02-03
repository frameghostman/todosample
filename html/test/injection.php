<?php
require "util.php";

try {
    $db = openDB();
    $id = "1";
    $sql = "SELECT * FROM sample_table WHERE id = '$id'";
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
        <?=htmlspecialchars($row["comment"], ENT_QUOTES)?>
        <?=htmlspecialchars($row["status"], ENT_QUOTES)?>
        <a href="deleteitem.php?id=<?=$row['id']?>">DELETE</a>
        <a href="updateitem.php?id=<?=$row['id']?>&val=1">UPDATE</a>
      </li>
    <?php  }?>
    <?php
    $stmt = null;
    $pdo = null;
    ?>
  </ul>
  <p>register DB item</p>
  <form action="injection.php" method="post">
    item:
    <input name="item"><br>
    comment:
    <input name="comment"><br>
    <input type="submit" name="submit">
  </form>
</body>
</html>
