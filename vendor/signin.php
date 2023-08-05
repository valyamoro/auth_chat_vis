<?php
    
    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    mysqli_query($connect, "SELECT * FROM `users` WHERE counts='$counts'"); 
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "avatar" => $user['avatar'],
            "email" => $user['email'],
            "status" => $user['status'],
        ];
        $_SESSION['user']['id'] = $currentId; 
        $_SESSION['user'] = $user; 
        header('Location: ../view/visiters.php');
        $counts = $user['counts'] + 1; 
        mysqli_query($connect, "UPDATE users SET counts = '$counts' WHERE id = '$user[id]'");    

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../view/login.php');
    }


?>