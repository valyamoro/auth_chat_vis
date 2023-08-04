<?php

require '../vendor/admin.php'; 

if(mysqli_num_rows($res) > 0){
    $stat = mysqli_fetch_assoc($res); 
    echo "STATUS:" . $stat["status"]; 
}