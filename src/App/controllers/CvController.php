<?php

namespace Paw\App\controllers;

use Paw\App\models\Cv;
use Paw\Core\Controller;

class CvController extends Controller{

    public function trabajaconnosotrosValidar() {
        $cv = new Cv();
        var_dump($_POST);
        $cv -> setNombre($_POST['nombre']);
        $cv -> setApellido($_POST['apellido']);
        $cv -> setEmail($_POST['email']);
        $cv -> setTelefono($_POST['telefono']);
        $cv -> setDireccion($_POST['direccion']);
        $cv -> setCodigoPostal($_POST['cp']);
        $cv -> setEstudio($_POST['estudio']);
        $cv -> setArea($_POST['area']);
        $this -> trabajaconnosotros(true);
    }

    public function trabajaconnosotros($procesado= false) {
        require $this ->viewsDir . '/trabajaconnosotros.view.php';
    }


}