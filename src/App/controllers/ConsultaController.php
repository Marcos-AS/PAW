<?php

namespace Paw\App\controllers;

use Paw\App\models\Consulta;
use Paw\Core\Controller;

class ConsultaController extends Controller{

    public function consulta() {
        $consulta = new Consulta();
        var_dump($_POST);
        $consulta -> setNombre($_POST['nombre']);
        $consulta -> setEmail($_POST['email']);
        $consulta -> setConsulta($_POST['consulta']);
        $this -> index(true);
    }

    public function index($procesado= false) {
        echo $this->twig->renderTemp('home.view.twig', $this->parts);
        //require $this ->viewsDir . 'home.view.php';
    }

}