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

/**
 * Class CoreTrait
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
trait CoreTrait
{
    /** @var array */
    private $parameters;

    public function __construct ()
    {
        $this->getParameters();
    }

    /**
     * Allow to load every "core" parameters.
     */
    public function getParameters()
    {
        $this->parameters = require __DIR__ . './../../app/config/config.php';
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
     * Return the Twig template engine, every files called are stored
     * into the web/views directory.
     *
     * @return \Twig_Environment
     */
    public function getTwig()
    {
        $loader = new \Twig_Loader_Filesystem([$this->parameters['views_folder']]);

        return new \Twig_Environment($loader);
    }
}
