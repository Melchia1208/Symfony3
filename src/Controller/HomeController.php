<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function number()
    {
        $article = new Article();

        var_dump($article);

        return $this->render('home.html.twig');
    }
}
