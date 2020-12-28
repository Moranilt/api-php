<?php
require_once '../vendor/autoload.php';
require 'bootstrap.php';
use App\Core\Application;

$app = new Application();


$app->router->get('/', function(){
    echo 'Test';
});

$app->run();
