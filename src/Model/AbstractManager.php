<?php
/**
 * Created by PhpStorm.
 * User: sylvain
 * Date: 07/03/18
 * Time: 20:52
 * PHP version 7
 */
namespace App\Model;

//use App\Model\Connection;
use \PDO;

abstract class AbstractManager
{
    protected $pdo; //variable de connexion
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO('mysql:host=' . HOST . '; dbname=' . BDD . '; charset=utf8',USER,PASS);
    }

    public function selectAll(): array
    {
        return $this->pdo->query('SELECT * FROM ' . $this->table)->fetchAll();
    }

    public function selectOne(int $id)
    {
        $statement = $this->pdo->prepare("SELECT * FROM $this->table WHERE id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();

    }

}