<?php

declare(strict_types=1);

session_start();
require_once 'connect.php';

$login = $_POST['login'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$password_confirm = $_POST['password_confirm'] ?? null;

if (!empty($login) && !empty($email) && !empty($password)) {
    if ($password === $password_confirm) {

        $path = 'uploads/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $_SESSION['message'] = 'Ошибка при загрузке файла';
            header('Location: ../register.php');
            exit;
        }

        $counts = 0;
        $password = md5($password);

        mysqli_query($connect, "INSERT INTO users (id, login, email, password, avatar, counts) VALUES (NULL, $login, $email, $password, $path, $counts)");

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../view/profile.php');
        exit;

    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../view/register.php');
        exit;
    }
} else {
    $_SESSION['message'] = 'Вы не ввели данные!';
    header('Location: ../view/register.php');
    exit;
}