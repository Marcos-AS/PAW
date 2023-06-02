<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Paw\App\Models\Turno;

class TurnosCollection extends Model {
    
    public $table = 'turno';

    public function set($turno) {
        
        $esp = $turno->fields['especialista'];
        $espRow = $this-> queryBuilder -> select('profesional', $esp);
        if ($espRow === null) {
             // Manejar el caso en el que la obra social no se encontró en la base de datos
             // Puedes lanzar una excepción, mostrar un mensaje de error, etc.
        }
        //var_dump($espRow);
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


        $fecha = $turno->fields['fecha'];
        $timestamp = strtotime($fecha);
        $solo_fecha = date('d/m/Y', $timestamp);
        $turno->setFecha($solo_fecha);

        var_dump($turno);

        //$this->queryBuilder->insert($this->table, $turno);
    }
}