<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardExampleController extends AbstractController
{
    private $title = "Example CMS - Dashboard";
    private $breadcrumb = "Dashboard";

    /**
     * @Route("/admin", name="admin_dashboard")
     */
    public function index()
    {
        return $this->render('admin/dashboard_example/index.html.twig', array(
            'title' => $this->title,
            'breadcrumb' => $this->breadcrumb,
        ));
    }

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
