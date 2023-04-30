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

}