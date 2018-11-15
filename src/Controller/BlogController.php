<?php
namespace App\Controller;

use App\Entity\Category;
use phpDocumentor\Reflection\Types\This;
use App\Form\ArticleSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;


class BlogController extends AbstractController
	{

    /**
     * Show all row from article's entity
     *
     * @Route("/", name="blog_index")
     * @return Response A response instance
     */
    public function index() : Response
    {
        $form = $this->createForm(
            ArticleSearchType::class,
            null,
            ['method' => Request::METHOD_GET]
        );

        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAll();

        if (!$articles) {
            throw $this->createNotFoundException(
                'No article found in article\'s table.'
            );
        }

        return $this->render(
            'blog/index.html.twig', [
                'articles' => $articles,
                'form' => $form->createView(),
            ]
        );
    }


	/**
	 * Getting a article with a formatted slug for title
	 *
	 * @param string $slug The slugger
	 *
	 * @Route("/slug/{slug<^[a-z0-9-]+$>}",
	 *     defaults={"slug" = null},
	 *     name="blog_show")
	 *  @return Response A response instance
	 */
	public function show($slug) : Response
	{
		if (!$slug) {
			throw $this
				->createNotFoundException('No slug has been sent to find an article in article\'s table.');
		}
		
		$slug = preg_replace(
			'/-/',
			' ', ucwords(trim(strip_tags($slug)), "-")
		);
		
		$article = $this->getDoctrine()
			->getRepository(Article::class)
			->findOneBy(['title' => mb_strtolower($slug)]);
		
		if (!$article) {
			throw $this->createNotFoundException(
				'No article with '.$slug.' title, found in article\'s table.'
			);
		}
		
		return $this->render(
			'blog/show.html.twig',
			[
				'article' => $article,
				'slug' => $slug
			]
		);
	}
	

	
	/**
	 * @param string $category
	 * @return Response
	 * @Route("/category/{category}", name="blog_show_category")
	 */
		public function showByCategory(string $category) : Response
		{
			$categorie = $this->getDoctrine()->getRepository(Category::class)->findOneByName($category);
			$articles = $this->getDoctrine()->getRepository(Article::class)->findBy(['category' => $categorie->getId()], ['id' => 'desc'], 3);
			
			return $this->render('blog/category.html.twig', ['categorie' => $categorie, 'articles' => $articles]);
		}
	}


