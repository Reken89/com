<?php

namespace App\Models;

use App\Models\BaseModel;
use PDO;

class RegisterModel extends BaseModel
{
    /**
     * Записываем данные в таблицу users
     * Предварительно биндим данные
     *
     * @param string $name, string $password, int $telephone, string $email
     * @return 
     */
    public function add(string $name, string $password, int $telephone, string $email)
    {   
        $sql = "INSERT INTO users (name, telephone, email, password) VALUES (:name, :telephone, :email, :password)";        
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":telephone", $telephone, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            echo "успех";
        } else {
            echo "провал";
        }

    }  
    
    /**
     * Выполняет проверку на уникальность
     * Предварительно биндим данные
     * Возвращает массив с нужной информацией
     *
     * @param string $name, int $telephone, string $email
     * @return array
     */
    public function examin(string $name, int $telephone, string $email)
    {   
        $sql = "SELECT * FROM users WHERE name = :name";               
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            $name_text = "Такой логин уже занят";
            $name_status = false;
        } else {
            $name_text = "Вы можете использовать этот логин";
            $name_status = true;
        }
        
        $sql = "SELECT * FROM users WHERE telephone = :telephone";               
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":telephone", $telephone, PDO::PARAM_STR);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            $telephone_text = "Такой номер телефона уже использовался";
            $telephone_status = false;
        } else {
            $telephone_text = "Вы можете использовать этот номер телефона";
            $telephone_status = true;
        }
        
        $sql = "SELECT * FROM users WHERE email = :email";               
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            $email_text = "Такой email уже использовался";
            $email_status = false;
        } else {
            $email_text = "Вы можете использовать этот email";
            $email_status = true;
        }
        
        return $info = [
            "name_text"        => $name_text,
            "telephone_text"   => $telephone_text,
            "email_text"       => $email_text,
            "name_status"      => $name_status,
            "telephone_status" => $telephone_status,
            "email_sttus"      => $email_status
        ];

    }  
    
}

