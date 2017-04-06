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
use Twig_Loader_Array;

/**
 * Class CoreTrait
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
trait CoreTrait
{
    /**
     * Return the DBConnexion class, all the parameters are loaded using the
     * app/config/parameters.php file.
     *
     * @return DBConnexion
     */
    public static function returnDB()
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
     * @param string $name      The name of the service.
     */
    public static function returnServices(string $name)
    {
        // TODO
    }

    /**
     * @return \Twig_Environment
     */
    public static function returnTwig()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . '../../web/views/');

        return new \Twig_Environment($loader);
    }
}