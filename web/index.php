<?php

require __DIR__ . './../autoload.php';

use App\Router\Router;

$router = new Router();
$router->execute();

