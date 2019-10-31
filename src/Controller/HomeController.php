<?php

namespace App\Controller;

use App\Model\InventaireManager;
use App\Model\MonstresManager;
use App\Model\PersonnagesManager;

class HomeController extends AbstractController
{
    public function index()
    {

        header('location:/Home/initialiseGame');
      //  return $this->twig->render('Home/index.html.twig');
    }

    public function initialiseGame()
    {
        $inventaireManager = new InventaireManager();
        $inventaires = $inventaireManager->updateTo0All();

        $monstresManager = new MonstresManager();
        $monstres = $monstresManager -> updateToOneVieAll();

        $personnagesManager = new PersonnagesManager();
        $personnages = $personnagesManager -> updateSelectionnerToZero();


        return $this->twig->render('Home/index.html.twig');

    }


}
