<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Kernel;

// Pimple
use Pimple\Container;

// Core
use App\Routing\Router;
use App\Action\ActionResolver;

/**
 * Class Kernel
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class Kernel extends Container
{
    /** @var Router */
    private $router;

    /** @var ActionResolver */
    private $actionResolver;

    /** @var array */
    private $services = [];

    /**
     * Kernel constructor.
     */
    public function __construct()
    {
        $this->build();

        // Pimple
        parent::__construct();
    }

    /**
     * Allow to instantiate the Container,
     * the Router then load every parameters.
     */
    public function build()
    {
        $this->initializeContainer();

        if ($this->router instanceof Router) {
            return;
        }

        $this->router = new Router();

        if ($this->actionResolver instanceof ActionResolver) {
            return;
        }

        $this->actionResolver = new ActionResolver($this->services);

        $this->chargeActions();

        if (!empty($this->parameters)) {
            return;
        }
    }

    /**
     * Allow to load the core dependencies.
     */
    public function initializeContainer()
    {
        $paths = require __DIR__ . './../../app/config/paths.php';
        $parameters = require __DIR__ . './../../app/config/parameters.php';

        foreach ($paths as $path => $value) {
            if ($this->offsetExists($path)) {
                return;
            }
            $this[$path] = $value;
        }

        foreach ($parameters as $parameter => $item) {
            if ($this->offsetExists($parameter)) {
                return;
            }
            $this[$parameter] = $item;
        }

        $services = require $this['root_dir'].'etc/services.php';

        foreach ($services as $service => $value) {

            if ($this->offsetExists($service)) {
                return;
            }

            if ($this->offsetExists($value['params'])) {

                $keys = $this->offsetGet($value['params']);
                $class = new $value['class']($keys);

                $this[$service] = function ($c) {
                    return new $value['return']($class);
                };
            }
        }
    }

    public function chargeActions()
    {
        $this->router->receiveActions($this->actionResolver->getActions());
    }

    /**
     * Allow to handle the actual request.
     */
    public function handleRequest()
    {
        $this->router->execute();
    }
}
