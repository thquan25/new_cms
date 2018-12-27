<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\ArticleCategory;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Utils\StringUtil;

class ArticleCategoryController extends AbstractController
{
    private $title = "Example CMS - Article Category";
    private $breadcrumb = "Blog > Category";

    /**
     * Config variables for display data table
     * Change them for your purpose
     */
    private $numberOfItems = 10;

    /**
     * @Route("/admin/blog/categories", name="admin_article_categories")
     */
    public function index()
    {
    //    $categories = $this->getDoctrine()->getRepository(ArticleCategory::class)->findAll();
    //    return $this->render('admin/dashboard_example/index.html.twig', array(
    //        'title' => $this->title,
    //        'breadcrumb' => $this->breadcrumb,
    //        'categories' => $categories,
    //    ));
    }

    /**
     * @Route("/admin/blog/category/store", name="admin_store_article_category")
     */
    public function store(Request $request, StringUtil $stringUtils)
    {
        // TODO: Validate request first
        try {
            $manager = $this->getDoctrine()->getManager();
            $articleCategory = new ArticleCategory();
            $articleCategory->setName($request->get('name'));
            $articleCategory->setSlug($stringUtils->slugify($request->get('name')));
            $articleCategory->setStatus($request->get('status', 0));

            $manager->persist($articleCategory);
            $manager->flush();

            return new Response('Success');
        } catch (\Exception $e) {
            return new Response($e->getMessage());
        }
    }
}
