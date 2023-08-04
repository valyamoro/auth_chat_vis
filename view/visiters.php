<?php
session_start();
require '../vendor/users.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список пользователей</title>
</head>
<body> 
    <?php 
        if (mysqli_num_rows($result) > 0) {
            // Выводим данные всех пользователей
            while ($row = mysqli_fetch_assoc($result)) {
                echo "ID: " . $row["id"] . "<br>";
                echo "Имя: " . $row["login"] . "<br>";
                echo "Email: " . $row["email"] . "<br>";
                echo '-------------------------------------' . "<br>";
            }
        } else {
            echo "Нет данных пользователей.";
        }
    ?>
</body>
</html>