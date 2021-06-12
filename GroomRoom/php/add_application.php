<?php
// скрипт создания заявки

session_start();
require_once "../include/connection.php";

$SESSIONid = $_SESSION['id'];
$SESSIONname = $_SESSION['username'];

$name = $_POST['name'];
$description = $_POST['description'];
$category = $_POST['category'];

// проверяем является ли файл изображением
if (!getimagesize ($_FILES["image"]["tmp_name"])) {
    echo("<script>
            location.href = '../user.php?message=Загружаемый файл должен быть изображением';
        </script>");
}
// получаем мета данные изображения
$arr = getimagesize ($_FILES["image"]["tmp_name"]);
// проверяем формат загружаемого изображения
if ($arr["mime"] == "image/png") { // png
    $ext = ".png";
}
elseif ($arr["mime"] == "image/jpeg") { // jpeg, jpg
    $ext = ".jpg";
}
elseif ($arr["mime"] == "image/bmp") { // bmp
    $ext = ".bmp";
}
else { 
    // в случае иных расширений
    header ("Location: ../user.php?message=Поддерживаемые форматы изображения: jpeg, jpg, png и bmp");
    exit;
}

// формируем имя изображения
$image_name = time () . $ext;
// перемещаем изображение в директорию хранения
if (!move_uploaded_file ($_FILES["image"]["tmp_name"], "../img/before/" . $image_name)) {
    header ("Location: ../user.php?message=Произошла ошибка с сохранением вашего изображения");
    exit;
}
// путь для добавления в базу данных
$path = "img/before/". $image_name;


$result_id_category = mysqli_query($link, "SELECT `id_category` FROM `category` WHERE `name_category` = '$category'") or die("Ошибка ". mysqli_error($link));
$row_id_category = mysqli_fetch_assoc($result_id_category);
$id_category = $row_id_category['id_category'];

$result_insert_application = mysqli_query($link, "INSERT INTO `application` (`id_app`, `name_pet`, `description`, `id_category`, `img_before`, `img_after`, `status`, `comment`, `time`, `id_user`) VALUES (NULL, '$name', '$description', '$id_category', '$path', NULL, 'Новая', NULL, NOW(), '$SESSIONid')") or die("Ошибка ". mysqli_error($link));

if ($result_insert_application) {
    echo("<script> location.href = '../user.php'; </script>");
}
else {
    echo("<script> confirm('Ошибка. Попробуйне снова.'); </script>");
}

?>