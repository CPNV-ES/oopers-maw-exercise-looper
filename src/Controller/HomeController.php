<?php

namespace App\Controller;

use MVC\Http\Controller\Controller;
use MVC\Http\Routing\Annotation\Route;
use MVC\Http\Response\Response;

class HomeController extends Controller
{
    #[Route("/")]
    public function showHome(): Response
    {
        return $this->render('home');
    }
}