<?php

$router = new AltoRouter();

$router->map('GET', '/about', '', 'about_us');

$match = $router->match();

// var_dump($match);

if ($match) {
    echo "About us page";
} else {
    // header($_SERVER(['SEVER_PRTOCOL'] . '404 NOT FOUND'));
    echo "PAGE NT FOUND";
    return false;
}