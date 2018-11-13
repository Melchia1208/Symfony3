<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category", name="category")
     */
    public function index()
    {
        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
        ]);
    }
	
	/**
	 * @param Category $category
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @Route("/category/{category}", name="category_show")
	 */
    public function show(Category $category)
    {
        return $this->render('category/index.html.twig', [
            'category' => $category
        ]);
    }
    
}
