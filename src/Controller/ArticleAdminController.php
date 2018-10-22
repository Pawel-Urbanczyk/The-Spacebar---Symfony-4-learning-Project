<?php
/**
 * Created by PhpStorm.
 * User: Pawel
 * Date: 07.10.2018
 * Time: 18:52
 */

namespace App\Controller;


use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleAdminController extends AbstractController
{
    /**
     * @Route("/admin/article/new")
     */
    public function new(EntityManagerInterface $em)
    {

        die('todo');

        return new Response('query work');

    }

}