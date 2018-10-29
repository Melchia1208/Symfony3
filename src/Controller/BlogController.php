<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class BlogController extends AbstractController
{
    /**
     * @Route("/blog/{page}", name="blog_list", requirements={"page"="[a-z0-9-]+"})
     */
    public function show($page)
    {
        $page = ucwords($page, "-");
        $page = str_replace("-", " ", $page);
        return $this->render('blog.html.twig', [
            'page' => $page,
        ]);
    }

    /**
     * @Route("/blog/", name="blog_list")
     */
    public function show2()
    {

        $page = 'Article sans titre';
        return $this->render('blog.html.twig', [
            'page' => $page,
        ]);
    }
}
