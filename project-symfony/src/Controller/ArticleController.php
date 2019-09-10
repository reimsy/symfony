<?php
/**
 * Created by PhpStorm.
 * User: reim
 * Date: 09.09.19
 * Time: 10:44
 */

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Michelf\MarkdownInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ArticleController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(EntityManagerInterface $em)
    {
//        $repository = $em->getRepository(Article::class);
//        $articles = $repository->findAllPublishedOrderedByNewest();

        return new Response('OMG! My first page already! WOOO!');
    }

    public function toggleArticleHeart($slug, LoggerInterface $logger)
    {
        $logger->info('Article is being hearted!');
    }
}