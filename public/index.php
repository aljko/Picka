<?php


require_once '../vendor/autoload.php';
require_once '../config/config.php';
require_once '../config/db.php';


$routeParts = explode('/', ltrim($_SERVER['REQUEST_URI'], '/') ?: HOME_PAGE);
$controller = 'App\Controller\\' . ucfirst($routeParts[0] ?? '') . 'Controller';
$method = $routeParts[1] ?? '';
$vars = array_slice($routeParts, 2);

if (class_exists($controller) && method_exists(new $controller(), $method)) {
   echo call_user_func_array([new $controller(), $method], $vars);
} else {
    header("HTTP/1.0 404 Not Found");
    echo '404 - Page not found';
  //  exit();
}



/*$client = HttpClient::create();
$monster = $client->request('GET', API_NAME.'monsters');
$movie = $client->request('GET', API_NAME.'movies');

$statusCodeMonster = $monster->getStatusCode(); // get Response status code 200
$statusCodeMovie = $movie->getStatusCode(); // get Response status code 200



if ($statusCodeMonster === 200) {
    $content = $monster->getContent();
    // get the response in JSON format

    $content = $monster->toArray();
    // convert the response (here in JSON) to an PHP array

    var_dump($content);

    foreach($content as $key => $val){
        foreach ($val as $ke => $va){

            echo '<div>';
                echo '<h2>'.$va['name'].'</h2>';
                echo '<img src="'.$va['picture'].'">';
                echo '<p> Attaque : '.$va['attack'].'</p>';
            echo '<p> defense : '.$va['defense'].'"</p>';
            echo '<p> description : '.$va['description'].'</p>';
            echo '<p> special : '.$va['special'].'</p>';


        }

    }
}*/



