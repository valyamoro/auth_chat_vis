<?php
session_start();
unset($_SESSION['user']);
header('Location: ../view/login.php');