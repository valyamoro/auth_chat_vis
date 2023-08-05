<?php 

declare(strict_types=1);

require_once 'connect.php'; 

$queryUsers = "SELECT * FROM `users`"; 

$result = mysqli_query($connect, $queryUsers);
    
?> 
