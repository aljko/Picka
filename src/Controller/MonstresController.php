<?php

namespace App\Controller;

use App\Model\MonstresManager;


class MonstresController extends AbstractController
{

    public function showAll()
    {

        $monstresManager = new MonstresManager();
        $monstres = $monstresManager -> selectAll();

        return $this->twig->render('Monstres/index.html.twig', ['monstres' => $monstres]);

    }

    public function showOne(int $id)
    {

        $monstresManager = new MonstresManager();
        $monstres = $monstresManager -> selectOne($id);

        return $this->twig->render('Monstres/index.html.twig', ['monstres' => $monstres]);

    }

    public function killOne(int $id)
    {
        $monstresManager = new MonstresManager();
        $monstres = $monstresManager -> updateVieToZero($id);

        return $this->twig->render('Monstres/index.html.twig', ['monstres' => $monstres]);
    }


    public function reviveAll()
    {
        $monstresManager = new MonstresManager();
        $monstres = $monstresManager -> updateToOneVieAll();

        return $this->twig->render('Monstres/index.html.twig', ['monstres' => $monstres]);
    }

}