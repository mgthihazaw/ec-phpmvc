<?php

$router = new AltoRouter();

$router->map('GET', '/', 'App\Controllers\IndexController@index', 'home');
$router->map('GET', '/mail', 'App\Controllers\IndexController@mailSend', 'mail');

// $match = $router->match();

// //  var_dump($match);

// if ($match) {
//     require_once __DIR__ . '/../controllers/BaseController.php';
//     require_once __DIR__ . '/../controllers/IndexController.php';
//     // $index = new App\Controllers\IndexController();
//     // $index->index();
//     list($controller, $method) = explode('@', $match['target']);
//     if (is_callable([new $controller, $method])) {
//         call_user_func_array([new $controller, $method], [$match['params']]);
//     } else {
//         echo "The method  {$method} is not defined in this controller {$controller}";
//     }
// } else {
//     // header($_SERVER(['SEVER_PRTOCOL'] . '404 NOT FOUND'));
//     echo "PAGE NT FOUND";
//     return false;
// }