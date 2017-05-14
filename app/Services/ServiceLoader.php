<?php

/*
 * This file is part of the forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Services;

use Core\Managers\ArticleManager;

/**
 * Class ServiceLoader
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class ServiceLoader
{
    public function getServices()
    {
        return [
            new ArticleManager(),
        ];
    }
}
