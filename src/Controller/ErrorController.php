<?php

use MVC\Http\Controller\Controller;
use MVC\Http\HTTPStatus;
use MVC\Http\Routing\Annotation\ErrorRoute;

class ErrorController extends Controller
{
    #[ErrorRoute(HTTPStatus::NOT_FOUND)]
    function notFound()
    {
        return $this->render('404',status: HTTPStatus::NOT_FOUND);
    }
}