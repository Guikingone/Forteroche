<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core\Action\Article;

/**
 * Class ArticlesAction
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
final class ArticlesAction
{
    public function __invoke()
    {
        echo 'Hello from articles !';
    }
}
