<?php

namespace App\Controller;


use App\Model\InventaireManager;


class InventaireController extends AbstractController
{

    public function inventory()
    {
        $inventaireManager = new InventaireManager();
        $inventaires = $inventaireManager->selectAll();
        return $this->twig->render('Locations/location1.html.twig', ['inventaires' => $inventaires]);
    }

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

        return $this->twig->render('Home/index.html.twig');

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

    public function unpossedInventory(int $page, int $id)
    {

    }

    public function getWeapon(int $page, int $idInv, int $idMons)
    {
        $inventaireManager = new InventaireManager();
        $inventaires = $inventaireManager->selectOne($idInv);

        if ($inventaires['posseder'] == 1) {
            header('location:/Monstres/killOne/'.$page.'/'.$idMons);
        }else{
            return $this->twig->render('Locations/location27.html.twig');
        }
    }
}
