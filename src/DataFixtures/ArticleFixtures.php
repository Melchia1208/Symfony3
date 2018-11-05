<?php
/**
 * Created by PhpStorm.
 * User: damien
 * Date: 05/11/18
 * Time: 15:11
 */
namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {

        for ($i = 0; $i<=9 ; $i++){
            for ($j = 0; $j<=4 ; $j++) {
                $article = new Article();
                $faker = Faker\Factory::create('fr_FR');
                $article->setTitle($faker->name);
                $article->setContent($faker->text($maxNbChars = 60));

                $manager->persist($article);
                $article->setCategory($this->getReference('categorie_' . $j));
                $manager->flush();

            }

        }

    }

    public function getDependencies()
    {
        return [CategoryFixtures::class];
    }



}