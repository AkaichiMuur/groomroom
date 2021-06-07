<?php

session_start();
require_once "../include/connection.php";

$fio = $_POST['fio'];
$login = $_POST['login'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass_again = $_POST['pass_again'];

$result_login = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `user` WHERE `login` = '$login'"));

if ($result_login <= 0) {
    $result_insert = mysqli_query($link, "INSERT INTO `user`(`id_user`, `fio`, `login`, `email`, `password`, `role`) VALUES (NULL, '$fio', '$login', '$email', '$pass', 2)") or die("Ошибка ". mysqli_error($link));

    if ($result_insert) {
        header("location: ../include/login.html");
        exit();
    }
    else {
        echo("<script>
                alert('Ошибка при регистрации!');
                location.href = '../index.php';
            </script>");
    }
}
else {
    echo("<script>
            alert('Пользователь с таким логином уже существует!');
            location.href = '../index.php';
        </script>");
}

?>