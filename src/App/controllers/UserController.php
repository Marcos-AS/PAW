<?php

namespace Paw\App\controllers;

use Paw\Core\Controller;
use Paw\App\models\Login;
use Paw\App\models\UsersCollection;
use Paw\App\models\Paciente;
use Paw\Core\Database\QueryBuilder;

class UserController extends Controller {

    public ?string $modelName = UsersCollection::class;

    public function loginValidar() {
        $login = new Login;
        $login -> setDni($_POST['dni']);
        $login -> setPassword($_POST['password']);
        session_start();
        $_SESSION['logueado'] = true;
        if (isset($_POST['dni'])) {
            $_SESSION['login'] = $_POST['dni'];
        }
        $this -> inicioUsuario();
    }   

    public function inicioUsuario() {
        echo $this->twig->renderTemp('/portal-pacientes/inicio-usuario.view.twig', $this->parts);
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

        $this -> model -> set($usuario);

        $this -> nuevoUsuario(true);
    }

    public function nuevoUsuario($procesado=false) {
        echo $this->twig->renderTemp('/portal-pacientes/nuevo-usuario.view.twig', $this->parts);
    }

    public function perfilUsuario() {
        echo $this->twig->renderTemp('/portal-pacientes/perfil-usuario.view.twig', $this->parts);
    }

    public function recuperarPassword() {
        echo $this->twig->renderTemp('/portal-pacientes/recuperar-password.view.twig', $this->parts);
    }

    public function estudiosRealizados($procesado= false) {
        echo $this->twig->renderTemp('/portal-pacientes/estudios-realizados.view.twig', $this->parts);        
    }
    
    public function historialTurnos() {
        echo $this->twig->renderTemp('/portal-pacientes/historial-turnos.view.twig', $this->parts);        
    }

}