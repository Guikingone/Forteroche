<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core\Action\Core;

/**
 * Class ContactAction
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
final class ContactAction
{
    public function __invoke()
    {
        echo 'Hello from contact !';
    }
}
