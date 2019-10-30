<?php

namespace App\Model;



class PersonnagesManager extends AbstractManager
{

    const TABLE = 'personnages';

    public function __construct()
    {
        parent::__construct(self::TABLE);
    }



}