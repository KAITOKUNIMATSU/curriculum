<?php
require('db_connect.php');

if(isset($_POST["signUp"])){

    $name = htmlspecialchars($_POST["name"], ENT_QUOTES);
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES);

if(!empty($_POST["name"] && !empty($_POST["password"]))){

    $pdo = db_connect();
        try {
            $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";
            $password_hash = password_hash($password,PASSWORD_DEFAULT);
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindValue(':password', $password_hash);
            $stmt->execute();
            $signUpMessage = '登録が完了しました';
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            die();
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<h1>新規登録</h1>
<form method="POST" action="" >
user:<br>
<input type="text" name="name" id="name">
<br>
password:<br>
<input type="password" name="password" id="password"><br>
<input type="submit" value="submit" id="signUp" name="signUp">

</form>
</body>
</html>
