<?php
// Устанавливаем соединение с базой данных

class DBconnection {

    private $host = 'localhost';
    private $database = 'testImport';
    private $dbuser = 'root';
    private $dbpass = '';
    public $db;

    public function __construct()
    {
        $this->db = new PDO("mysql:host=$this->host; dbname=$this->database;", "$this->dbuser", "$this->dbpass");
    }
}

