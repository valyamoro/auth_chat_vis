<?php

declare(strict_types=1);

session_start();
require_once 'connect.php';

$login = $_POST['login'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$passwordConfirm = $_POST['passwordConfirm'] ?? null;
$secretWord = $_POST['secretWord'] ?? null; 

if (!empty($login) && !empty($email) && !empty($password)) {
    if ($password === $passwordConfirm) {

        $counts = 0;
        $password = md5($password);
        $path = 'null'; 

        $result = mysqli_query($connect, "INSERT INTO users (id, login, email, password, avatar, counts, secret_word) 
        VALUES (NULL, '$login', '$email', '$password', '$path', '$counts', '$secretWord')");

        if (!$result) {
            $_SESSION['message'] = 'Ошибка при выполнении запроса';
            header('Location: ../view/register.php');
            die;
        }

        $path = 'uploads/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $_SESSION['message'] = 'Ошибка при загрузке файла';
            header('Location: ../register.php');
            exit;
        } // переделать, после успешной регистрации только добавлять фото пользователя. 

        if ($result) { 
            mysqli_query($connect, "UPDATE users SET avatar = '$path'");    
        }

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