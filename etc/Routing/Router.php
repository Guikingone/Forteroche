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

/**
 * Class Router
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class Router
{
    /**
     * The array of routes that can be managed.
     *
     * @var array
     */
    private $request = [];

    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->build();
    }

    /**
     * Allow to build the Router and load every Routes.
     */
    public function build()
    {
        $routes = require __DIR__ . './../../app/config/routes.php';

        foreach ($routes as $index => $entry) {
            $route = new Route(
                $entry['path'],
                $entry['action'],
                $entry['method']
            );

            $this->request[] = $route;
        }
    }

    public function receiveActions(array $actions)
    {
        foreach ($actions as $action => $value) {

        }
    }

    /**
     * Allow to catch the param passed through the uri
     * and set them as default parameters in the Route.
     *
     * @param object $route
     */
    public function catchParam($route, $request)
    {
        $route->match($request);
    }

    /**
     * Allow to catch the parameters passed through the request/route.
     *
     * @param object $route         The Route to catch.
     * @param array $request        The Request to catch.
     *
     * @throws \LogicException      If the route isn't passed.
     * @throws \LogicException      If the request isn't an array.
     */
    public function catchData($route, array $request)
    {

        if (!$route) {
            throw new \LogicException(
                sprintf(
                    'A route must be passed as argument !'
                )
            );
        }

        if (!is_array($request)) {
            throw new \LogicException(
                sprintf(
                    'The request SHOULD be an array ! Given %s',
                    gettype($request)
                )
            );
        }

        if ($route->getMethod() !== 'POST') {
            return;
        }

        $route->setData($_POST);
    }

    /**
     * Allow to return the class using __invoke method;
     *
     * @param string $action
     *
     * @throws \InvalidArgumentException
     *
     * @return mixed
     */
    public function returnClass($action, $data)
    {
        if (!is_string($action)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'This argument should be a string ! Given %s',
                    $action
                )
            );
        }

        $class = new $action();

        if ($data) {
            foreach ($data as $item) {
                $content = array_shift($item);
            }

            return $class($content);
        }

        return $class();
    }

    /**
     * Allow to handle the actual request and
     * return the response linked.
     */
    public function execute()
    {
        foreach ($this->request as $request) {
            $this->catchParam($request, $_SERVER['REQUEST_URI']);
            $this->catchData($request, $_SERVER);
            switch ($_SERVER['REQUEST_URI']) {
                case $request->getPath():
                    return $this->returnClass($request->getAction(), $request->getData());
                    break;
            }
        }
    }
}
