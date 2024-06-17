<?php

namespace Container0Uwwsk4;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_COFDPHHService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.cOFDPHH' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.cOFDPHH'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'App\\Controller\\UserController::getToken' => ['privates', '.service_locator.GDMosSs.App\\Controller\\UserController::getToken()', 'getUserControllergetTokenService', true],
            'App\\Controller\\UserController::index' => ['privates', '.service_locator.7n.Gtky.App\\Controller\\UserController::index()', 'getUserControllerindexService', true],
            'App\\Controller\\UserController::testToken' => ['privates', '.service_locator.UdT0tAy.App\\Controller\\UserController::testToken()', 'getUserControllertestTokenService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.4wc4Ag1.kernel::loadRoutes()', 'get_ServiceLocator_4wc4Ag1_KernelloadRoutesService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.4wc4Ag1.kernel::registerContainerConfiguration()', 'get_ServiceLocator_4wc4Ag1_KernelregisterContainerConfigurationService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.4wc4Ag1.kernel::loadRoutes()', 'get_ServiceLocator_4wc4Ag1_KernelloadRoutesService', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.4wc4Ag1.kernel::registerContainerConfiguration()', 'get_ServiceLocator_4wc4Ag1_KernelregisterContainerConfigurationService', true],
            'App\\Controller\\UserController:getToken' => ['privates', '.service_locator.GDMosSs.App\\Controller\\UserController::getToken()', 'getUserControllergetTokenService', true],
            'App\\Controller\\UserController:index' => ['privates', '.service_locator.7n.Gtky.App\\Controller\\UserController::index()', 'getUserControllerindexService', true],
            'App\\Controller\\UserController:testToken' => ['privates', '.service_locator.UdT0tAy.App\\Controller\\UserController::testToken()', 'getUserControllertestTokenService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.4wc4Ag1.kernel::loadRoutes()', 'get_ServiceLocator_4wc4Ag1_KernelloadRoutesService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.4wc4Ag1.kernel::registerContainerConfiguration()', 'get_ServiceLocator_4wc4Ag1_KernelregisterContainerConfigurationService', true],
        ], [
            'App\\Controller\\UserController::getToken' => '?',
            'App\\Controller\\UserController::index' => '?',
            'App\\Controller\\UserController::testToken' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\UserController:getToken' => '?',
            'App\\Controller\\UserController:index' => '?',
            'App\\Controller\\UserController:testToken' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}