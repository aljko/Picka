<?php

namespace App\Controller;

use App\Model\LocationManager;
use App\Model\AutorisationManager;



class LocationController extends AbstractController
{

    public function index(int $page)
    {

        $autorisationManager = new AutorisationManager();
        $autorisations = $autorisationManager->selectByPage($page);

        var_dump($autorisations);
        if (array_key_exists($page,$autorisations) && $autorisations[$page] == 0){
            $message = "Vous ne pouvez pas rentrez ...";
            return $message;
            //return $this->twig->render('Home/index2.html.twig');

        }else {
            if($_POST && $page==5){
                if ($_POST['digicode'] == 1234){

                }
            }
            return $this->twig->render('Locations/location'.$page.'.html.twig');
        }
    }





}