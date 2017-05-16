<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App;

use Core\Controllers\DefaultController;

/**
 * Class Router
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class Router {

    public function execute()
    {
        if ($_SERVER['REQUEST_URI'] === '/') {
            $controller = new DefaultController();
            return $controller->indexAction();
        }
    }
}
