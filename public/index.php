<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/publish/{signature}', function (Request $request, Response $response, array $args) {
    $signature = $args['signature'];
    $response->getBody()->write("signature is, $name");

    return $response;
});

$app->run();

?>
