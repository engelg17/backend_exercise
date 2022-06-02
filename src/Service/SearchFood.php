<?php

namespace App\Service;

use GuzzleHttp\Client;

class SearchFood
{
    protected $client;
    protected $apiUrl;

    public function __construct(Client $client, $apiUrl) {
        $this->client = $client;
        $this->apiUrl = $apiUrl;
    }
    public function filterFood($food)
    {
        $foodConvert = strtr($food, " ", "_");
        $url = $this->apiUrl.'beers?food='.$foodConvert;
        try {
            $response = $this->client->request('GET', $url);
            $content = $response->getBody()->getContents();
            $result = json_decode($content);
            $array= [];
            foreach($result as $fila) {
                $array2 = [
                    "id"=> $fila->id,
                    "name"=> $fila->name,
                    "description"=> $fila->description,
                ];
            array_push($array, $array2);
            }
            return $array;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }
}
