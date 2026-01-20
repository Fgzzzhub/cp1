<?php

require_once __DIR__ . '/app/core/bootstrap.php';

$routes = require __DIR__ . '/app/core/routes.php';
$route = trim((string) ($_GET['route'] ?? ''), '/');

define('CURRENT_ROUTE', $route);

if (!isset($routes[$route])) {
    http_response_code(404);
    view('errors/404', compact('route'));
    exit;
}

[$controllerClass, $method] = $routes[$route];
$controller = new $controllerClass();
$controller->$method();
