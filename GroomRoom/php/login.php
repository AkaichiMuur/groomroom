<?php

session_start();
require_once "../include/connection.php";

$login = $_POST['login'];
$pass = $_POST['pass'];

$result_user = mysqli_query($link, "SELECT `id_user`, `login`, `password`, `role` FROM `user` WHERE `login` = '$login' AND `password` = '$pass'");
$row = mysqli_fetch_row($result_user);

if (!empty($row)) {
    session_start();
    $_SESSION['role'] = $row[3];
    $_SESSION['username'] = $row[1];
    $_SESSION['id'] = $row[0];
    header('location: login.php');
    
    if ($_SESSION['role'] == 1){
        header('Location: ../admin/groom.php');
        exit();
    }
    elseif ($_SESSION['role'] == 2) {
        header('Location: ../user.php');
        exit();
    }
}
elseif (empty($row)) {
    echo"<script> 
        confirm('Неправильный логин или пароль, попробуйте снова.');
        location.href = '../index.php#auth';
    </script>";
}

?>