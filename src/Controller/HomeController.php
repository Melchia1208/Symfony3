<?php
	/**
	 * Created by PhpStorm.
	 * User: wilder
	 * Date: 29/10/18
	 * Time: 12:04
	 */
	
	namespace App\Controller;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\HttpFoundation\Response;
	use Symfony\Component\Routing\Annotation\Route;
	
	
	class HomeController extends AbstractController
	{
		/**
		 * @Route("/home", name="homepage")
		 */
		public function index()
		{
			return $this->render('Home/home.html.twig');
			
		}
		
	}
	