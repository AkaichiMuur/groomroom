<?php

if (isset($_SESSION['username'])) 
{
    if ($_SESSION['role'] == 1)
    {
        echo("<script>
                location.href = '../admin/groom.php';
            </script>");
    }
    elseif ($_SESSION['role'] == 2) 
    {
        echo("<script>
                location.href = '../user.php';
            </script>");
    }
}
else {
    echo("<script>
            location.href = '../index.php';
        </script>");
}

?>