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

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\ORMException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

/**
 * Class CoreTrait
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
trait CoreTrait
{
    /** @var array */
    private $paths;

    /** @var array */
    private $config;

    public function __construct ()
    {
        $this->getParameters();
    }

    /**
     * Allow to load every "core" parameters.
     */
    public function getParameters()
    {
        $this->paths = require __DIR__ . './../../app/config/paths.php';
    }

    /**
     * Allow to load the app config (like DB params).
     */
    public function getConfig()
    {
        $this->config = require __DIR__ . './../../app/config/config.php';
    }

    /**
     * Init the Doctrine EntityManager object.
     *
     * @throws ORMException
     * @throws \InvalidArgumentException
     *
     * @return EntityManager
     */
    public function getDB()
    {
        $config = Setup::createAnnotationMetadataConfiguration($this->paths['entity_path'], true);

        $connexion = $this->config['doctrine_config'];

        return EntityManager::create($connexion, $config);
    }

    /**
     * Init the Doctrine console.
     *
     * @throws ORMException
     * @throws \InvalidArgumentException
     *
     * @return \Symfony\Component\Console\Helper\HelperSet
     */
    public static function initConsole()
    {
        return ConsoleRunner::createHelperSet(CoreTrait::getDB());
    }

    /**
     * Return the Twig template engine, every files called are stored
     * into the web/views directory.
     *
     * @return \Twig_Environment
     */
    public function getTwig()
    {
        $loader = new \Twig_Loader_Filesystem([$this->paths['views_folder']]);

        return new \Twig_Environment($loader);
    }
}
