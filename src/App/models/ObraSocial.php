<?php

namespace Paw\App\models;

use Paw\Core\Model;
use Paw\Core\Exceptions\InvalidValueFormatException;
use Exception;

class ObraSocial extends Model {

    public $table = 'obrasocial';

    public $fields = [
        "id" => null,
        "nombre" => null,
    ];

    public function setId($id) {
        $this -> fields["id"] = $id;
    }

    public function setNombre(string $nombre) {
        if (strlen($nombre) > 60) {
            throw new InvalidValueFormatException("El nombre del profesional no debe ser mayor a 60 caracteres");
        }
        $this -> fields["nombre"] = $nombre;
    }

    public function set(array $values) {
        foreach(array_keys($this -> fields) as $field) {
            if (!isset($values[$field])) {
                continue;
            }
            $method = "set" . ucfirst($field);
            $this -> $method($values[$field]);
        }
    }
}