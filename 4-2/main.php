<?php
require_once('dbconnect.php');
require_once('function.php');
session_start();

// ログインチェック
login_check();

// 在庫のデータ取得
$inventory = $db->query('SELECT * FROM books ORDER BY title ASC');


?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>在庫一覧</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper clearfix">
        <div class="header">
            <h1 class="main-title">在庫一覧画面</h1>
        </div>
        <a href="new_book.php"><button class="new-book">新規登録</button></a>
        <a href="logout.php"><button class="logout">ログアウト</button></a>
        <table>
            <tr>
                <th>タイトル</th>
                <th>発売日</th>
                <th>在庫数</th>
                <th></th>
            </tr>
            <?php while($row = $inventory->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?= h($row['title']); ?></td>
                <td><?= h(date('Y/m/d', strtotime($row['date']))); ?></td>
                <td><?= h($row['stock']); ?></td>
                <td><a href="delete_book.php?id=<?= $row['id']; ?>"><button class="delete">削除</button></a></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>