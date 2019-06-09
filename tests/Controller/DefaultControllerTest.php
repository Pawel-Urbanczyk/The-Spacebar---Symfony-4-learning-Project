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

    public function testArticleAddUsingForm()
    {
        $client = $this->makeClient();
        $client->followRedirect();

        $crawler = $client->request('GET', '/admin/article/new');
        $this->assertStatusCode(200, $client);

        $form = $crawler->selectButton('Submit')->form();
        $form['article_form[title]']->setValue('Letters');
        $form['article_form[content]']->setValue('ABCD');
        $form['article_form[location]']->select(2);
        $form['article_form[specificLocationName]']->select(2);
        $form['article_form[author]']->setValue('admin0@spacebar.com');

        $client->submit($form);

        $this->assertContains('Article Created!', $client->getResponse()->getContent());

    }
}