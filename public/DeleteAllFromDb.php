<?php
//Удаляем все записи из базы данных
include_once 'QueryBuilder.php';

Class DeleteAllFromDb {
    public $table = 'csvTable';
    public $queryBuilder;
    public function __construct()
    {
        $this->queryBuilder = new QueryBuilder();
    }
}

    $delete = new DeleteAllFromDb();
    $delete->queryBuilder->deleteAll($delete->table);
    echo 'Все записи были удалены из базы данных';



