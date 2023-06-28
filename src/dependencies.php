<?php

use Slim\App;
use Medoo\Medoo;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    // medoo
    $container['db'] = function ($c) {
        $database = new Medoo([
            'database_type' => 'mysql',
            'server' => 'localhost',
            'database_name' => 'pijarcamp',
            'username' => 'root',
            'password' => '',
        ]);
        return $database;
    };


};
