<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\BaseFixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixtures extends BaseFixture
{
    // Fake data for project
    private static $articleTitles = [
        'Why Asteroids Taste Like Bacon',
        'Life on Planet Mercury: Tan, Relaxing and Fabulous',
        'Light Speed Travel: Fountain of Youth or Fallacy',
    ];
    private static $articleImages = [
        'asteroid.jpeg',
        'mercury.jpeg',
        'lightspeed.png',
    ];
    private static $articleAuthors = [
        'Mike Ferengi',
        'Amy Oort',
    ];

    /**
     * Method for
     */
    public function loadData(ObjectManager $manager)
    {
        $this->createMany(Article::class, 10, function(Article $article, $count) {
            $article->setTitle($this->faker->randomElement(self::$articleTitles))
                ->setSlug($this->faker->slug)
                ->setAuthor($this->faker->randomElement(self::$articleAuthors))
                ->setImageFilename($this->faker->randomElement(self::$articleImages));
        });

        $manager->flush();
    }
}
