<?php
require_once('dbconnect.php');
session_start();
require_once('function.php');

// ログインチェック
login_check();

// 登録ボタンが押されたら
if(isset($_POST['submit'])){
    // 入力チェック
    if(empty($_POST['book_title']) && empty($_POST['relese_date']) && empty($_POST['stock'])){
        echo '入力がされていないところがあります';
    // 問題なければ
    } else{
        $books = $db->prepare('INSERT INTO books (title, date, stock) VALUES (?, ?, ?)');
        $books->execute(array($_POST['book_title'], $_POST['release_date'], $_POST['stock']));

        header('Location: main.php');
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
    <title>登録画面</title>
</head>
<body>
<div class="wrapper">
    <h1>本 登録画面</h1>
    <form action="" method="POST">
        <input type="text" name="book_title" placeholder="  タイトル"><br>
        <input type="text" name="release_date" placeholder="  発売日"><br>
        在庫数<br>
        <select name="stock">
            <option value="">選択してください</option>
            <?php for($i=5;$i<=100;$i+=5) : ?>
            <option value="<?= $i; ?>"><?= $i; ?></option>
            <?php endfor; ?>
        </select><br>
        <input type="submit" value="登録" name="submit" class="submit">
    </form>
</div>
</body>
</html>