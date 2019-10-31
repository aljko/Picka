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
        $statement = ("UPDATE ".$this->table." SET posseder='0' WHERE id>=0");
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

    public function selectByPossederAll()
    {
        $statement = ("SELECT * FROM  ".$this->table." WHERE posseder=1");
        return $this->pdo->query($statement)->fetchAll();

    }

    public function selectByIdByVue($id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE vue=1 AND id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();

    }



}