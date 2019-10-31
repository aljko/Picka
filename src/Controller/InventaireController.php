<?php

namespace App\Controller;


use App\Model\InventaireManager;


class InventaireController extends AbstractController
{

    public function showAll()
    {

        $inventaireManager = new InventaireManager();
        $inventaires = $inventaireManager->selectAll();

        return $this->twig->render('Inventaire/index.html.twig', ['inventaires' => $inventaires]);

    }

    public function showOne(int $page,int $id)
    {

        $inventaireManager = new InventaireManager();
        $inventaires = $inventaireManager->selectOne($id);

        return $this->twig->render('Locations/location'.$page.'.html.twig', ['inventaires' => $inventaires]);

    }

    public function showByVue()
    {

        $inventaireManager = new InventaireManager();
        $inventaires = $inventaireManager->selectByPossederAll();

        return $this->twig->render('Inventaire/index.html.twig', ['inventaires' => $inventaires]);

    }

    public function showVueById($id)
    {

        $inventaireManager = new InventaireManager();
        $inventaires = $inventaireManager->selectByIdByVue();

        return $this->twig->render('Inventaire/index.html.twig', ['inventaires' => $inventaires]);

    }


    public function initialiseGame()
    {
        $inventaireManager = new InventaireManager();
        $inventaires = $inventaireManager->updateTo0All();

        return $this->twig->render('Inventaire/index.html.twig', ['inventaires' => $inventaires]);

    }

    public function vueInventory(int $id)
    {
        $inventaireManager = new InventaireManager();
        $inventaires = $inventaireManager->updateVueTo1($id);

        return $this->twig->render('Inventaire/index.html.twig', ['inventaires' => $inventaires]);

    }

    public function possederInventory(int $page,int $id)
    {
        $inventaireManager = new InventaireManager();
        $inventaires = $inventaireManager->updatePossederTo1($id);
        $inventaires = $inventaireManager->selectOne($id);


        return $this->twig->render('Locations/location'.$page.'.html.twig', ['inventaires' => $inventaires]);

    }
}
