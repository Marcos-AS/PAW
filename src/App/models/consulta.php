<?php

namespace PAW\App\Models;

use Paw\Core\Exceptions\InvalidValueFormatException;
use Exception;

class Consulta {

    public $fields = [
        "nombre" => null,
        "email" => null,
        "consulta" => null,
    ];

    public function setNombre(string $nombre) {
        $pattern = '/\d/';
        if (strlen($nombre) > 60) {
            throw new InvalidValueFormatException("El nombre no debe ser mayor a 60 caracteres");
        } else if (preg_match($pattern, $nombre)) {
            throw new InvalidValueFormatException("El nombre no debe contener números");
        }
        $this -> fields["nombre"] = $nombre;
    }

    public function setEmail(string $email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidValueFormatException("Formato de email no valido");
        }
        $this -> fields["email"] = $email;
    }

    public function setConsulta(string $consulta) {
        $this -> fields["consulta"] = $consulta;
    }
}