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

}