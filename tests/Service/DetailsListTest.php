<?php
namespace App\Tests\Service;

use GuzzleHttp\Client;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DetailsListTest extends KernelTestCase
{
    public function testDetails()
    {
        self::bootKernel();
        $client = new Client();
        $url= 'http://localhost:8000/punkapi/';
        try {
            $client->request('GET', $url);
        }catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
