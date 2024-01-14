<?php

namespace App\Models;

use App\Models\BaseModel;
use PDO;

class AuthModel extends BaseModel
{
    /**
     * Сопоставляем данные с информацией в БД
     * Возвращаем массив с информацией о пользователе, либо false
     *
     * @param string $login, string $password, string $variant
     * @return 
     */
    public function auth(string $login, string $password, string $variant)
    {   
        if($variant == "email"){
            $sql = "SELECT * FROM users WHERE email = :login AND password = :password";
        }else{
            $sql = "SELECT * FROM users WHERE telephone = :login AND password = :password";
        }
                    
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":login", $login, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
        
        if($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }  
    
    /**
     * Обновляем значения в таблице users
     * Обновление в двух вариантах
     * В зависимости от того, меняется пароль или нет
     *
     * @param string $name, string $telephone, string $email, int $id, string $variant, string $password
     * @return 
     */
    public function update(string $name, string $telephone, string $email, int $id, string $variant, string $password)
    {   
        if($variant == "password"){
            $sql = "UPDATE users SET name = :name, telephone = :telephone, "
                . "email = :email, password = :password WHERE id = $id";
        } else {
            $sql = "UPDATE users SET name = :name, telephone = :telephone, "
                . "email = :email WHERE id = $id";
        }
                            
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $stmt->bindValue(":telephone", $telephone, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->execute();

    } 
    
    /**
     * Получаем из таблицы users обновленную информацию
     * Что бы пользователь в личном кабинете видел результат
     * обновленной информации
     *
     * @param int $id
     * @return 
     */
    public function select(int $id)
    {   
        $sql = "SELECT * FROM users WHERE id = $id";
                            
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } 
           
}

