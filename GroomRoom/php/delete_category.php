<?php
// скрипт удаления категории заявки

session_start();
require_once "../include/connection.php";

echo ("<script> confirm('Вы действительно хотите удалить категорию?') </script>");

$result_delete_category = mysqli_query($link, "DELETE FROM `category` WHERE `category`.`name_category` = '".$_POST['delete_category_name']."' ") or die("Ошибка " . mysqli_error($link));

if ($result_delete_category) {
    echo "<script> 
            confirm('Категория удалена');
            location.href = '../admin/groom.php';
        </script>";
}

?>