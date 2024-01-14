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
            
            if($_POST['name'] == true && $_POST['password'] == true && $_POST['telephone'] == true && $_POST['email'] == true){
                $name = $_POST['name'];
                $password = md5($_POST['password']);
                $telephone = $_POST['telephone'];
                $email = $_POST['email'];

                $object = new RegisterModel;
                //Последним значением передаю id равный -1
                //Данное решение было приянято, что бы методом можно было пользоваться
                //Когда пользователь будет обновлять свои значения в личном кабинете
                // id равный -1 не может принадлежать какому либо пользователю                
                $examin = $object->examin($name, $telephone, $email, -1);

                if($examin["name_status"] == true && $examin["telephone_status"] == true && $examin["email_sttus"] == true){
                    $result = $object->add($name, $password, $telephone, $email);
                    if($result == true){
                        header("Location: /com/");
                    } else {
                        echo "Что то пошло не так...";
                    }
                } else {
                    $this->data["info"] = [
                        "name_text" => $examin["name_text"],
                        "telephone_text" => $examin["telephone_text"],
                        "email_text" => $examin["email_text"]
                    ];
                    $this->view->render($this->page, $this->data);
                }
            } else {
                $this->data["error"] = "Вы заполнили не все поля формы";
                $this->view->render($this->page, $this->data);
            }
            
        } else {
            $this->data["error"] = "Поле ПАРОЛЬ и поле ПОВТОРНЫЙ ПАРОЛЬ не совпадают";
            $this->view->render($this->page, $this->data);
        }   
       
    }

}

