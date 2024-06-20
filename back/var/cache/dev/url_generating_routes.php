<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    'app_activities' => [[], ['_controller' => 'App\\Controller\\ActivityController::index'], [], [['text', '/activities']], [], [], []],
    'app_breed' => [[], ['_controller' => 'App\\Controller\\BreedController::index'], [], [['text', '/breed']], [], [], []],
    'app_add_outing' => [[], ['_controller' => 'App\\Controller\\OutingController::add'], [], [['text', '/add/outing']], [], [], []],
    'app_pet' => [[], ['_controller' => 'App\\Controller\\PetController::index'], [], [['text', '/pet']], [], [], []],
    'app_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], [], []],
    'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], [], []],
    'app_users' => [[], ['_controller' => 'App\\Controller\\UserController::index'], [], [['text', '/users']], [], [], []],
    'app_api_gettoken' => [[], ['_controller' => 'App\\Controller\\UserController::getToken'], [], [['text', '/api/gettoken']], [], [], []],
    'app_api_veriftoken' => [[], ['_controller' => 'App\\Controller\\UserController::verifApiToken'], [], [['text', '/api/veriftoken']], [], [], []],
    'app_add_test' => [[], ['_controller' => 'App\\Controller\\UserController::add'], [], [['text', '/add/user']], [], [], []],
    'App\Controller\ActivityController::index' => [[], ['_controller' => 'App\\Controller\\ActivityController::index'], [], [['text', '/activities']], [], [], []],
    'App\Controller\BreedController::index' => [[], ['_controller' => 'App\\Controller\\BreedController::index'], [], [['text', '/breed']], [], [], []],
    'App\Controller\OutingController::add' => [[], ['_controller' => 'App\\Controller\\OutingController::add'], [], [['text', '/add/outing']], [], [], []],
    'App\Controller\PetController::index' => [[], ['_controller' => 'App\\Controller\\PetController::index'], [], [['text', '/pet']], [], [], []],
    'App\Controller\SecurityController::login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], [], []],
    'App\Controller\SecurityController::logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], [], []],
    'App\Controller\UserController::index' => [[], ['_controller' => 'App\\Controller\\UserController::index'], [], [['text', '/users']], [], [], []],
    'App\Controller\UserController::getToken' => [[], ['_controller' => 'App\\Controller\\UserController::getToken'], [], [['text', '/api/gettoken']], [], [], []],
    'App\Controller\UserController::verifApiToken' => [[], ['_controller' => 'App\\Controller\\UserController::verifApiToken'], [], [['text', '/api/veriftoken']], [], [], []],
    'App\Controller\UserController::add' => [[], ['_controller' => 'App\\Controller\\UserController::add'], [], [['text', '/add/user']], [], [], []],
];
