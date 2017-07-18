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
    'home' => [
        'path' => '/',
        'action' => Core\Action\HomeAction::class,
        'method' => 'GET',
    ],
    'articles' => [
        'path' => '/articles',
        'action' => Core\Action\ArticlesAction::class,
        'method' => 'GET',
    ],
    'articles_details' => [
        'path' => '/article/details/:id',
        'action' => Core\Action\ArticleDetailsAction::class,
        'method' => 'GET',
    ],
    'article_create' => [
        'path' => '/article/create',
        'action' => Core\Action\ArticleCreateAction::class,
        'method' => 'POST'
    ]
];
