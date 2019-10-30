<?php
namespace App\Controller;
use App\Model\MoviesManager;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class MoviesController
{
    private $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(APP_VIEW_PATH);
        $this->twig = new Environment(
            $loader,
            [
                'cache' => !APP_DEV,
                'debug' => APP_DEV,
            ]
        );
        $this->twig->addExtension(new DebugExtension());
    }

    public function showAll()
    {
        $moviesManager = new MoviesManager();
        $movies = $moviesManager -> getArray();

        return $this->twig->render('Home/index.html.twig', ['movies' => $movies]);

    }



}