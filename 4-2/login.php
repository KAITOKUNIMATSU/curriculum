<?php
require_once('dbconnect.php');
session_start();

// ログインボタンを押したら
if(isset($_POST['login'])){

    // 名前の入力チェック
    if($_POST['name'] === ''){
        echo '名前を入力してください';
        echo '<br>';
        $error = 'blank';
    }

    // パスワードの入力チェック
    if($_POST['password'] === ''){
        echo 'パスワードを入力してください';
        $error = 'blank';
    }

    // 入力が空でなければ
    if(empty($error)){
        $name_check = $db->prepare('SELECT * FROM users WHERE name=?');
        $name_check->execute(array($_POST['name']));
        $user = $name_check->fetch(PDO::FETCH_ASSOC);
        // パスワードの確認。正しければtrue
        if(password_verify($_POST['password'], $user['password'])){
            $_SESSION['name'] = $user['name'];
            $welcome = 'ログインに成功しました！';
            $main_link = '<a href="main.php">ホームへ</a>';
            $_POST['name'] = '';
        // 正しくなければ
        } else{
            echo '名前もしくはパスワードが違います';
        }
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
    <title>4章チェックテスト</title>
</head>
<body>
    <div class="wrapper">
        <?php if($welcome){
            echo $welcome;
            echo '<br>';
            echo $main_link;
        }
        ?>
        <div class="header">
            <h1>ログイン画面</h1>
            <a href="signUp.php"><button class="signup-link">新規ユーザー登録</button></a>
        </div>
        <form action="" method="POST">
            <input type="text" name="name" placeholder="  ユーザー名"><br>
            <input type="password" name="password" placeholder="  パスワード"><br>
            <input type="submit" value="ログイン" name="login" class="submit">
        </form>
    </div>
</body>
</html>