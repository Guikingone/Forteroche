<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    'twig' => [
        'class' => \Twig_Loader_Filesystem::class,
        'params' => 'templates_folder',
        'return' => \Twig_Environment::class
    ]
];