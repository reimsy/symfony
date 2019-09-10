<?php
/**
 * Created by PhpStorm.
 * User: reim
 * Date: 07.09.19
 * Time: 10:44
 */

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(EntityManagerInterface $em)
    {
        /*
        * For working with doctrine repository like example
        * $repository = $em->getRepository(Article::class);
        * $articles = $repository->findAllPublishedOrderedByNewest();
        */

        return new Response('OMG! My first page already! WOOO!');
    }

    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
        $logger->info('Article is being hearted!');
    }
}