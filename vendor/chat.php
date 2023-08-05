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
$messagesArray = json_decode($fileText, true);

$message = $_POST["user_message"] ?? null;
$login = $_SESSION["user"]["login"] ?? null;

if ($message && $login) {
    $userMessage = htmlspecialchars(strip_tags(\trim($_POST['user_message'])));

    if(!empty($newMessage)) {
        $newMessage = [
            'user' => [
                'login' => $login,
            ],
            'message' => $userMessage,
        ];
    }
    $messages[] = $newMessage;
    file_put_contents(MESSAGES_FILE, json_encode($messages));
}

// if (!empty($_POST['user_message'])) {
// 	$message = htmlspecialchars(strip_tags(\trim($_POST['user_message'])));
// 	if (!empty($message)) {
// 		$userName = $_SESSION['login'];
// 		$message = $userName . '|||' . $message . PHP_EOL;
// 		file_put_contents(MESSAGES_FILE, $message, FILE_APPEND);
// 		$_SESSION['success'] = 'Ваше сообщение добавлено!';
// 	} else {
// 		$_SESSION['error'] = 'Error';
// 	}

// 	header('Location: /chat');
// 	die;
// }

// if (file_exists(MESSAGES_FILE)) {
// 	$messages = file_get_contents(MESSAGES_FILE);
// }

?>
