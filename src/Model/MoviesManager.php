<?php

namespace App\Model;
use Symfony\Component\HttpClient\HttpClient;

class MoviesManager
{

    protected $api = 'Movies';


    public function getArray():array
    {

        $client = HttpClient::create();
        $response = $client->request('GET', API_NAME.$this->api);

        $statusCode = $response->getStatusCode(); // get Response status code 200

        if ($statusCode === 200) {
            $content = $response->getContent();
            // get the response in JSON format

           return $content = $response->toArray();
            // convert the response (here in JSON) to an PHP array
        }
    }






}