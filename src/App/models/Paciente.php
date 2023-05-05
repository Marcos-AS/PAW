<?php

namespace PAW\App\Models;

use Paw\Core\Exceptions\InvalidValueFormatException;
use Exception;
use DateTime;

class Paciente {

    public $fields = [
        "nombre" => null,
        "apellido" => null,
        "dni" => null,
        "email" => null,
        "password" => null,
        "telefono" => null,
        "obraSocial" => null,
    ];

    # Faltan hacer todas las validaciones necesarias

    public function setNombre($nombre) {
        $this -> fields["nombre"] = $nombre;
    }

    public function setApellido($apellido) {
        $this -> fields["apellido"] = $apellido;
    }

    public function setDni($dni) {
        $this -> fields["dni"] = $dni;
    }

    public function setEmail($email) {
        $this -> fields["email"] = $email;
    }

    public function setPassword($password) {
        $this -> fields["password"] = $password;
    }

    public function setTelefono($telefono) {
        $this -> fields["telefono"] = $telefono;
    }

    public function setObraSocial($obraSocial) {
        $this -> fields["obraSocial"] = $obraSocial;
    }

}