<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Controller\CrudApiController;


return function (App $app) {
    $container = $app->getContainer();


    // get all produk
    $app->get('/selectAll', function (Request $request, Response $response, array $args) use ($app) {
        return $response->withJson(CrudApiController::SelectAll($this, $request, $response, $args));
    });

    $app->post('/insertProduk', function (Request $request, Response $response, array $args) use ($app) {
        return $response->withJson(CrudApiController::InsertProduk($this, $request, $response, $args));
    });

    $app->post('/updateProduk', function (Request $request, Response $response, array $args) use ($app) {
        return $response->withJson(CrudApiController::UpdateProduk($this, $request, $response, $args));
    });

    $app->post('/deleteProduk', function (Request $request, Response $response, array $args) use ($app) {
        return $response->withJson(CrudApiController::DeleteProduk($this, $request, $response, $args));
    });
    





    $app->get('/[{name}]', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");

        // Render index view
        return $container->get('renderer')->render($response, 'index.html', $args);
    });
};
