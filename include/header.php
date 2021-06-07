<header>
    <!-- лого сайта -->
    <a href="index.php" class="logo_conteiner">
        <img src="logo/logo_groom.png" class="logo_img">
        <p class="logo_name"> ГрумRoom</p>
    </a>

    <!-- кнопки регистрации и входа -->
    <div class="menu_container">

        <?php

            $SESSIONname = $_SESSION['username'];

            $result_role = mysqli_query($link, "SELECT `role` FROM `user` WHERE `login` = '$SESSIONname'");
            $row_data = mysqli_fetch_assoc($result_role);
            $role = $row_data['role'];

            if ($role == 1) {
                echo "<a class='menu_item' href='groom.php'> Панель администратора </a> |
                        <a class='menu_item' href='index.php'> Главная </a> |
                        <form method='POST' action='../service/logout.php' class='header_form'>
                            <input type='submit' class='logout' value='Выход'>
                        </form>";
            }
            else if ($role == 2) {
                echo "<a class='menu_item' href='groom.php'> Личный кабинет </a> |
                        <a class='menu_item' href='index.php'> Главная </a> |
                        <form method='POST' action='../service/logout.php' class='header_form'>
                            <input type='submit' class='logout' value='Выход'>
                        </form>";
            }
            else {
                echo "<a class='menu_item' href='#reg'> Регистрация </a> |
                <a class='menu_item' href='#auth'> Войти </a>";
            }

        ?>

        
    </div>
</header>