<?php

namespace PAW\App\Models;

use Paw\Core\Exceptions\InvalidValueFormatException;
use Exception;

class Cv {

    public $fields = [
        "nombre" => null,
        "apellido" => null,
        "email" => null,
        "telefono" => null,
        "direccion" => null,
        "cp" => null,
        "nivel" => null,
        "apellido" => null,
        "estudio" => null,
        "area" => null,
        "curriculum" => null,
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

    public function setApellido(string $apellido) {
        $pattern = '/\d/';
        if (strlen($apellido) > 60) {
            throw new InvalidValueFormatException("El apellido no debe ser mayor a 60 caracteres");
        } else if (preg_match($pattern, $apellido)) {
            throw new InvalidValueFormatException("El nombre no debe contener números");
        }
        $this -> fields["apellido"] = $apellido;
    }

    public function setEmail(string $email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidValueFormatException("Formato de email no valido");
        }
        $this -> fields["email"] = $email;
    }

    public function setTelefono(string $telefono) {
        $pattern = '/[a-zA-Z]/';
        if (preg_match($pattern, $telefono)) {
            throw new InvalidValueFormatException("Formato de telefono no valido");
        }
        $this -> fields["telefono"] = $telefono;
    }

    public function setDireccion(string $direccion) {
        $this -> fields["direccion"] = $direccion;
    }

    public function setCodigoPostal(string $cp) {
        $this -> fields["cp"] = $cp;
    }

    public function setEstudio(string $estudio) {
        $this -> fields["estudio"] = $estudio;
    }

    public function setArea(string $area) {
        $this -> fields["area"] = $area;
    }
}