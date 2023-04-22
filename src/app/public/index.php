<?php

use Router\Router;

require '../vendor/autoload.php';

define('VIEWS', dirname(__DIR__) .DIRECTORY_SEPARATOR. 'views'. DIRECTORY_SEPARATOR);
define('SCRIPTS', $_SERVER['DOCUMENT_ROOT']. DIRECTORY_SEPARATOR);
define('DB_NAME', 'docker-php');
define('DB_HOST', 'db');
define('DB_USER','user');
define('DB_PWD', 'secret');


$router = new Router(isset($_GET['url']) ? $_GET['url'] : '');


$router->get('/', 'Controllers\ProductController@index');
$router->get('/add-products', 'Controllers\ProductController@add');
$router->get('/test', 'Controllers\ProductController@show');

$router->post('/add-products', 'Controllers\ProductController@createPost');
$router->post('/:id', 'Controllers\ProductController@destroy');


$router->run();


