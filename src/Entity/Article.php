<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core\Entity;

use Entity\Commentaire;

/**
 * Class Article
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class Article
{
    /** @var int */
    private $id;

    /** @var string */
    private $author;

    /** @var string */
    private $content;

    /** @var \DateTime */
    private $createdAt;

    /** @var Commentaire[] */
    private $commentaire;

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
     * @return Commentaire[]
     */
    public function getCommentaire(): array
    {
        return $this->commentaire;
    }

    /**
     * @param Commentaire[] $commentaire
     */
    public function setCommentaire(array $commentaire)
    {
        $this->commentaire = $commentaire;
    }

    /**
     * @param Commentaire $commentaire
     *
     * @return $this
     */
    public function addCommentaires(Commentaire $commentaire)
    {
        $this->commentaire[$commentaire->getId()] = $commentaire;

        return $this;
    }
}
