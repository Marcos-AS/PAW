<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Paw\App\Models\Paciente;

class UsersCollection extends Model {
    
    public $table = 'paciente';
    
    public function getAll() {
        $pacientes = $this -> queryBuilder -> select($this -> table);
        $pacientesCollection = [];
        foreach ($pacientes as $paciente) {
            $newPaciente = new Autor;
            $newPaciente -> set($paciente);
            $pacientesCollection[] = $newPaciente;
        }
    
    return $pacientesCollection;

    }

    public function get($id) {
        $paciente = new Paciente;
        $paciente -> setQueryBuilder($this -> queryBuilder);
        $paciente -> load($id);
        return $paciente;
    }

    public function set($paciente) {
        $nombreObraSocial = $paciente->fields['obraSocial'];
        $obraSocial = $this-> queryBuilder -> select('obrasocial', $nombreObraSocial);
        if ($obraSocial === null) {
             // Manejar el caso en el que la obra social no se encontró en la base de datos
             // Puedes lanzar una excepción, mostrar un mensaje de error, etc.
        }
    
        $obraSocialId = $obraSocial[0]['id'];
        $paciente->fields['obrasocial_id'] = $obraSocialId;

        unset($paciente->fields['obraSocial']); // Eliminar el campo "obraSocial"

        $this->queryBuilder->insert($this->table, $paciente);
    }

}