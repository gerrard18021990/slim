<?php

$container = $app->getContainer();
$container['config'] = require_once 'config.php';
$container['settings']['displayErrorDetails'] = true;

$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['config']['db']);
    $capsule->setAsGlobal();
    $capsule->bootEloquent();
    return $capsule;
};
$container['db']::connection();

$container['phpErrorHandler'] = function ($container) {
    return function ($request, $response, $error) use ($container) {
        return $container['response']
            ->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write($error);
    };
};

$container['validator'] = function ($container) {
    return new \validation\Validator();
};

$container['view'] = function () {
    return new \Slim\Views\PhpRenderer('view', [], 'layout.php');
};

$app->get('/', \action\IndexAction::class . ':home');
$app->get('/contacts', \action\IndexAction::class . ':contacts');
$app->get('/products', \action\ProductAction::class . ':index');
$app->get('/create-product-form', \action\ProductAction::class . ':createForm');
$app->post('/create-product', \action\ProductAction::class . ':create');