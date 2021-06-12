<?php

session_start();
require_once "../include/connection.php";
require_once "../include/check_session.php";

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
	<script src="../js/jquery-3.0.0.min.js"></script>	
    <title>ГрумRoom - Личный кабинет</title>
</head>
<body>
    <!-- подключение файта хедера -->
    <?php
        include '../include/header.php';
    ?>

    <main>

        <div class="form_container_app">
            <p class="title" id="auth"> Управление категориями </p>

            <form action="../php/add_category.php" method="POST">
                <input type="text" placeholder="Введите наименование категории" name="name" required>
                <input type="submit" class="submit" value="Добавить">
            </form>
            
            <form action="../php/delete_category.php" method="POST">
                <input list="category" name="delete_category_name" placeholder="Выберите категорию" autocomplete="off" required>
                <datalist id="category" >

                    <!-- Вывод категорий из базы в форму -->
                    <?php
                        $result_category = mysqli_query($link, "SELECT * FROM `category`") or die('Ошибка '. mysqli_error($link));
                        while ($category_list = mysqli_fetch_assoc($result_category))
                        {
                            echo ("<option>".$category_list['name_category']."</option>");
                        }
                    ?>
                    
                </datalist>
                <input type="submit" class="submit" value="Удалить">
            </form>
        </div>

        <div class="application_container">
            <p class="title"> Управление заявками </p>

            <div class="sort">
                <button class="menu_item" onclick="sortAll()">Все заявки</button>
                <button class="menu_item" onclick="sortNew()">Новая</button>
                <button class="menu_item" onclick="sortProcess()">Обработка данных</button>
                <button class="menu_item" onclick="sortDone()">Услуга оказана</button>
            </div>

            <!-- Блок со всеми заявками -->
            <div class="applications apps_user" id="sort_all">
            <?php
            
                $result_application = mysqli_query($link, "SELECT `id_app`, `name_pet`, `description`, `id_category`, `img_before`, `img_after`, `status`, `comment`, `time`, `id_user` FROM `application` ORDER BY `application`.`time` DESC");
                $row_application = mysqli_num_rows($result_application);

                if ($row_application > 0) {

                    while($row_application = mysqli_fetch_row($result_application)){

                        $result_category_app = mysqli_query($link, "SELECT `name_category` FROM `category` WHERE `id_category` = '$row_application[3]'") or die('Ошибка '. mysqli_error($link));
                        $name_category = mysqli_fetch_row($result_category_app);

                        echo(
                            "<div class='app app_user'>
                                <img class='img_app img_app_user' src='$row_application[4]'>
                                <div class='app_text'>
                                    <p class='status'> $row_application[6] </p>
                                    <p class='name_app name_app_user'> $row_application[1] </p>
                                    <p class='category category_user'> Категория заявки: $name_category[0] </p>
                                    <p class='time time_user'> $row_application[8] </p>
                                    <p class='desc'> $row_application[2] </p>
                                </div>
                                <a href='../php/delete_application.php?id=".$row_application[0]."' onclick='return delete_application()' class='del_app'> Удалить </a>
                            </div>"
                        );
                    }
                }
                else {
                    echo "Вы не сделали ни одной заявки";
                }

            ?>
                    <div class="change_status_container">
                        <select id="status">
                            <option disabled selected>Выберите статус</option>
                            <option value="Обработка данных">Обработка данных</option>
                            <option value="Услуга оказана">Услуга оказана</option>
                        </select>

                        <form action="../php/change_status_process.php" class="status_process_container">
                            <input type="file" name="photo" accept=".png, .jpg, .jpeg, .bmp" required>
                            <input type="submit" class="submit" value="Подтвердить">
                        </form>

                        <form action="../php/change_status_done.php" class="status_done_container">
                            <textarea placeholder="Комментарий" name="description" required></textarea>                            
                            <input type="submit" class="submit" value="Подтвердить">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <!-- подключение файла футера -->
    <?php
        include '../include/footer.html';
    ?>

    <!-- подключение js скрипта с обработкой размера загружаемной картинки -->
    <script src="js/upload_field.js"></script>
    <script src="js/delete_application.js"></script>
    <script src="js/sort_application.js"></script>
</body>
</html>