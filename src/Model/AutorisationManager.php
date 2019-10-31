<?php

namespace App\Model;



class AutorisationManager extends AbstractManager
{
    const TABLE = 'autorisation';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectByPage($page)
    {
        $statement = "SELECT * FROM  ".self::TABLE." WHERE page=".$page;
        return $this->pdo->query($statement)->fetch();

    }
}