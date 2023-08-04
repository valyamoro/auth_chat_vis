<?php

declare(strict_types=1);
// определяем счетчик в ноль

$count = 0;

if(isset($_COOKIE['count'])){
    $count = $_COOKIE['count']; 
}

if(isset($_COOKIE['lastVisit'])){
    $lastVisit = $_COOKIE['lastVisit']; 
}


setcookie('count', (string)($count +1), time() + 3600); 
setcookie('lastVisit', date('d-m-Y H:i:s'), time() + 3600);

if($count == 0){
    echo 'Приветствую!'; 
} else {
    echo 'Вы были на сайте ' . $count;
    echo '<br> Последний визит: ' . $lastVisit;
}
