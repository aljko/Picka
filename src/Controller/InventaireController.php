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

    public function showOne(int $id)
    {

        $inventaireManager = new InventaireManager();
        $inventaires = $inventaireManager->selectOne($id);

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

    public function possederInventory(int $id)
    {
        $inventaireManager = new InventaireManager();
        $inventaires = $inventaireManager->updatePossederTo1($id);

        return $this->twig->render('Inventaire/index.html.twig', ['inventaires' => $inventaires]);

    }
}
