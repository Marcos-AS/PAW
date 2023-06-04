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
        $this->queryBuilder->insert($this->table, $paciente);
    }

}