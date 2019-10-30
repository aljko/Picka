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
    public function showOne(int $id)
    {
        $moviesManager = new MoviesManager();
        $movies = $moviesManager -> getOneArrayById($id);

        return $this->twig->render('Movies/one.html.twig', ['movies' => $movies]);
    }
    public function find(string $col, string $what)
    {
        $moviesManager = new MoviesManager();
        $movies = $moviesManager -> search($col,$what);

        return $this->twig->render('Movies/index.html.twig', ['movies' => $movies]);
    }

}