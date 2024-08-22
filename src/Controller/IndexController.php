<?php

namespace App\Controller;

use App\Entity\Blog\Blogs;
use App\Entity\Blog\Categories;
use App\Entity\Blog\Authors;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class IndexController extends AbstractController
{
	private $blogsEntityManager;

	// Inject the blogs EntityManagerInterface
	public function __construct(EntityManagerInterface $blogsEntityManager)
	{
		$this->blogsEntityManager = $blogsEntityManager;
	}

	#[Route('/', name: 'app_index')]
	public function index(): Response
	{
		// $blogs = [
		// 	['id' => 1, 'title' => 'Blog Post 1', 'img' => '/build/images/test.jpg', 'date' => '26 July 2024', 'content' => 'Content for blog post 1', 'category' => 'category1'],
		// 	['title' => 'Blog Post 2', 'content' => 'Content for blog post 2', 'category' => 'category2'],
		// 	['title' => 'Blog Post 3', 'content' => 'Content for blog post 2', 'category' => 'category3'],
		// 	['title' => 'Blog Post 4', 'content' => 'Content for blog post 2', 'category' => 'category4'],
		// 	['title' => 'Blog Post 4', 'content' => 'Content for blog post 2', 'category' => 'category4'],
		// 	['title' => 'Blog Post 4', 'content' => 'Content for blog post 2', 'category' => 'category4'],
		// 	['title' => 'Blog Post 4', 'content' => 'Content for blog post 2', 'category' => 'category4'],
		// 	['title' => 'Blog Post 4', 'content' => 'Content for blog post 2', 'category' => 'category4'],
		// 	['title' => 'Blog Post 4', 'content' => 'Content for blog post 2', 'category' => 'category4'],
		// 	['title' => 'Blog Post 4', 'content' => 'Content for blog post 2', 'category' => 'category4'],
		// 	['title' => 'Blog Post 4', 'content' => 'Content for blog post 2', 'category' => 'category4'],

		// ];
		$blogsRepository = $this->blogsEntityManager->getRepository(Blogs::class);
		$blogs = $blogsRepository->findAll();
		$blogsData = array_map(function ($blog) {
			$category = $this->blogsEntityManager->getRepository(Categories::class)->find($blog->getCategoryId());
			$categoryName = $category ? $category->getName() : 'Unknown';

			return [
				'id' => $blog->getId(),
				'title' => $blog->getTitle(),
				'description' => $blog->getDescription(),
				'authorid' => $blog->getAuthorid(),
				'created' => $blog->getCreated()->format('Y-m-d'),
				'image' => $blog->getImage(),
				'categoryid' => $categoryName,
				'adminid' => $blog->getAdminid(),
			];
		}, $blogs);
		return $this->render('index/index.html.twig', [
			'blogs' => $blogsData,
		]);
	}

	#[Route('/blog/{id}', name: 'app_blog')]
	public function blog($id): Response
	{
		$blogRepository = $this->blogsEntityManager->getRepository(Blogs::class);
		$blog = $blogRepository->find($id);
		if (!$blog) {
			throw $this->createNotFoundException('The blog does not exist');
		}

		$category = $this->blogsEntityManager->getRepository(Categories::class)->find($blog->getCategoryId());
		$categoryName = $category ? $category->getName() : 'Unknown';


		$author = $this->blogsEntityManager->getRepository(Authors::class)->find($blog->getAuthorId());
		$authorName = $author ? $author->getName() : 'Unknown';
		$blogData = [
			'id' => $blog->getId(),
			'title' => $blog->getTitle(),
			'description' => $blog->getDescription(),
			'author' => $authorName,
			'created' => $blog->getCreated()->format('Y-m-d'),
			'image' => $blog->getImage(),
			'category' => $categoryName,
			'adminid' => $blog->getAdminid(),
		];

		return $this->render('index/blog.html.twig', [
			'blog' => $blogData
		]);
	}
}
