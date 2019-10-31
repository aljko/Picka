<?php

namespace App\Controller;

use App\Model\MonstresManager;
use App\Model\MonstersManager;


class MonstresController extends AbstractController
{

    public function showAll()
    {

        $monstresManager = new MonstresManager();
        $monstres = $monstresManager -> selectAll();

        return $this->twig->render('Monstres/index.html.twig', ['monstres' => $monstres]);

    }

    public function showOne(int $page,int $id)
    {

        $monstresManager = new MonstresManager();
        $monstres = $monstresManager -> selectOne($id);

        $monstersManager = new MonstersManager();
        $monsters = $monstersManager -> search('name',$monstres['name']);

        return $this->twig->render('Locations/location'.$page.'.html.twig', ['monstres' => $monstres, 'monsters' => $monsters]);


    }

    public function killOne(int $page, int $id)
    {

        $monstresManager = new MonstresManager();
        $monstres = $monstresManager -> updateVieToZero($id);

        return $this->twig->render('Locations/location'.$page.'.html.twig', ['monstres' => $monstres]);
    }


    public function reviveAll()
    {
        $monstresManager = new MonstresManager();
        $monstres = $monstresManager -> updateToOneVieAll();

        return $this->twig->render('Monstres/index.html.twig', ['monstres' => $monstres]);
    }

}