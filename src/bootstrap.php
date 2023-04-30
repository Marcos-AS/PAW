<?php

require __DIR__ . '/../vendor/autoload.php'; 

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
//use Dotenv\Dotenv;

use Paw\Core\Router;
use Paw\Core\Request;
use Paw\Core\Config;
//use Paw\Core\Database\ConnectionBuilder;

$config = new Config;

$log = new Logger('mvc-app');
//$handler = new StreamHandler($config -> get("LOG_PATH"));
//$handler -> setLevel($config -> get("LOG_LEVEL"));
$handler = new StreamHandler('../logs/app.log');
$handler -> setLevel(Monolog\Logger::DEBUG);
$log -> pushHandler($handler);

/*$whoops = new \Whoops\Run;
$whoops -> pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops -> register(); */

$request = new Request;

$router = new Router;
$router -> setLogger($log);
$router -> get('/', 'PageController@index');
$router -> get('/institucional/autoridades', 'PageController@autoridades');
$router -> get('/institucional/historia', 'PageController@historia');
/*$router -> get('/about', 'PageController@about');
$router -> get('/services', 'PageController@services');
$router -> get('/contact', 'PageController@contact');
$router -> post('/contact', 'PageController@contactProcess'); */