<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/activity' => [[['_route' => 'app_activity', '_controller' => 'App\\Controller\\ActivityController::index'], null, null, null, false, false, null]],
        '/breed' => [[['_route' => 'app_breed', '_controller' => 'App\\Controller\\BreedController::index'], null, null, null, false, false, null]],
        '/outing' => [[['_route' => 'app_outing', '_controller' => 'App\\Controller\\OutingController::index'], null, null, null, false, false, null]],
        '/pet' => [[['_route' => 'app_pet', '_controller' => 'App\\Controller\\PetController::index'], null, null, null, false, false, null]],
        '/users' => [[['_route' => 'app_users', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, false, false, null]],
        '/api/gettoken' => [[['_route' => 'app_api_gettoken', '_controller' => 'App\\Controller\\UserController::getToken'], null, null, null, false, false, null]],
        '/api/veriftoken' => [[['_route' => 'app_api_veriftoken', '_controller' => 'App\\Controller\\UserController::testToken'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
