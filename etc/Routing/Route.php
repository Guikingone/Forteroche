<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Routing;

/**
 * Class Route
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class Route
{
    /** @var string */
    public $path;

    /** @var string */
    public $action;

    /** @var string */
    private $method;

    /** @var string */
    private $param;

    /** @var array */
    private $data;

    /**
     * Route constructor.
     *
     * @param string $path
     * @param string $action
     * @param string $method
     */
    public function __construct(
        string $path,
        string $action,
        string $method
    ) {
        $this->setPath($path);
        $this->setAction($action);
        $this->setMethod($method);
    }

    /**
     * Return the whole path.
     *
     * @return string
     */
    public function getPath() : string
    {
        if ($this->param) {
            $this->data[] = $this->param;

            return $this->path;
        }

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
     * @return string
     */
    public function getAction() : string
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction(string $action)
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getMethod() : string
    {
        return $this->method;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method)
    {
        $this->method = $method;
    }

    /**
     * @param $param
     */
    public function setParam($param)
    {
        $this->param = $param;

        if ($this->param) {
            $path = preg_replace('#:([\w]+)#', $this->param[0], $this->path);

            $this->path = $path;
        }
    }

    /**
     * @return string
     */
    public function getParam()
    {
        return $this->param;
    }

    /**
     * @return array
     */
    public function getData() : array
    {
        if (!$this->data) {
            return $this->data = [];
        }

        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }

    /**
     * Allow to grab a uri param and match
     * the routes linked.
     *
     * @param string $url
     *
     * @return bool
     */
    public function match($url)
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";

        if (!preg_match($regex, $url, $match)) {
            return false;
        }

        array_shift($match);

        $this->setParam($match);
    }
}
