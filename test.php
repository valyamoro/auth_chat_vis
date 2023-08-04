<?php
declare(strict_types=1);
session_start();

if(empty($_SESSION['login']) && empty($_SESSION['password'])){
	header('Location: /login');
	die;
}

const MESSAGES_FILE = __DIR__ . '/data/messages.txt';

require_once 'config.php';


if (!empty($_POST['user_message'])) {
	$message = htmlspecialchars(strip_tags(\trim($_POST['user_message'])));
	if (!empty($message)) {
		$userName = $_SESSION['login'];
		$message = $userName . '|||' . $message . PHP_EOL;
		file_put_contents(MESSAGES_FILE, $message, FILE_APPEND);
		$_SESSION['success'] = 'Ваше сообщение добавлено!';
	} else {
		$_SESSION['error'] = 'Error';
	}

	header('Location: /chat');
	die;
}

if (file_exists(MESSAGES_FILE)) {
	$messages = file_get_contents(MESSAGES_FILE);
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
<?php if (!empty($_SESSION['success'])): ?>
	<?php echo $_SESSION['success']; ?>
<?php unset($_SESSION['success']); ?>
<?php endif; ?>
<?php if (!empty($_SESSION['error'])): ?>
	<?php echo $_SESSION['error']; ?>
	<?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php  foreach($messages ?? [] as $message): ?>
	<?php
		[$userName, $userMessage] = explode('|||', $message);
	?>
	<p><?php echo $userName; ?></p>
	<p><?php echo $userMessage; ?></p>
	<p>---------------------------------------</p>
<?php  endforeach; ?>
<form method="post">
<input type="text" name="user_message">
<input type="submit">
</form>



</body>
</html>