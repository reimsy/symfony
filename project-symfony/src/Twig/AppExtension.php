<?php

namespace App\Twig;

use Psr\Container\ContainerInterface;
use Symfony\Contracts\Service\ServiceSubscriberInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use App\Service\MarkdownHelper;

class AppExtension extends AbstractExtension implements ServiceSubscriberInterface
{
//    private $markdownHelper;
    private $container;

    public function __construct(MarkdownHelper $markdown, ContainerInterface $container)
    {
//        $this->markdownHelper = $markdown;
        $this->container = $container;
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('cached_markdown', [$this, 'processMarkdown'], ['is_safe' => ['html']]),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('function_name', [$this, 'doSomething']),
        ];
    }

    public function doSomething($value)
    {
        // ...
    }

    public function processMarkdown($value)
    {
        return $this->container->get(MarkdownHelper::class)->parse($value);
    }

    public static function getSubscribedServices()
    {
        return [
            MarkdownHelper::class,
        ];
    }
}
