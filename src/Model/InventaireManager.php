<?php

namespace App\Model;



class InventaireManager extends AbstractManager
{

    const TABLE = 'Inventaire';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function updateTo0All()
    {
        $statement = ("UPDATE ".$this->table." SET vue='0', posseder='0' WHERE id>=0");
        return $this->pdo->exec($statement);

    }

    public function updateVueTo1(int $id):bool
    {
        $statement = ("UPDATE ".$this->table." SET vue='1' WHERE id=".$id);
        return $this->pdo->exec($statement);
    }

    public function updatePossederTo1(int $id):bool
    {
        $statement = ("UPDATE ".$this->table." SET posseder='1' WHERE id=".$id);
        return $this->pdo->exec($statement);
    }



}