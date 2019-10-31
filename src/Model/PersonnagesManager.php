<?php

namespace App\Model;



class PersonnagesManager extends AbstractManager
{

    const TABLE = 'personnages';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function updateSelectionnerToOne(int $id):bool
    {
        $statement = ("UPDATE ".$this->table." SET selectionner='1' WHERE id=".$id);
        return $this->pdo->exec($statement);
    }

    public function updateSelectionnerToZero():bool
    {
        $statement = ("UPDATE ".$this->table." SET selectionner='0' WHERE id>=0");
        return $this->pdo->exec($statement);
    }

    public function selectBySelectionner()
    {
        $statement = ("SELECT * FROM  ".$this->table." WHERE selectionner=1");
        return $this->pdo->query($statement)->fetchAll();

    }

}