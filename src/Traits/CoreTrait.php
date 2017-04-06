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
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
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

    public function buildServices()
    {
        $services = [
            __DIR__ . '../../app/config/services.php',
        ];

        foreach ($services as $service) {
            $class = new $service();
            $this->container["$class::class"] = function ($c) {
                return new $c();
            };
        }

        $this->container['twig'] = function ($c) {
            $loader = new \Twig_Loader_Filesystem(__DIR__ . '../../web/views');
            return new \Twig_Environment($loader);
        };

        $this->container['doctrine'] = function ($c) {
            $config = Setup::createAnnotationMetadataConfiguration([
                __DIR__ . '../../src'
            ], true);
            $configKey = require __DIR__ . '../../app/config/parameters.php';
            $entityManager = EntityManager::create($configKey, $config);

            return new $entityManager();
        };
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
}