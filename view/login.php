<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
    <form action="../vendor/signin.php" method="POST">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <input type="submit">
    </form>
        <?php
            $messageFail = $_SESSION['message'];
            if ($messageFail) {
                echo $messageFail;
            }
            unset($messageFail);
        ?> 
</body>
</html>