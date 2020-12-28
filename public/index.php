<?php
require_once '../vendor/autoload.php';
require 'bootstrap.php';

use App\Core\Application;
use App\Model\User;

$app = new Application();
$app->setHeaders();

$app->router->get('/', function(){
    echo $_ENV['API_NAME'];
});

$app->router->put('/users', [User::class, 'put']);
$app->router->delete('/users', [User::class, 'delete']);
$app->router->post('/users/:id', [User::class, 'post']);
$app->router->get('/users', [User::class, 'getAll']);
$app->router->get('/users/:id', [User::class, 'getOne']);

$app->run();
