<?php 

    require_once 'connect.php'; 

    $query_users = "SELECT * FROM `users`"; 

    $result = mysqli_query($connect, $query_users);
    
?> 