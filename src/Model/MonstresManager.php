<?php

namespace App\Model;



class MonstresManager extends AbstractManager
{


    const TABLE = 'monstre';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function updateToOneVieAll()
    {
        $statement = ("UPDATE ".$this->table." SET life='1' WHERE id>=0");
        return $this->pdo->exec($statement);

    }

    public function updateVieToZero(int $id):bool
    {
        $statement = ("UPDATE ".$this->table." SET life='0' WHERE id=".$id);
        return $this->pdo->exec($statement);
    }
}