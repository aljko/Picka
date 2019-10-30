<?php

namespace App\Manager;

abstract class AbstractManager
{

    protected $pdo; //variable de connexion
    protected $table;

    public function __construct(string $table)
    {
        $this->table = $table;
        $this->pdo = new PDO(
            'mysql:host=' . HOST . '; dbname=' . BDD . '; charset=utf8',
            USER,
            PASS
        );
    }




}
