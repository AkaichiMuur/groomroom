<?php

session_start();
require_once "../include/connection.php";

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
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
                <input list="category" name="category" placeholder="Выберите категорию" autocomplete="off" required>
                <datalist id="category">
                    <option value="Стрижка"></option>
                    <option value="Мытье"></option>
                    <option value="Педикюр"></option>
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

            <div class="applications apps_user">
                <div class="app app_user">
                    <img class="img_app img_app_user" src="../img/before/1623011691.jpg">
                    <div class="app_text">
                        <p class="status"> Статус </p>
                        <p class="name_app name_app_user"> Кличка </p>
                        <p class="category category_user"> Категория заявки: Стрижка </p>
                        <p class="time time_user"> 17.02.2021 </p>
                        <p class="desc"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium tempore veniam a incidunt similique corporis aliquam sint nesciunt provident placeat! Saepe quod ad porro rerum dolores velit reiciendis quam laudantium!</p>
                    </div>

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

</body>
</html>