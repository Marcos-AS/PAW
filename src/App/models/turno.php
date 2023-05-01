<?php

namespace PAW\App\Models;

use Paw\Core\Exceptions\InvalidValueFormatException;
use Exception;
use DateTime;

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

    public function setDni($dni) {
        $pattern = '/[a-zA-Z]/';
        if (strlen($dni) > 8 || strlen($dni) < 7) {
            throw new InvalidValueFormatException("El DNI debe tener 7 u 8 dígitos");
        } else if (preg_match($pattern,$dni)) {
            throw new InvalidValueFormatException("El DNI no debe contener letras");
        }
        $this -> fields["dni"] = $dni;
    }

    public function setFechaNacimiento($fechaNac) {
        /*if (!strtotime($fechaNac) || strtotime($fechaNac) < date('Y-m-d')) {
            throw new InvalidValueFormatException("La fecha debe ser válida");
        } */
        $this -> fields["fecha"] = $fechaNac;
    }

    public function setEdad(int $edad) {
    /*    $nac = new DateTime($fechaNac);
        $hoy = new DateTime();
        if ($edad != (date_diff($hoy, $nac))) {
            throw new InvalidValueFormatException("La edad no es acorde a la fecha de nacimiento");
        } */
        $this -> fields["edad"] = $edad;
    }

    public function setEmail(string $email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidValueFormatException("Formato de email no valido");
        }
        $this -> fields["email"] = $email;
    }

    public function setTelefono(string $tel) {
        $pattern = '/[a-zA-Z]/';
        if (preg_match($pattern, $tel)) {
            throw new InvalidValueFormatException("Formato de telefono no valido");
        }
        $this -> fields["telefono"] = $tel;
    }

    public function setFecha(string $fecha) {
        /*if (!strtotime($fecha) || strtotime($fecha) < date('Y-m-d')) {
            var_dump(strtotime($fecha));
            throw new InvalidValueFormatException("La fecha debe ser válida");
        } */
        $this -> fields["fecha"] = $fecha;
    }

    public function setHorario(string $hora) {
        if (!strtotime($hora) || strtotime($hora) < time()) {
            throw new InvalidValueFormatException("El horario debe ser válido");
        }
        $this -> fields["horario"] = $hora;
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