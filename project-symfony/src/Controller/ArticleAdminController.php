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
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\AdapterInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class ArticleAdminController extends AbstractController
{
    /**
     * @Route("/admin/article/new")
     */
    public function createNew(EntityManagerInterface $em)
    {
        $article = new Article();
        $random = rand(0, 1000);

        $article
            ->setTitle('Title #'. $random .'. Some interesting page!')
            ->setContent(
<<<EOF
Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
when an unknown printer took a galley of type and scrambled it to make a type 
specimen book. 

It has survived not only five centuries, but also the leap into electronic typesetting, 
remaining essentially unchanged. It was popularised in the 1960s with the release of 
Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing 
software like Aldus PageMaker including versions of Lorem Ipsum. 

Number: $random
EOF
            )
            ->setSlug('content-slug'.rand(0,1000))
            ->setPublishedAt(new \DateTime(sprintf('-%d days', rand(1, 100))))
            ->setAuthor('Mike Ferengi')
            ->setHeartCount(rand(5, 100));

        $em->persist($article);
        $em->flush();

        return new Response(sprintf(
            'Hiya! New Article id: #%d slug: %s',
            $article->getId(),
            $article->getSlug()
        ));
    }

    /**
     * @Route("/news/show-some-new")
     */
    public function showNew(EntityManagerInterface $em)
    {
        $repositoryArticle = $em->getRepository(Article::class);
        $article = $repositoryArticle->find(1);

        return $this->render('article/show.html.twig', [
            'article' => $article,
            'title' => $article->getTitle()
        ]);
    }

    /**
     * @Route("/news/{slug}")
     */
    public function showSlug($slug, Environment $twigEnvironment, MarkdownInterface $markdown, AdapterInterface $cache, EntityManagerInterface $em)
    {

        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];

        $repositoryArticle = $em->getRepository(Article::class);
        $article = $repositoryArticle->findBy([], ['publishedAt' => 'DESC']);

//        dump($article); die;

        $html = $twigEnvironment->render('article/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug)),
            'slug' => $slug,
            'comments' => $comments,
            'article' => $article
        ]);

        return new Response($html);
    }

}