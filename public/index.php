<?php

use Symfony\Component\HttpClient\HttpClient;
require_once '../vendor/autoload.php';
require_once '../config/conf.php';
require_once '../config/db.php';


$client = HttpClient::create();
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
}



