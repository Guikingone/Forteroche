<?php

/*
 * This file is part of the Forteroche project.
 *
 * (c) Guillaume Loulier <contact@guillaumeloulier.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Core\Action\Core;

/**
 * Class HomeAction
 *
 * @author Guillaume Loulier <contact@guillaumeloulier.fr>
 */
final class HomeAction
{
    /** @var \Twig_Environment */
    private $twig;

    /**
     * HomeAction constructor.
     *
     * @param \Twig_Environment $twig
     */
    public function __construct($twig)
    {
        $this->twig = $twig;
    }

    public function __invoke()
    {
        echo 'Hello World from Action !';
    }
}
