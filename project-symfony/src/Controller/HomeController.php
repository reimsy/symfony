<?php
/**
 * Created by PhpStorm.
 * User: reim
 * Date: 05.09.19
 * Time: 9:01
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home(Environment $twig)
    {
//        $response = new Response();
//        $template = $twig->render('base.html.twig');
//
//        $response->setContent($template);
//        return $response;


        return $this->render('home/home.html.twig', [
            'title' => 'What is the symfony',
            'items' => [
                'Some item 1',
                'Cool life 2',
                'Greate choise 3',
                'Yep, true life'
            ]
        ]);
    }
}