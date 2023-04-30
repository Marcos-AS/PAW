<?php

namespace Paw\App\controllers;

class PageController {

    public string $viewsDir;

    public function __construct(){
        $this -> viewsDir = __DIR__  . '/../views/';
        @$this -> menu = [
            [
                "href" => "/institucional",
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
                "href" => "/informacion-util",
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
                "href" => "/coberturasmedicas",
                "name" => "Coberturas Medicas",
            ],
            [
                "href" => "/novedades",
                "name" => "Novedades",
            ],
            [
                "href" => "/patologiasytratamientos",
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
        require $this ->viewsDir . '/institucional/historia.html';
    }

    public function mision() {
        require $this ->viewsDir . '/institucional/mision.html';
    }

    public function valores() {
        require $this ->viewsDir . '/institucional/valores.html';
    }

    public function coberturasMedicas() {
        require $this ->viewsDir . '/info-util/coberturasmedicas.html';
    }

    public function novedades() {
        require $this ->viewsDir . '/info-util/novedades.html';
    }

    public function patologiasytratamientos() {
        require $this ->viewsDir . '/info-util/patologiasytratamientos.html';
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

    public function estudios-realizados() {
        require $this ->viewsDir . '/portal-pacientes/estudios-realizados.html';
    }

    public function historial-turnos() {
        require $this ->viewsDir . '/portal-pacientes/historial-turnos.html';
    }

    public function inicio-usuario() {
        require $this ->viewsDir . '/portal-pacientes/inicio-usuario.html';
    }

    public function login() {
        require $this ->viewsDir . '/portal-pacientes/login.html';
    }

    public function nuevo-usuario() {
        require $this ->viewsDir . '/portal-pacientes/nuevo-usuario.html';
    }
    
    public function perfil-usuario() {
        require $this ->viewsDir . '/portal-pacientes/perfil-usuario.html';
    }

    public function recuperar-password() {
        require $this ->viewsDir . '/portal-pacientes/recuperar-password.html';
    }

}