<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Article;
use App\Entity\ArticleCategory;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class ArticleFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $articleCategory1 = new ArticleCategory();
        $articleCategory1->setName('Category 1');
        $articleCategory1->setSlug('category-1');
        $articleCategory1->setStatus(1);
        $manager->persist($articleCategory1);

        $articleCategory2 = new ArticleCategory();
        $articleCategory2->setName('Category 2');
        $articleCategory2->setSlug('category-2');
        $articleCategory2->setStatus(1);
        $manager->persist($articleCategory2);

        $article1 = new Article();
        $article1->setTitle('Article 1');
        $article1->setSlug('article-1');
        $article1->setDescription("Les compétences manquantes dans l'Enseignement Supérieur");
        $article1->setContent("<h2>Quelles sont les attentes des entreprises et des &eacute;tudiants vis-&agrave;-vis de l&#39;enseignement sup&eacute;rieur&nbsp;?</h2>");
        $article1->setCreatedAt(new \DateTime());
        $article1->setStatus(1);
        $article1->setCategory($articleCategory1);
        $article1->setAuthor($this->getReference('admin-user'));
        $manager->persist($article1);

        $article2 = new Article();
        $article2->setTitle('Article 2');
        $article2->setSlug('article-2');
        $article2->setDescription("A la recherche d'ingénieurs d'études et de production");
        $article2->setContent("<h2>Quelle est la situation des ing&eacute;nieurs fran&ccedil;ais aujourd&#39;hui&nbsp;? L&#39;IESF d&eacute;livre les r&eacute;sultats de son enqu&ecirc;te annuelle, aupr&egrave;s de 52&nbsp;000 ing&eacute;nieurs et scientifiques dipl&ocirc;m&eacute;s en France (en f&eacute;vrier-mars 18). Nous relevons les r&eacute;sultats pour les ing&eacute;nieurs dipl&ocirc;m&eacute;s par une &eacute;cole habilit&eacute;e par la CTI (Commission des Titres d&#39;Ing&eacute;nieur).</h2>");
        $article2->setCreatedAt(new \DateTime());
        $article2->setStatus(0);
        $article2->setCategory($articleCategory2);
        $article2->setAuthor($this->getReference('admin-user'));
        $manager->persist($article2);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
