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
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article/{number}")
     */
    public function oneArticle($number)
    {
        $information = 'We are going to article №'. $number;
        return new Response($information);
    }

    /**
     * @Route("article/list")
     */
    public function listArticle()
    {
        return $this->render('article/show.html.twig', [
            'title' => 'Some stupieds errors',
        ]);
    }
}