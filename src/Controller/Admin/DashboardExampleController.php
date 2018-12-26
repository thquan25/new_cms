<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Article;
use App\Entity\ArticleCategory;
use Symfony\Component\HttpFoundation\Request;

class DashboardExampleController extends AbstractController
{
    private $title = "Example CMS - Dashboard";
    private $breadcrumb = "Dashboard";

    private $categories = null;

    /**
     * Config variables for display data table
     * Change them for your purpose
     */
    private $numberOfItems = 20;

    public function __construct()
    {
        $this->categories = $this->getDoctrine()->getRepository(ArticleCategory::class)->findAll();
    }

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
        $categories = $this->getDoctrine()->getRepository(ArticleCategory::class)->findAll();
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
    }
}
