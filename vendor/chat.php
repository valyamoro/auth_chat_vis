<?php

declare(strict_types=1);
session_start();

if (empty($_SESSION['user'])) {
    $login = $_POST['login'];
    $_SESSION['user']['login'] = $login;
}

const MESSAGES_FILE = "../data/messages.txt";

require_once 'connect.php';

if (!file_exists(MESSAGES_FILE)) {
    file_put_contents(MESSAGES_FILE, "[]");
}

$fileText = file_get_contents(MESSAGES_FILE);
$messages = json_decode($fileText, true);

$message = $_POST['user_message'] ?? null;
$login = $_SESSION['user']['login'] ?? null;

if ($message && $login) {
    $userMessage = htmlspecialchars(strip_tags(trim($_POST['user_message'])));

    if (!empty($userMessage)) {
        $newMessage = [
            'user' => [
                'login' => $login,
            ],
            'message' => $userMessage,
        ];
        $messages[] = $newMessage;
        file_put_contents(MESSAGES_FILE, json_encode($messages));

		$_SESSION['success'] = 'Ваше сообщение добавлено!';

        header('Location: ../view/chat.php');
	    die;

    } else {
        $_SESSION['error'] = 'Error'; 
    }
}




?>