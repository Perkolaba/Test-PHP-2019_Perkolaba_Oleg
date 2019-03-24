<?php
//Проверяем соответствие файлу поставленным требованиям, формируем данные, которые будут внесены в базу данных

require_once 'QueryBuilder.php';

class ImportFile {

    private $queryBuilder;
    public $file;
    public $fileSize;
    private $dataFromFile = [];
    private $tableCols;
    private $tableName = 'csvTable';
    private $strTableCols;

    public function __construct()
    {

        $this->queryBuilder = new QueryBuilder();
        $this->file = $_FILES['file']['name'];
        $this->fileSize = $_FILES['file']['size'];
    }

    public function importFile($file, $fileSize) {

        if ($this->checkFileFormat($file) && $this->checkFileSize($fileSize)) {

            $this->getDataFromFile($_FILES['file']['tmp_name']);
            $this->getTableCols();
            $this->deleteTableColsNamesFromData();
//            var_dump($this->dataFromFile, $this->tableCols); die;
            //if ()
            $this->getStringTableCols();

            foreach ($this->dataFromFile as $record) {

//                var_dump($this->tableCols, $this->dataFromFile);die;
                $this->queryBuilder->addRecord($this->tableName, $this->strTableCols, $this->getStringData($record));
            }
        }
        echo $this->queryBuilder->statusMsg;
    }

    private function checkFileFormat($file) {
        $info = new SplFileInfo($file);
        if($info->getExtension() == 'csv') {
            return true;
        }
        else {
            return false;
        }
    }

    private function checkFileSize($fileSize) {
        if ($fileSize <= 1024) {
            return true;
        }
        else {
            return false;
        }
    }

    private function getDataFromFile($file) {
        if (($handle = fopen($file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $this->dataFromFile [] = $data;
            }
            fclose($handle);
            }
        }

    private function getTableCols() {
        $this->tableCols = $this->dataFromFile[0];
        }

    private function deleteTableColsNamesFromData() {
        array_shift($this->dataFromFile);
        }

    private function getStringTableCols() {
        return $this->strTableCols = implode(', ', $this->tableCols);
        }

    private function getStringData($arr) {
        $str = '';
        foreach ($arr as $value) {
            $str.="'$value'". ',';
        }
        return rtrim($str, ',');
        }
    }

    $import = new ImportFile();
    $import->importFile($import->file, $import->fileSize);