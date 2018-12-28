<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Article;
use App\Entity\ArticleCategory;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ArticleRepository;

class DashboardExampleController extends AbstractController
{
    private $title = "Example CMS - Dashboard";
    private $breadcrumb = "Dashboard";

    /**
     * Config variables for display data table
     * Change them for your purpose
     */
    private $numberOfItems = 20;

    /**
     * @Route("/admin", name="admin_dashboard")
     */
    public function index()
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();
        $categories = $this->getDoctrine()->getRepository(ArticleCategory::class)->findAll();
        return $this->render('admin/dashboard_example/index.html.twig', array(
            'title' => $this->title,
            'breadcrumb' => $this->breadcrumb,
            'articles' => $articles,
            'categories' => $categories,
        ));
    }

    /**
     * @Route("/admin/dashboard/create", name="admin_create_article")
     */
    public function create()
    {
        $categories = $this->getDoctrine()
            ->getRepository(ArticleCategory::class)
            ->findBy(
                ['status' => 1]
            );
        return $this->render('admin/dashboard_example/create.html.twig', array(
            'title' => $this->title,
            'breadcrumb' => $this->breadcrumb . ' - Create article',
            'categories' => $categories,
        ));
    }

    /**
     * @Route("/admin/dashboard/store", name="admin_store_article")
     */
    public function store(Request $request)
    {
        // TODO: Validate request first
        $article = new Article();
        $article->setTitle($request->get('title'));
        $article->setSlug($request->get('title'));
        $article->setDescription($request->get('description', ''));
        $article->setContent($request->get('content'));
        $article->setStatus($request->get('status', 0));
        $article->setAuthor($this->getUser());
        $categoryId = (int)$request->get('category', 0);
        $article->setCategory($this->getDoctrine()->getRepository(ArticleCategory::class)->find($categoryId));

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($article);
        $manager->flush();
    }
}
