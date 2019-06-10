<?php
require __DIR__.'/vendor/autoload.php';

use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Driver\Selenium2Driver;
use Behat\Mink\Session;

$driver = new GoutteDriver();
//$driver = new Selenium2Driver();

$session = new Session($driver);
$session->start();


$session->visit('http://jurassicpark.wikia.com');

$page = $session->getPage();

var_dump(substr($page->getText(), 0, 75));

$header = $page->find('css', '.wds-community-header__sitename a');
var_dump($header->getText());

$nav = $page->find('css', '.wds-tabs');
$linkEl = $nav->find('css', 'li a');
$link = $page->findLink('Books');
//$field = $page->findField('Description');
//$button = $page->findButton('Save');
var_dump($linkEl->getText());
var_dump($linkEl->getAttribute('href'));
var_dump($link->getAttribute('href'));

$link->click();
var_dump($session->getCurrentUrl());

$session->stop();