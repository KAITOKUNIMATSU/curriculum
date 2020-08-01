<?php
// セッション開始
session_start();
// データベース名
$db['dbname'] = "yigroupBlog";
// ユーザー名
$db['user'] = "root";
// ユーザー名のパスワード
$db['pass'] = "root";
// DBサーバのURL
$db['host'] = "mysql:host=localhost;charset=utf8;dbname=" . $db['dbname'];


try {
    $pdo = new PDO($db['host'], $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    die();
}
