<?php

namespace App\Model;



class AutorisationManager extends AbstractManager
{
    const TABLE = 'Autorisation';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectByPage($page)
    {
        $statement = "SELECT * FROM  ".self::TABLE." WHERE page=".$page;
        return $this->pdo->query($statement)->fetch();

    }

    public function updateAutoriserByPage(int $page):bool
    {
        $statement = ("UPDATE ".$this->table." SET autoriser='1' WHERE page=".$page);
        return $this->pdo->exec($statement);
    }

    public function updateTo0All()
    {
        $statement = ("UPDATE ".$this->table." SET autoriser='0' WHERE id>=0");
        return $this->pdo->exec($statement);

    }

}