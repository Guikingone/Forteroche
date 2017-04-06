<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core\Controllers;

use Core\Traits\CoreTrait;

/**
 * Class DefaultController
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class DefaultController
{
    use CoreTrait;

    public static function indexAction()
    {
        static::returnDB()->connect();

        return static::returnTwig()->render('index.html.twig');
    }

    public function articlesDetailsAction($id)
    {

    }
}