<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Action;

use App\DB\DBFactory;

/**
 * Class ActionResolver
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
class ActionResolver
{
    /**
     * An array of actions.
     *
     * @var array
     */
    private $actions = [];

    /**
     * ActionResolver constructor.
     */
    public function __construct($services)
    {
        $this->build($services);
    }

    /**
     * Allow to build all the Actions and pass the dependencies linked.
     *
     * @param array $services       An array of services to inject.
     */
    public function build(array $services)
    {
        $actions = require __DIR__.'./../../app/config/routes.php';

        foreach ($actions as $action => $value) {

            $reflection = new \ReflectionClass($value['action']);
            if (array_key_exists('twig', $reflection->getDefaultProperties())) {
                foreach ($services as $service) {
                    if ($service instanceof \Twig_Environment) {
                        $object = new $value['action']($service);
                    }
                }
            }

            if (array_key_exists('db', $reflection->getDefaultProperties())) {
                foreach ($services as $service) {
                    if ($service instanceof DBFactory) {
                        $object = new $value['action']($service);
                    }
                }
            }

            if (array_key_exists(get_class($object), $this->actions)) {
                return;
            }

            $this->actions['action'][] = $object;
            $this->actions['routes'][] = $value['path'];
        }
    }

    /**
     * Allow to get a single action using his name.
     *
     * @param string $action                The name of the action.
     * @param array $data                   The data passed through the action.
     *
     * @throws \InvalidArgumentException    If the action isn't a string.
     *
     * @return mixed
     */
    public function getAction(string $action, array $data)
    {
        if (!is_string($action)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'This argument should be a string ! Given %s',
                    $action
                )
            );
        }

        $class = new $action();

        if ($data) {
            foreach ($data as $item) {
                $content = array_shift($item);
            }

            return $class($content);
        }

        return $class();
    }

    /**
     * Return all the actions.
     *
     * @return array        All the actions.
     */
    public function getActions() : array
    {
        return $this->actions;
    }
}
