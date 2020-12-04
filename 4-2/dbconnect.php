<?php

define('DATABASE', 'checktest4');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DSN', 'mysql:localhost;charset=utf8;dbname='.DATABASE);

try{
    $db = new PDO(DSN, DB_USER, DB_PASS);
    // echo 'good';
} catch(PDOException $e){
    echo 'Error:'.$e->getMessage();
    die();
}

?>