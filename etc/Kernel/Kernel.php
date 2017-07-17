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

use Pimple\Container;

// Core
use App\Routing\Router;

/**
 * Class Kernel
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class Kernel
{
    /** @var Container */
    private $container;

    /** @var Router */
    private $router;

    /** @var array */
    private $parameters;

    /**
     * Kernel constructor.
     */
    public function __construct()
    {
        $this->build();
    }

    /**
     * Allow to instantiate the Container,
     * the Router then load every parameters.
     */
    public function build()
    {
        if ($this->container instanceof Container) {
            return;
        }

        $this->container = new Container();

        if ($this->router instanceof Router) {
            return;
        }

        $this->router = new Router();

        if (!empty($this->parameters)) {
            return;
        }

        $this->parameters = require __DIR__ . './../../app/config/parameters.php';
    }

    /**
     * Allow to handle the actual request.
     */
    public function handleRequest()
    {
        $this->router->execute();
    }
}
