<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require __DIR__ . './../autoload.php';

use App\Kernel;

$kernel = new Kernel();
$kernel->handleRequest();
