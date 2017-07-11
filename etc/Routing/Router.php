<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Routing;

use etc\Routing\Route;

/**
 * Class Router
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class Router {

    /** @var array */
    private $routes = [];

    /** @var array */
    private $request = [];

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->routes = require __DIR__ . './../../app/config/routes.php';
    }

    /**
     * Allow to build the Router and load every Routes.
     */
    public function build()
    {
        foreach ($this->routes as $index => $route) {
            $route = new Route($index['path'], $index['defaults']);
            $this->addRoute($route);
        }
    }

    /**
     * Allow to add a new Route inside the Router.
     *
     * @param Route $route
     */
    public function addRoute($route)
    {
        if (!$route instanceof Route) {
            throw new \LogicException();
        }

        $this->request[] = $route;
    }

    public function execute()
    {

    }
}
