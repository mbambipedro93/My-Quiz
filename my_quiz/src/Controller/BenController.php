<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BenController extends AbstractController
{
    #[Route('/', name: 'app_ben')]
    public function index(): Response
    {
        return $this->render('ben/index.html.twig',);
    }
}
