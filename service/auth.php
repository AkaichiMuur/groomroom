<?php

session_start();
require_once "../include/connection.php";

$SESSIONname = $_SESSION['username'];

if (isset($SESSIONname)) {
    $query_role = "SELECT `role` FROM `user` WHERE `login` = '$SESSIONname'";
    $result_role = mysqli_query($link, $query_role);
    $role_data = mysqli_fetch_row($result_role);
    $role = $role_data[0];

    if ($role == 1)
    {
        header('Location: ../index.php');
        exit();
    }
    else if ($role == 2) 
    {
        header('Location: ../index.php');
        exit();
    }
}

$login = $_POST['login'];
$pass = $_POST['pass'];

$result_user = mysqli_query($link, "SELECT `login`, `password` FROM `user`");

while ($row = mysqli_fetch_row($result_user)) {
    if (($login == $row[0]) and ($pass == $row[1])) {
        session_start();
        $_SESSION['username'] = $row[0];
        header('location: auth.php');
    }
}

?>