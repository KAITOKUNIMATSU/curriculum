<?php
define('DATABASE', 'checktest4');
define('USERNAME', 'root');
define('PASSWORD', 'root');
define('DSN', 'mysql:host=localhost;charset=utf8;dbname='.DATABASE);

function connect() {
    try {
    $pdo = new PDO(DSN, USERNAME, PASSWORD);
    // echo 'DB接続成功';
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
    } catch (PDOException $e) {
        echo 'Error:' . $e->getMessage();
        die();
    }
}

?>