<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>todoリストユーザ登録画面</title>
</head>

<body>
  <form action="user_register_act.php" method="POST">
    <fieldset>
      <legend>ユーザ登録画面</legend>
      <div>
      <p><label for="username">お名前</label></p>
	    <input type="text" id="username" name="username">
      </div>
      <div>
      <p><label for="usermail">メールアドレス</label></p>
	    <input type="email" id="usermail" name="usermail" placeholder="sample@sample.com">
      </div>
      <div>
      <p><label for="pass">パスワード</label></p>
	    <input type="email" id="pass" name="password">
      </div>
      <div>
        <button>Register</button>
      </div>
      <a href="login.php">or login</a>
    </fieldset>
  </form>

</body>

</html>