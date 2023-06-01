<?php

namespace Paw\App\Controllers;

use Paw\Core\Controller;

class ErrorController extends Controller{

    public function notFound() {
        http_response_code(404);
        echo $this->twig->renderTemp('not-found.view.twig', $this->parts);
        //require $this -> viewsDir . 'not-found.view.twig';
    }
    
    public function internalError() {
        http_response_code(500);
        echo $this->twig->renderTemp('internal-error.view.twig', $this->parts);
        //require $this -> viewsDir . 'internal-error.view.twig';
    }
}