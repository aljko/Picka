<?php

namespace App\Controller;

use App\Model\LocationManager;
use App\Model\AutorisationManager;
use App\Model\MonstersManager;
use App\Model\InventaireManager;
use App\Model\PersonnagesManager;



class LocationController extends AbstractController
{
    private $auto6;

    public function index(int $page)
    {

        $inventaireManager = new InventaireManager();
        $inventaires = $inventaireManager->selectByPossederAll();

        $personnageManager = new PersonnagesManager();
        $personnages = $personnageManager->selectBySelectionner();


        if($page == 3){
            header('location:/Inventaire/showOne/3/7');
        }




        if($page == 5){
            return $this->twig->render('Locations/location'.$page.'.html.twig');
        }

        if($page == 6){

            return $this->twig->render('Locations/location'.$page.'.html.twig');


        }

        if($page == 18){
            header('location:/Monstres/showOne/18/1');
        }

        return $this->twig->render('Locations/location'.$page.'.html.twig', ['inventaires' => $inventaires, 'personnages' => $personnages]);

    }





}