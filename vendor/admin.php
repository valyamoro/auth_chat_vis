<?php 

declare(strict_types=1);

require_once 'connect.php'; 
session_start();

$userId = $_SESSION['user']['id']; 

if (!empty($userId)) {

    $checkUser = mysqli_query($connect, "SELECT id FROM users WHERE id = $userId");

    if ($checkUser) {
        $currentId = mysqli_fetch_assoc($checkUser);
    } else {
        echo 'Ошибка выполнения запроса: ' . mysqli_error($connect);
    }
} else {
    echo 'Пользователь не авторизован';
}

$queryStatus = "SELECT status FROM users WHERE id = $userId"; 
$result = mysqli_query($connect, $queryStatus); 

