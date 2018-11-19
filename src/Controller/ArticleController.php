<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index()
    {

        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();


        foreach ($categories as $category) {
            $articles = $this->getDoctrine()->getRepository(Article::class)->findBy(['category' => $category->getId()]);

            foreach ($articles as $article) {
                $category->addArticle($article);
            }

            $tableau[] = $category->getArticles();
        }


        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            /*	        'categories' => $categories,
                        'articles' => $articles,*/
            'tableau' => $tableau
        ]);
    }


    /**
     * @Route("/article/{id}", name="article_id")
     */
    public function ArticleById($id)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->findOneBy(['id'=>$id]);
        //$tags = $article->getTags();

        return $this->render('article/articlebyid.html.twig', ['article' => $article]);
    }
}
