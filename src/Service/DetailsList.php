<?php

namespace App\Service;

use GuzzleHttp\Client;

class DetailsList
{
    protected $client;
    protected $apiUrl;

    public function __construct(Client $client, $apiUrl) {
        $this->client = $client;
        $this->apiUrl = $apiUrl;
    }
    public function showDetails()
    {
        $url = $this->apiUrl.'beers';
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
                    "image_url"=> $fila->image_url,
                    "tagline" => $fila->tagline,
                    "first_brewed"=> $fila->first_brewed
                ];
            array_push($array, $array2);
            }
            return $array;
        } catch(\Exception $e) {
            return $e->getMessage();
        }
    }
}
