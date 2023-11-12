<?php

use MVC\Kernel;

require '../vendor/autoload.php';

(new Kernel("../.env"))->executeRoute();