<?php
include('functions.php');

$id = $_GET['id'];

// DB接続
$pdo = connect_to_db();


$sql = 'DELETE FROM cu_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:customer_list.php");
exit();

?>