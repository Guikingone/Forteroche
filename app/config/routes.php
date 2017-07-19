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
        'action' => Core\Action\Core\HomeAction::class,
        'method' => 'GET',
    ],
    'contact' => [
        'path' => '/contact',
        'action' => \Core\Action\Core\ContactAction::class,
        'method' => 'GET'
    ],
    'articles' => [
        'path' => '/articles',
        'action' => Core\Action\Article\ArticlesAction::class,
        'method' => 'GET',
    ],
    'article_create' => [
        'path' => '/article/create',
        'action' => Core\Action\Article\ArticleCreateAction::class,
        'method' => 'POST'
    ],
    'articles_details' => [
        'path' => '/article/details/:id',
        'action' => Core\Action\Article\ArticleDetailsAction::class,
        'method' => 'GET',
    ],
    'article_update' => [
        'path' => 'article/update/:id',
        'action' => \Core\Action\Article\ArticleUpdateAction::class,
        'method' => 'UPDATE'
    ],
    'article_delete' => [
        'path' => '/article/delete/:id',
        'action' => \Core\Action\Article\ArticleDeleteAction::class,
        'method' => 'DELETE'
    ]
];
