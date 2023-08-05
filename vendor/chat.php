<?php
require_once 'connect.php';
session_start();
const MESSAGES_FILE = "../data/messages.txt";

if (!isset($_SESSION['user'])) {
    $login = $_POST['login'];
    $_SESSION['user']['login'] = $login;
}

if (!file_exists(MESSAGES_FILE)) {
    file_put_contents(MESSAGES_FILE, "[]");
}

$fileText = file_get_contents(MESSAGES_FILE);
$messagesArray = json_decode($fileText, true);

$message = $_POST["user_message"] ?? null;
$login = $_SESSION["user"]["login"] ?? null;

if ($message && $login) {
    $userMessage = htmlspecialchars($_POST['user_message']);

    $newMessage = [
        'user' => [
            'login' => $login,
        ],
        'message' => $userMessage,
    ];

    $messagesArray[] = $newMessage;
    file_put_contents(MESSAGES_FILE, json_encode($messagesArray));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Чат</title>
</head>
<body>
    <?php 
    if (isset($_SESSION['user']['login'])) {
        foreach ($messagesArray as $message) {
            echo "<p>" . $message['user']['login'] . "</p>";
            echo "<p>" . $message['message'] . "</p>";
            echo '-------------------------------------------';
        }
        echo '
        <form method="post">
            <input type="text" name="user_message">
            <input type="submit">
        </form>
        <form action="logout.php" method="POST">
            <input type="submit" value="Выйти">
        </form>';
    } else {
        echo '
        <form action="" method="POST">
            <input name="login" placeholder="login">
            <input name="password" type="password" placeholder="password">
            <input type="submit">
        </form>
        <form action="logout.php" method="POST">
            <input type="submit" value="Выйти">
        </form>';
    }
    ?>
</body>
</html>