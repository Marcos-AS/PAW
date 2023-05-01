<?php

namespace PAW\App\Models;

use Paw\Core\Exceptions\InvalidValueFormatException;
use Exception;

class Turno {

    public $fields = [
        "nombre" => null,
        "apellido" => null,
        "dni" => null,
        "fechaNacimiento" => null,
        "edad" => null,
        "obraSocial" => null,
        "email" => null,
        "telefono" => null,
        "especialidad" => null,
        "profesional" => null,
        "fecha" => null,
        "horario" => null,
    ];

    public function setNombre(string $nombre) {
        if (strlen($nombre) > 60) {
            throw new InvalidValueFormatException("El nombre no debe ser mayor a 60 caracteres");
        }
        $this -> fields["nombre"] = $nombre;
        
    }

    public function setApellido(string $apellido) {
        if (strlen($apellido) > 60) {
            throw new InvalidValueFormatException("El apellido no debe ser mayor a 60 caracteres");
        }
        $this -> fields["apellido"] = $apellido;
    }

    public function setDni(int $dni) {
        if (strlen(strval($dni)) > 8) {
            throw new InvalidValueFormatException("El DNI no puede tener más de 8 dígitos");
        }
        $this -> fields["dni"] = $dni;
    }

    public function setEmail(string $email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidValueFormatException("Formato de email no valido");
        }
        $this -> fields["email"] = $email;
    }

    public function set(array $values) {
        foreach(array_keys($this -> fields) as $field) {
            if (!isset($values[$field])) {
                continue;
            }
            $method = "set" . ucfirst($field);
            this -> method($values[$field]);
        }
    }

}