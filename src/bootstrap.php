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

$whoops = new \Whoops\Run;
$whoops -> pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops -> register();

$request = new Request;

$router = new Router;
$router -> setLogger($log);
$router -> get('/', 'PageController@index');
$router -> post('/', 'ConsultaController@consulta');
$router -> get('/institucional/autoridades', 'PageController@autoridades');
$router -> get('/institucional/historia', 'PageController@historia');
$router -> get('/institucional/mision', 'PageController@mision');
$router -> get('/institucional/valores', 'PageController@valores');
$router -> get('/info-util/coberturasMedicas', 'PageController@coberturasMedicas');
$router -> get('/info-util/novedades', 'PageController@novedades');
$router -> get('/info-util/patologiasytratamientos', 'PageController@patologiasytratamientos');
$router -> get('/profyesp', 'PageController@profyesp');
$router -> get('/solicitarTurno', 'TurnoController@solicitarTurno');
$router -> post('/solicitarTurno', 'TurnoController@solicitarTurnoValidar');
$router -> get('/trabajaconnosotros', 'PageController@trabajaconnosotros');
$router -> post('/trabajaconnosotros', 'CvController@trabajaconnosotrosValidar');
$router -> get('/portal-pacientes/estudios-realizados', 'UserController@estudiosRealizados');
$router -> get('/portal-pacientes/historial-turnos', 'UserController@historialTurnos');
$router -> get('/portal-pacientes/inicio-usuario', 'UserController@inicioUsuario');
$router -> get('/portal-pacientes', 'PageController@login');
$router -> post('/portal-pacientes', 'UserController@loginValidar');
$router -> get('/portal-pacientes/nuevo-usuario', 'UserController@nuevoUsuario');
$router -> post('/portal-pacientes/nuevo-usuario', 'UserController@registroUsuario');
$router -> get('/portal-pacientes/perfil-usuario', 'UserController@perfilUsuario');
$router -> get('/portal-pacientes/recuperar-password', 'UserController@recuperarPassword');
$router -> post('/guardar-estudio', 'EstudioController@guardarEstudio');



/*$router -> get('/about', 'PageController@about');
$router -> get('/services', 'PageController@services');
$router -> get('/contact', 'PageController@contact');
$router -> post('/contact', 'PageController@contactProcess'); */