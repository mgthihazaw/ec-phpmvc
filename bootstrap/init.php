<?php

if (!isset($_SESSION)) session_start();

require_once __DIR__ . '/../app/config/_env.php';

require_once __DIR__ . '/../app/routing/routes.php';

//instantiate database class
new \App\Classes\Database();

//set custom handler
set_error_handler([new \App\Classes\ErrorHandler(), 'handleErrors']);

// require_once __DIR__ . '/../app/routing/RouteDispatcher.php';

$route = new App\Routing\RouteDispatcher($router);