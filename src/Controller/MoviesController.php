<?php
namespace App\Controller;
use App\Model\MoviesManager;


class MoviesController extends AbstractController
{

    public function showAll()
    {
        $moviesManager = new MoviesManager();
        $movies = $moviesManager -> getArray();

        return $this->twig->render('Movies/index.html.twig', ['movies' => $movies]);

    }



}