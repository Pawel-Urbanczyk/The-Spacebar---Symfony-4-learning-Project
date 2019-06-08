<?php


namespace App\Tests\Controller;


use Liip\FunctionalTestBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testArticlesAreShownOnTheHomepage()
    {
        $client = $this->makeClient();

        $crawler = $client->request('GET', '/');

        $this->assertStatusCode(200, $client);
    }
}