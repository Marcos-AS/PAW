<?php

namespace Paw\App\controllers;
use Paw\Core\Controller;

use Paw\App\models\Login;
use Paw\App\models\Paciente;


class UserController extends Controller {

    public function loginValidar() {
        $login = new Login;
        $login -> setDni($_POST['dni']);
        $login -> setPassword($_POST['password']);
        $this -> inicioUsuario();
    }   

    public function inicioUsuario() {
        require $this ->viewsDir . '/portal-pacientes/inicio-usuario.view.php';
    }

    public function registroUsuario() {
        $usuario = new Paciente;
        $usuario -> setNombre($_POST['nombre']);
        $usuario -> setApellido($_POST['apellido']);
        $usuario -> setDni($_POST['dni']);
        $usuario -> setEmail($_POST['email']);
        $usuario -> setPassword($_POST['password']);
        $usuario -> setTelefono($_POST['telefono']);
        $usuario -> setObraSocial($_POST['obraSocial']);
        $this -> nuevoUsuario(true);
    }

    public function nuevoUsuario($procesado=false) {
        require $this ->viewsDir . '/portal-pacientes/nuevo-usuario.view.php';
    }

}