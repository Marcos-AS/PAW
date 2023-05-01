<?php

namespace Paw\App\controllers;

use Paw\Core\Exceptions\InvalidValueFormatException;
use Paw\App\models\Login;
use Paw\App\models\Turno;


class PageController {

    public string $viewsDir;

    public function __construct(){
        $this -> viewsDir = __DIR__  . '/../views/';
        @$this -> menu = [
            [
                "href" => "",
                "name" => "Institucional",
            ],
            [
                "href" => "/portal-pacientes",
                "name" => "Portal Pacientes",
            ],
            [
                "href" => "/profyesp",
                "name" => "Profesionales y Especialidades",
            ],  
            [
                "href" => "",
                "name" => "Informacion Util",
            ]
        ];

        @$this -> subMenuInstitucional = [
            [
                "href" => "/institucional/autoridades",
                "name" => "Autoridades"
            ],
            [
                "href" => "/institucional/historia",
                "name" => "Historia",
            ],
            [
                "href" => "/institucional/mision",
                "name" => "Mision",
            ],
            [
                "href" => "/institucional/valores",
                "name" => "Valores",
            ]
        ];

        @$this -> subMenuInformacionUtil = [
            [
                "href" => "/info-util/coberturasMedicas",
                "name" => "Coberturas Medicas",
            ],
            [
                "href" => "/info-util/novedades",
                "name" => "Novedades",
            ],
            [
                "href" => "/info-util/patologiasytratamientos",
                "name" => "Patologias y Tratamientos",
            ],
        ];
    }

    public function index() {
        require $this ->viewsDir . 'home.view.php';
    }

    public function autoridades() {
        require $this ->viewsDir . '/institucional/autoridades.view.php';
    }

    public function historia() {
        require $this ->viewsDir . '/institucional/historia.view.php';
    }

    public function mision() {
        require $this ->viewsDir . '/institucional/mision.view.php';
    }

    public function valores() {
        require $this ->viewsDir . '/institucional/valores.view.php';
    }

    public function coberturasMedicas() {
        require $this ->viewsDir . '/info-util/coberturasmedicas.view.php';
    }

    public function novedades() {
        require $this ->viewsDir . '/info-util/novedades.view.php';
    }

    public function patologiasytratamientos() {
        require $this ->viewsDir . '/info-util/patologiasytratamientos.view.php';
    }

    public function profyesp() {
        require $this ->viewsDir . '/profyesp.view.php';
    }
    
    public function solicitarTurno() {
        require $this ->viewsDir . '/solicitarTurno.view.php';
    }

    public function solicitarTurnoValidar() {
        $turno = new Turno();
        $turno -> setNombre($_POST['nombre']);
        $turno -> setApellido($_POST['apellido']);
        $turno -> setFechaNacimiento($_POST['fechanacimiento']);
        $turno -> setDni($_POST['dni']);
        $turno -> setEdad($_POST['edad']);
        $turno -> setEmail($_POST['email']);
        $turno -> setTelefono($_POST['telefono']);
        $turno -> setFecha($_POST['fecha']);
        $turno -> setHorario($_POST['horario']);
    }

    public function loginValidar() {
        $login = new Login;
        $login -> setDni($_POST['dni']);
        $login -> setPassword($_POST['password']);
        $this -> inicioUsuario();
    }

    public function trabajaconnosotros() {
        require $this ->viewsDir . '/trabajaconnosotros.view.php';
    }

    public function estudiosRealizados($procesado= false) {
        require $this ->viewsDir . '/portal-pacientes/estudios-realizados.view.php';
    }

    public function historialTurnos() {
        require $this ->viewsDir . '/portal-pacientes/historial-turnos.view.php';
    }

    public function inicioUsuario() {
        require $this ->viewsDir . '/portal-pacientes/inicio-usuario.view.php';
    }

    public function login() {
        require $this ->viewsDir . '/portal-pacientes/login.view.php';
    }

    public function nuevoUsuario() {
        require $this ->viewsDir . '/portal-pacientes/nuevo-usuario.view.php';
    }
    
    public function perfilUsuario() {
        require $this ->viewsDir . '/portal-pacientes/perfil-usuario.view.php';
    }

    public function recuperarPassword() {
        require $this ->viewsDir . '/portal-pacientes/recuperar-password.view.php';
    }

    public function guardarEstudio()
    {
        $formulario = $_POST;
        // Validamos que se haya enviado un archivo
        if (empty($_FILES['archivo']['tmp_name'])) {
            // Si no se envió un archivo, mostramos un mensaje de error
            throw new InvalidValueFormatException("Debes adjuntar un archivo");
        }

        // Validamos el formato del archivo
        $formato_permitido = ['pdf', 'jpg', 'png'];
        $archivo = $_FILES['archivo']['name'];
        $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

        if (!in_array($extension, $formato_permitido)) {
            // Si el formato no está permitido, mostramos un mensaje de error
            throw new InvalidValueFormatException("Formato no permitido");
        }

        // Aquí puedes guardar el archivo en el servidor, por ejemplo:
        // move_uploaded_file($_FILES['archivo']['tmp_name'], '/ruta/para/guardar/archivos/' . $archivo);

        $this -> estudiosRealizados(true);
    }

}