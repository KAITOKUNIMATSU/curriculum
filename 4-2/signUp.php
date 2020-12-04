<?php
session_start();
require_once('dbconnect.php');


// 新規登録ボタンが押されたら
if(isset($_POST['signUp'])){
    // 名前とパスワードが問題なければ
    if($_POST['name'] !== '' && $_POST['password'] !== ''){
        // データベースから入力された名前があるか確認
        $name = $db->prepare('SELECT * FROM users WHERE name=?');
        $name->execute(array($_POST['name']));
        $name_check = $name->fetch(PDO::FETCH_ASSOC);
        // 名前の重複チェック
        if($name_check['name'] === $_POST['name']){
            echo 'その名前は既に使われています';
        // 重複していなければ保存
        } else {
            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $users = $db->prepare('INSERT INTO users (name, password) VALUES(?, ?)');
            $users->execute(array($_POST['name'], $hash));
            $_SESSION['name'] = $_POST['name'];
            echo '登録が完了しました';
            echo '<br>';
            echo '<a href="main.php">ホームへ</a>';
            $_POST['name'] = '';
        }
    // 名前かパスワードがから文字の場合
    } else{
        echo 'ユーザー名もしくはパスワードが空白です';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ユーザー登録</title>
</head>
<body>
<div class="wrapper">
    <h1 class="title">ユーザー登録画面</h1>
    <form action="" method="POST">
        <input type="text" name="name" placeholder="  ユーザー名"><br>
        <input type="password" name="password" placeholder="  パスワード"><br>
        <input type="submit" value="新規登録" name="signUp" class="submit">
    </form>
</div>
</body>
</html>