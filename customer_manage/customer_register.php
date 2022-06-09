<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>顧客登録画面（入力画面）</title>
</head>

<body>
  <form action="customer_create.php" method="POST">
    <fieldset>
      <legend>顧客登録</legend>
      <a href="customer_list.php">顧客一覧</a>
      <div>
      <p><label for="namae">お名前</label></p>
	    <input type="text" id="namae" name="cu_name">
      </div>
      <div>
      <p><label for="mail">メールアドレス</label></p>
	    <input type="email" id="mail" name="cu_mail" placeholder="sample@sample.com">
      </div>
      <div>
      <p><label for="phone_number">電話番号</label></p>
		<input type="tel" id="phone_number" name="cu_number" placeholder="000-000-0000">
      </div>
      <div>
      <p><label for="memo">顧客対応メモ</label></p>
		<textarea id="memo" name="cu_memo"></textarea>
      </div>
      <div>
      <p><label for="other">備考</label></p>
		<textarea id="other" name="cu_other"></textarea>
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>