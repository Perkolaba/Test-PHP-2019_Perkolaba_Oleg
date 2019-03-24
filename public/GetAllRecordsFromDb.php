<?php
//Получаем все записи из базы данных
include_once 'QueryBuilder.php';

class GetAllRecordsFromDb {
    public $table = 'csvTable';
    public $queryBuilder;
    public function __construct()
    {
        $this->queryBuilder = new QueryBuilder();
    }
}

    $records = new GetAllRecordsFromDb();
    $records = $records->queryBuilder->getAll($records->table);
