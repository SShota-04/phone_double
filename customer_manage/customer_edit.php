<?php

include('functions.php');

$id = $_GET['id'];

// DB接続
$pdo = connect_to_db();

$sql = 'SELECT * FROM cu_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型todoリスト（編集画面）</title>
</head>

<body>
  <form action="customer_update.php" method="POST">
    <fieldset>
      <legend>DB連携型todoリスト（編集画面）</legend>
      <a href="customer_list.php">一覧画面</a>
      <div>
      <p><label for="namae">お名前</label></p>
	    <input type="text" id="namae" name="cu_name" value="<?= $record['cu_name'] ?>">
      </div>
      <div>
      <p><label for="mail">メールアドレス</label></p>
	    <input type="email" id="mail" name="cu_mail" placeholder="sample@sample.com" value="<?= $record['cu_mail'] ?>">
      </div>
      <div>
      <p><label for="phone_number">電話番号</label></p>
		<input type="email" id="phone_number" name="cu_number" placeholder="000-000-0000" value="<?= $record['cu_number'] ?>">
      </div>
      <div>
      <p><label for="memo">顧客対応メモ</label></p>
		<textarea id="memo" name="cu_memo" value="<?= $record['cu_memo'] ?>"></textarea>
      </div>
      <div>
      <p><label for="other">備考</label></p>
		<textarea id="other" name="cu_other" value="<?= $record['cu_other'] ?>"></textarea>
      </div>
      <div>
        <input type="hidden" name="id" value="<?= $record['id'] ?>">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>