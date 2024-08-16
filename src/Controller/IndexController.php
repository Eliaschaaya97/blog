<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
	#[Route('/', name: 'app_index')]
	public function index(): Response
	{

		$blogs = [
			['id' => 1, 'title' => 'Blog Post 1', 'img' => 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.flaticon.com%2Ffree-icon%2Fweb-link_3308395&psig=AOvVaw3CVDah-eiXJKz--VQn7qpB&ust=1723877996708000&source=images&cd=vfe&opi=89978449&ved=0CBIQjRxqFwoTCOjBjZT4-IcDFQAAAAAdAAAAABAE', 'date' => '26 July 2024', 'content' => 'Content for blog post 1', 'category' => 'category1'],
			['title' => 'Blog Post 2', 'content' => 'Content for blog post 2', 'category' => 'category2'],
			['title' => 'Blog Post 3', 'content' => 'Content for blog post 2', 'category' => 'category3'],
			['title' => 'Blog Post 4', 'content' => 'Content for blog post 2', 'category' => 'category4'],
			['title' => 'Blog Post 4', 'content' => 'Content for blog post 2', 'category' => 'category4'],
			['title' => 'Blog Post 4', 'content' => 'Content for blog post 2', 'category' => 'category4'],
			['title' => 'Blog Post 4', 'content' => 'Content for blog post 2', 'category' => 'category4'],
			['title' => 'Blog Post 4', 'content' => 'Content for blog post 2', 'category' => 'category4'],
			['title' => 'Blog Post 4', 'content' => 'Content for blog post 2', 'category' => 'category4'],
			['title' => 'Blog Post 4', 'content' => 'Content for blog post 2', 'category' => 'category4'],
			['title' => 'Blog Post 4', 'content' => 'Content for blog post 2', 'category' => 'category4'],

		];
		return $this->render('index/index.html.twig', [
			'blogs' => $blogs,
		]);
	}

	#[Route('/blog/{id}', name: 'app_block')]
	public function blog($id): Response
	{
		$blogtitle = [
			'id' => 1,
			'title' => 'Blog Post 1',
			'img' => 'https://www.example.com/image.jpg',
			'date' => '26 July 2024',
			'content' => 'Content for blog post 1',
			'category' => 'category1'
		];

		$blogcontent = [
			[
				'title' => 'dihaiudwhiudwhiudwh',
				'content' => 'Content for blog post 1 thebehbe lorem '
			],
			[
				'title' => 'apdjoawhdoiwahdiuwahodihawdhwaodhoaihdoiwhdoiwhd',
				'content' => 'Content for blog post 1 thebehbe lorem '
			],
		];

		return $this->render('index/blog.html.twig', [
			'blog' => $blogtitle,
			'blogcontent' => $blogcontent,
		]);
	}
}
