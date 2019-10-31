<?php
namespace App\Controller;
use App\Model\MonstersManager;


class MonstersController extends AbstractController
{

    public function showAll()
    {
        $monstersManager = new MonstersManager();
        $monsters = $monstersManager -> getArray();

        return $this->twig->render('Monsters/index.html.twig', ['monsters' => $monsters]);

    }

    public function showOne(int $page, int $id)
    {
        $monstersManager = new MonstersManager();
        $monsters = $monstersManager -> getOneArrayById($id);

        return $this->twig->render('Monsters/one.html.twig', ['monsters' => $monsters]);
    }

    public function find(string $col,string $what)
    {

        $monstersManager = new MonstersManager();
        $monsters = $monstersManager -> search($col,$what);

        return $this->twig->render('Monsters/index.html.twig', ['monsters' => $monsters]);
    }

}