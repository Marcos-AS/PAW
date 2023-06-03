<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Paw\App\Models\Turno;
use Paw\App\Models\Profesional;
use DateTime;

class TurnosCollection extends Model {
    
    public $table = 'turno';

    public function set($turno) {
        
        $esp = $turno->fields['especialista'];
        $espRow = $this-> queryBuilder -> select('profesional', $esp);
        if ($espRow === null) {
             // Manejar el caso en el que la obra social no se encontró en la base de datos
             // Puedes lanzar una excepción, mostrar un mensaje de error, etc.
        }

        $espId = $espRow[0]['matricula'];
        $turno->fields['profesional_id'] = $espId;
        unset($turno->fields['especialista']); // Eliminar el campo "especialista"

        $nombreObraSocial = $turno->fields['obraSocial'];
        $obraSocial = $this-> queryBuilder -> select('obrasocial', $nombreObraSocial);
        if ($obraSocial === null) {
             // Manejar el caso en el que la obra social no se encontró en la base de datos
             // Puedes lanzar una excepción, mostrar un mensaje de error, etc.
        }
        $obraSocialId = $obraSocial[0]['id'];
        $turno->fields['obrasocial_id'] = $obraSocialId;
        unset($turno->fields['obraSocial']); // Eliminar el campo "obraSocial"

        $dateString = $turno->fields['fecha'];
        // Removemos el día de la semana y los espacios en blanco
        $dateString = str_replace("lunes, ", "", $dateString);
        // Convertimos el formato de la fecha utilizando strtotime
        $date = date("Y-m-d", strtotime($dateString));
        
        $turno->setFecha($date);
        $this->queryBuilder->insert($this->table, $turno);
    }

    public function getProfesionales() {
        $profesionales = $this->queryBuilder->select('profesional'); 
        $profesionalesCollection = [];
        foreach ($profesionales as $profesional) {
            $newProfesional = new Profesional;
            $newProfesional -> set($profesional);
            $profesionalesCollection[] = $newProfesional;
        }
        //print_r($profesionalesCollection);
    return $profesionalesCollection;
    }
    
    public function getDiasQueAtiende($matricula) {
        return $dias = $this->queryBuilder->select('profesional_dia', ['matricula' => $matricula]);
    }

}