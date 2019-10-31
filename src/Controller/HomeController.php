<?php

namespace App\Controller;

use App\Model\InventaireManager;
use App\Model\MonstresManager;
use App\Model\PersonnagesManager;
use App\Model\AutorisationManager;

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
        $monstres = $monstresManager->updateToOneVieAll();

        $personnagesManager = new PersonnagesManager();
        $personnages = $personnagesManager->updateSelectionnerToZero();

        $autorisationsManager = new AutorisationManager();
        $autorisation = $autorisationsManager->updateTo0All();

        return header('location:/Home/Players');

    }

    public function players()
    {
        $personnagesManager = new PersonnagesManager();
        $personnages = $personnagesManager->selectAll();

        if($_POST){
            $personnages = $personnagesManager->updateSelectionnerToOne($_POST['id']);
        }

        return $this->twig->render('Home/index.html.twig',['personnages' => $personnages]);
    }
}
