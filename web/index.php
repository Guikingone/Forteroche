<?php

require __DIR__ . './../autoload.php';

use App\Kernel;

$kernel = new Kernel();
$kernel->handleRequest();
