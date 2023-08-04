<?php 

require_once 'connect.php'; 
session_start();

// Получаем id авторизованного пользователя из сессии
$userId = $_SESSION['user']['id'];

// Проверяем, что id пользователя существует
if (!empty($userId)) {
    // Выполняем запрос, используя id пользователя в качестве условия
    $check_user = mysqli_query($connect, "SELECT id FROM users WHERE id = $userId");
    // Проверяем, что запрос выполнен успешно
    if ($check_user) {
        $currentId = mysqli_fetch_assoc($check_user);
    } else {
        echo "Ошибка выполнения запроса: " . mysqli_error($connect);
    }
} else {
    echo "Пользователь не авторизован";
}

$query_status = "SELECT status FROM users WHERE id='$userId'"; 
$res = mysqli_query($connect, $query_status); 

