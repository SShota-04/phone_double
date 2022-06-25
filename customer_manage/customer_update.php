<?php
session_start();
include('functions.php');
check_session_id();

if (
    !isset($_POST['cu_name']) || $_POST['cu_name'] == '' ||
    !isset($_POST['cu_mail']) || $_POST['cu_mail'] == '' ||
    !isset($_POST['cu_number']) || $_POST['cu_number'] == '' ||
    !isset($_POST['cu_memo']) || $_POST['cu_memo'] == '' ||
    !isset($_POST['cu_other']) || $_POST['cu_other'] == '' 
) {
  exit('paramError');
}

$name = $_POST['cu_name'];
$mail = $_POST['cu_mail'];
$number = $_POST['cu_number'];
$memo = $_POST['cu_memo'];
$other = $_POST['cu_other'];

// DB接続
$pdo = connect_to_db();

$sql = 'UPDATE cu_table SET cu_name=:cu_name, cu_mail=:cu_mail, cu_number=:cu_number, cu_memo=:cu_memo, cu_other=:cu_other, updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':cu_name', $name, PDO::PARAM_STR);
$stmt->bindValue(':cu_mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':cu_number', $number, PDO::PARAM_STR);
$stmt->bindValue(':cu_memo', $memo, PDO::PARAM_STR);
$stmt->bindValue(':cu_other', $other, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:customer_list.php");
exit();

?>