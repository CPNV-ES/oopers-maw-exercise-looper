<?php

namespace App\Controller;

use MVC\Http\Controller;
use MVC\Http\HTTPStatus;
use MVC\Http\Routing\Annotation\ErrorRoute;

class ErrorController extends Controller
{
    #[ErrorRoute(HTTPStatus::NOT_FOUND)]
    public function notFound()
    {
        return $this->render('404', status: HTTPStatus::NOT_FOUND);
    }
}