<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//multichain PHP client
use be\kunstmaan\multichain\MultichainClient;
use be\kunstmaan\multichain\MultichainHelper;

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/publish/{signature}', function (Request $request, Response $response, array $args) {

    $signature = $args['signature'];
    //$response->getBody()->write("signature is, $signature");

    //connect to Multichain and publish the signature to the POE stream
    $client = new MultichainClient("http://54.163.128.66:9744", 'multichainrpc', 'G5Z1x53jjUBDdpj8Xoe273Kc5mib72XGXMhhcHtjUSv1', 3);

    //get blockchain info
    $blockchain_info = $client->setDebug(true)->getInfo();
    
    return $response->withJSON()->withHeader('Content-type', 'application/json');
	
	});


$app->get('/verify/{signature}', function (Request $request, Response $response, array $args) {
    $signature = $args['signature'];
    $response->getBody()->write("signature is, $signature");

    return $response;

    //connect to Multichain and pull the signature from the POE stream and display as JSON
});

$app->run();

?>
