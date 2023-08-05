<?php

    declare(strict_types=1);

    $connect = mysqli_connect('localhost', 'root', 'mysql', 'counter');

    if(!$connect) {
        die('Error connect to DataBase');
    }