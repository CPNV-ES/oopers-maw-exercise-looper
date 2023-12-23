<?php

namespace App\Controller;

use MVC\Http\Controller;
use MVC\Http\Response;
use MVC\Http\Routing\Annotation\Route;

class HomeController extends Controller
{
    #[Route("/", name: 'home')]
    public function showHome(): Response
    {
        return $this->render('home');
    }
}