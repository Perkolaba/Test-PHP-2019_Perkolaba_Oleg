<?php
//Описываем необходимые методы запросов в базу данных
require_once 'DBconnection.php';

class QueryBuilder
{
    private $db;
    public $statusMsg;
    public function __construct()
    {
        $temp = new DBconnection();
        $this->db = $temp->db;
    }

    public function getAll($table) {

        $sql = "SELECT * FROM $table";
        $sth = $this->db->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(2);

    }

    public function addRecord($table, $cols, $data) {

        $update = $this->makeStrForDuplUpdate($cols);

        $sql = "INSERT INTO $table ($cols) VALUES ($data) ON DUPLICATE KEY UPDATE $update";

        $sth = $this->db->prepare($sql);
//        var_dump($sth);
        if ($sth->execute()){
            $this->statusMsg = 'Файл успешно сохранен :)';
        }
        else {
            $this->statusMsg = 'Извините, но данный файл некорректен!!!';
        }

    }

    public function deleteAll($table) {

        $sql = "DELETE FROM $table";
        $sth = $this->db->prepare($sql);
        $sth->execute();


    }

    private function makeStrForDuplUpdate($cols) {
        $arrCols = explode(',', $cols);
        $strForUpdate = '';
        foreach ($arrCols as $value) {
            $strForUpdate.= $value. ' = ' . "VALUES($value)". ',';
        }
        return rtrim($strForUpdate,',');

    }
}