<?php

//Стартуем сессию
session_start();

//Подключаем автолоадер от Composer
require_once __DIR__ . '/vendor/autoload.php';

//Подключаем ключ от reCaptcha google
require_once 'src/key.php';

//Перенаправляем в роутинг
require_once 'src/routes.php';

