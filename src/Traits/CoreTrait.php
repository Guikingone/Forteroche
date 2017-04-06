<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core\Traits;

use Core\Services\DBConnexion;
use Pimple\Container;

/**
 * Class CoreTrait
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
trait CoreTrait
{
    /** @var Container */
    protected $container;

    public function __invoke ()
    {
        $this->buildServices();
    }

    public function buildServices()
    {
        $services = [
            __DIR__ . '../Managers/*.php',
        ];

        foreach ($services as $service) {
            $class = new $service();
            $this->container["$class::class"] = function ($c) {
                return new $c();
            };
        }
    }

    /**
     * Return the DBConnexion class, all the parameters are loaded using the
     * app/config/parameters.php file.
     *
     * @return DBConnexion
     */
    public function getDB()
    {
        $config = file_get_contents(__DIR__ . '../../app/config/parameters.php');

        return new DBConnexion(
            $config['db_host'],
            $config['db_port'],
            $config['db_name'],
            $config['db_user_name'],
            $config['db_user_password']
        );
    }

    /**
     * @return \Twig_Environment
     */
    public function getTwig()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '../../web/views/');

        return new \Twig_Environment($loader);
    }
}