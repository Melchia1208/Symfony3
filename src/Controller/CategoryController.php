<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    /**
     * @return Response
     * @Route("/category", name="category")
     */
    public function index(Request $request)
    {
        $category = new Category();
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em -> persist($data);
            $em ->flush();
            return $this->redirectToRoute('category');


        }


        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController', 'form' => $form->createView(), 'category' => $category, 'categories' => $categories,
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
