<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if(!empty($login) and !empty($email) and !empty($password)){
        if ($password === $password_confirm) {

            $path = 'uploads/' . time() . $_FILES['avatar']['name'];
            if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
                $_SESSION['message'] = 'Ошибка при загрузке сообщения';
                header('Location: ../register.php');
            }

            $counts = 0; 
            $password = md5($password);

            mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `email`, `password`, `avatar`, `counts`) VALUES (NULL, '$login', '$email', '$password', '$path', '$counts')");

            $_SESSION['message'] = 'Регистрация прошла успешно!';
            header('Location: ../view/profile.php');


        } else {
            $_SESSION['message'] = 'Пароли не совпадают';
            header('Location: ../view/register.php');
        }
    } else {
        $_SESSION['message'] = 'Вы не ввели данные!';
        header('Location: ../view/register.php');
    }
?>
