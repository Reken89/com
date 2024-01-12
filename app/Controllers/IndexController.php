<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class IndexController extends BaseController
{
    private $page = "/views/main.php";
    private $data;
    
    /**
     * Простая заглушка
     *
     * @param 
     * @return render()
     */
    public function index()
    {
        $this->view->render($this->page, $this->data);
    }

}

