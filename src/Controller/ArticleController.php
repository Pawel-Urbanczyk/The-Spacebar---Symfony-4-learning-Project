<?php
/**
 * Created by PhpStorm.
 * User: Pawel
 * Date: 21.09.2018
 * Time: 22:22
 */

namespace App\Controller;



use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
{

    /**
     * @Route("/")
     */
    public function homepage()
    {
       return new Response('OMG!');
    }

    /**
     * @Route("/news/{slug}")
     */
    public function show($slug)
    {
        return new Response(sprintf(
            'Future page to show article: %s',
            $slug
        ));
    }

}