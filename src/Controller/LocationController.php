<?php

namespace App\Controller;

use App\Model\LocationManager;
use App\Model\AutorisationManager;
use App\Model\MonstersManager;
use App\Model\InventaireManager;
use App\Model\MonstresManager;
use App\Model\PersonnagesManager;



class LocationController extends AbstractController
{


    public function index(int $page)
    {

        $inventaireManager = new InventaireManager();
        $inventaires = $inventaireManager->selectByPossederAll();



        $personnageManager = new PersonnagesManager();
        $personnages = $personnageManager->selectBySelectionner();




        if($page == 3){
            header('location:/Inventaire/showOne/3/7');
        }

        if($page == 5) {
            $autorisationManager = new AutorisationManager();
            $autorisations = $autorisationManager->selectByPage(6);

            if ($_POST) {
                if ($_POST['codedigit'] == $autorisations['code_digit']) {
                    $autorisations = $autorisationManager->updateAutoriserByPage(6);
                    return $this->twig->render('Locations/location4.html.twig');
                }

                return $this->twig->render('Locations/location' . $page . '.html.twig');
            }
        }

        if($page == 6){
            $autorisationManager = new AutorisationManager();
            $autorisations = $autorisationManager->selectByPage(6);

            if ($autorisations['autoriser'] == 0){
                return $this->twig->render('Locations/location4.html.twig');
            }else{
                return $this->twig->render('Locations/location' . $page . '.html.twig');
            }
        }


        if($page == 8){
            header('location:/Monstres/showOne/8/2');
        }

        if($page == 12) {
            $autorisationManager = new AutorisationManager();
            $autorisations = $autorisationManager->selectByPage(13);

            if ($_POST) {
                if ($_POST['codedigit'] == $autorisations['code_digit']) {
                    $autorisations = $autorisationManager->updateAutoriserByPage(13);
                }

                return $this->twig->render('Locations/location' . $page . '.html.twig');
            }
        }

        if($page == 13){
            $autorisationManager = new AutorisationManager();
            $autorisations = $autorisationManager->selectByPage(13);

            if ($autorisations['autoriser'] == 0){
                return $this->twig->render('Locations/location11.html.twig');
            }else{
                return $this->twig->render('Locations/location' . $page . '.html.twig');
            }
        }


        if($page == 15){
            $inventaireManagerAll = new InventaireManager();
            $inventairesAll = $inventaireManagerAll-> selectOne(5);

            if($inventairesAll['posseder'] == 0){
                return $this->twig->render('Locations/location14.html.twig');
            }else{
                header('location:/Inventaire/showOne/'.$page.'/1');
                //return $this->twig->render('Locations/location' . $page . '.html.twig');

            }
        }

        if($page == 18){
            header('location:/Monstres/showOne/'.$page.'/1');
        }
        if($page == 19) {
            $monstresManager = new MonstresManager();
            $monstres = $monstresManager->selectOne(4);

            if ($monstres['life'] == 0){
                header('location:/Inventaire/showOne/'.$page.'/3');

            }else{
                header('location:/Monstres/showOne/'.$page.'/3');
            }

        }

        if($page == 16){
            header('location:/Inventaire/showOne/'.$page.'/6');
        }

        if($page == 21){
            header('location:/Inventaire/showOne/'.$page.'/9');
        }


        if($page == 24){
            $inventaireManagerAll = new InventaireManager();
            $inventairesAll = $inventaireManagerAll-> selectOne(6);

            if($inventairesAll['posseder'] == 0){
                return $this->twig->render('Locations/location23.html.twig');
            }else{
                return $this->twig->render('Locations/location' . $page . '.html.twig');
            }
        }
        if($page == 25){
            header('location:/Monstres/showOne/25/4');
        }

        return $this->twig->render('Locations/location'.$page.'.html.twig', ['inventaires' => $inventaires, 'personnages' => $personnages]);

    }





}