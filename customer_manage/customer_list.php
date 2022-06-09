<?php

include('functions.php');

$pdo = connect_to_db();
$sql = 'SELECT * FROM cu_table ORDER BY cu_name ASC';

$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["cu_name"]}</td>
      <td>{$record["cu_mail"]}</td>
      <td>{$record["cu_number"]}</td>
      <td>{$record["cu_memo"]}</td>
      <td>{$record["cu_other"]}</td>
      <td>
        <a href='customer_edit.php?id={$record["id"]}'>編集</a>
      </td>
      <td>
        <a href='customer_delete.php?id={$record["id"]}'>削除</a>
      </td>
    </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>顧客管理一覧画面</title>
</head>

<body>
  <fieldset>
    <legend>顧客一覧</legend>
    <a href="customer_register.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>氏名</th>
          <th>メールアドレス</th>
          <th>電話番号</th>
          <th>顧客メモ</th>
          <th>備考</th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>