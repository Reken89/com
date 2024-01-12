<?php

namespace App\Models;

use PDO;

class BaseModel
{
    protected $db = null;
    const USER = "tublat";
    const PASS = "12345";
    const HOST = "localhost";
    const DB = "com";
    
    public function __construct() {
        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;
        
        $this->db = new PDO("mysql:dbname=$db;host=$host;charset=UTF8", $user, $pass);
    }
}
