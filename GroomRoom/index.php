<?php

session_start();
require_once "include/connection.php";

// Получаем количество решеных заявок
$result_applications = mysqli_query($link, "SELECT COUNT(*) as `count` FROM `application` WHERE `status` = 'Услуга оказана'");
$rows = mysqli_fetch_assoc($result_applications);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
	<script src="js/jquery-3.0.0.min.js"></script>	
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
            <p class="count"> Количество решенных заявок: <?php echo($rows['count']); ?> </p>
            <div class="applications">
                <?php
                    $result_application = mysqli_query($link, "SELECT `id_app`, `name_pet`, `description`, `id_category`, `img_before`, `img_after`, `status`, `comment`, `time`, `id_user` FROM `application` WHERE `status` = 'Услуга оказана' ORDER BY `application`.`time` DESC LIMIT 4");
                    $row_application = mysqli_num_rows($result_application);

                    if ($row_application > 0) {

                        while($row_application = mysqli_fetch_row($result_application)){

                            $result_category_app = mysqli_query($link, "SELECT `name_category` FROM `category` WHERE `id_category` = '$row_application[3]'") or die('Ошибка '. mysqli_error($link));
                            $name_category = mysqli_fetch_row($result_category_app);

                            echo(
                                "<div class='app'>
                                    <img class='img_app' src='$row_application[4]'>
                                    <p class='name_app'> $row_application[1] </p>
                                    <p class='category'> Категория заявки: $name_category[0] </p>
                                    <p class='time'> $row_application[8] </p>
                                </div>"
                            );
                        }
                    }
                    else {
                        echo "Ошибка";
                    }
                ?>
            </div>
        </div>

        <!-- подключение файлов форм регистрации и входа -->
        <?php
        
            $SESSIONname = $_SESSION['username'];

            $result_role = mysqli_query($link, "SELECT `role` FROM `user` WHERE `login` = '$SESSIONname'");
            $row_data = mysqli_fetch_assoc($result_role);
            $role = $row_data['role'];

            if (!isset($SESSIONname)) {
                include 'include/login.html';
                include 'include/registration.html';
            }
        ?>

    </main>

    <!-- подключение файла футера -->
    <?php
        include 'include/footer.html';
    ?>
    
</body>
</html>