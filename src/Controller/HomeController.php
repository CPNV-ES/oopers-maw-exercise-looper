<?php

use MVC\Http\Controller\Controller;
use MVC\Http\Routing\Annotation\Route;
use \MVC\Http\Response\Response;

class HomeController extends Controller
{
    #[Route("/")]
    function showHome(): Response
    {
        return $this->render('home');
    }
}