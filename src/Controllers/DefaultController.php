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

    public function indexAction()
    {
        $articles = $this->container['ArticleManager']->getArticles();

        return $this->getTwig()->render('index.html.twig', [
            'articles' => $articles
        ]);
    }

    public function articlesDetailsAction($id)
    {

    }
}