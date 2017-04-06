<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Router;

use Core\Controllers\Core\Controller;
use Core\Controllers\DefaultController;

/**
 * Class Router
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class Router {

    /** @var Controller[] */
    private $controllers;

    public function __construct ()
    {
        $this->buildControllers();
    }

    public function buildControllers()
    {

    }

    public function execute()
    {
        switch ($_REQUEST) {
            case $_SERVER['REQUEST_URI'] === '/':
                $controller = new DefaultController();
                $controller->indexAction();
                break;
            case $_SERVER['REQUEST_URI'] === '/contact':

        }
    }
}