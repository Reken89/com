<?php

use App\Controllers\IndexController;
use App\Controllers\RegisterController;
use App\Controllers\AuthController;

//Запускаем разбор адресной строки
//Получаем нужное нам значение
$route = explode("/", $_SERVER['REQUEST_URI']);     
$route = str_replace(".php", "", $route);

//Главная страница
if($route[2] == "index" || $route[2] == ""){
    $route = new IndexController;
    $route->index(); 

//Страница авторизации    
}elseif ($route[2] == "auth") {
    $route = new AuthController;
    $route->auth(); 

//Аунтефикация  
}elseif ($route[2] == "authentication") {
    $route = new AuthController;
    $route->authentication();    
    
//Страница личного кабинета  
}elseif ($route[2] == "cabinet") {
    $route = new AuthController;
    $route->cabinet();  
    
//Обновление информации в БД 
}elseif ($route[2] == "update") {
    $route = new AuthController;
    $route->update();     
    
//Страница регистрации     
}elseif ($route[2] == "register") {
    $route = new RegisterController;
    $route->register(); 

//Добавляем пользователя   
}elseif ($route[2] == "add") {
    $route = new RegisterController;
    $route->add();

//Все остальные адреса    
}else{
    echo "Запрашиваемая Вами страница, не существует!";
}
 


