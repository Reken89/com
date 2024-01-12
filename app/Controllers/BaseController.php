<?php

namespace App\Controllers;

use App\View\BaseView;

//Базовый контроллер
class BaseController 
{
    public $view;
    
    public function __construct() 
    {
        $this->view = new BaseView();
    }
    
}
