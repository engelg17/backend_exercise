<?php
namespace App\Tests\Service;

use GuzzleHttp\Client;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class SearchFoodTest extends KernelTestCase
{
    public function testDetails()
    {
        self::bootKernel();
        $client = new Client();
        $food = 'Spicy';
        $url= 'http://localhost:8000/punkapi/food/'.$food;
        try {
            $this->client->request('GET', $url);
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
