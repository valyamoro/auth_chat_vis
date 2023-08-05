<?php

require 'connect.php';

session_start(); 

if(empty($_SESSION['user'])){
    echo 'qw'; 
    die; 
}

$currentLogin = ($_SESSION['user']['login']); 

$queryDel = "DELETE FROM users WHERE login = '$currentLogin'";
$res = mysqli_query($connect, $queryDel);

$secret = $_SESSION['user']['secretWord'];
$secretConfirm = $_POST['secret_slovo']; 

if($secretConfirm === $secret) { 
    if(mysqli_affected_rows($connect) > 0) {
        session_unset(); 
        echo "Информация успешно удалена из базы данных.";
        header('Location: ../view/profile.php'); 
    } else {
        echo "Ошибка при удалении информации из базы данных.";
    }
}


?>
