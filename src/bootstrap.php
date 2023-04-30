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
$router -> get('/institucional/mision', 'PageController@mision');
$router -> get('/institucional/valores', 'PageController@valores');
$router -> get('/info-util/coberturasMedicas', 'PageController@coberturasMedicas');
$router -> get('/info-util/novedades', 'PageController@novedades');
$router -> get('/info-util/patologiasytratamientos', 'PageController@patologiasytratamientos');
$router -> get('/profyesp', 'PageController@profyesp');
$router -> get('/solicitarTurno', 'PageController@solicitarTurno');
$router -> get('/trabajaconnosotros', 'PageController@trabajaconnosotros');
$router -> get('/portal-pacientes/estudios-realizados', 'PageController@estudios-realizados');
$router -> get('/portal-pacientes/historial-turnos', 'PageController@historial-turnos');
$router -> get('/portal-pacientes/inicio-usuario', 'PageController@inicio-usuario');
$router -> get('/portal-pacientes/login', 'PageController@login');
$router -> get('/portal-pacientes/nuevo-usuario', 'PageController@nuevo-usuario');
$router -> get('/portal-pacientes/perfil-usuario', 'PageController@perfil-usuario');
$router -> get('/portal-pacientes/recuperar-password', 'PageController@recuperar-password');


/*$router -> get('/about', 'PageController@about');
$router -> get('/services', 'PageController@services');
$router -> get('/contact', 'PageController@contact');
$router -> post('/contact', 'PageController@contactProcess'); */