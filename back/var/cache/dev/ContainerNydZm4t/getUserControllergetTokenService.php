<?php

namespace ContainerNydZm4t;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUserControllergetTokenService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.GDMosSs.App\Controller\UserController::getToken()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.GDMosSs.App\\Controller\\UserController::getToken()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'apiRegister' => ['privates', 'App\\Service\\ApiRegister', NULL, 'Cannot autowire service "App\\Service\\ApiRegister": argument "$token" of method "__construct()" is type-hinted "string", you should configure its value explicitly.'],
            'userPasswordHasherInterface' => ['privates', 'security.user_password_hasher', 'getSecurity_UserPasswordHasherService', true],
            'userRepository' => ['privates', 'App\\Repository\\UserRepository', 'getUserRepositoryService', true],
        ], [
            'apiRegister' => 'App\\Service\\ApiRegister',
            'userPasswordHasherInterface' => '?',
            'userRepository' => 'App\\Repository\\UserRepository',
        ]))->withContext('App\\Controller\\UserController::getToken()', $container);
    }
}