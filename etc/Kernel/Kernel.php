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

// Core
use App\Routing\Router;
use App\Action\ActionResolver;

/**
 * Class Kernel
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class Kernel
{
    /** @var Router */
    private $router;

    /** @var ActionResolver */
    private $actionResolver;

    /** @var array */
    private $services = [];

    /** @var array */
    private $parameters;

    /** @var array */
    private $paths;

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
        $this->parameters = require __DIR__ . './../../app/config/parameters.php';
        $this->paths = require __DIR__ . './../../app/config/paths.php';

        $this->loadDefaultsDependencies();

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
     * Allow to load every core dependencies.
     *
     * @throws \LogicException
     */
    public function loadDefaultsDependencies()
    {
        $services = require __DIR__.'./../services.php';

        foreach ($services as $service => $value) {
            if (!$value['class']) {
                throw new \LogicException(
                    sprintf(
                        'Invalid definition !'
                    )
                );
            }

            if ($value['params']) {
                if ((array_key_exists($value['params'], $this->parameters))) {

                    $class = new $value['class']($this->parameters[$value['params']]);

                    if ($value['return']) {
                        $serv =  new $value['return']($class);
                        $this->services[] = $serv;
                    }
                }

                if (array_key_exists($value['params'], $this->paths)) {

                    $class = new $value['class']($this->paths[$value['params']]);

                    if ($value['return']) {
                        $serv =  new $value['return']($class);
                        $this->services[] = $serv;
                    }
                }
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
