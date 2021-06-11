<?php

session_start();
require_once "include/connection.php";

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ГрумRoom</title>
</head>
<body>
    <!-- подключение файта хедера -->
    <?php
        include 'include/header.php';
    ?>

    <main>

        <div class="application_container">
            <p class="title"> Последние решенные заявки </p>
            <p class="count"> Количество решенных заявок: count </p>
            <div class="applications">
                <div class="app">
                    <img class="img_app" src="img/before/1623011691.jpg">
                    <p class="name_app"> Кличка </p>
                    <p class="category"> Категория заявки: Стрижка </p>
                    <p class="time"> 17.02.2021 </p>
                </div>

                <div class="app">
                    <img class="img_app" src="img/before/1623011691.jpg">
                    <p class="name_app"> Кличка </p>
                    <p class="category"> Категория заявки: Стрижка </p>
                    <p class="time"> 17.02.2021 </p>
                </div>

                <div class="app">
                    <img class="img_app" src="img/before/1623011691.jpg">
                    <p class="name_app"> Кличка </p>
                    <p class="category"> Категория заявки: Стрижка </p>
                    <p class="time"> 17.02.2021 </p>
                </div>
                
                <div class="app">
                    <img class="img_app" src="img/before/1623011691.jpg">
                    <p class="name_app"> Кличка </p>
                    <p class="category"> Категория заявки: Стрижка </p>
                    <p class="time"> 17.02.2021 </p>
                </div>
            </div>
        </div>

        <!-- подключение файлов форм регистрации и входа -->
        <?php
        
            $SESSIONname = $_SESSION['username'];

            $result_role = mysqli_query($link, "SELECT `role` FROM `user` WHERE `login` = '$SESSIONname'");
            $row_data = mysqli_fetch_assoc($result_role);
            $role = $row_data['role'];

            if (!isset($SESSIONname)) {
                include 'include/registration.html';
                include 'include/login.html';
            }
        ?>

    </main>

    <!-- подключение файла футера -->
    <?php
        include 'include/footer.html';
    ?>
    
</body>
</html>