<?php
// скрипт добавления категории заявки

session_start();
require_once "../include/connection.php";

$name_category = $_POST['name'];

$result_category = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `category` WHERE `name_category` = '$name_category'"));

if ($result_category <= 0) {
    $result_insert = mysqli_query($link, "INSERT INTO `category` (`id_category`, `name_category`) VALUES (NULL, '$name_category')") or die("Ошибка ". mysqli_error($link));
    if ($result_insert) {
        echo("<script>
                confirm('Новая категория добавлена.');
                location.href = '../admin/groom.php';
            </script>");
    }
    else {
        echo("<script>
                confirm('Ошибка!');
                location.href = '../admin/groom.php';
            </script>");
    }
}
else {
    echo("<script>
            confirm('Такая категория уже существует!');
            location.href = '../admin/groom.php';
        </script>");
}


?>