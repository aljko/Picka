<?php

namespace App\Controller;

use App\Model\LocationManager;
use App\Model\AutorisationManager;
use App\Model\MonstersManager;
use App\Model\InventaireManager;



class LocationController extends AbstractController
{
    private $auto6;

    public function index(int $page)
    {

        if($page == 3){
            header('location:/Inventaire/showOne/3/7');
        }

        if($page == 5){
            if($_POST && $_POST['digicode']){
                $this->auto6 = 1;

            }
            return $this->twig->render('Locations/location'.$page.'.html.twig');
        }

        if($page == 6){
            if($this->auto6 == 1 ){
                return $this->twig->render('Locations/location'.$page.'.html.twig');
            }else{
                return 'nope';
            }

        }

        return $this->twig->render('Locations/location'.$page.'.html.twig');

    }





}