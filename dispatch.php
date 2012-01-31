<?php

// load Tonic library
require_once './lib/tonic.php';

// load the service files
require_once '4ME105/moviehandler.php';
require_once '4ME105/root.php';

// handle request
// change the baseUri to where you have placed the project on your server (in this case it is placed in http://server.se/4ME105
$request = new Request(array('baseUri' => '/4ME105'));
try {
    $resource = $request->loadResource();
    $response = $resource->exec($request);

} catch (ResponseException $e) {
    switch ($e->getCode()) {
    case Response::UNAUTHORIZED:
        $response = $e->response($request);
        $response->addHeader('WWW-Authenticate', 'Basic realm="Tonic"');
        break;
    default:
        $response = $e->response($request);
    }
}
$response->output();

