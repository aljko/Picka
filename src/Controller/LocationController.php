<?php

namespace App\Controller;

use App\Model\LocationManager;
use App\Model\AutorisationManager;
use App\Model\MonstersManager;



class LocationController extends AbstractController
{

    public function index(int $page)
    {
        return $this->twig->render('Locations/location'.$page.'.html.twig');
    }





}