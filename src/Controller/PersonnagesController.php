<?php

namespace App\Controller;

use App\Model\PersonnagesManager;


class PersonnagesController extends AbstractController
{

    public function showAll()
    {

        $personnagesManager = new PersonnagesManager();
        $personnages = $personnagesManager -> selectAll();

        return $this->twig->render('Personnages/index.html.twig', ['personnages' => $personnages]);

    }

    public function showOne(int $id)
    {

        $personnagesManager = new PersonnagesManager();
        $personnages = $personnagesManager -> selectOne($id);

        return $this->twig->render('Personnages/index.html.twig', ['personnages' => $personnages]);

    }

    public function selectOne($id)
    {
        $personnagesManager = new PersonnagesManager();
        $personnages = $personnagesManager -> updateSelectionnerToOne($id);

        return $this->twig->render('Personnages/index.html.twig', ['personnages' => $personnages]);
    }


}