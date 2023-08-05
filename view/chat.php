<?php require '../vendor/chat.php' ?>

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

	<p><?php echo $login; ?></p>
	<p><?php echo $message['message']; ?></p>
	<p>---------------------------------------</p>
    <?php  endforeach; ?>
    <form method="post">
        <input type="text" name="user_message">
        <input type="submit">
    </form>
    <form action="logout.php" method="POST">
      <input type="submit" value="Выйти">
    </form>

</body>
</html>