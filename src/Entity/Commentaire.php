<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Entity;

use Core\Entity\Article;

/**
 * Class Commentaire
 */
class Commentaire
{
    /** @var int */
    private $id;

    /** @var string */
    private $author;

    /** @var \DateTime */
    private $createdAt;

    /** @var string */
    private $content;

    /** @var bool */
    private $moderated;

    /** @var int */
    private $article;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author)
    {
        $this->author = $author;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return bool
     */
    public function getModerated(): bool
    {
        return $this->moderated;
    }

    /**
     * @param bool $moderated
     */
    public function setModerated(bool $moderated)
    {
        $this->moderated = $moderated;
    }

    /**
     * @param Article $article
     *
     * @return $this
     */
    public function setArticle(Article $article)
    {
        $this->article = $article->getId();

        return $this;
    }

    /**
     * @return int
     */
    public function getArticle()
    {
        return $this->article;
    }
}
