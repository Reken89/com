<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RegisterModel;

class RegisterController extends BaseController
{
    private $page = "/views/register.php";
    private $data;
    
    /**
     * Передаем шаблон регистрации в представление
     *
     * @param 
     * @return render()
     */
    public function register()
    {
        $this->view->render($this->page, $this->data);
    }
    
    /**
     * Добавляем пользователя в БД
     * Выполняем проверку на одинаковые значения в полях ПАРОЛЯ
     * Проверяем были ли обнаружены совпадения в БД
     * Если совпадений нет, выполняем запись в БД
     *
     * @param 
     * @return 
     */
    public function add()
    {
        if($_POST['password'] == $_POST['repeat']){
            
            $name = $_POST['name'];
            $password = md5($_POST['password']);
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];

            $object = new RegisterModel;
            $examin = $object->examin($name, $telephone, $email);

            if($examin["name_status"] == true && $examin["telephone_status"] == true && $examin["email_sttus"] == true){
                $object->add($name, $password, $telephone, $email);
            } else {
                echo $examin["name_text"];
                echo "</br>";
                echo $examin["telephone_text"];
                echo "</br>";
                echo $examin["email_text"];
            }
            
        } else {
            echo "Поле ПАРОЛЬ и поле ПОВТОРНЫЙ ПАРОЛЬ не совпадают";
        }   
       
    }

}

