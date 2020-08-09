<?php
require('pdo.php');
require('getData.php');

$get = new getData();
$users = $get->getUserData();
$posts = $get->getPostData();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <title>article</title>
</head>

<body>
<div class="wrapper">
<div class="header clearfix">
    <div class="header-logo">
        <img src="logo.png" class="logo-img">
    </div>
    <div class="header-right clearfix">
        <div class="header-upper">ようこそ 
            <?= $users['last_name'] . $users['first_name'] ?> さん</div>
        <div class="header-lower">最終ログイン日：
            <?= $users['last_login'] ?></div>
    </div>
</div>

<div class="main">
    <table>
        <thead>
            <tr>
                <th>記事ID</th>
                <th>タイトル</th>
                <th>カテゴリ</th>
                <th>本文</th>
                <th>投稿日</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($post = $posts->fetch()) : ?>
                <?php 
                if ($post['category_no'] == 1) {
                    $post['category_no'] = "食事";
                } elseif ($post['category_no'] == 2) {
                    $post['category_no'] = "旅行";
                } else {
                    $post['category_no'] = "その他";
                }
                ?>
            <tr>
                <th><?= $post['id'] ?></th>
                <th><?= $post['title'] ?></th>
                <th><?= $post['category_no'] ?></th>
                <th><?= $post['comment'] ?></th>
                <th><?= $post['created'] ?></th>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<div class="footer">
    <div class="footer-title">Y&I group.inc</div>
</div>
</div>
    
</body>
</html>