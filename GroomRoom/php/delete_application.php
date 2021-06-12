<?php
// скрипт удаления заявки

session_start();
require_once "../include/connection.php";

$SESSIONid = $_SESSION['id'];

if (isset($_GET['id'])) {
    $id_application = $_GET['id'];
    $result_delete_application = mysqli_query($link, "DELETE FROM `application` WHERE `application`.`id_app` = '$id_application'") or die("Ошибка ". mysqli_error($link));
    if ($result_delete_application) {
        echo "<script> location.href = '../user.php'</script>";
    }
    else {
        echo "<script> location.href = '../user.php'</script>";
    }
}

?>
