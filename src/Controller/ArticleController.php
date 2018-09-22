<?php
/**
 * Created by PhpStorm.
 * User: Pawel
 * Date: 21.09.2018
 * Time: 22:22
 */

namespace App\Controller;



use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
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
        $comments =['first comment',
                    'second comment',
                    'third comment',
        ];

        return $this->render('article/show.html.twig', [
           'title' => ucwords(str_replace('-', ' ', $slug)),
            'comments' => $comments,
        ]);
    }

}