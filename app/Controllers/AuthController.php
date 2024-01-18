<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RegisterModel;
use App\Models\AuthModel;

class AuthController extends BaseController
{
    private $page = "/views/auth.php";
    private $data;
    
    /**
     * Передаем шаблон авторизации в представление
     *
     * @param 
     * @return render()
     */
    public function auth()
    {
        $this->view->render($this->page, $this->data);
    }
    
    /**
     * Выполняем проверку на наличие пользователя в БД
     *
     * @param 
     * @return 
     */
    public function authentication()
    {
        //Проверяем ввел ли пользователь логин и пароль
        //Проверяем была ли заполнена капча
        if($_POST['login'] == true && $_POST['password'] == true && $_POST['g-recaptcha-response'] == true){
            
            $login = $_POST['login'];
            $password = md5($_POST['password']);

            //Проверяем что ввел пользователь email или телефон
            if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
                $variant = "email";
            } else {
                $variant = "telephone";
            }

            $object = new AuthModel;
            $info = $object->auth($login, $password, $variant);
            if($info == true){
                $_SESSION['info'] = $info;
                header("Location: /com/cabinet");
            }else{
                header("Location: /com/");
            }
        } else {
            header("Location: /com/auth");
        }
        
    }
    
    /**
     * Передаем шаблон личного кабинета в представление
     * Так же выполняем проверку, авторизован пользователь или нет
     *
     * @param 
     * @return render()
     */
    public function cabinet()
    {
        if(isset($_SESSION['info'])){
            $this->page = "/views/cabinet.php";
            $this->view->render($this->page, $this->data);
        }else {
            header("Location: /com/");
        }
    }
    
    /**
     * Обновление информации в БД
     *
     * @param 
     * @return
     */
    public function update()
    {
        if($_POST['name'] == true && $_POST['telephone'] == true && $_POST['email'] == true){
            
            $name = $_POST['name'];            
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];
            $id = $_POST['id'];
            
            //Проверка вводил ли пользователь новый пароль
            if(isset($_POST['password'])){
                $password = md5($_POST['password']);
                $variant = "password";
            } else {
                $password = "no";
                $variant = "no";
            }
            
            //Выполняем проверку, что бы новые значения введенные пользователем
            //Не совпадали со значениями других пользователей в БД
            //Последним значением передаем id текущего пользователя
            //Что бы исключить его из проверки
            $object = new RegisterModel;
            $examin = $object->examin($name, $telephone, $email, $id);

            if($examin["name_status"] == true && $examin["telephone_status"] == true && $examin["email_sttus"] == true){
                $object2 = new AuthModel;
                $object2->update($name, $telephone, $email, $id, $variant, $password);
                
                //Получаем обновленные значения пользователя
                //Что бы отобразить их в представлении
                $info = $object2->select($id);
                $_SESSION['info'] = $info;
                header("Location: /com/cabinet");
            } else {
                header("Location: /com/cabinet");
            }
        } else {
            header("Location: /com/cabinet");
        }
    }

}



