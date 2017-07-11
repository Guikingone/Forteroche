<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace etc\Routing;

/**
 * Class Route
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class Route
{
    /** @var string */
    public $path;

    /** @var array */
    private $defaults = [];

    /** @var array */
    private $params = [];

    /**
     * Route constructor.
     * @param $path
     * @param array $defaults
     */
    public function __construct(
        $path,
        array $defaults = array(),
        array $params = array()
    ) {
        $this->setPath($path);
        $this->setDefaults($defaults);
        $this->setParams($params);
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return array
     */
    public function getDefaults(): array
    {
        return $this->defaults;
    }

    /**
     * @param array $defaults
     */
    public function setDefaults(array $defaults)
    {
        $this->defaults = $defaults;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params)
    {
        $this->params = $params;
    }
}
