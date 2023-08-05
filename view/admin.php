<?php

require '../vendor/admin.php'; 

if(mysqli_num_rows($result) > 0) {
    $status = mysqli_fetch_assoc($result); 
    echo "STATUS:" . $status["status"]; 
}