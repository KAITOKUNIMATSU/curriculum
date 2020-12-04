<?php
// ログインチェック
function login_check(){
    if(empty($_SESSION['name'])){
        header('Location: login.php');
        die();
    }
}

function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

// 不正アクセスチェック
function fraud_access_check(){
    if(empty($_GET['id'])){
        header('Location: main.php');
        die();
    }
}

