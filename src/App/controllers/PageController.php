<?php

namespace Paw\App\controllers;

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

    public function trabajaconnosotros() {
        require $this ->viewsDir . '/trabajaconnosotros.view.php';
    }

    public function estudiosRealizados() {
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

}