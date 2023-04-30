<?php
namespace Paw\App\Controllers;

use Paw\Core\Controller;

class ErrorController {

    public string $viewsDir;

    public function __construct() {
        $this -> viewsDir = __DIR__  . '/../views/';
    }

    public function notFound() {
        //$titulo = "Pagina no encontrada";
        http_response_code(404);
       // require $this -> viewsDir . 'not-found.view.php';
    }

    public function internalError() {
        http_response_code(500);
        //require $this -> viewsDir . 'internal-error.view.php';
    }
}