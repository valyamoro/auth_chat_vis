<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: profile.php');
    }
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
            if ($_SESSION['message']) {
                echo ($_SESSION['message']);
            }
            unset($_SESSION['message']);
            // Можно ли вот таким образом вставлять в html код флеш сообщения, или можно сделать по другому
        ?> 
</body>
</html>