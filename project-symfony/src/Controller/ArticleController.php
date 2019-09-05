<?php
/**
 * Created by PhpStorm.
 * User: reim
 * Date: 04.09.19
 * Time: 11:54
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    public function oneArticle()
    {
        return new Response('OMG');
    }

    public function listArticle()
    {
        return $this->render('article/show.html.twig', [
            'title' => 'Some stupieds errors',
        ]);
    }
}