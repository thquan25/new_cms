<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Article;
use App\Entity\ArticleCategory;

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
    }// End here 25/12/2018 Company

    /**
     * @Route("/admin/dashboard/create", name="admin_create_article")
     */
    public function create()
    {
        return $this->render('admin/dashboard_example/create.html.twig', array(
            'title' => $this->title,
            'breadcrumb' => $this->breadcrumb . ' - Create article',
        ));
    }
}
