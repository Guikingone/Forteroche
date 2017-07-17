<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core\Action;

/**
 * Class ArticleDetailsAction
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
final class ArticleDetailsAction
{
    public function __invoke($data)
    {
        echo 'Hello from article details and especially from article with the id ', $data;
    }
}
