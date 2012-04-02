<?php

/**
 * This file is part of the KnpDoctrineBehaviors package.
 *
 * (c) KnpLabs <http://knplabs.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Knp\DoctrineBehaviors\ORM\Blameable;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * UserCallable can be invoked to return a blameable user
 */
class UserCallable
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @constructor
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Returns user instance when invoked.
     *
     * @return mixed
     */
    public function __invoke()
    {
        $token = $this->container->get('security.context')->getToken();

        if (null !== $token) {
            return $token->getUser();
        }
    }
}
