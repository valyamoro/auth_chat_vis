<?php

require '../vendor/connect.php'; 
session_start();

?>

<form action="../vendor/deleteProfile.php" method="post">
    <input type="text" name="secret_slovo" placeholder="Напишите секретное слово">
    <input type="submit">
</form>