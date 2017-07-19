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

use App\DB\DBFactory;

/**
 * Class ArticleManager
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
final class ArticleManager
{
    /** @var DBFactory */
    private $db;

    /**
     * ArticleManager constructor.
     *
     * @param DBFactory $db
     */
    public function __construct(DBFactory $db)
    {
        $this->db = $db;
    }

    /**
     * @return mixed
     */
    public function getArticles()
    {

    }
}
