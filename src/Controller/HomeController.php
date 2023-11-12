<?php

namespace App\Controller;

use MVC\Http\Controller\Controller;
use MVC\Http\Response\Response;
use MVC\Http\Routing\Annotation\Route;

class HomeController extends Controller
{
    #[Route("/", name: 'home')]
    public function showHome(): Response
    {
        return $this->render('home');
    }
}