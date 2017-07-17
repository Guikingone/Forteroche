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
class Router {

    /**
     * An array of routes defined by routes.php.
     *
     * @var array
     */
    private $routes = [];

    /**
     * The array of request that the Router can manage.
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
        $this->routes = require __DIR__ . './../../app/config/routes.php';

        foreach ($this->routes as $index => $entry) {
            $route = new Route(
                $entry['path'],
                $entry['action'],
                $entry['method']
            );

            $this->request[] = $route;
        }
    }

    /**
     * Allow to catch the param passed through the uri
     * and set them as default parameters in the Route.
     *
     * @param object $url
     */
    public function catchParam(object $url)
    {
        $param = $url->match($_SERVER['REQUEST_URI']);

        $url->setParam($param);
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
            $this->catchParam($request);
            switch ($_SERVER['REQUEST_URI']) {
                case $request->getPath():
                    return $this->returnClass($request->getAction(), $request->getData());
                    break;
            }
        }
    }
}
