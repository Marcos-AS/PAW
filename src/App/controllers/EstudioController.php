<?php

namespace Paw\App\controllers;
use Paw\Core\Controller;

class EstudioController extends Controller{

public function guardarEstudio()
    {
        $formulario = $_POST;
        // Validamos que se haya enviado un archivo
        if (empty($_FILES['archivo']['tmp_name'])) {
            // Si no se envió un archivo, mostramos un mensaje de error
            throw new InvalidValueFormatException("Debes adjuntar un archivo");
        }

        // Validamos el formato del archivo
        $formato_permitido = ['pdf', 'jpg', 'png'];
        $archivo = $_FILES['archivo']['name'];
        $extension = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

        if (!in_array($extension, $formato_permitido)) {
            // Si el formato no está permitido, mostramos un mensaje de error
            throw new InvalidValueFormatException("Formato no permitido");
        }

        // Aquí puedes guardar el archivo en el servidor, por ejemplo:
        // move_uploaded_file($_FILES['archivo']['tmp_name'], '/ruta/para/guardar/archivos/' . $archivo);

        $this -> estudiosRealizados(true);
    }

    public function estudiosRealizados($procesado= false) {
        require $this ->viewsDir . '/portal-pacientes/estudios-realizados.view.php';
    }

}