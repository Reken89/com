<?php

use App\Controllers\IndexController;
use App\Controllers\RegisterController;

$route = explode("/", $_SERVER['REQUEST_URI']);     
$route = str_replace(".php", "", $route);

//Запускаем разбор адресной строки
//
//Главная страница
if($route[2] == "index" || $route[2] == ""){
    $route = new IndexController;
    $route->index(); 
    
//Страница регистрации     
}elseif ($route[2] == "register") {
    $route = new RegisterController;
    $route->register(); 

//Добавляем пользователя   
}elseif ($route[2] == "add") {
    $route = new RegisterController;
    $route->add();
}
    

