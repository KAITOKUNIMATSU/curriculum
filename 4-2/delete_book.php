<?php
require_once('dbconnect.php');
require_once('function.php');
session_start();

$id = $_GET['id'];
login_check();
fraud_access_check();

$del = $db->prepare('DELETE FROM books WHERE id=?');
$del->execute(array($id));
header('Location: main.php');

?>