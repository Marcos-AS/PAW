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
        "obrasocial_id" => null,
    ];

    # Faltan hacer todas las validaciones necesarias

    public function setNombre($nombre) {
        $pattern = '/\d/';
        if (strlen($nombre) > 60) {
            throw new InvalidValueFormatException("El nombre no debe ser mayor a 60 caracteres");
        } else if (preg_match($pattern, $nombre)) {
            throw new InvalidValueFormatException("El nombre no debe contener números");
        }
        $this -> fields["nombre"] = $nombre;
    }

    public function setApellido($apellido) {
        $pattern = '/\d/';
        if (strlen($apellido) > 60) {
            throw new InvalidValueFormatException("El apellido no debe ser mayor a 60 caracteres");
        } else if (preg_match($pattern, $apellido)) {
            throw new InvalidValueFormatException("El nombre no debe contener números");
        }
        $this -> fields["apellido"] = $apellido;
    }

    public function setDni($dni) {
        $pattern = '/[a-zA-Z]/';
        if (strlen($dni) > 8 || strlen($dni) < 7) {
            throw new InvalidValueFormatException("El DNI debe tener 7 u 8 dígitos");
        } else if (preg_match($pattern,$dni)) {
            throw new InvalidValueFormatException("El DNI no debe contener letras");
        }
        $this -> fields["dni"] = $dni;
    }

    public function setEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidValueFormatException("Formato de email no valido");
        }
        $this -> fields["email"] = $email;
    }

    public function setPassword($password) {
        // Verificar que la contraseña cumpla con ciertas reglas
        if (strlen($password) < 8) {
            throw new InvalidPasswordException("La contraseña debe tener al menos 8 caracteres.");
        }
    
        if (!preg_match("/[a-z]/", $password) || !preg_match("/[A-Z]/", $password)) {
            throw new InvalidPasswordException("La contraseña debe contener al menos una letra mayúscula y una letra minúscula.");
        }
    
        if (!preg_match("/\d/", $password)) {
            throw new InvalidPasswordException("La contraseña debe contener al menos un número.");
        }
    
        // Asignar la contraseña solo si pasa las validaciones
        $this->fields["password"] = $password;
    }

    public function setTelefono($telefono) {
        $pattern = '/[a-zA-Z]/';
        if (preg_match($pattern, $tel)) {
            throw new InvalidValueFormatException("Formato de telefono no valido");
        }
        $this -> fields["telefono"] = $tel;
    }

    public function setObraSocial($obraSocial) {
        $this -> fields["obrasocial_id"] = $obraSocial;
    }

}