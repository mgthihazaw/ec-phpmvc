<?php
// Helper class
use Philo\Blade\Blade;





function view($path, array $data = [])
{
    $views = __DIR__ . '/../../resources/views';
    $cache = __DIR__ . '/../../bootstrap/cache';
    $blade = new Blade($views, $cache);
    echo $blade->view()->make($path, $data)->render();
}
function make($filename, $data)
{

    extract($data);
    //turn on output buffering
    ob_start();

    //include template
    include(__DIR__ . './../../resources/views/emails/' . $filename . '.php');

    //get content of file
    $content = ob_get_contents();

    //turn off output buffering
    ob_end_clean();

    return $content;
}