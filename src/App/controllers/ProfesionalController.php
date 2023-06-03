<?php

namespace Paw\App\controllers;
use Paw\Core\Controller;
use Paw\App\models\ProfesionalesCollection;

class ProfesionalController extends Controller{

    public ?string $modelName = ProfesionalesCollection::class;

    public function obtenerEspecialistas() {
   /*     $profesionales = $this->model->getProfesionales();
        $especialistas = array(); // Array para almacenar los especialistas
     /*   foreach ($profesionales as $profesional) {
            $especialista = $profesional->fields; // Utiliza directamente el array 'fields' del objeto Profesional
            $especialistas[] = $especialista;
        } */
        
  //      header('Content-Type: application/json');
      //  echo json_encode($especialistas, JSON_UNESCAPED_UNICODE);
        
    }
}