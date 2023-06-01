<?php

namespace Paw\Core;

class Controller {

    public string $viewsDir;
    public ?string $modelName = null;
    public $model;

    public function __construct(){
        $this -> viewsDir = __DIR__  . '/../App/views/';
        @$this -> menu = [
            [
                "href" => "#",
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
                "href" => "#",
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

        if(!is_null($this -> modelName)) {
            $qb = new QueryBuilder($connection, $log);
            $model = new $this -> modelName;
            $model -> setQueryBuilder($qb);
            $this -> setModel($model);
        }
    }

    
    public function setModel(Model $model) {
        $this -> model = $model;
    }


}