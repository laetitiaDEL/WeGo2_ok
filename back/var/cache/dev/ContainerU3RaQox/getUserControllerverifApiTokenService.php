<?php

namespace ContainerU3RaQox;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUserControllerverifApiTokenService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.RkrfOL7.App\Controller\UserController::verifApiToken()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.RkrfOL7.App\\Controller\\UserController::verifApiToken()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'serializerInterface' => ['privates', 'serializer', 'getSerializerService', false],
        ], [
            'serializerInterface' => '?',
        ]))->withContext('App\\Controller\\UserController::verifApiToken()', $container);
    }
}
