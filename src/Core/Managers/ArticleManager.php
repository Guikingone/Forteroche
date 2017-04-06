<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core\Managers;

use Core\Traits\CoreTrait;

class ArticleManager
{
    use CoreTrait;

    /**
     * @return mixed
     */
    public function getArticles()
    {
        $response = $this->getDB()->buildQuery('SELECT * FROM _forteroche_articles');

        return $response->fetch();
    }
}
