<?php

namespace PAW\App\Models;

use Paw\Core\Exceptions\InvalidValueFormatException;
use Exception;

class Login {

    public $fields = [
        "dni" => null,
        "password" => null,
    ];

    public function setDni(int $dni) {
        if (strlen(strval($dni)) > 8 || strlen(strval($dni)) < 7)  {
            throw new InvalidValueFormatException("El DNI debe tener 7 u 8 dígitos");
        }
        $this -> fields["dni"] = $dni;
    }

    public function setPassword(string $password) {
        if (strlen($password) < 8) {
            throw new InvalidValueFormatException("La contraseña debe tener al menos 8 caracteres");
        }
        if (!preg_match('/[0-9]/', $password)) {
            throw new InvalidValueFormatException("La contraseña debe contener al menos un número");
        }
        if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            throw new InvalidValueFormatException("La contraseña debe contener al menos un carácter especial");
        }
        if (!preg_match('/[A-Z]/', $password)) {
            throw new InvalidValueFormatException("La contraseña debe contener al menos una letra mayúscula");
        }
        $this->fields["password"] = $password;
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