<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/publish/{signature}', function (Request $request, Response $response, array $args) {
    $signature = $args['signature'];
    $response->getBody()->write("signature is, $signature");

    return $response;

    //connect to Multichain and publish the signature to the POE stream
});

$app->get('/verify/{signature}', function (Request $request, Response $response, array $args) {
    $signature = $args['signature'];
    $response->getBody()->write("signature is, $signature");

    return $response;

    //connect to Multichain and pull the signature from the POE stream and display as JSON
});

$app->run();

?>
