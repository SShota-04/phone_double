<?php
// データ受け取り
session_start();
include('functions.php');

$username = $_POST['username'];
$usermail = $_POST['usermail'];
$password = $_POST['password'];

// DB接続
$pdo = connect_to_db();

// SQL実行
$sql = 'SELECT * FROM users_table WHERE username=:username AND password=:password AND usermail=:usermail AND is_deleted=0';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':usermail', $usermail, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// ユーザ有無で条件分岐
$val = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$val) {
  echo "<p>ログイン情報に誤りがあります</p>";
  echo "<a href=login.php>ログイン</a>";
  exit();
} else {
  $_SESSION = array();
  $_SESSION['session_id'] = session_id();
  $_SESSION['is_admin'] = $val['is_admin'];
  $_SESSION['username'] = $val['username'];
  $_SESSION['usermail'] = $val['usermail'];
  $_SESSION['password'] = $val['password'];
  header("Location:frontpage.php");
  exit();
}

