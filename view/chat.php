<?php

session_start(); 

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
    if($_SESSION['user']){
        foreach($messagesArray as $message) {
            echo "<p>" . $login . "</p>";
            echo "<p>" . $message['message'] . "</p>"; 
            echo '-------------------------------------------';
        }
    echo '<form method="post">
        <input type="text" name="user_message">
        <input type="submit">
      </form>'; 
      echo '<form action="logout.php" method="POST">
      <input type="submit" value="Выйти">
      </form>'; 
    } elseif(!$_SESSION['user']){
        echo '<form action="" method="POST">
        <input name="login" placeholder="login">
        <input name="password" type="password" placeholder="password">
        <input type="submit">
        </form>'; 
        echo '<form action="logout.php" method="POST">
        <input type="submit" value="Выйти">
        </form>'; 
    }
    ?>
</body>
</html>